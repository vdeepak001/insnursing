<?php

namespace App\Services;

use App\Enums\CourseTestType;
use App\Models\CourseDetail;
use App\Models\CourseTestAttempt;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TestAttemptsReportService
{
    /**
     * @return array{from_date: string, to_date: string, from: Carbon, to: Carbon}
     */
    public function resolveDateRange(Request $request): array
    {
        $today = now()->toDateString();
        $fromDate = (string) $request->input('from_date', $today);
        $toDate = (string) $request->input('to_date', $today);

        $from = Carbon::parse($fromDate)->startOfDay();
        $to = Carbon::parse($toDate)->endOfDay();

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

    public function baseQuery(
        ?CourseTestType $testType,
        Carbon $from,
        Carbon $to,
        bool $resultsOnly = false,
    ): Builder {
        return CourseTestAttempt::query()
            ->when($testType, fn (Builder $q) => $q->where('test_type', $testType->value))
            ->when($resultsOnly, fn (Builder $q) => $q->where('status', CourseTestAttempt::STATUS_COMPLETED))
            ->whereBetween('created_at', [$from, $to]);
    }

    public function sequencedTestsQuery(Carbon $from, Carbon $to): Builder
    {
        return CourseTestAttempt::query()
            ->whereIn('test_type', [
                CourseTestType::Pre->value,
                CourseTestType::Mock->value,
                CourseTestType::Final->value,
            ])
            ->whereBetween('created_at', [$from, $to]);
    }

    /**
     * @return array{
     *     total_attempts: int,
     *     completed_attempts: int,
     *     passed_attempts: int,
     *     in_progress_attempts: int,
     *     completion_percentage: float,
     *     pass_percentage: float
     * }
     */
    public function summaryStats(Builder $query): array
    {
        $total = (clone $query)->count();
        $completed = (clone $query)->where('status', CourseTestAttempt::STATUS_COMPLETED)->count();
        $passed = (clone $query)
            ->where('status', CourseTestAttempt::STATUS_COMPLETED)
            ->where('passed', true)
            ->count();
        $inProgress = (clone $query)->where('status', CourseTestAttempt::STATUS_IN_PROGRESS)->count();

        return [
            'total_attempts' => $total,
            'completed_attempts' => $completed,
            'passed_attempts' => $passed,
            'in_progress_attempts' => $inProgress,
            'completion_percentage' => $total > 0 ? round(($completed / $total) * 100, 1) : 0.0,
            'pass_percentage' => $completed > 0 ? round(($passed / $completed) * 100, 1) : 0.0,
        ];
    }

    /**
     * @return list<array{
     *     course_id: int,
     *     module_name: string,
     *     total_attempts: int,
     *     completed_attempts: int,
     *     passed_attempts: int,
     *     completion_percentage: float,
     *     pass_percentage: float
     * }>
     */
    public function moduleCompletionStats(Builder $query): array
    {
        $completedStatus = CourseTestAttempt::STATUS_COMPLETED;

        $rows = (clone $query)
            ->select('course_detail_id')
            ->selectRaw('COUNT(*) as total_attempts')
            ->selectRaw('SUM(CASE WHEN status = ? THEN 1 ELSE 0 END) as completed_attempts', [$completedStatus])
            ->selectRaw('SUM(CASE WHEN status = ? AND passed = 1 THEN 1 ELSE 0 END) as passed_attempts', [$completedStatus])
            ->groupBy('course_detail_id')
            ->orderByDesc('total_attempts')
            ->get();

        if ($rows->isEmpty()) {
            return [];
        }

        $courses = CourseDetail::query()
            ->whereIn('id', $rows->pluck('course_detail_id'))
            ->get(['id', 'couse_name'])
            ->keyBy('id');

        return $rows->map(function ($row) use ($courses): array {
            $total = (int) $row->total_attempts;
            $completed = (int) $row->completed_attempts;
            $passed = (int) $row->passed_attempts;

            return [
                'course_id' => (int) $row->course_detail_id,
                'module_name' => $courses->get($row->course_detail_id)?->couse_name ?? 'Unknown module',
                'total_attempts' => $total,
                'completed_attempts' => $completed,
                'passed_attempts' => $passed,
                'completion_percentage' => $total > 0 ? round(($completed / $total) * 100, 1) : 0.0,
                'pass_percentage' => $completed > 0 ? round(($passed / $completed) * 100, 1) : 0.0,
            ];
        })->sortByDesc('completion_percentage')->values()->all();
    }

    /**
     * @param  list<array{module_name: string, completion_percentage: float, total_attempts: int}>  $moduleStats
     * @return array{categories: list<string>, series: list<array{name: string, data: list<float>}>, totals: list<int>}
     */
    public function chartPayload(array $moduleStats): array
    {
        $limited = collect($moduleStats)->take(12)->values();

        return [
            'categories' => $limited->pluck('module_name')->all(),
            'series' => [
                [
                    'name' => 'Completion %',
                    'data' => $limited->pluck('completion_percentage')->map(fn ($v) => (float) $v)->all(),
                ],
            ],
            'totals' => $limited->pluck('total_attempts')->all(),
        ];
    }

    /**
     * @return array{pretest: array{total_attempts: int, completed_attempts: int, completion_percentage: float}, mock: array{total_attempts: int, completed_attempts: int, completion_percentage: float}, final: array{total_attempts: int, completed_attempts: int, completion_percentage: float}}
     */
    private function emptyTestTypeBucket(): array
    {
        return [
            'total_attempts' => 0,
            'completed_attempts' => 0,
            'completion_percentage' => 0.0,
        ];
    }

    /**
     * @return list<array{
     *     course_id: int,
     *     module_name: string,
     *     pretest: array{total_attempts: int, completed_attempts: int, completion_percentage: float},
     *     mock: array{total_attempts: int, completed_attempts: int, completion_percentage: float},
     *     final: array{total_attempts: int, completed_attempts: int, completion_percentage: float}
     * }>
     */
    public function moduleResultsByTestType(Builder $query): array
    {
        $completedStatus = CourseTestAttempt::STATUS_COMPLETED;
        $typeKeys = [
            CourseTestType::Pre->value => 'pretest',
            CourseTestType::Mock->value => 'mock',
            CourseTestType::Final->value => 'final',
        ];

        $rows = (clone $query)
            ->select('course_detail_id', 'test_type')
            ->selectRaw('COUNT(*) as total_attempts')
            ->selectRaw('SUM(CASE WHEN status = ? THEN 1 ELSE 0 END) as completed_attempts', [$completedStatus])
            ->groupBy('course_detail_id', 'test_type')
            ->get();

        if ($rows->isEmpty()) {
            return [];
        }

        $courses = CourseDetail::query()
            ->whereIn('id', $rows->pluck('course_detail_id')->unique())
            ->get(['id', 'couse_name'])
            ->keyBy('id');

        return $rows
            ->groupBy('course_detail_id')
            ->map(function ($courseRows, $courseId) use ($courses, $typeKeys): array {
                $buckets = [
                    'pretest' => $this->emptyTestTypeBucket(),
                    'mock' => $this->emptyTestTypeBucket(),
                    'final' => $this->emptyTestTypeBucket(),
                ];

                foreach ($courseRows as $row) {
                    $typeValue = $row->test_type instanceof CourseTestType
                        ? $row->test_type->value
                        : (string) $row->test_type;
                    $key = $typeKeys[$typeValue] ?? null;
                    if ($key === null) {
                        continue;
                    }

                    $total = (int) $row->total_attempts;
                    $completed = (int) $row->completed_attempts;

                    $buckets[$key] = [
                        'total_attempts' => $total,
                        'completed_attempts' => $completed,
                        'completion_percentage' => $total > 0 ? round(($completed / $total) * 100, 1) : 0.0,
                    ];
                }

                return [
                    'course_id' => (int) $courseId,
                    'module_name' => $courses->get($courseId)?->couse_name ?? 'Unknown module',
                    'pretest' => $buckets['pretest'],
                    'mock' => $buckets['mock'],
                    'final' => $buckets['final'],
                ];
            })
            ->sortByDesc(fn (array $module): float => max(
                $module['pretest']['completion_percentage'],
                $module['mock']['completion_percentage'],
                $module['final']['completion_percentage'],
            ))
            ->values()
            ->all();
    }

    /**
     * @param  list<array{module_name: string, pretest: array{completion_percentage: float}, mock: array{completion_percentage: float}, final: array{completion_percentage: float}}>  $moduleResults
     * @return array{categories: list<string>, series: list<array{name: string, data: list<float>}>}
     */
    public function resultsChartPayload(array $moduleResults): array
    {
        $limited = collect($moduleResults)->take(10)->values();

        return [
            'categories' => $limited->pluck('module_name')->all(),
            'series' => [
                [
                    'name' => CourseTestType::Pre->label(),
                    'data' => $limited->map(fn (array $m) => (float) $m['pretest']['completion_percentage'])->all(),
                ],
                [
                    'name' => CourseTestType::Mock->label(),
                    'data' => $limited->map(fn (array $m) => (float) $m['mock']['completion_percentage'])->all(),
                ],
                [
                    'name' => CourseTestType::Final->label(),
                    'data' => $limited->map(fn (array $m) => (float) $m['final']['completion_percentage'])->all(),
                ],
            ],
            'chart_mode' => 'grouped',
        ];
    }
}
