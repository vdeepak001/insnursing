@extends('layouts.app')

@php use App\Helpers\DateHelper; @endphp

@section('content')
    <div class="mb-6">
        <h2 class="font-outfit text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">
            {{ $title }}
        </h2>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            @if ($showResultsAnalytics)
                Module completion for pretest, mock, and final tests — {{ DateHelper::displayRange($filters['from_date'], $filters['to_date']) }}.
            @elseif ($showTestTypeColumn)
                Completed assessment results for {{ DateHelper::displayRange($filters['from_date'], $filters['to_date']) }}.
            @elseif ($showModuleAnalytics)
                Module completion overview and learner attempts for {{ DateHelper::displayRange($filters['from_date'], $filters['to_date']) }}.
            @else
                Learner attempts for {{ strtolower($title) }}.
            @endif
        </p>
    </div>

    <form method="GET" id="test-attempts-filter-form" class="mb-6 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800">
        <div class="flex flex-wrap items-end gap-3">
            <div class="min-w-[150px]">
                <label for="from-date" class="mb-1 block text-xs font-medium text-gray-600 dark:text-gray-300">From date</label>
                <input id="from-date" name="from_date" type="date" value="{{ $filters['from_date'] }}"
                    onchange="this.form.submit()"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100" />
            </div>

            <div class="min-w-[150px]">
                <label for="to-date" class="mb-1 block text-xs font-medium text-gray-600 dark:text-gray-300">To date</label>
                <input id="to-date" name="to_date" type="date" value="{{ $filters['to_date'] }}"
                    onchange="this.form.submit()"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100" />
            </div>

            <div class="min-w-[220px] flex-1">
                <label for="attempt-search" class="mb-1 block text-xs font-medium text-gray-600 dark:text-gray-300">Search</label>
                <input id="attempt-search" name="search" type="text" value="{{ $filters['search'] }}"
                    placeholder="UID, name, module..."
                    oninput="window.testAttemptsDebounceSubmit()"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100" />
            </div>

            <div class="min-w-[160px]">
                <label for="attempt-status" class="mb-1 block text-xs font-medium text-gray-600 dark:text-gray-300">Status</label>
                <select id="attempt-status" name="status" onchange="this.form.submit()"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100">
                    <option value="">All</option>
                    <option value="in_progress" @selected($filters['status'] === 'in_progress')>In progress</option>
                    <option value="completed" @selected($filters['status'] === 'completed')>Completed</option>
                    <option value="passed" @selected($filters['status'] === 'passed')>Passed</option>
                    <option value="failed" @selected($filters['status'] === 'failed')>Failed</option>
                </select>
            </div>

            <x-ui.button variant="secondary" size="sm" href="{{ request()->url() }}">Clear</x-ui.button>
        </div>
    </form>

    @if ($showModuleAnalytics)
        <div class="mb-6 grid grid-cols-2 gap-4 md:grid-cols-4">
            <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Total attempts</p>
                <p class="mt-1 font-outfit text-2xl font-extrabold text-impetus-navy">{{ number_format($summary['total_attempts']) }}</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Completed</p>
                <p class="mt-1 font-outfit text-2xl font-extrabold text-emerald-700">{{ number_format($summary['completed_attempts']) }}</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Completion rate</p>
                <p class="mt-1 font-outfit text-2xl font-extrabold text-impetus-orange">{{ number_format($summary['completion_percentage'], 1) }}%</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Pass rate (of completed)</p>
                <p class="mt-1 font-outfit text-2xl font-extrabold text-indigo-700">{{ number_format($summary['pass_percentage'], 1) }}%</p>
            </div>
        </div>

        <div class="mb-6 grid grid-cols-1 gap-6 xl:grid-cols-2">
            <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-xl dark:border-gray-700 dark:bg-gray-800">
                <div class="border-b border-gray-100 px-6 py-4 dark:border-gray-700">
                    <h3 class="font-outfit text-lg font-bold text-impetus-navy">Module completion</h3>
                    <p class="text-xs text-slate-500">Completion % = completed attempts ÷ total attempts in date range.</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-bold uppercase tracking-wider text-slate-500">Module</th>
                                <th class="px-6 py-3 text-xs font-bold uppercase tracking-wider text-slate-500">Attempts</th>
                                <th class="px-6 py-3 text-xs font-bold uppercase tracking-wider text-slate-500">Completed</th>
                                <th class="px-6 py-3 text-xs font-bold uppercase tracking-wider text-slate-500">Completion %</th>
                                <th class="px-6 py-3 text-xs font-bold uppercase tracking-wider text-slate-500">Pass %</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($moduleStats as $module)
                                <tr class="odd:bg-white even:bg-impetus-teal-muted/50">
                                    <td class="px-6 py-3 text-sm font-medium text-gray-900">{{ $module['module_name'] }}</td>
                                    <td class="px-6 py-3 text-sm text-gray-600">{{ number_format($module['total_attempts']) }}</td>
                                    <td class="px-6 py-3 text-sm text-gray-600">{{ number_format($module['completed_attempts']) }}</td>
                                    <td class="px-6 py-3">
                                        <div class="flex items-center gap-2">
                                            <div class="h-2 w-24 overflow-hidden rounded-full bg-slate-100">
                                                <div class="h-full rounded-full bg-impetus-orange" style="width: {{ min(100, $module['completion_percentage']) }}%"></div>
                                            </div>
                                            <span class="text-sm font-bold text-impetus-navy">{{ number_format($module['completion_percentage'], 1) }}%</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 text-sm font-semibold text-gray-700">{{ number_format($module['pass_percentage'], 1) }}%</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-sm text-gray-500">
                                        No module activity for the selected date range.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="rounded-3xl border border-gray-100 bg-white p-6 shadow-xl dark:border-gray-700 dark:bg-gray-800">
                <h3 class="font-outfit text-lg font-bold text-impetus-navy">Completion by module</h3>
                <p class="mt-0.5 text-xs text-slate-500">Graphical view of completion percentage (top 12 modules).</p>
                <div class="mt-4" id="testAttemptsModuleChart"></div>
                @if (empty($moduleStats))
                    <p class="mt-4 text-center text-sm text-gray-500">Chart will appear when module data is available.</p>
                @endif
            </div>
        </div>

        @if (! empty($moduleStats))
            <script id="test-attempts-chart-data" type="application/json">@json($chartData)</script>
        @endif
    @endif

    @if ($showResultsAnalytics)
        <div class="mb-6 grid grid-cols-2 gap-4 md:grid-cols-4">
            <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Total attempts</p>
                <p class="mt-1 font-outfit text-2xl font-extrabold text-impetus-navy">{{ number_format($summary['total_attempts']) }}</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Completed</p>
                <p class="mt-1 font-outfit text-2xl font-extrabold text-emerald-700">{{ number_format($summary['completed_attempts']) }}</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Overall completion</p>
                <p class="mt-1 font-outfit text-2xl font-extrabold text-impetus-orange">{{ number_format($summary['completion_percentage'], 1) }}%</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Pass rate (completed)</p>
                <p class="mt-1 font-outfit text-2xl font-extrabold text-indigo-700">{{ number_format($summary['pass_percentage'], 1) }}%</p>
            </div>
        </div>

        <div class="mb-6 grid grid-cols-1 gap-6 xl:grid-cols-2">
            <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-xl dark:border-gray-700 dark:bg-gray-800">
                <div class="border-b border-gray-100 px-6 py-4 dark:border-gray-700">
                    <h3 class="font-outfit text-lg font-bold text-impetus-navy">Module results by test type</h3>
                    <p class="text-xs text-slate-500">Completion % per module for pretest, mock test, and final test.</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-bold uppercase tracking-wider text-slate-500">Module</th>
                                <th class="px-6 py-3 text-xs font-bold uppercase tracking-wider text-slate-500">Pretest</th>
                                <th class="px-6 py-3 text-xs font-bold uppercase tracking-wider text-slate-500">Mock Test</th>
                                <th class="px-6 py-3 text-xs font-bold uppercase tracking-wider text-slate-500">Final Test</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($moduleResults as $module)
                                <tr class="odd:bg-white even:bg-impetus-teal-muted/50">
                                    <td class="px-6 py-3 text-sm font-medium text-gray-900">{{ $module['module_name'] }}</td>
                                    @foreach (['pretest' => 'Pretest', 'mock' => 'Mock Test', 'final' => 'Final Test'] as $key => $label)
                                        <td class="px-6 py-3">
                                            @php $bucket = $module[$key]; @endphp
                                            @if ($bucket['total_attempts'] > 0)
                                                <div class="flex flex-col gap-1">
                                                    <div class="flex items-center gap-2">
                                                        <div class="h-2 w-20 overflow-hidden rounded-full bg-slate-100">
                                                            <div class="h-full rounded-full {{ $key === 'pretest' ? 'bg-[#CCFBF1] ring-1 ring-[#0F766E]/30' : ($key === 'mock' ? 'bg-[#0F766E]' : 'bg-[#FF7A00]') }}"
                                                                style="width: {{ min(100, $bucket['completion_percentage']) }}%"></div>
                                                        </div>
                                                        <span class="text-sm font-bold text-impetus-navy">{{ number_format($bucket['completion_percentage'], 1) }}%</span>
                                                    </div>
                                                    <span class="text-xs text-slate-500">{{ $bucket['completed_attempts'] }}/{{ $bucket['total_attempts'] }} completed</span>
                                                </div>
                                            @else
                                                <span class="text-sm text-slate-400">—</span>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-sm text-gray-500">
                                        No module activity for the selected date range.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="rounded-3xl border border-gray-100 bg-white p-6 shadow-xl dark:border-gray-700 dark:bg-gray-800">
                <h3 class="font-outfit text-lg font-bold text-impetus-navy">Completion comparison by module</h3>
                <p class="mt-0.5 text-xs text-slate-500">Grouped chart: pretest, mock, and final completion % (top 10 modules).</p>
                <div class="mt-4" id="testAttemptsModuleChart"></div>
                @if (empty($moduleResults))
                    <p class="mt-4 text-center text-sm text-gray-500">Chart will appear when module data is available.</p>
                @endif
            </div>
        </div>

        @if (! empty($moduleResults))
            <script id="test-attempts-chart-data" type="application/json">@json($chartData)</script>
        @endif
    @endif

    <div class="mb-4">
        <h3 class="font-outfit text-lg font-bold text-impetus-navy">
            {{ $showResultsAnalytics ? 'Completed results' : 'Recent attempts' }}
        </h3>
        <p class="text-xs text-slate-500">
            {{ $showResultsAnalytics ? 'Individual completed pretest, mock, and final attempts.' : 'Individual learner attempts matching filters above.' }}
        </p>
    </div>

    <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-2xl dark:border-gray-700 dark:bg-gray-800">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse text-left">
                <thead>
                    <tr class="bg-gradient-to-r from-impetus-teal to-impetus-orange">
                        <th class="px-6 py-4 font-outfit text-xs font-bold uppercase tracking-wider text-white">UID</th>
                        <th class="px-6 py-4 font-outfit text-xs font-bold uppercase tracking-wider text-white">Name</th>
                        <th class="px-6 py-4 font-outfit text-xs font-bold uppercase tracking-wider text-white">Module</th>
                        @if ($showTestTypeColumn)
                            <th class="px-6 py-4 font-outfit text-xs font-bold uppercase tracking-wider text-white">Test</th>
                        @endif
                        @if ($showPracticeColumns)
                            <th class="px-6 py-4 font-outfit text-xs font-bold uppercase tracking-wider text-white">Level</th>
                            <th class="px-6 py-4 font-outfit text-xs font-bold uppercase tracking-wider text-white">Set</th>
                        @endif
                        <th class="px-6 py-4 text-center font-outfit text-xs font-bold uppercase tracking-wider text-white">Status</th>
                        <th class="px-6 py-4 font-outfit text-xs font-bold uppercase tracking-wider text-white">Score</th>
                        <th class="px-6 py-4 font-outfit text-xs font-bold uppercase tracking-wider text-white">Started</th>
                        <th class="px-6 py-4 font-outfit text-xs font-bold uppercase tracking-wider text-white">Completed</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse ($attempts as $attempt)
                        @php
                            $learner = $attempt->user;
                            $learnerName = $learner
                                ? ($learner->name ?: trim(($learner->first_name ?? '').' '.($learner->last_name ?? '')) ?: '—')
                                : '—';
                        @endphp
                        <tr class="transition-colors odd:bg-white even:bg-impetus-teal-muted/50 hover:bg-brand-50/80">
                            <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                {{ $learner?->unique_sequence_number ?? '—' }}
                            </td>
                            <td class="px-6 py-4 text-sm font-medium uppercase text-gray-900 dark:text-white">
                                {{ $learnerName }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                {{ $attempt->courseDetail?->couse_name ?? '—' }}
                            </td>
                            @if ($showTestTypeColumn)
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                    {{ $attempt->test_type?->label() ?? '—' }}
                                </td>
                            @endif
                            @if ($showPracticeColumns)
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                    {{ $attempt->practice_level ?? '—' }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                    {{ $attempt->practice_set ?? '—' }}
                                </td>
                            @endif
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex rounded-full px-2.5 py-0.5 text-xs font-semibold {{ $attempt->outcomeBadgeClasses() }}">
                                    {{ $attempt->outcomeLabel() }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm font-semibold text-gray-800 dark:text-gray-200">
                                {{ $attempt->score_percent !== null ? number_format((float) $attempt->score_percent, 1).'%' : '—' }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                {{ $attempt->started_at?->displayDateTime() ?? '—' }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                {{ $attempt->completed_at?->displayDateTime() ?? '—' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ 6 + ($showTestTypeColumn ? 1 : 0) + ($showPracticeColumns ? 2 : 0) }}"
                                class="px-8 py-16 text-center text-gray-500 dark:text-gray-400">
                                No attempts found for the selected filters.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if ($attempts->hasPages())
        <div class="mt-4">
            {{ $attempts->links() }}
        </div>
    @endif
@endsection

@push('scripts')
    <script>
        let testAttemptsDebounceTimer;

        window.testAttemptsDebounceSubmit = function () {
            clearTimeout(testAttemptsDebounceTimer);
            testAttemptsDebounceTimer = setTimeout(() => {
                document.getElementById('test-attempts-filter-form')?.submit();
            }, 500);
        };
    </script>
@endpush
