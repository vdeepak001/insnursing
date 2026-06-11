<?php

namespace App\Services;

use App\Enums\CourseTestType;
use App\Enums\PaymentStatus;
use App\Helpers\DateHelper;
use App\Models\CourseDetail;
use App\Models\CourseTestAttempt;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ResultsReportService
{
    /**
     * @return array{from_date: string, to_date: string, from: Carbon, to: Carbon}
     */
    public function resolveDateRange(Request $request): array
    {
        $from = DateHelper::parseForFilter(
            $request->input('from_date', now()->startOfMonth()->toDateString())
        );
        $to = DateHelper::parseForFilter(
            $request->input('to_date', now()->endOfMonth()->toDateString())
        )->endOfDay();

        $fromDate = $from->toDateString();
        $toDate = $to->toDateString();

        if ($from->greaterThan($to)) {
            [$from, $to] = [$to->copy()->startOfDay(), $from->copy()->endOfDay()];
            $fromDate = $from->toDateString();
            $toDate = $to->toDateString();
        }

        return [
            'from_date' => $fromDate,
            'to_date' => $toDate,
            'from' => $from,
            'to' => $to,
        ];
    }

    /**
     * @return list<array{
     *     course_id: int,
     *     module_name: string,
     *     purchased: int,
     *     pre_test: int,
     *     mock: int,
     *     final_1: int,
     *     final_2: int
     * }>
     */
    public function moduleRows(Carbon $from, Carbon $to): array
    {
        $purchases = Order::query()
            ->where('payment_status', PaymentStatus::Completed)
            ->whereBetween('created_at', [$from, $to])
            ->get(['user_id', 'course_detail_id']);

        if ($purchases->isEmpty()) {
            return [];
        }

        $courseIds = $purchases->pluck('course_detail_id')->unique()->values();
        $courses = CourseDetail::query()
            ->whereIn('id', $courseIds)
            ->get(['id', 'couse_name'])
            ->keyBy('id');

        $completedAttempts = CourseTestAttempt::query()
            ->whereIn('course_detail_id', $courseIds)
            ->where('status', CourseTestAttempt::STATUS_COMPLETED)
            ->whereIn('test_type', [
                CourseTestType::Pre->value,
                CourseTestType::Mock->value,
                CourseTestType::Final->value,
            ])
            ->get(['user_id', 'course_detail_id', 'test_type', 'completed_at']);

        return $purchases
            ->groupBy('course_detail_id')
            ->map(function (Collection $orders, int|string $courseId) use ($courses, $completedAttempts): array {
                $userIds = $orders->pluck('user_id')->unique()->values();
                $courseAttempts = $completedAttempts->where('course_detail_id', (int) $courseId);

                $preCount = $this->completedUsersForType($courseAttempts, $userIds, CourseTestType::Pre);
                $mockCount = $this->completedUsersForType($courseAttempts, $userIds, CourseTestType::Mock);
                [$final1Count, $final2Count] = $this->finalCompletionCounts($courseAttempts, $userIds);

                return [
                    'course_id' => (int) $courseId,
                    'module_name' => $courses->get((int) $courseId)?->couse_name ?? 'Unknown module',
                    'purchased' => $orders->count(),
                    'pre_test' => $preCount,
                    'mock' => $mockCount,
                    'final_1' => $final1Count,
                    'final_2' => $final2Count,
                ];
            })
            ->sortByDesc('purchased')
            ->values()
            ->all();
    }

    /**
     * @param  list<array{purchased: int, pre_test: int, mock: int, final_1: int, final_2: int}>  $moduleRows
     * @return array{
     *     pretest: array{completed: int, not_completed: int, completed_percentage: float},
     *     mock: array{completed: int, not_completed: int, completed_percentage: float},
     *     final_1: array{completed: int, not_completed: int, completed_percentage: float},
     *     final_2: array{completed: int, not_completed: int, completed_percentage: float}
     * }
     */
    public function donutChartData(array $moduleRows): array
    {
        $totalPurchased = collect($moduleRows)->sum('purchased');

        return [
            'pretest' => $this->donutBucket(
                collect($moduleRows)->sum('pre_test'),
                $totalPurchased,
            ),
            'mock' => $this->donutBucket(
                collect($moduleRows)->sum('mock'),
                $totalPurchased,
            ),
            'final_1' => $this->donutBucket(
                collect($moduleRows)->sum('final_1'),
                $totalPurchased,
            ),
            'final_2' => $this->donutBucket(
                collect($moduleRows)->sum('final_2'),
                $totalPurchased,
            ),
        ];
    }

    /**
     * @return array{completed: int, not_completed: int, completed_percentage: float}
     */
    private function donutBucket(int $completed, int $totalEligible): array
    {
        $notCompleted = max(0, $totalEligible - $completed);

        return [
            'completed' => $completed,
            'not_completed' => $notCompleted,
            'completed_percentage' => $totalEligible > 0
                ? round(($completed / $totalEligible) * 100, 1)
                : 0.0,
        ];
    }

    /**
     * @param  Collection<int, CourseTestAttempt>  $courseAttempts
     * @param  Collection<int, int>  $userIds
     */
    private function completedUsersForType(Collection $courseAttempts, Collection $userIds, CourseTestType $type): int
    {
        return $courseAttempts
            ->where('test_type', $type)
            ->pluck('user_id')
            ->unique()
            ->intersect($userIds)
            ->count();
    }

    /**
     * @param  Collection<int, CourseTestAttempt>  $courseAttempts
     * @param  Collection<int, int>  $userIds
     * @return array{0: int, 1: int}
     */
    private function finalCompletionCounts(Collection $courseAttempts, Collection $userIds): array
    {
        $finalAttemptsByUser = $courseAttempts
            ->where('test_type', CourseTestType::Final)
            ->groupBy('user_id')
            ->map(fn (Collection $attempts) => $attempts->sortBy('completed_at')->values());

        $final1Count = 0;
        $final2Count = 0;

        foreach ($userIds as $userId) {
            $attempts = $finalAttemptsByUser->get($userId);

            if ($attempts === null || $attempts->isEmpty()) {
                continue;
            }

            $final1Count++;

            if ($attempts->count() >= 2) {
                $final2Count++;
            }
        }

        return [$final1Count, $final2Count];
    }
}
