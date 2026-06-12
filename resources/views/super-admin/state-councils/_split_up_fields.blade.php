@php
    $split = $splitUp ?? null;
    $testTypes = [
        [
            'prefix' => 'pre',
            'label' => 'Pre Test',
            'card' => 'border-impetus-light-teal-border bg-gradient-to-br from-impetus-light-teal/40 via-white to-white dark:border-teal-800 dark:from-teal-950/30 dark:via-gray-900 dark:to-gray-900',
            'header' => 'bg-impetus-light-teal text-impetus-teal dark:bg-teal-950/50 dark:text-teal-200',
            'level_label' => 'text-impetus-teal/70 dark:text-teal-300/80',
            'focus' => 'focus:border-impetus-teal focus:ring-impetus-teal/20',
        ],
        [
            'prefix' => 'mock',
            'label' => 'Mock Test',
            'card' => 'border-teal-200 bg-gradient-to-br from-impetus-teal-muted via-white to-white dark:border-teal-800 dark:from-teal-950/30 dark:via-gray-900 dark:to-gray-900',
            'header' => 'bg-gradient-to-r from-impetus-teal to-impetus-teal-hover text-white',
            'level_label' => 'text-white/80',
            'focus' => 'focus:border-impetus-teal focus:ring-impetus-teal/20',
        ],
        [
            'prefix' => 'final',
            'label' => 'Final Test',
            'card' => 'border-orange-200 bg-gradient-to-br from-impetus-lightOrange via-white to-orange-50/50 dark:border-orange-900 dark:from-orange-950/20 dark:via-gray-900 dark:to-gray-900',
            'header' => 'bg-gradient-to-r from-impetus-orange to-orange-500 text-white',
            'level_label' => 'text-white/80',
            'focus' => 'focus:border-impetus-orange focus:ring-impetus-orange/20',
        ],
    ];
@endphp

<div class="space-y-6">
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        @foreach ($testTypes as $testType)
            <div class="overflow-hidden rounded-2xl border shadow-sm transition-all hover:shadow-md {{ $testType['card'] }}">
                <div class="px-5 py-4 {{ $testType['header'] }}">
                    <h5 class="font-outfit text-xs font-black uppercase tracking-[0.2em]">
                        {{ $testType['label'] }}
                    </h5>
                </div>

                <div class="p-5 sm:p-6">
                    <div class="flex items-end gap-3">
                        @foreach (['l1', 'l2', 'l3'] as $idx => $level)
                            @php $field = $testType['prefix'].'_'.$level; @endphp
                            <div class="flex-1 space-y-1">
                                <span class="{{ $testType['level_label'] }} block text-center text-[10px] font-bold uppercase tracking-tighter">
                                    L{{ $idx + 1 }}
                                </span>
                                <input
                                    type="number"
                                    name="split_up[{{ $field }}]"
                                    value="{{ old('split_up.'.$field, $split ? $split->$field : 0) }}"
                                    min="0"
                                    class="{{ $testType['focus'] }} h-10 w-full rounded-xl border border-slate-200 bg-white px-2 text-center text-lg font-bold text-slate-800 shadow-sm outline-none transition focus:ring-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
                                />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
