<style>
    @media print {
        nav, .bg-gray-800, form, .gap-3, a, button {
            display: none !important;
        }
        body {
            background: white !important;
        }
        .rounded-3xl {
            border-radius: 0 !important;
            box-shadow: none !important;
            border: none !important;
        }
        .bg-white {
            background: white !important;
        }
        .shadow-2xl {
            box-shadow: none !important;
        }
        .mb-12 {
            margin-bottom: 0 !important;
        }
        table {
            width: 100% !important;
            border-collapse: collapse !important;
        }
        th, td {
            border: 1px solid #e5e7eb !important;
            padding: 8px !important;
        }
        .print-bg-orange {
            background-color: #FF7A00 !important;
            -webkit-print-color-adjust: exact;
        }
        .text-white {
            color: white !important;
            -webkit-print-color-adjust: exact;
        }
        .text-blue-600 {
            color: #2563eb !important;
        }
        body * {
            visibility: hidden;
        }
        #print-report-view, #print-report-view * {
            visibility: visible;
        }
        #print-report-view {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            display: block !important;
        }
        .print\:hidden, #dashboard-report-view, .xl\:flex-row, form {
            display: none !important;
        }
    }

    .date-input-picker::-webkit-calendar-picker-indicator {
        display: block !important;
        cursor: pointer;
        filter: invert(0.5);
    }
</style>

