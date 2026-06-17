@php
    $moduleNumber = str_pad((string) ($moduleIndex ?? $loop->iteration), 2, '0', STR_PAD_LEFT);
    $theme = ($moduleIndex ?? $loop->iteration) % 2 === 0 ? 'orange' : 'teal';

    // Normalize course name for mapping
    $courseNameLower = strtolower($course->couse_name ?? '');

    // Define custom SVG paths for each of the 26 modules so that none are repeated
    if (str_contains($courseNameLower, 'life support') || str_contains($courseNameLower, 'bls')) {
        // 21. Basic Life Support -> Heart icon
        $iconPath = 'M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z';
    } elseif (str_contains($courseNameLower, 'health assessment') || str_contains($courseNameLower, 'clinical assessment')) {
        // 1. Health Assessment -> Clipboard icon
        $iconPath = 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2';
    } elseif (str_contains($courseNameLower, 'infection')) {
        // 2. Infection Control Practices -> Shield check icon
        $iconPath = 'M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z';
    } elseif (str_contains($courseNameLower, 'basic nursing care') || str_contains($courseNameLower, 'basic nursing practices')) {
        // 3. Basic Nursing Care / Practices -> Book-open icon
        $iconPath = 'M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25';
    } elseif (str_contains($courseNameLower, 'medication') || str_contains($courseNameLower, 'pharmacology')) {
        // 4. Medications & Documentation -> Beaker / Flask icon
        $iconPath = 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 9.172V5L8 4z';
    } elseif (str_contains($courseNameLower, 'gastrointestinal')) {
        // 5. Gastrointestinal Nursing -> Cube / Anatomy icon
        $iconPath = 'M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25';
    } elseif (str_contains($courseNameLower, 'cardiopulmonary') || str_contains($courseNameLower, 'cardio-respiratory')) {
        // 6. Cardiopulmonary / Cardio-Respiratory Nursing -> Pulse rate / activity line
        $iconPath = 'M2.25 12h3.081a2.25 2.25 0 012.242 1.896l.89 4.457a2.25 2.25 0 004.28-.466l1.724-11.493a2.25 2.25 0 014.287-.469l1.492 5.966A2.25 2.25 0 0021.205 13.5h2.295';
    } elseif (str_contains($courseNameLower, 'orthopedic') || str_contains($courseNameLower, 'neurological')) {
        // 7. Orthopedic & Neurological Nursing -> Spinal columns / circle stack
        $iconPath = 'M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125v-3.75m16.5 0v3.75C20.25 16.128 16.556 17.975 12 17.975s-8.25-1.847-8.25-4.125v-3.75';
    } elseif (str_contains($courseNameLower, 'dermatology') || str_contains($courseNameLower, 'immuno') || str_contains($courseNameLower, 'endocrine')) {
        // 8. Dermatology, Immuno & Endocrine Nursing -> Fingerprint icon
        $iconPath = 'M6.135 5.27a9 9 0 0111.73 0m-1.79 3.095a5.976 5.976 0 00-8.14 0m1.815 3.162a3 3 0 013.97 0M9 18.75V16.5m-6-1.5V13.5m0-3a9 9 0 011.64-5.16m1.612 10.16a6.002 6.002 0 01-1.612-5m13.2 5a6.002 6.002 0 00-1.613-5m1.613 5v.008a.75.75 0 01-1.5 0v-.008a6.002 6.002 0 00-1.613-5m-6.793 6.72a3 3 0 003.958 0M12 13.5a1.5 1.5 0 011.5 1.5v3a1.5 1.5 0 01-3 0v-3a1.5 1.5 0 011.5-1.5z';
    } elseif (str_contains($courseNameLower, 'ophthalmic') || str_contains($courseNameLower, 'ent ')) {
        // 9. Ophthalmic & ENT Nursing -> Eye icon
        $iconPath = 'M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178zM15 12a3 3 0 11-6 0 3 3 0 016 0z';
    } elseif (str_contains($courseNameLower, 'renal')) {
        // 10. Renal Nursing -> Funnel / Filtration icon
        $iconPath = 'M12 3v13.5m0-13.5L6.75 8.25M12 3l5.25 5.25M12 16.5A3.75 3.75 0 118.25 20.25 3.75 3.75 0 0112 16.5z';
    } elseif (str_contains($courseNameLower, 'emergency nursing') || str_contains($courseNameLower, 'emergency nursing care')) {
        // 11. Emergency Nursing -> Lightning bolt icon
        $iconPath = 'M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z';
    } elseif (str_contains($courseNameLower, 'neonatal') || str_contains($courseNameLower, 'imnci')) {
        // 12. Neonatal Nursing & IMNCI -> Sun icon (newborn dawn)
        $iconPath = 'M12 3v2.25m0 13.5V21M5.22 5.22l1.59 1.59m10.38 10.38l1.59 1.59M12 6.75a5.25 5.25 0 100 10.5 5.25 5.25 0 000-10.5zM3 12h2.25m13.5 0H21M5.22 18.78l1.59-1.59m10.38-10.38l1.59-1.59';
    } elseif (str_contains($courseNameLower, 'child health')) {
        // 13. Child Health Nursing -> Smile icon
        $iconPath = 'M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.01h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.01h-.008V9.75z';
    } elseif (str_contains($courseNameLower, 'community health')) {
        // 14. Community Health Nursing -> Home icon
        $iconPath = 'M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25';
    } elseif (str_contains($courseNameLower, 'mental health') || str_contains($courseNameLower, 'psychiatric')) {
        // 15. Mental Health Nursing -> Light bulb icon
        $iconPath = 'M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18';
    } elseif (str_contains($courseNameLower, 'maternal health') || str_contains($courseNameLower, 'midwifery')) {
        // 16. Maternal Health Nursing -> Sparkles icon (miracle of birth)
        $iconPath = 'M9.813 15.904L9 21L8.188 15.904L3 15l5.188-.904L9 9l.813 5.096L15 15l-5.187.904zM19.071 7.071L18.5 10.5l-.571-3.429L14.5 6.5l3.429-.571L18.5 2.5l.571 3.429L22.5 6.5l-3.429.571z';
    } elseif (str_contains($courseNameLower, 'airway')) {
        // 17. Airway Management -> Wind / breathing airflow icon
        $iconPath = 'M3.75 13.5h10.125a2.625 2.625 0 10-2.625-2.625M3.75 16.5h7.875A3.375 3.375 0 108.25 13.125M3.75 10.5h12.375a3.75 3.75 0 11-3.75-3.75';
    } elseif (str_contains($courseNameLower, 'critical care')) {
        // 18. Critical Care Nursing -> Bell (monitoring alarm / emergency care bell)
        $iconPath = 'M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0';
    } elseif (str_contains($courseNameLower, 'oncology')) {
        // 19. Oncology Nursing -> Gift (grace/compassionate oncology care)
        $iconPath = 'M21 7.5c0-.621-.504-1.125-1.125-1.125H16.5a1.5 1.5 0 00-3 0h-3a1.5 1.5 0 00-3 0H4.125C3.504 6.375 3 6.879 3 7.5m18 0v11.25C21 19.376 20.376 20 19.5 20H4.5c-.876 0-1.5-.624-1.5-1.5V7.5m18 0h-18m6 0a1.5 1.5 0 11-3 0h3zm9 0a1.5 1.5 0 11-3 0h3zM12 6.375V20';
    } elseif (str_contains($courseNameLower, 'perioperative')) {
        // 20. Perioperative Nursing -> Scissors (surgical precision shears)
        $iconPath = 'M9 9a3 3 0 11-6 0 3 3 0 016 0zm0 0a3 3 0 106 0m-6 0l6 6m0 0a3 3 0 116 0 3 3 0 01-6 0zm0 0l-6-6';
    } elseif (str_contains($courseNameLower, 'first aid')) {
        // 22. First Aid -> Plus circle icon
        $iconPath = 'M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z';
    } elseif (str_contains($courseNameLower, 'nursing education')) {
        // 23. Nursing Education -> Academic Cap
        $iconPath = 'M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.62 48.62 0 0112 20.904a48.62 48.62 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.636 50.636 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0112 13.489a50.702 50.702 0 017.74-3.342';
    } elseif (str_contains($courseNameLower, 'nursing management')) {
        // 24. Nursing Management -> Chart Bar statistics icon
        $iconPath = 'M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v5.25c0 .621-.504 1.125-1.125 1.125h-2.25A1.125 1.125 0 013 18.375v-5.25zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125v-9.75zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v14.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z';
    } elseif (str_contains($courseNameLower, 'nursing research')) {
        // 25. Nursing Research -> Magnifying glass icon
        $iconPath = 'M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z';
    } elseif (str_contains($courseNameLower, 'disaster')) {
        // 26. Disaster Management -> Exclamation/Warning triangle
        $iconPath = 'M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z';
    } else {
        // Default unique fallback (a double circular bullseye/target representing precision goals)
        $iconPath = 'M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z';
    }
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
