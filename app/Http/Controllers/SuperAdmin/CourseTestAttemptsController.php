<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Enums\CourseTestType;
use App\Http\Controllers\Controller;
use App\Models\CourseTestAttempt;
use App\Models\User;
use App\Services\TestAttemptsReportService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseTestAttemptsController extends Controller
{
    public function __construct(private TestAttemptsReportService $reports) {}

    /**
     * @return array{segment: string, type: ?CourseTestType, title: string, results_only: bool}
     */
    public static function resolveSegment(string $segment): array
    {
        return match ($segment) {
            'pretest' => [
                'segment' => $segment,
                'type' => CourseTestType::Pre,
                'title' => 'Pretest',
                'results_only' => false,
            ],
            'mock-test' => [
                'segment' => $segment,
                'type' => CourseTestType::Mock,
                'title' => 'Mock Test',
                'results_only' => false,
            ],
            'final-test' => [
                'segment' => $segment,
                'type' => CourseTestType::Final,
                'title' => 'Final Test',
                'results_only' => false,
            ],
            'practice-test' => [
                'segment' => $segment,
                'type' => CourseTestType::Practice,
                'title' => 'Practice Test',
                'results_only' => false,
            ],
            'results' => [
                'segment' => $segment,
                'type' => null,
                'title' => 'Results',
                'results_only' => true,
            ],
            default => abort(404),
        };
    }

    public function index(Request $request, string $testSegment): View
    {
        $config = self::resolveSegment($testSegment);
        $search = trim((string) $request->string('search'));
        $statusFilter = (string) $request->string('status');
        $dateRange = $this->reports->resolveDateRange($request);

        $matchedUserIds = $this->matchedUserIdsForSearch($search);

        $showResultsAnalytics = $config['results_only'];
        $showModuleAnalytics = ! $showResultsAnalytics;

        if ($showResultsAnalytics) {
            $analyticsQuery = $this->reports->sequencedTestsQuery($dateRange['from'], $dateRange['to']);
            $summary = $this->reports->summaryStats($analyticsQuery);
            $moduleStats = [];
            $moduleResults = $this->reports->moduleResultsByTestType($analyticsQuery);
            $chartData = $this->reports->resultsChartPayload($moduleResults);
            $attemptsBaseQuery = $this->reports->baseQuery(null, $dateRange['from'], $dateRange['to'], true)
                ->whereIn('test_type', [
                    CourseTestType::Pre->value,
                    CourseTestType::Mock->value,
                    CourseTestType::Final->value,
                ]);
        } else {
            $analyticsQuery = $this->reports->baseQuery(
                $config['type'],
                $dateRange['from'],
                $dateRange['to'],
                false,
            );
            $summary = $this->reports->summaryStats($analyticsQuery);
            $moduleStats = $this->reports->moduleCompletionStats($analyticsQuery);
            $moduleResults = [];
            $chartData = $this->reports->chartPayload($moduleStats);
            $attemptsBaseQuery = $analyticsQuery;
        }

        $attemptsQuery = (clone $attemptsBaseQuery)
            ->with(['user:id,name,first_name,last_name,email,unique_sequence_number', 'courseDetail:id,couse_name'])
            ->when($search !== '', function ($q) use ($search, $matchedUserIds) {
                $q->where(function ($sub) use ($search, $matchedUserIds) {
                    $sub->whereIn('user_id', $matchedUserIds)
                        ->orWhereHas('courseDetail', fn ($course) => $course->where('couse_name', 'like', '%'.$search.'%'))
                        ->orWhere('id', 'like', '%'.$search.'%');
                });
            })
            ->when($statusFilter === 'in_progress', fn ($q) => $q->where('status', CourseTestAttempt::STATUS_IN_PROGRESS))
            ->when($statusFilter === 'completed', fn ($q) => $q->where('status', CourseTestAttempt::STATUS_COMPLETED))
            ->when($statusFilter === 'passed', fn ($q) => $q->where('status', CourseTestAttempt::STATUS_COMPLETED)->where('passed', true))
            ->when($statusFilter === 'failed', fn ($q) => $q->where('status', CourseTestAttempt::STATUS_COMPLETED)->where('passed', false))
            ->latest('updated_at');

        $attempts = $attemptsQuery->paginate(20)->withQueryString();

        return view('super-admin.test-attempts.index', [
            'title' => $config['title'],
            'testSegment' => $config['segment'],
            'showTestTypeColumn' => $config['results_only'],
            'showPracticeColumns' => $config['type'] === CourseTestType::Practice,
            'showModuleAnalytics' => $showModuleAnalytics,
            'showResultsAnalytics' => $showResultsAnalytics,
            'summary' => $summary,
            'moduleStats' => $moduleStats,
            'moduleResults' => $moduleResults,
            'chartData' => $chartData,
            'attempts' => $attempts,
            'filters' => [
                'search' => $search,
                'status' => $statusFilter,
                'from_date' => $dateRange['from_date'],
                'to_date' => $dateRange['to_date'],
            ],
        ]);
    }

    /**
     * @return list<int>
     */
    private function matchedUserIdsForSearch(string $search): array
    {
        if ($search === '') {
            return [];
        }

        $searchTerm = mb_strtolower($search);

        return User::query()
            ->select('id', 'name', 'first_name', 'last_name', 'email', 'unique_sequence_number')
            ->where('role_type', 'user')
            ->get()
            ->filter(function (User $user) use ($searchTerm): bool {
                return str_contains(mb_strtolower($user->name ?? ''), $searchTerm)
                    || str_contains(mb_strtolower($user->first_name ?? ''), $searchTerm)
                    || str_contains(mb_strtolower($user->last_name ?? ''), $searchTerm)
                    || str_contains(mb_strtolower($user->email ?? ''), $searchTerm)
                    || str_contains(mb_strtolower($user->unique_sequence_number ?? ''), $searchTerm);
            })
            ->pluck('id')
            ->all();
    }
}
