@extends('layouts.app')

@php use App\Helpers\DateHelper; @endphp

@section('content')
    <div class="mb-6">
        <h2 class="font-outfit text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">
            {{ $title }}
        </h2>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Module purchases and test completion for
            {{ DateHelper::displayRange($filters['from_date'], $filters['to_date']) }}.
        </p>
    </div>

    <form method="GET" class="mb-6 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800">
        <div class="flex flex-wrap items-end gap-3">
            <div class="min-w-[150px]">
                <label for="from-date" class="mb-1 block text-xs font-medium text-gray-600 dark:text-gray-300">From date</label>
                <input id="from-date" name="from_date" type="text" inputmode="numeric"
                    value="{{ DateHelper::displayDateString($filters['from_date']) }}"
                    placeholder="dd/mm/yyyy" pattern="\d{2}/\d{2}/\d{4}" maxlength="10"
                    onchange="this.form.submit()"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100" />
            </div>

            <div class="min-w-[150px]">
                <label for="to-date" class="mb-1 block text-xs font-medium text-gray-600 dark:text-gray-300">To date</label>
                <input id="to-date" name="to_date" type="text" inputmode="numeric"
                    value="{{ DateHelper::displayDateString($filters['to_date']) }}"
                    placeholder="dd/mm/yyyy" pattern="\d{2}/\d{2}/\d{4}" maxlength="10"
                    onchange="this.form.submit()"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100" />
            </div>

            <x-ui.button variant="secondary" size="sm" href="{{ request()->url() }}">Reset to current month</x-ui.button>
        </div>
    </form>

    <div class="mb-8 overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-2xl dark:border-gray-700 dark:bg-gray-800">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse text-left">
                <thead>
                    <tr class="bg-gradient-to-r from-impetus-teal to-impetus-orange">
                        <th class="px-6 py-4 font-outfit text-xs font-bold uppercase tracking-wider text-white">Module Name</th>
                        <th class="px-6 py-4 text-center font-outfit text-xs font-bold uppercase tracking-wider text-white">Purchased</th>
                        <th class="px-6 py-4 text-center font-outfit text-xs font-bold uppercase tracking-wider text-white">Pre-Test</th>
                        <th class="px-6 py-4 text-center font-outfit text-xs font-bold uppercase tracking-wider text-white">Mock</th>
                        <th class="px-6 py-4 text-center font-outfit text-xs font-bold uppercase tracking-wider text-white">Final-1</th>
                        <th class="px-6 py-4 text-center font-outfit text-xs font-bold uppercase tracking-wider text-white">Final-2</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse ($moduleRows as $module)
                        <tr class="transition-colors odd:bg-white even:bg-impetus-teal-muted/50 hover:bg-brand-50/80">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">{{ $module['module_name'] }}</td>
                            <td class="px-6 py-4 text-center text-sm font-semibold text-gray-800 dark:text-gray-200">{{ number_format($module['purchased']) }}</td>
                            <td class="px-6 py-4 text-center text-sm font-semibold text-gray-800 dark:text-gray-200">{{ number_format($module['pre_test']) }}</td>
                            <td class="px-6 py-4 text-center text-sm font-semibold text-gray-800 dark:text-gray-200">{{ number_format($module['mock']) }}</td>
                            <td class="px-6 py-4 text-center text-sm font-semibold text-gray-800 dark:text-gray-200">{{ number_format($module['final_1']) }}</td>
                            <td class="px-6 py-4 text-center text-sm font-semibold text-gray-800 dark:text-gray-200">{{ number_format($module['final_2']) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center text-sm text-gray-500">
                                No purchased modules found for the selected date range.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mb-4 flex flex-wrap items-center gap-6 px-1">
        <div class="flex items-center gap-2 text-sm font-medium text-gray-700">
            <span class="inline-block h-3 w-3 rounded-full bg-impetus-teal"></span>
            Completed
        </div>
        <div class="flex items-center gap-2 text-sm font-medium text-gray-700">
            <span class="inline-block h-3 w-3 rounded-full bg-impetus-orange"></span>
            Not Completed
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">
        @foreach ([
            'pretest' => ['label' => 'Pretest', 'chart_id' => 'resultsChartPretest'],
            'mock' => ['label' => 'Mock', 'chart_id' => 'resultsChartMock'],
            'final_1' => ['label' => 'Final-1', 'chart_id' => 'resultsChartFinal1'],
            'final_2' => ['label' => 'Final-2', 'chart_id' => 'resultsChartFinal2'],
        ] as $key => $chart)
            <div class="rounded-3xl border border-gray-100 bg-white p-5 shadow-xl dark:border-gray-700 dark:bg-gray-800">
                <h3 class="mb-3 text-center font-outfit text-lg font-bold text-impetus-navy">{{ $chart['label'] }}</h3>
                <div id="{{ $chart['chart_id'] }}" class="min-h-[260px]"></div>
                @if (collect($moduleRows)->sum('purchased') === 0)
                    <p class="mt-2 text-center text-sm text-gray-500">No purchase data for chart.</p>
                @endif
            </div>
        @endforeach
    </div>

    @if (! empty($moduleRows))
        <script id="results-chart-data" type="application/json">@json($chartData)</script>
    @endif
@endsection
