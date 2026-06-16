@php
    $moduleNumber = str_pad((string) ($moduleIndex ?? $loop->iteration), 2, '0', STR_PAD_LEFT);
    $theme = ($moduleIndex ?? $loop->iteration) % 2 === 0 ? 'orange' : 'teal';
    $moduleIcons = [
        'teal' => [
            'M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733-2.485 0-4.5 1.875-4.5 4.125 0 1.26.611 2.377 1.548 3.082M3 13.125c0-2.485 2.099-4.5 4.688-4.5 1.935 0 3.597 1.126 4.312 2.733.715-1.607 2.377-2.733 4.313-2.733 2.485 0 4.5 1.875 4.5 4.125 0 1.26-.611 2.377-1.548 3.082M12 8.25V6.108c0-1.135.845-2.098 1.976-2.192.373-.026.74-.026 1.108 0 1.131.094 1.976 1.057 1.976 2.192V8.25',
            'M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z',
        ],
        'orange' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
    ];
    $tealIconIndex = (int) floor((($moduleIndex ?? $loop->iteration) - 1) / 2) % 2;
    $iconPath = $theme === 'teal'
        ? $moduleIcons['teal'][$tealIconIndex]
        : $moduleIcons['orange'];
@endphp

<a
    href="{{ route('cne.modules.show', $course->couse_name) }}"
    @if ($carousel ?? false) data-module-card @endif
    class="group relative flex w-full overflow-hidden rounded-2xl border border-impetus-teal/10 bg-white shadow-md transition hover:-translate-y-0.5 hover:shadow-xl {{ ($carousel ?? false) ? 'w-[min(100%,340px)] shrink-0 snap-start sm:w-[420px]' : '' }}"
>
    {{-- Icon panel --}}
    <div class="relative flex w-28 shrink-0 items-center justify-center py-6 sm:w-32">
        <div @class([
            'absolute inset-3 rounded-2xl',
            'bg-impetus-teal-muted/60' => $theme === 'teal',
            'bg-impetus-lightOrange/70' => $theme === 'orange',
        ])></div>
        <div @class([
            'relative flex h-16 w-16 items-center justify-center rounded-full text-white shadow-md sm:h-[4.5rem] sm:w-[4.5rem]',
            'bg-impetus-teal' => $theme === 'teal',
            'bg-impetus-orange' => $theme === 'orange',
        ])>
            <svg class="h-8 w-8 sm:h-9 sm:w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPath }}" />
            </svg>
        </div>
    </div>

    {{-- Content panel --}}
    <div class="relative flex min-w-0 flex-1 flex-col px-4 py-5 sm:px-5 sm:py-6">
        <div class="flex items-start gap-3 sm:gap-4">
            <div class="shrink-0">
                <p @class([
                    'text-3xl font-extrabold leading-none font-outfit sm:text-4xl',
                    'text-impetus-teal' => $theme === 'teal',
                    'text-impetus-orange' => $theme === 'orange',
                ])>{{ $moduleNumber }}</p>
                <div @class([
                    'mt-2 h-1 w-10 rounded-full',
                    'bg-impetus-teal' => $theme === 'teal',
                    'bg-impetus-orange' => $theme === 'orange',
                ])></div>
            </div>
            <h3 @class([
                'min-w-0 pt-1 text-base font-bold leading-snug font-outfit sm:text-lg',
                'text-impetus-teal' => $theme === 'teal',
                'text-impetus-orange' => $theme === 'orange',
            ])>{{ $course->couse_name }}</h3>
        </div>

        @if (filled($course->description))
            <p class="mt-3 line-clamp-3 text-sm leading-relaxed text-slate-600 text-justify sm:mt-4">
                {{ \Illuminate\Support\Str::words(strip_tags($course->description), 22, '...') }}
            </p>
        @else
            <p class="mt-3 text-sm leading-relaxed text-slate-600 sm:mt-4">
                Explore this module to enhance your clinical knowledge and professional competence.
            </p>
        @endif

        @auth
            @if (auth()->user()?->role_type === 'user' && isset($creditPoints) && $creditPoints !== 'N/A')
                <p class="mt-3 inline-flex self-start rounded-full bg-impetus-teal-muted px-3 py-1 text-xs font-bold text-impetus-teal">
                    Credit Point: {{ $creditPoints }}
                </p>
            @endif
        @endauth

        <div class="mt-auto flex items-end justify-between gap-4 pt-5">
            <span @class([
                'inline-flex items-center gap-1.5 rounded-full px-4 py-2 text-xs font-bold text-white shadow-sm transition group-hover:shadow-md sm:px-5 sm:py-2.5 sm:text-sm',
                'bg-impetus-teal group-hover:bg-impetus-teal-hover' => $theme === 'teal',
                'bg-impetus-orange group-hover:bg-impetus-orange-hover' => $theme === 'orange',
            ])>
                View Module
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </span>

            <div class="grid shrink-0 grid-cols-3 gap-1 opacity-60" aria-hidden="true">
                @foreach (range(1, 9) as $dot)
                    <span @class([
                        'h-1.5 w-1.5 rounded-full',
                        'bg-impetus-teal/35' => $theme === 'teal',
                        'bg-impetus-orange/35' => $theme === 'orange',
                    ])></span>
                @endforeach
            </div>
        </div>
    </div>
</a>
