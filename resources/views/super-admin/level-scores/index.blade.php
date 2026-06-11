@extends('layouts.app')

@section('content')
    <div class="mb-8">
        <h2 class="font-outfit text-2xl font-extrabold tracking-tight text-impetus-navy dark:text-white">
            {{ $title }}
        </h2>
        <p class="mt-1 text-sm text-slate-500 dark:text-gray-400">
            Configure the number of questions drawn from each difficulty level for assessments.
        </p>
    </div>

    <x-common.component-card title="Level Score Information" desc="Set question counts for Level 1, Level 2, and Level 3.">
        <form method="POST" action="{{ route($routePrefix . '.level-scores.store') }}">
            @csrf

            @php
                $levels = [
                    [
                        'field' => 'level_1',
                        'label' => 'Level 1',
                        'subtitle' => 'Factual Knowledge',
                        'card' => 'border-t-impetus-orange bg-gradient-to-br from-impetus-lightOrange via-white to-orange-50/60 dark:from-orange-950/20 dark:via-gray-900 dark:to-gray-900',
                        'badge' => 'bg-gradient-to-tr from-impetus-orange to-orange-500 text-white shadow-lg shadow-orange-500/25',
                        'label_color' => 'text-impetus-orange',
                        'ring' => 'focus:border-impetus-orange focus:ring-impetus-orange/20',
                    ],
                    [
                        'field' => 'level_2',
                        'label' => 'Level 2',
                        'subtitle' => 'Functional Knowledge',
                        'card' => 'border-t-impetus-navy bg-gradient-to-br from-impetus-teal-muted via-white to-slate-50 dark:from-slate-900/40 dark:via-gray-900 dark:to-gray-900',
                        'badge' => 'bg-gradient-to-tr from-impetus-navy to-slate-700 text-white shadow-lg shadow-slate-700/25',
                        'label_color' => 'text-impetus-navy',
                        'ring' => 'focus:border-impetus-teal focus:ring-impetus-teal/20',
                    ],
                    [
                        'field' => 'level_3',
                        'label' => 'Level 3',
                        'subtitle' => 'Critical Application',
                        'card' => 'border-t-violet-500 bg-gradient-to-br from-violet-50 via-white to-purple-50/60 dark:from-violet-950/20 dark:via-gray-900 dark:to-gray-900',
                        'badge' => 'bg-gradient-to-tr from-violet-500 to-purple-600 text-white shadow-lg shadow-violet-500/25',
                        'label_color' => 'text-violet-600',
                        'ring' => 'focus:border-violet-500 focus:ring-violet-500/20',
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                @foreach ($levels as $level)
                    <div class="overflow-hidden rounded-2xl border border-slate-200 border-t-4 shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md dark:border-gray-700 {{ $level['card'] }}">
                        <div class="p-5 sm:p-6">
                            <div class="mb-5 flex items-center gap-3">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl font-outfit text-lg font-bold {{ $level['badge'] }}">
                                    {{ $loop->iteration }}
                                </div>
                                <div>
                                    <p class="font-outfit text-base font-bold {{ $level['label_color'] }} dark:text-white">
                                        {{ $level['label'] }}
                                    </p>
                                    <p class="text-xs font-medium text-slate-500 dark:text-gray-400">
                                        {{ $level['subtitle'] }}
                                    </p>
                                </div>
                            </div>

                            <label for="{{ $level['field'] }}" class="sr-only">{{ $level['label'] }}</label>
                            <input
                                id="{{ $level['field'] }}"
                                type="number"
                                min="0"
                                name="{{ $level['field'] }}"
                                value="{{ old($level['field'], $levelScore?->{$level['field']}) }}"
                                required
                                class="h-12 w-full rounded-xl border border-slate-200 bg-white px-4 text-lg font-bold text-slate-800 shadow-sm outline-none transition focus:ring-4 dark:border-gray-600 dark:bg-gray-900 dark:text-white {{ $level['ring'] }}"
                            />
                            @error($level['field'])
                                <span class="mt-2 block text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                @endforeach
            </div>

            @if (in_array(auth()->user()?->role_type, ['superadmin', 'admin'], true))
                <div class="mt-8 flex items-center justify-end border-t border-slate-100 pt-6 dark:border-gray-800">
                    <x-ui.button type="submit">
                        Save Level Score
                    </x-ui.button>
                </div>
            @endif
        </form>
    </x-common.component-card>
@endsection
