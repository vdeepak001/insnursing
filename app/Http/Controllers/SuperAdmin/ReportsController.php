<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Enums\CourseTestType;
use App\Enums\PaymentStatus;
use App\Http\Controllers\Controller;
use App\Models\CourseDetail;
use App\Models\CourseTestAttempt;
use App\Models\Order;
use App\Models\State;
use App\Models\StateCouncil;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportsController extends Controller
{
    public function index(Request $request): View
    {
        $states = State::where('status', 'active')->orderBy('name')->get();
        $selectedStateId = $request->query('state_id');

        $globalStats = [
            'registered_users' => User::where('role_type', 'user')->count(),
            'purchased_modules' => Order::where('payment_status', PaymentStatus::Completed)->count(),
            'modules_completed' => CourseTestAttempt::where('status', CourseTestAttempt::STATUS_COMPLETED)
                ->where('test_type', CourseTestType::Final)
                ->where('passed', true)
                ->count(),
        ];

        $globalModuleWisePassed = $this->buildGlobalModuleWisePassed();

        $selectedState = null;
        $nursesCount = 0;
        $modulesCompletedCount = 0;
        $purchasedModulesCount = 0;
        $moduleWisePassed = collect();
        $stateCourses = collect();
        $userAttempts = collect();

        if ($selectedStateId) {
            $selectedState = State::find($selectedStateId);

            if ($selectedState) {
                [$councilIds, $stateUserIds, $stateCourses] = $this->stateScope($selectedState);

                $nursesCount = User::where('role_type', 'user')->get()
                    ->filter(fn ($user) => trim((string) $user->state) === trim($selectedState->name))
                    ->count();

                $moduleWisePassed = $this->buildModuleWisePassed($stateCourses, $councilIds, $stateUserIds);
                $modulesCompletedCount = $moduleWisePassed->sum('passed_count');

                $purchasedModulesCount = Order::where(function ($query) use ($councilIds, $stateUserIds) {
                    $query->whereIn('state_council_id', $councilIds)
                        ->orWhereIn('user_id', $stateUserIds);
                })
                    ->where('payment_status', PaymentStatus::Completed)
                    ->count();

                $userAttempts = $this->buildUserAttempts($request, $councilIds, $stateUserIds);
            }
        } else {
            $stateCourses = CourseDetail::orderBy('couse_name')->get();
            $userAttempts = $this->buildUserAttempts($request);
        }

        return view('super-admin.reports.index', [
            'title' => 'Reports',
            'states' => $states,
            'selectedState' => $selectedState,
            'stateCourses' => $stateCourses,
            'nursesCount' => $nursesCount,
            'modulesCompletedCount' => $modulesCompletedCount,
            'purchasedModulesCount' => $purchasedModulesCount,
            'moduleWisePassed' => $moduleWisePassed,
            'globalStats' => $globalStats,
            'globalModuleWisePassed' => $globalModuleWisePassed,
            'userAttempts' => $userAttempts,
            'filters' => [
                'course_id' => $request->query('course_id'),
                'from_date' => $request->query('from_date'),
                'to_date' => $request->query('to_date'),
                'exam_type' => $request->query('exam_type'),
            ],
        ]);
    }

    public function userPerformance(Request $request): RedirectResponse
    {
        $routePrefix = $request->segment(1);

        return redirect()->route("{$routePrefix}.reports.index", $request->query());
    }

    public function exportCsv(Request $request): StreamedResponse
    {
        $selectedStateId = $request->query('state_id');
        $selectedState = State::findOrFail($selectedStateId);
        [$councilIds, $stateUserIds] = array_slice($this->stateScope($selectedState), 0, 2);

        $userAttempts = $this->buildUserAttempts($request, $councilIds, $stateUserIds);

        $filename = 'ihs_nursing_user_performance_'.strtolower(str_replace(' ', '_', $selectedState->name)).'_'.date('Ymd').'.csv';

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$filename",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $callback = function () use ($userAttempts) {
            $file = fopen('php://output', 'w');

            fputcsv($file, ['UID', 'Name', 'RN', 'Mobile No', 'Mail ID', 'Module name', 'Date of completion', 'Time of completion', 'Score (%)']);

            foreach ($userAttempts as $attempt) {
                fputcsv($file, [
                    $attempt->sequence_number,
                    $attempt->user_name,
                    $attempt->rn_number,
                    $attempt->phone,
                    $attempt->email,
                    $attempt->course_name,
                    $attempt->date_of_completion,
                    $attempt->time_of_completion,
                    is_numeric($attempt->score) ? round($attempt->score).'%' : '-',
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * @return array{0: array<int, int>, 1: array<int, int>, 2: Collection<int, CourseDetail>}
     */
    private function stateScope(State $selectedState): array
    {
        $stateCouncils = StateCouncil::where('state_id', $selectedState->id)->get();
        $councilIds = $stateCouncils->pluck('id')->toArray();

        $stateUserIds = User::where('role_type', 'user')->get()
            ->filter(fn ($user) => trim((string) $user->state) === trim($selectedState->name))
            ->pluck('id')
            ->toArray();

        $stateCourses = CourseDetail::whereHas('stateCouncils', function ($query) use ($councilIds) {
            $query->whereIn('state_councils.id', $councilIds);
        })->get();

        return [$councilIds, $stateUserIds, $stateCourses];
    }

    private function buildGlobalModuleWisePassed(): Collection
    {
        $passCounts = CourseTestAttempt::where('status', CourseTestAttempt::STATUS_COMPLETED)
            ->where('passed', true)
            ->select('course_detail_id', DB::raw('count(*) as passed_count'))
            ->groupBy('course_detail_id')
            ->pluck('passed_count', 'course_detail_id');

        return CourseDetail::orderBy('couse_name')->get()->map(function ($course) use ($passCounts) {
            return (object) [
                'id' => $course->id,
                'name' => $course->couse_name ?? 'Unknown',
                'passed_count' => $passCounts[$course->id] ?? 0,
            ];
        });
    }

    /**
     * @param  Collection<int, CourseDetail>  $stateCourses
     */
    private function buildModuleWisePassed(Collection $stateCourses, array $councilIds, array $stateUserIds): Collection
    {
        $passCounts = CourseTestAttempt::where(function ($query) use ($councilIds, $stateUserIds) {
            $query->whereIn('state_council_id', $councilIds)
                ->orWhereIn('user_id', $stateUserIds);
        })
            ->where('status', CourseTestAttempt::STATUS_COMPLETED)
            ->where('passed', true)
            ->select('course_detail_id', DB::raw('count(*) as passed_count'))
            ->groupBy('course_detail_id')
            ->pluck('passed_count', 'course_detail_id');

        return $stateCourses->map(function ($course) use ($passCounts) {
            return (object) [
                'id' => $course->id,
                'name' => $course->couse_name ?? 'Unknown',
                'passed_count' => $passCounts[$course->id] ?? 0,
            ];
        });
    }

    private function buildUserAttempts(Request $request, ?array $councilIds = null, ?array $stateUserIds = null): Collection
    {
        $selectedCourseId = $request->query('course_id');
        $fromDate = $request->query('from_date');
        $toDate = $request->query('to_date');
        $examType = $request->query('exam_type');

        $query = CourseTestAttempt::with(['user', 'courseDetail'])
            ->where('status', CourseTestAttempt::STATUS_COMPLETED);

        if ($councilIds !== null && $stateUserIds !== null) {
            $query->where(function ($builder) use ($councilIds, $stateUserIds) {
                $builder->whereIn('state_council_id', $councilIds)
                    ->orWhereIn('user_id', $stateUserIds);
            });
        }

        if ($selectedCourseId) {
            $query->where('course_detail_id', $selectedCourseId);
        }

        if ($fromDate) {
            $query->whereDate('completed_at', '>=', $fromDate);
        }

        if ($toDate) {
            $query->whereDate('completed_at', '<=', $toDate);
        }

        if ($examType === 'passed') {
            $query->where('passed', true);
        } elseif ($examType) {
            $query->where('test_type', $examType);
        }

        $attempts = $query->latest('completed_at')->get();

        $userIds = $attempts->pluck('user_id')->unique();
        $courseIds = $attempts->pluck('course_detail_id')->unique();
        $orders = Order::whereIn('user_id', $userIds)
            ->whereIn('course_detail_id', $courseIds)
            ->where('payment_status', PaymentStatus::Completed)
            ->get();

        $grouped = $attempts->groupBy(function ($attempt) use ($orders) {
            $order = $orders->where('user_id', $attempt->user_id)
                ->where('course_detail_id', $attempt->course_detail_id)
                ->filter(fn ($order) => $attempt->started_at->greaterThanOrEqualTo($order->created_at->subMinutes(5)))
                ->sortByDesc('created_at')
                ->first();

            if (! $order) {
                $order = $orders->where('user_id', $attempt->user_id)
                    ->where('course_detail_id', $attempt->course_detail_id)
                    ->filter(fn ($order) => $attempt->started_at->between($order->start_date->startOfDay(), $order->end_date->endOfDay()))
                    ->sortByDesc('created_at')
                    ->first();
            }

            $orderId = $order ? $order->id : 'no_order';

            return $attempt->user_id.'_'.$attempt->course_detail_id.'_'.$orderId;
        });

        return $grouped->map(function ($group) {
            $first = $group->first();
            $pre = $group->where('test_type', CourseTestType::Pre)->sortByDesc('score_percent')->first();
            $mock = $group->where('test_type', CourseTestType::Mock)->sortByDesc('score_percent')->first();

            $finalAttempts = $group->where('test_type', CourseTestType::Final)->sortBy('completed_at');
            $final1 = $finalAttempts->first();
            $final2 = $finalAttempts->count() > 1 ? $finalAttempts->skip(1)->first() : null;

            return (object) [
                'id' => $first->user_id,
                'sequence_number' => $first->user->unique_sequence_number ?? 'N/A',
                'user_name' => $first->user->name ?? 'Unknown',
                'rn_number' => $first->user->rn_number ?? 'N/A',
                'phone' => $first->user->phone ?? '-',
                'email' => $first->user->email ?? '-',
                'course_name' => $first->courseDetail->couse_name ?? 'Unknown',
                'pre_score' => $pre ? $pre->score_percent : '-',
                'mock_score' => $mock ? $mock->score_percent : '-',
                'final_score_1' => $final1 ? $final1->score_percent : '-',
                'final_score_2' => $final2 ? $final2->score_percent : '-',
                'date_of_completion' => $first->completed_at ? $first->completed_at->displayDate() : '-',
                'time_of_completion' => $first->completed_at ? $first->completed_at->format('h:i A') : '-',
                'score' => $final1 ? $final1->score_percent : ($mock ? $mock->score_percent : ($pre ? $pre->score_percent : '-')),
            ];
        })->values();
    }
}
