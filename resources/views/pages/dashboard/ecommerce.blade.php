@extends('layouts.app')

@section('content')
    <div class="relative overflow-hidden rounded-[2.5rem] border border-slate-200/70 bg-gradient-to-br from-slate-50 via-white to-slate-100/60 p-5 shadow-sm sm:p-6">
        <div class="pointer-events-none absolute -top-20 -left-20 h-56 w-56 rounded-full bg-white/70 blur-3xl"></div>
        <div class="pointer-events-none absolute -right-20 -bottom-20 h-64 w-64 rounded-full bg-impetus-orange/10 blur-3xl"></div>

        <div class="relative z-10">
            {{-- Administrative Welcome Card (Hidden)
            <div class="relative mb-10 overflow-hidden rounded-[2.5rem] border border-[#0D6B63]/40 bg-gradient-to-r from-[#0F766E] to-impetus-navy p-8 text-white shadow-xl sm:p-10">
                <div class="pointer-events-none absolute right-0 bottom-0 h-80 w-80 translate-x-12 translate-y-12 rounded-full bg-impetus-orange/20 blur-3xl"></div>
                <div class="pointer-events-none absolute top-0 left-1/4 h-64 w-64 -translate-y-12 rounded-full bg-brand-400/15 blur-3xl"></div>

                <div class="relative z-10 flex flex-col items-start justify-between gap-6 md:flex-row md:items-center">
                    <div>
                        <span class="mb-2 block font-outfit text-xs font-bold tracking-widest text-impetus-orange uppercase">System Administration</span>
                        <h1 class="mb-3 font-outfit text-3xl font-extrabold tracking-tight sm:text-4xl">
                            Welcome back, {{ auth()->user()->name }}!
                        </h1>
                        <p class="max-w-2xl text-sm leading-relaxed text-slate-300 sm:text-base">
                            Here is a quick overview of your IHS Nursing Continuing Education platform metrics. Manage courses, monitor learning assets, and track test performance across users.
                        </p>
                    </div>
                    <div class="flex shrink-0 items-center gap-4 rounded-2xl border border-white/20 bg-white/10 p-4 backdrop-blur-md">
                        <span class="h-3 w-3 animate-pulse rounded-full bg-emerald-500"></span>
                        <div class="text-left">
                            <div class="font-outfit text-xs font-bold tracking-wider text-slate-300 uppercase">Platform Status</div>
                            <div class="font-outfit text-sm font-extrabold text-white">Fully Operational</div>
                        </div>
                    </div>
                </div>
            </div>
            --}}

            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h2 class="font-outfit text-xl font-bold text-impetus-navy">Platform Metrics</h2>
                    <p class="mt-0.5 text-xs text-slate-500">Real-time statistics across course modules, users, and assessments.</p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 md:grid-cols-6">
                @if(auth()->user()->role_type !== 'support')
                    <x-dashboard.metric-card
                        title="Total Courses"
                        value="{{ $stats['total_courses'] }}"
                        icon="book-open"
                        color="brand"
                    />

                    <x-dashboard.metric-card
                        title="Active Courses"
                        value="{{ $stats['active_courses'] }}"
                        icon="tag"
                        color="indigo"
                    />

                    <x-dashboard.metric-card
                        title="Learning Materials"
                        value="{{ $stats['total_materials'] }}"
                        icon="document-duplicate"
                        color="blue"
                    />

                    <x-dashboard.metric-card
                        title="Total Questions"
                        value="{{ $stats['total_questions'] }}"
                        icon="question-mark-circle"
                        color="orange"
                    />
                @endif

                <x-dashboard.metric-card
                    title="Total Users"
                    value="{{ $stats['total_users'] }}"
                    icon="users"
                    color="purple"
                />

                <x-dashboard.metric-card
                    title="Active Users"
                    value="{{ $stats['active_users'] }}"
                    icon="check-circle"
                    color="success"
                />
            </div>

            <div class="mt-10 mb-6">
                <h2 class="font-outfit text-xl font-bold text-impetus-navy">Assessment Metrics</h2>
                <p class="mt-0.5 text-xs text-slate-500">Pre, mock, and final test activity across the platform.</p>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-4">
                <x-dashboard.metric-card
                    title="Pretest"
                    value="{{ $stats['pretest_attempts'] }}"
                    icon="clipboard-list"
                    color="blue"
                />

                <x-dashboard.metric-card
                    title="Mock Test"
                    value="{{ $stats['mock_test_attempts'] }}"
                    icon="lightning-bolt"
                    color="indigo"
                />

                <x-dashboard.metric-card
                    title="Final Test"
                    value="{{ $stats['final_test_attempts'] }}"
                    icon="badge-check"
                    color="brand"
                />

                <x-dashboard.metric-card
                    title="Total Attempts"
                    value="{{ $stats['total_attempts'] }}"
                    icon="chart-bar"
                    color="purple"
                />
            </div>

            <div class="mt-10 grid grid-cols-1 gap-6 xl:grid-cols-3">
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm xl:col-span-2">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                        <div>
                            <h3 class="font-outfit text-lg font-bold text-impetus-navy">Test Attempts Overview</h3>
                            <p class="mt-0.5 text-xs text-slate-500">Weekly pre, mock, and final test attempts for the selected month.</p>
                        </div>

                        <form method="GET" class="shrink-0">
                            <label for="attempts-month" class="sr-only">Select month</label>
                            <select
                                id="attempts-month"
                                name="attempts_month"
                                onchange="this.form.submit()"
                                class="block rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 shadow-sm focus:border-impetus-teal focus:outline-none focus:ring-2 focus:ring-impetus-teal/20"
                            >
                                @foreach ($charts['attempts_month_options'] as $option)
                                    <option value="{{ $option['value'] }}" @selected($option['value'] === $charts['attempts_month'])>
                                        {{ $option['label'] }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>

                    <div class="mt-6" id="dashboardAttemptsChart"></div>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h3 class="font-outfit text-lg font-bold text-impetus-navy text-center">Test Status Distribution</h3>
                    <p class="mt-0.5 text-xs text-slate-500 text-center">Completed, in progress, pending, and expired test activity.</p>
                    <div class="mt-4 flex w-full justify-center" id="dashboardStatusChart"></div>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-6 xl:grid-cols-3">
                <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm xl:col-span-2">
                    <div class="border-b border-slate-100 px-6 py-5">
                        <h3 class="font-outfit text-lg font-bold text-impetus-navy">Recent Test Attempts</h3>
                        <p class="mt-0.5 text-xs text-slate-500">Latest assessment activity across all modules.</p>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-left">
                            <thead class="bg-gradient-to-r from-impetus-teal to-impetus-orange text-white">
                                <tr>
                                    <th class="px-6 py-4 text-xs font-bold tracking-wider text-white uppercase font-outfit">User</th>
                                    <th class="px-6 py-4 text-xs font-bold tracking-wider text-white uppercase font-outfit">Module</th>
                                    <th class="px-6 py-4 text-xs font-bold tracking-wider text-white uppercase font-outfit">Test</th>
                                    <th class="px-6 py-4 text-xs font-bold tracking-wider text-white uppercase font-outfit">Status</th>
                                    <th class="px-6 py-4 text-xs font-bold tracking-wider text-white uppercase font-outfit">Score</th>
                                    <th class="px-6 py-4 text-xs font-bold tracking-wider text-white uppercase font-outfit">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentAttempts as $attempt)
                                    <tr class="border-t border-slate-100">
                                        <td class="px-6 py-4 text-sm font-medium text-slate-800">{{ $attempt['user_name'] }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-600">{{ $attempt['course_name'] }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-600">{{ $attempt['test_label'] }}</td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex rounded-full px-2.5 py-0.5 text-xs font-semibold {{ $attempt['outcome_badge_classes'] }}">
                                                {{ $attempt['outcome_label'] }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-semibold text-slate-800">{{ $attempt['score'] }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-500">
                                            <div>{{ $attempt['completed_at_date'] }}</div>
                                            @if ($attempt['completed_at_time'])
                                                <div class="text-xs text-slate-400">{{ $attempt['completed_at_time'] }}</div>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-10 text-center text-sm text-slate-500">
                                            No test attempts recorded yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h3 class="font-outfit text-lg font-bold text-impetus-navy">Top 10 Performing Tests</h3>
                    <p class="mt-0.5 text-xs text-slate-500">Highest average scores among completed attempts.</p>

                    <div class="mt-6 max-h-[45rem] space-y-4 overflow-y-auto pr-1">
                        @forelse($topPerforming as $index => $item)
                            <div class="flex items-center gap-4 rounded-2xl border border-slate-100 bg-slate-50/50 p-4">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-impetus-teal font-outfit text-sm font-bold text-white">
                                    {{ $index + 1 }}
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="truncate text-sm font-bold text-slate-800">{{ $item['course_name'] }}</p>
                                    <p class="text-xs text-slate-500">{{ $item['test_label'] }} · {{ number_format($item['attempt_count']) }} attempts</p>
                                </div>
                                <p class="shrink-0 font-outfit text-lg font-extrabold text-impetus-orange">
                                    {{ number_format($item['average_score'], 1) }}%
                                </p>
                            </div>
                        @empty
                            <p class="rounded-2xl border border-dashed border-slate-200 bg-slate-50 px-4 py-8 text-center text-sm text-slate-500">
                                Complete test data will appear here once learners finish assessments.
                            </p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script id="dashboard-chart-data" type="application/json">
        @json($charts)
    </script>
@endsection
