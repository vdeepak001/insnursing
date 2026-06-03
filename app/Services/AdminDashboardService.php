<?php

namespace App\Services;

use App\Enums\CourseTestType;
use App\Models\CourseDetail;
use App\Models\CourseMaterial;
use App\Models\CourseQuestion;
use App\Models\CourseTestAttempt;
use App\Models\User;
use Carbon\Carbon;

class AdminDashboardService
{
    /**
     * @return array{
     *     stats: array<string, int>,
     *     charts: array{
     *         attempts_overview: array{categories: list<string>, series: list<array{name: string, data: list<int>}>},
     *         status_distribution: list<array{label: string, count: int}>
     *     },
     *     recent_attempts: list<array<string, mixed>>,
     *     top_performing: list<array<string, mixed>>
     * }
     */
    public function build(): array
    {
        return [
            'stats' => $this->platformStats(),
            'charts' => [
                'attempts_overview' => $this->attemptsOverview(),
                'status_distribution' => $this->statusDistribution(),
            ],
            'recent_attempts' => $this->recentAttempts(),
            'top_performing' => $this->topPerformingTests(),
        ];
    }

    /**
     * @return array<string, int>
     */
    private function platformStats(): array
    {
        $pretestType = CourseTestType::Pre->value;
        $mockType = CourseTestType::Mock->value;
        $finalType = CourseTestType::Final->value;

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
            'total_attempts' => CourseTestAttempt::query()
                ->whereIn('test_type', [$pretestType, $mockType, $finalType])
                ->count(),
        ];
    }

    /**
     * @return array{categories: list<string>, series: list<array{name: string, data: list<int>}>}
     */
    private function attemptsOverview(): array
    {
        $months = collect(range(5, 0))
            ->map(fn (int $offset) => now()->subMonths($offset)->startOfMonth());

        $start = $months->first()->copy()->startOfMonth();
        $types = [
            CourseTestType::Pre->value => CourseTestType::Pre->label(),
            CourseTestType::Mock->value => CourseTestType::Mock->label(),
            CourseTestType::Final->value => CourseTestType::Final->label(),
        ];

        $attempts = CourseTestAttempt::query()
            ->where('created_at', '>=', $start)
            ->whereIn('test_type', array_keys($types))
            ->get(['test_type', 'created_at']);

        $series = [];

        foreach ($types as $typeValue => $label) {
            $series[] = [
                'name' => $label,
                'data' => $months->map(function (Carbon $month) use ($attempts, $typeValue): int {
                    $monthKey = $month->format('Y-m');

                    return $attempts
                        ->filter(fn (CourseTestAttempt $attempt): bool => $attempt->test_type->value === $typeValue
                            && $attempt->created_at->format('Y-m') === $monthKey)
                        ->count();
                })->values()->all(),
            ];
        }

        return [
            'categories' => $months->map(fn (Carbon $month) => $month->format('M Y'))->values()->all(),
            'series' => $series,
        ];
    }

    /**
     * @return list<array{label: string, count: int}>
     */
    private function statusDistribution(): array
    {
        $inProgress = CourseTestAttempt::query()
            ->where('status', CourseTestAttempt::STATUS_IN_PROGRESS)
            ->count();

        $completedQuery = CourseTestAttempt::query()
            ->where('status', CourseTestAttempt::STATUS_COMPLETED);

        $passed = (clone $completedQuery)->where('passed', true)->count();
        $failed = (clone $completedQuery)->where('passed', false)->count();

        return [
            ['label' => 'In progress', 'count' => $inProgress],
            ['label' => 'Passed', 'count' => $passed],
            ['label' => 'Failed', 'count' => $failed],
        ];
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
            ->map(fn (CourseTestAttempt $attempt): array => [
                'user_name' => $attempt->user?->name ?? '—',
                'course_name' => $attempt->courseDetail?->couse_name ?? '—',
                'test_label' => $attempt->test_type?->label() ?? '—',
                'status' => $attempt->status === CourseTestAttempt::STATUS_COMPLETED ? 'Completed' : 'In progress',
                'score' => $attempt->score_percent !== null ? number_format((float) $attempt->score_percent, 1).'%' : '—',
                'passed' => $attempt->passed,
                'completed_at' => $attempt->completed_at?->format('M j, Y g:i A') ?? $attempt->updated_at?->format('M j, Y g:i A') ?? '—',
            ])
            ->all();
    }

    /**
     * @return list<array<string, mixed>>
     */
    private function topPerformingTests(): array
    {
        $rows = CourseTestAttempt::query()
            ->select('course_detail_id', 'test_type')
            ->selectRaw('AVG(score_percent) as average_score')
            ->selectRaw('COUNT(*) as attempt_count')
            ->where('status', CourseTestAttempt::STATUS_COMPLETED)
            ->whereNotNull('score_percent')
            ->whereIn('test_type', [
                CourseTestType::Pre->value,
                CourseTestType::Mock->value,
                CourseTestType::Final->value,
            ])
            ->groupBy('course_detail_id', 'test_type')
            ->orderByDesc('average_score')
            ->limit(5)
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
