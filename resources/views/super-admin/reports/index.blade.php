@extends('layouts.app')

@section('content')
    <div class="mb-6 flex flex-col items-center justify-between gap-4 md:flex-row">
        <h2 class="text-3xl font-extrabold tracking-tight" style="color: var(--color-impetus-orange)">
            {{ $selectedState ? 'Report: '.$selectedState->name : 'Reports' }}
        </h2>

        <div class="flex flex-wrap items-center justify-end gap-3">
            <div class="flex items-center gap-4 rounded-xl border border-gray-100 bg-white px-4 py-2 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <span class="text-sm font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-400">View by State</span>
                <form action="{{ request()->url() }}" method="GET" id="stateFilterForm">
                    <select name="state_id" onchange="this.form.submit()"
                        class="block w-full rounded-lg border border-gray-300 py-2 pl-3 pr-10 text-base transition-all duration-200 focus:border-black focus:outline-none focus:ring-black/20 sm:text-sm dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                        <option value="">All States</option>
                        @foreach ($states as $state)
                            <option value="{{ $state->id }}" {{ request('state_id') == $state->id ? 'selected' : '' }}>
                                {{ $state->name }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>

            @if ($selectedState)
                <a href="{{ route($routePrefix.'.reports.export-csv', request()->all()) }}"
                    class="inline-flex items-center rounded-xl px-5 py-2.5 text-sm font-bold text-white shadow-lg transition-all duration-200 hover:scale-[1.02] hover:shadow-xl"
                    style="background: linear-gradient(135deg, var(--color-impetus-orange, #FF7A00), #ea580c);">
                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Download Excel
                </a>

                <button type="button" onclick="window.print()"
                    class="inline-flex items-center rounded-xl px-5 py-2.5 text-sm font-bold text-white shadow-lg transition-all duration-200 hover:scale-[1.02] hover:shadow-xl"
                    style="background: linear-gradient(135deg, #1d2a57, #2c3e75);">
                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                    Download PDF
                </button>

                <a href="{{ route($routePrefix.'.reports.index') }}"
                    class="inline-flex items-center rounded-xl px-5 py-2.5 text-sm font-bold text-white shadow-lg transition-all duration-200 hover:scale-[1.02] hover:shadow-xl"
                    style="background: linear-gradient(135deg, #045A5D, #067D80);">
                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Summary
                </a>
            @endif
        </div>
    </div>

    @php
        $stats = $selectedState
            ? [
                'registered_users' => $nursesCount,
                'purchased_modules' => $purchasedModulesCount,
                'modules_completed' => $modulesCompletedCount,
            ]
            : $globalStats;

        $moduleRows = $selectedState ? $moduleWisePassed : $globalModuleWisePassed;
        $moduleTableTitle = $selectedState ? 'State Module Completion' : 'Overall Module Completion';
    @endphp

    @once
        @include('super-admin.reports.partials.user-performance-print-styles')
    @endonce

    @php
        $performanceData = [
            'selectedState' => $selectedState,
            'stateCourses' => $stateCourses,
            'userAttempts' => $userAttempts,
            'filters' => $filters,
        ];
    @endphp

    <div class="mb-6 grid grid-cols-1 items-stretch gap-6 xl:grid-cols-12">
        <div class="grid grid-cols-3 gap-3 xl:col-span-4">
            <!-- Registered Users Card -->
            <div class="flex flex-col items-center justify-center rounded-2xl bg-impetus-teal px-2 py-4 text-center shadow-lg shadow-impetus-teal/20 hover:shadow-xl hover:shadow-impetus-teal/30 transition-all duration-200">
                <div class="mb-2 flex h-11 w-11 items-center justify-center rounded-xl bg-white/20 text-white">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <span class="mb-1 text-[9px] font-normal uppercase leading-tight tracking-wide text-white/80 font-outfit">Registered Users</span>
                <span class="font-outfit text-2xl font-normal tracking-tight text-white">{{ number_format($stats['registered_users']) }}</span>
            </div>

            <!-- Purchased Modules Card -->
            <div class="flex flex-col items-center justify-center rounded-2xl bg-impetus-orange px-2 py-4 text-center shadow-lg shadow-impetus-orange/20 hover:shadow-xl hover:shadow-impetus-orange/30 transition-all duration-200">
                <div class="mb-2 flex h-11 w-11 items-center justify-center rounded-xl bg-white/20 text-white">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <span class="mb-1 text-[9px] font-normal uppercase leading-tight tracking-wide text-white/80 font-outfit">Purchased Modules</span>
                <span class="font-outfit text-2xl font-normal tracking-tight text-white">{{ number_format($stats['purchased_modules']) }}</span>
            </div>

            <!-- Modules Completed Card -->
            <div class="flex flex-col items-center justify-center rounded-2xl bg-gradient-to-tr from-impetus-teal to-impetus-orange px-2 py-4 text-center shadow-lg shadow-impetus-teal/20 hover:shadow-xl hover:shadow-impetus-orange/30 transition-all duration-200">
                <div class="mb-2 flex h-11 w-11 items-center justify-center rounded-xl bg-white/20 text-white">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <span class="mb-1 text-[9px] font-normal uppercase leading-tight tracking-wide text-white/80 font-outfit">Modules Completed</span>
                <span class="font-outfit text-2xl font-normal tracking-tight text-white">{{ number_format($stats['modules_completed']) }}</span>
            </div>
        </div>

        <div class="xl:col-span-8">
            @include('super-admin.reports.partials.user-performance-filters', $performanceData)
        </div>
    </div>

    <div class="grid grid-cols-1 items-start gap-6 xl:grid-cols-12">
        <div class="xl:col-span-4">
            @include('super-admin.reports.partials.module-completion-table', [
                'title' => $moduleTableTitle,
                'moduleRows' => $moduleRows,
                'emptyMessage' => $selectedState
                    ? 'No completion data found for this state.'
                    : 'No completion data found.',
            ])
        </div>

        <div class="xl:col-span-8">
            @include('super-admin.reports.partials.user-performance-table', $performanceData)
        </div>
    </div>
@endsection
