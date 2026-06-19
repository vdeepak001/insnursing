<?php

namespace App\Services;

use App\Enums\CourseTestType;
use App\Enums\PaymentStatus;
use App\Models\CourseDetail;
use App\Models\CourseMaterial;
use App\Models\CourseQuestion;
use App\Models\CourseTestAttempt;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class AdminDashboardService
{
    /**
     * @return array{
     *     stats: array<string, int|float>,
     *     charts: array{
     *         attempts_overview: array{categories: list<string>, series: list<array{name: string, data: list<int>}>, colors: list<string>},
     *         attempts_month: string,
     *         attempts_month_options: list<array{value: string, label: string}>,
     *         status_distribution: list<array{label: string, count: int, color: string}>
     *     },
     *     recent_attempts: list<array<string, mixed>>,
     *     top_performing: list<array<string, mixed>>
     * }
     */
    public function build(?string $attemptsMonth = null): array
    {
        $selectedMonth = $this->resolveAttemptsMonth($attemptsMonth);

        return [
            'stats' => $this->platformStats(),
            'charts' => [
                'attempts_overview' => $this->attemptsOverview($selectedMonth),
                'attempts_month' => $selectedMonth->format('Y-m'),
                'attempts_month_options' => $this->attemptsOverviewMonthOptions(),
                'status_distribution' => $this->statusDistribution(),
            ],
            'recent_attempts' => $this->recentAttempts(),
            'top_performing' => $this->topPerformingTests(),
        ];
    }

    /**
     * @return array<string, int|float>
     */
    private function platformStats(): array
    {
        $pretestType = CourseTestType::Pre->value;
        $mockType = CourseTestType::Mock->value;
        $finalType = CourseTestType::Final->value;

        $finalAverageQuery = CourseTestAttempt::query()
            ->where('test_type', $finalType)
            ->where('status', CourseTestAttempt::STATUS_COMPLETED)
            ->whereNotNull('score_percent')
            ->groupBy('user_id', 'course_detail_id')
            ->selectRaw('MAX(score_percent) as best_score');

        $average = \Illuminate\Support\Facades\DB::table(\Illuminate\Support\Facades\DB::raw("({$finalAverageQuery->toSql()}) as sub"))
            ->mergeBindings($finalAverageQuery->getQuery())
            ->avg('best_score');

        return [
            'total_users' => User::query()->where('role_type', 'user')->count(),
            'active_users' => User::query()->where('role_type', 'user')->where('active_status', 1)->count(),
            'total_courses' => CourseDetail::query()->count(),
            'active_courses' => CourseDetail::query()->where('active_status', 1)->count(),
            'total_materials' => CourseMaterial::query()->count(),
            'total_questions' => CourseQuestion::query()->count(),
            'pretest_attempts' => CourseTestAttempt::query()->where('test_type', $pretestType)->count(),
            'mock_test_attempts' => CourseTestAttempt::query()->where('test_type', $mockType)->count(),
            'final_test_attempts' => CourseTestAttempt::query()->where('test_type', $finalType)->count(),
            'final_average' => $average !== null ? round((float) $average, 1) : 0,
            'total_attempts' => CourseTestAttempt::query()
                ->whereIn('test_type', [$pretestType, $mockType, $finalType])
                ->count(),
        ];
    }

    private function resolveAttemptsMonth(?string $attemptsMonth): Carbon
    {
        if ($attemptsMonth !== null && preg_match('/^\d{4}-\d{2}$/', $attemptsMonth) === 1) {
            return Carbon::createFromFormat('Y-m', $attemptsMonth)->startOfMonth();
        }

        return now()->startOfMonth();
    }

    /**
     * @return list<array{value: string, label: string}>
     */
    private function attemptsOverviewMonthOptions(): array
    {
        return collect(range(0, 11))
            ->map(fn (int $offset): Carbon => now()->subMonths($offset)->startOfMonth())
            ->map(fn (Carbon $month): array => [
                'value' => $month->format('Y-m'),
                'label' => $month->isSameMonth(now()) ? 'This Month' : $month->format('F Y'),
            ])
            ->all();
    }

    /**
     * @return array{categories: list<string>, series: list<array{name: string, data: list<int>}>, colors: list<string>}
     */
    private function attemptsOverview(Carbon $month): array
    {
        $month = $month->copy()->startOfMonth();
        $types = [
            CourseTestType::Pre->value => 'Pre Tests',
            CourseTestType::Mock->value => 'Mock Tests',
            CourseTestType::Final->value => 'Final Tests',
        ];

        $weekStarts = collect(range(1, $month->daysInMonth, 7));

        $attempts = CourseTestAttempt::query()
            ->whereBetween('created_at', [$month->copy()->startOfDay(), $month->copy()->endOfMonth()->endOfDay()])
            ->whereIn('test_type', array_keys($types))
            ->get(['test_type', 'created_at']);

        $series = [];

        foreach ($types as $typeValue => $label) {
            $series[] = [
                'name' => $label,
                'data' => $weekStarts->map(function (int $startDay) use ($attempts, $typeValue, $month): int {
                    $weekStart = $month->copy()->day($startDay)->startOfDay();
                    $weekEnd = $month->copy()->day(min($startDay + 6, $month->daysInMonth))->endOfDay();

                    return $attempts
                        ->filter(function (CourseTestAttempt $attempt) use ($typeValue, $weekStart, $weekEnd): bool {
                            return $attempt->test_type->value === $typeValue
                                && $attempt->created_at->betweenIncluded($weekStart, $weekEnd);
                        })
                        ->count();
                })->values()->all(),
            ];
        }

        return [
            'categories' => $weekStarts
                ->map(fn (int $startDay): string => $month->copy()->day($startDay)->displayDate())
                ->values()
                ->all(),
            'series' => $series,
            'colors' => ['#107C85', '#1A7F64', '#E68A2E'],
        ];
    }

    /**
     * @return list<array{label: string, count: int, color: string}>
     */
    private function statusDistribution(): array
    {
        $sequencedTypes = [
            CourseTestType::Pre->value,
            CourseTestType::Mock->value,
            CourseTestType::Final->value,
        ];

        $attemptQuery = CourseTestAttempt::query()->whereIn('test_type', $sequencedTypes);

        $completed = (clone $attemptQuery)
            ->where('status', CourseTestAttempt::STATUS_COMPLETED)
            ->count();

        $inProgressAttempts = (clone $attemptQuery)
            ->where('status', CourseTestAttempt::STATUS_IN_PROGRESS)
            ->get(['started_at']);

        $expiredThreshold = now()->subMinutes(CourseTestAttempt::EXAM_TIME_LIMIT_MINUTES);
        $inProgress = 0;
        $expired = 0;

        foreach ($inProgressAttempts as $attempt) {
            if ($attempt->started_at !== null && $attempt->started_at->lte($expiredThreshold)) {
                $expired++;
            } else {
                $inProgress++;
            }
        }

        return [
            ['label' => 'Completed', 'count' => $completed, 'color' => '#009688'],
            ['label' => 'In progress', 'count' => $inProgress, 'color' => '#2196F3'],
            ['label' => 'Pending', 'count' => $this->pendingTestEnrollmentsCount($sequencedTypes), 'color' => '#FF9800'],
            ['label' => 'Expired', 'count' => $expired, 'color' => '#F44336'],
        ];
    }

    /**
     * @param  list<string>  $sequencedTypes
     */
    private function pendingTestEnrollmentsCount(array $sequencedTypes): int
    {
        $activeOrders = Order::query()
            ->where('payment_status', PaymentStatus::Completed)
            ->whereDate('start_date', '<=', now()->toDateString())
            ->whereDate('end_date', '>=', now()->toDateString())
            ->get(['user_id', 'course_detail_id']);

        if ($activeOrders->isEmpty()) {
            return 0;
        }

        $attemptPairs = CourseTestAttempt::query()
            ->whereIn('test_type', $sequencedTypes)
            ->get(['user_id', 'course_detail_id'])
            ->map(fn (CourseTestAttempt $attempt): string => $attempt->user_id.'-'.$attempt->course_detail_id)
            ->flip();

        return $activeOrders
            ->filter(fn (Order $order): bool => ! isset($attemptPairs[$order->user_id.'-'.$order->course_detail_id]))
            ->count();
    }

    /**
     * @return list<array<string, mixed>>
     */
    private function recentAttempts(): array
    {
        return CourseTestAttempt::query()
            ->with([
                'user:id,name',
                'courseDetail:id,couse_name',
            ])
            ->latest('updated_at')
            ->limit(10)
            ->get()
            ->map(function (CourseTestAttempt $attempt): array {
                $timestamp = $attempt->completed_at ?? $attempt->updated_at;

                return [
                    'user_name' => $attempt->user?->name ?? '—',
                    'course_name' => $attempt->courseDetail?->couse_name ?? '—',
                    'test_label' => $attempt->test_type?->label() ?? '—',
                    'outcome_label' => $attempt->outcomeLabel(),
                    'outcome_badge_classes' => $attempt->outcomeBadgeClasses(),
                    'score' => $attempt->score_percent !== null ? number_format((float) $attempt->score_percent, 1).'%' : '—',
                    'completed_at_date' => $timestamp?->displayDate() ?? '—',
                    'completed_at_time' => $timestamp?->format('g:i A') ?? '',
                ];
            })
            ->all();
    }

    /**
     * @return list<array<string, mixed>>
     */
    private function topPerformingTests(): array
    {
        $bestAttemptsQuery = CourseTestAttempt::query()
            ->select('user_id', 'course_detail_id', 'test_type')
            ->selectRaw('MAX(score_percent) as best_score')
            ->selectRaw('COUNT(*) as user_attempts')
            ->where('status', CourseTestAttempt::STATUS_COMPLETED)
            ->whereNotNull('score_percent')
            ->whereIn('test_type', [
                CourseTestType::Pre->value,
                CourseTestType::Mock->value,
                CourseTestType::Final->value,
                CourseTestType::Practice->value,
            ])
            ->groupBy('user_id', 'course_detail_id', 'test_type');

        $rows = \Illuminate\Support\Facades\DB::table(\Illuminate\Support\Facades\DB::raw("({$bestAttemptsQuery->toSql()}) as sub"))
            ->mergeBindings($bestAttemptsQuery->getQuery())
            ->select('course_detail_id', 'test_type')
            ->selectRaw('AVG(best_score) as average_score')
            ->selectRaw('SUM(user_attempts) as attempt_count')
            ->groupBy('course_detail_id', 'test_type')
            ->orderByDesc('average_score')
            ->limit(10)
            ->get();

        if ($rows->isEmpty()) {
            return [];
        }

        $courses = CourseDetail::query()
            ->whereIn('id', $rows->pluck('course_detail_id')->unique())
            ->get(['id', 'couse_name'])
            ->keyBy('id');

        return $rows->map(function ($row) use ($courses): array {
            $typeValue = $row->test_type instanceof CourseTestType
                ? $row->test_type->value
                : (string) $row->test_type;
            $testType = CourseTestType::tryFrom($typeValue);

            return [
                'course_name' => $courses->get($row->course_detail_id)?->couse_name ?? 'Unknown module',
                'test_label' => $testType?->label() ?? 'Test',
                'average_score' => round((float) $row->average_score, 1),
                'attempt_count' => (int) $row->attempt_count,
            ];
        })->all();
    }
}