<div class="mb-6 rounded-2xl border border-gray-100 bg-white p-6 shadow-lg dark:border-gray-700 dark:bg-gray-800">
    <form action="{{ request()->url() }}" method="GET" class="flex flex-wrap items-end gap-4">
        <input type="hidden" name="state_id" value="{{ request('state_id') }}">

        <div class="min-w-[200px] flex-1">
            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Course / Module</label>
            <select name="course_id" class="block w-full rounded-lg border-gray-300 py-2.5 pl-3 pr-10 text-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                <option value="" {{ empty($filters['course_id']) ? 'selected' : '' }}>All Modules</option>
                @foreach ($stateCourses as $course)
                    <option value="{{ $course->id }}" {{ (string) $filters['course_id'] === (string) $course->id ? 'selected' : '' }}>
                        {{ $course->couse_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="w-full md:w-44">
            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">From Date</label>
            <input type="date" name="from_date" value="{{ $filters['from_date'] }}"
                onclick="this.showPicker()"
                class="date-input-picker block w-full rounded-lg border-gray-300 px-3 py-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
        </div>

        <div class="w-full md:w-44">
            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">To Date</label>
            <input type="date" name="to_date" value="{{ $filters['to_date'] }}"
                onclick="this.showPicker()"
                class="date-input-picker block w-full rounded-lg border-gray-300 px-3 py-2.5 text-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
        </div>

        <div class="w-full md:w-44">
            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Exam Type</label>
            <select name="exam_type" class="block w-full rounded-lg border-gray-300 py-2.5 pl-3 pr-10 text-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                <option value="" {{ empty($filters['exam_type']) ? 'selected' : '' }}>All Exams</option>
                <option value="pre" {{ $filters['exam_type'] === 'pre' ? 'selected' : '' }}>Pre-Test</option>
                <option value="mock" {{ $filters['exam_type'] === 'mock' ? 'selected' : '' }}>Mock Test</option>
                <option value="final" {{ $filters['exam_type'] === 'final' ? 'selected' : '' }}>Final Test</option>
                <option value="passed" {{ $filters['exam_type'] === 'passed' ? 'selected' : '' }}>Completed (Passed)</option>
            </select>
        </div>

        <div class="flex w-full gap-2 md:w-auto">
            <button type="submit" class="flex-1 rounded-lg bg-gradient-to-r from-impetus-orange to-orange-500 px-8 py-2.5 font-bold text-white shadow-md transition-all duration-200 hover:from-orange-600 hover:to-orange-500 hover:shadow-lg md:flex-none">
                Search
            </button>
            <a href="{{ request()->url() }}?state_id={{ request('state_id') }}" class="flex-1 rounded-lg bg-gray-200 px-8 py-2.5 text-center font-bold text-gray-700 transition-all duration-200 hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 md:flex-none">
                Reset
            </a>
        </div>
    </form>
</div>

<div id="dashboard-report-view" class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-2xl dark:border-gray-700 dark:bg-gray-800">
    <div class="overflow-x-auto">
        <table class="w-full border-collapse text-left">
            <thead>
                <tr class="bg-gradient-to-r from-impetus-teal to-impetus-orange print-bg-orange">
                    <th class="w-[10%] whitespace-nowrap border-b border-orange-400/20 px-4 py-2 text-left text-xs font-bold uppercase tracking-wider text-white">Unique ID</th>
                    <th class="w-[16%] whitespace-nowrap border-b border-orange-400/20 px-4 py-2 text-left text-xs font-bold uppercase tracking-wider text-white">Name</th>
                    <th class="w-[10%] whitespace-nowrap border-b border-orange-400/20 px-4 py-2 text-left text-xs font-bold uppercase tracking-wider text-white">RN Number</th>
                    <th class="w-[24%] whitespace-nowrap border-b border-orange-400/20 px-4 py-2 text-left text-xs font-bold uppercase tracking-wider text-white">Module Name</th>

                    @if (! $filters['exam_type'] || $filters['exam_type'] === 'pre')
                        <th class="w-[8%] whitespace-nowrap border-b border-orange-400/25 px-4 py-2 text-center text-xs font-bold uppercase tracking-wider text-white">Pre Test</th>
                    @endif

                    @if (! $filters['exam_type'] || $filters['exam_type'] === 'mock')
                        <th class="w-[8%] whitespace-nowrap border-b border-orange-400/25 px-4 py-2 text-center text-xs font-bold uppercase tracking-wider text-white">Mock Test</th>
                    @endif

                    @if (! $filters['exam_type'] || in_array($filters['exam_type'], ['final', 'passed']))
                        <th class="w-[8%] whitespace-nowrap border-b border-orange-400/25 px-4 py-2 text-center text-xs font-bold uppercase tracking-wider text-white">Final 1</th>
                        <th class="w-[8%] whitespace-nowrap border-b border-orange-400/25 px-4 py-2 text-center text-xs font-bold uppercase tracking-wider text-white">Final 2</th>
                        <th class="w-[8%] whitespace-nowrap border-b border-orange-400/25 px-4 py-2 text-center text-xs font-bold uppercase tracking-wider text-white">Completed on</th>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse ($userAttempts as $attempt)
                    <tr class="transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-900/50">
                        <td class="whitespace-nowrap px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">{{ $attempt->sequence_number }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-sm font-normal uppercase text-gray-900 dark:text-white">{{ $attempt->user_name }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-left text-sm font-medium uppercase text-gray-600 dark:text-gray-400">{{ $attempt->rn_number }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-sm font-medium text-gray-600 dark:text-gray-400">{{ $attempt->course_name }}</td>

                        @if (! $filters['exam_type'] || $filters['exam_type'] === 'pre')
                            <td class="whitespace-nowrap px-4 py-2 text-center text-sm font-bold {{ $attempt->pre_score != '-' ? 'text-blue-600' : 'text-gray-400' }}">
                                {{ is_numeric($attempt->pre_score) ? round($attempt->pre_score).' %' : $attempt->pre_score }}
                            </td>
                        @endif

                        @if (! $filters['exam_type'] || $filters['exam_type'] === 'mock')
                            <td class="whitespace-nowrap px-4 py-2 text-center text-sm font-bold {{ $attempt->mock_score != '-' ? 'text-blue-600' : 'text-gray-400' }}">
                                {{ is_numeric($attempt->mock_score) ? round($attempt->mock_score).' %' : $attempt->mock_score }}
                            </td>
                        @endif

                        @if (! $filters['exam_type'] || in_array($filters['exam_type'], ['final', 'passed']))
                            <td class="whitespace-nowrap px-4 py-2 text-center text-sm font-bold {{ $attempt->final_score_1 != '-' ? 'text-blue-600' : 'text-gray-400' }}">
                                {{ is_numeric($attempt->final_score_1) ? round($attempt->final_score_1).' %' : $attempt->final_score_1 }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-center text-sm font-bold {{ $attempt->final_score_2 != '-' ? 'text-blue-600' : 'text-gray-400' }}">
                                {{ is_numeric($attempt->final_score_2) ? round($attempt->final_score_2).' %' : $attempt->final_score_2 }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-center text-sm font-medium text-gray-900 dark:text-white">{{ $attempt->date_of_completion }}</td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ ! $filters['exam_type'] ? 9 : ($filters['exam_type'] === 'pre' || $filters['exam_type'] === 'mock' ? 5 : 7) }}" class="px-8 py-20 text-center">
                            <p class="text-lg font-semibold text-gray-400 dark:text-gray-500">No user performance data found for the selected filters.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div id="print-report-view" class="hidden">
    <div class="mb-8 text-center">
        <h1 class="text-2xl font-bold">User Performance Report: {{ $selectedState->name }}</h1>
        <p class="text-gray-600">Generated on: {{ now()->displayDateTime() }}</p>
    </div>
    <table class="w-full border-collapse border border-gray-300 text-left">
        <thead>
            <tr style="background-color: #e5e7eb !important;">
                <th style="color: #000000 !important; border: 1px solid #d1d5db !important; padding: 8px 12px !important; font-size: 10px !important; font-weight: bold !important; text-align: center !important; text-transform: uppercase !important; width: 40px !important;">UID</th>
                <th style="color: #000000 !important; border: 1px solid #d1d5db !important; padding: 8px 12px !important; font-size: 10px !important; font-weight: bold !important; text-transform: uppercase !important; width: 100px !important;">Name</th>
                <th style="color: #000000 !important; border: 1px solid #d1d5db !important; padding: 8px 12px !important; font-size: 10px !important; font-weight: bold !important; text-align: center !important; text-transform: uppercase !important; width: 70px !important;">RN</th>
                <th style="color: #000000 !important; border: 1px solid #d1d5db !important; padding: 8px 12px !important; font-size: 10px !important; font-weight: bold !important; text-align: center !important; text-transform: uppercase !important; width: 80px !important;">Mobile No</th>
                <th style="color: #000000 !important; border: 1px solid #d1d5db !important; padding: 8px 12px !important; font-size: 10px !important; font-weight: bold !important; text-transform: uppercase !important; width: 120px !important;">Mail ID</th>
                <th style="color: #000000 !important; border: 1px solid #d1d5db !important; padding: 8px 12px !important; font-size: 10px !important; font-weight: bold !important; text-transform: uppercase !important;">Module name</th>
                <th style="color: #000000 !important; border: 1px solid #d1d5db !important; padding: 8px 12px !important; font-size: 10px !important; font-weight: bold !important; text-align: center !important; text-transform: uppercase !important; width: 80px !important;">Date of completion</th>
                <th style="color: #000000 !important; border: 1px solid #d1d5db !important; padding: 8px 12px !important; font-size: 10px !important; font-weight: bold !important; text-align: center !important; text-transform: uppercase !important; width: 80px !important;">Time of completion</th>
                <th style="color: #000000 !important; border: 1px solid #d1d5db !important; padding: 8px 12px !important; font-size: 10px !important; font-weight: bold !important; text-align: center !important; text-transform: uppercase !important; width: 60px !important;">Score (%)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userAttempts as $attempt)
                <tr>
                    <td class="border border-gray-300 px-3 py-2 text-center text-[10px]">{{ $attempt->sequence_number }}</td>
                    <td class="border border-gray-300 px-3 py-2 text-left text-[10px] font-normal uppercase">{{ $attempt->user_name }}</td>
                    <td class="border border-gray-300 px-3 py-2 text-center text-[10px] uppercase">{{ $attempt->rn_number }}</td>
                    <td class="border border-gray-300 px-3 py-2 text-center text-[10px]">{{ $attempt->phone }}</td>
                    <td class="border border-gray-300 px-3 py-2 text-left text-[10px]">{{ $attempt->email }}</td>
                    <td class="border border-gray-300 px-3 py-2 text-left text-[10px]">{{ $attempt->course_name }}</td>
                    <td class="border border-gray-300 px-3 py-2 text-center text-[10px]">{{ $attempt->date_of_completion }}</td>
                    <td class="border border-gray-300 px-3 py-2 text-center text-[10px]">{{ $attempt->time_of_completion }}</td>
                    <td class="border border-gray-300 px-3 py-2 text-center text-[10px] font-bold">
                        {{ is_numeric($attempt->score) ? round($attempt->score).' %' : $attempt->score }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
