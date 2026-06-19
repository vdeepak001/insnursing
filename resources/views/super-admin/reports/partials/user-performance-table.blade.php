<div id="dashboard-report-view" class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-2xl dark:border-gray-700 dark:bg-gray-800">
    <div class="overflow-x-auto">
        <table class="w-full border-collapse text-left">
            <thead>
                <tr class="bg-gradient-to-r from-impetus-teal to-impetus-orange print-bg-orange">
                    <th class="w-[10%] whitespace-nowrap border-b border-orange-400/20 px-2 py-2 text-left text-xs font-bold uppercase tracking-wider text-white font-outfit">Unique ID</th>
                    <th class="w-[16%] whitespace-nowrap border-b border-orange-400/20 px-2 py-2 text-left text-xs font-bold uppercase tracking-wider text-white font-outfit">Name</th>
                    <th class="w-[10%] whitespace-nowrap border-b border-orange-400/20 px-2 py-2 text-left text-xs font-bold uppercase tracking-wider text-white font-outfit">RN Number</th>
                    <th class="w-[24%] whitespace-nowrap border-b border-orange-400/20 px-2 py-2 text-left text-xs font-bold uppercase tracking-wider text-white font-outfit">Module Name</th>

                    @if (! $filters['exam_type'] || $filters['exam_type'] === 'pre')
                        <th class="w-[8%] whitespace-nowrap border-b border-orange-400/25 px-2 py-2 text-center text-xs font-bold uppercase tracking-wider text-white font-outfit">Pre Test</th>
                    @endif

                    @if (! $filters['exam_type'] || $filters['exam_type'] === 'mock')
                        <th class="w-[8%] whitespace-nowrap border-b border-orange-400/25 px-2 py-2 text-center text-xs font-bold uppercase tracking-wider text-white font-outfit">Mock Test</th>
                    @endif

                    @if (! $filters['exam_type'] || in_array($filters['exam_type'], ['final', 'passed']))
                        <th class="w-[8%] whitespace-nowrap border-b border-orange-400/25 px-2 py-2 text-center text-xs font-bold uppercase tracking-wider text-white font-outfit">Final 1</th>
                        <th class="w-[8%] whitespace-nowrap border-b border-orange-400/25 px-2 py-2 text-center text-xs font-bold uppercase tracking-wider text-white font-outfit">Final 2</th>
                        <th class="w-[8%] whitespace-nowrap border-b border-orange-400/25 px-2 py-2 text-center text-xs font-bold uppercase tracking-wider text-white font-outfit">Completed on</th>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse ($userAttempts as $attempt)
                    <tr class="transition-colors duration-150 hover:bg-gray-50 dark:hover:bg-gray-900/50">
                        <td class="whitespace-nowrap px-2 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-400">{{ $attempt->sequence_number }}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-normal uppercase text-gray-900 dark:text-white">{{ $attempt->user_name }}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-left text-sm font-medium uppercase text-gray-600 dark:text-gray-400">{{ $attempt->rn_number }}</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-600 dark:text-gray-400">{{ $attempt->course_name }}</td>

                        @if (! $filters['exam_type'] || $filters['exam_type'] === 'pre')
                            <td class="whitespace-nowrap px-2 py-2 text-center text-sm font-bold {{ $attempt->pre_score != '-' ? 'text-gray-900 dark:text-white' : 'text-gray-400' }}">
                                {{ is_numeric($attempt->pre_score) ? round($attempt->pre_score).' %' : $attempt->pre_score }}
                            </td>
                        @endif

                        @if (! $filters['exam_type'] || $filters['exam_type'] === 'mock')
                            <td class="whitespace-nowrap px-2 py-2 text-center text-sm font-bold {{ $attempt->mock_score != '-' ? 'text-gray-900 dark:text-white' : 'text-gray-400' }}">
                                {{ is_numeric($attempt->mock_score) ? round($attempt->mock_score).' %' : $attempt->mock_score }}
                            </td>
                        @endif

                        @if (! $filters['exam_type'] || in_array($filters['exam_type'], ['final', 'passed']))
                            <td class="whitespace-nowrap px-2 py-2 text-center text-sm font-bold {{ $attempt->final_score_1 != '-' ? 'text-gray-900 dark:text-white' : 'text-gray-400' }}">
                                {{ is_numeric($attempt->final_score_1) ? round($attempt->final_score_1).' %' : $attempt->final_score_1 }}
                            </td>
                            <td class="whitespace-nowrap px-2 py-2 text-center text-sm font-bold {{ $attempt->final_score_2 != '-' ? 'text-gray-900 dark:text-white' : 'text-gray-400' }}">
                                {{ is_numeric($attempt->final_score_2) ? round($attempt->final_score_2).' %' : $attempt->final_score_2 }}
                            </td>
                            <td class="whitespace-nowrap px-2 py-2 text-center text-sm font-medium text-gray-900 dark:text-white">{{ $attempt->date_of_completion }}</td>
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
        <h1 class="text-2xl font-bold">User Performance Report: {{ $selectedState?->name ?? 'All States' }}</h1>
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
