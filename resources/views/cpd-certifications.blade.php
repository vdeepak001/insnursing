@extends('layouts.frontend.app')

@section('title', 'CNE Certifications - IHS')

@section('content')
    <main class="overflow-hidden bg-white font-sans antialiased text-slate-800">
        {{-- Hero Section --}}
        <section class="relative bg-impetus-teal-muted py-16 sm:py-24">
            <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
                    <div>
                        <p class="mb-4 flex items-center gap-3 text-sm font-bold uppercase tracking-widest text-impetus-teal font-outfit">
                            <span class="h-px w-8 bg-impetus-teal"></span>
                            CNE Certification
                        </p>
                        <h1 class="mb-6 text-3xl font-extrabold leading-tight text-slate-800 sm:text-4xl lg:text-[2.75rem] font-outfit">
                            Certify Your Skills. <span class="text-impetus-teal">Elevate Your Career.</span>
                        </h1>

                        <div class="space-y-5 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                            <p>
                                <strong>CNE (Continuing Nursing Education) certification</strong> is an official recognition
                                awarded to nurses and healthcare professionals upon successful completion of structured
                                educational programs designed to enhance clinical knowledge, professional skills, and
                                competency in nursing practice. It serves as evidence of participation in continuing
                                professional development activities that align with current healthcare standards and
                                evidence-based practices.
                            </p>
                            <p>
                                CNE certification programs are typically delivered through workshops, simulation-based
                                training, seminars, and online learning modules covering various specialties such as
                                critical care, emergency nursing, infection control, neonatal care, oncology, patient
                                safety, and nursing leadership. These programs are designed to support lifelong learning and
                                ensure that healthcare professionals remain updated with advancements in medical science and
                                clinical care.
                            </p>
                        </div>

                        <div class="mt-8 grid gap-4 sm:grid-cols-3">
                            @foreach ([
                                ['label' => 'Accredited Programs', 'icon' => 'M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                                ['label' => 'Digital Certificates', 'icon' => 'M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z'],
                                ['label' => 'Professional Growth', 'icon' => 'M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.62 48.62 0 0112 20.904a48.62 48.62 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.636 50.636 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0112 13.489a50.702 50.702 0 017.74-3.342'],
                            ] as $highlight)
                                <div class="flex items-center gap-3 rounded-xl border border-impetus-teal/10 bg-impetus-teal-muted/40 px-3 py-3">
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border-2 border-impetus-teal text-impetus-teal">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $highlight['icon'] }}" />
                                        </svg>
                                    </span>
                                    <span class="text-xs font-bold leading-snug text-slate-700 sm:text-sm">{{ $highlight['label'] }}</span>
                                </div>
                            @endforeach
                        </div>

                        <a href="{{ route('cne.modules') }}"
                            class="mt-8 inline-flex items-center gap-2 rounded-full bg-impetus-orange px-7 py-3.5 text-sm font-bold text-white shadow-lg shadow-impetus-orange/25 transition hover:bg-impetus-orange-hover font-outfit">
                            Explore CNE Modules
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>

                    <div class="relative mx-auto flex w-full max-w-sm items-center justify-center lg:max-w-md">
                        <div class="absolute h-64 w-64 rounded-full border-2 border-impetus-orange/30 sm:h-72 sm:w-72"></div>
                        <img src="{{ asset('images/CNE_Certification.jpeg') }}" alt="CNE Certification"
                            class="relative z-10 h-auto w-full max-w-xs rounded-2xl object-cover shadow-xl">
                    </div>
                </div>
            </div>
        </section>

        {{-- Purpose & Importance --}}
        <section class="border-y border-impetus-teal/10 bg-slate-50 py-16 sm:py-20">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid gap-8 lg:grid-cols-2">
                    <div class="rounded-2xl border border-impetus-orange/20 bg-impetus-lightOrange p-6 shadow-md sm:p-8">
                        <div class="mb-6 flex items-center gap-4">
                            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-impetus-orange text-white shadow-md">
                                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-extrabold text-impetus-orange font-outfit">Purpose of CNE Certification</h2>
                                <p class="mt-2 text-sm text-slate-600 sm:text-base">
                                    Structured to drive concrete, high-quality skill benchmarks, CNE certification focuses on core performance goals:
                                </p>
                            </div>
                        </div>
                        <ul class="space-y-4">
                            @foreach ([
                                'To promote continuous professional development among nurses',
                                'To update clinical knowledge and practical skills',
                                'To improve the quality of patient care and safety standards',
                                'To strengthen competency in specialized nursing areas',
                                'To meet regulatory and professional education requirements',
                            ] as $purpose)
                                <li class="flex items-start gap-3">
                                    <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-impetus-orange text-white">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </span>
                                    <p class="text-sm leading-relaxed text-slate-600 text-justify">{{ $purpose }}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="rounded-2xl border border-impetus-teal/15 bg-white p-6 shadow-md sm:p-8">
                        <div class="mb-6 flex items-center gap-4">
                            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-impetus-teal text-white shadow-md">
                                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-widest text-impetus-teal font-outfit">High Clinical Standards</p>
                                <h2 class="text-2xl font-extrabold text-impetus-teal font-outfit">Importance of CNE Certification</h2>
                            </div>
                        </div>
                        <p class="mb-6 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                            CNE certification plays a vital role in ensuring that nursing professionals maintain high
                            standards of practice by regularly updating their knowledge and skills. It enhances career
                            development, professional credibility, and clinical confidence while contributing to
                            improved healthcare outcomes and patient safety.
                        </p>
                        <div class="rounded-xl bg-impetus-teal p-5">
                            <p class="text-sm italic leading-relaxed text-white/90 text-justify sm:text-base font-outfit">
                                “Overall, CNE certification reflects a commitment to lifelong learning and excellence in nursing practice.”
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Certification Journey --}}
        <section class="py-16 sm:py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto mb-12 max-w-3xl text-center">
                    <span class="mb-3 block text-sm font-bold uppercase tracking-widest text-impetus-orange font-outfit">Step-By-Step Path</span>
                    <h2 class="text-2xl font-extrabold text-impetus-teal sm:text-3xl font-outfit">Certification Journey</h2>
                    <p class="mt-4 text-sm leading-relaxed text-slate-600 text-justify sm:text-center sm:text-base">
                        To empower nurses with continuous learning opportunities that promote excellence in practice,
                        improve healthcare outcomes, and support professional advancement in a dynamic healthcare landscape.
                    </p>
                </div>

                @php
                    $journeySteps = [
                        ['num' => '1', 'label' => 'Register'],
                        ['num' => '2', 'label' => 'Purchase a module'],
                        ['num' => '3', 'label' => 'Take pre-test'],
                        ['num' => '4', 'label' => 'Use learning resources'],
                        ['num' => '5', 'label' => 'Practice MCQs'],
                        ['num' => '6', 'label' => 'Take mock exam'],
                        ['num' => '7', 'label' => 'Complete final exam'],
                        ['num' => '8', 'label' => 'Download CNE certificate'],
                    ];
                    $journeyRows = array_chunk($journeySteps, 4);
                @endphp

                <svg class="absolute h-0 w-0 overflow-hidden" aria-hidden="true">
                    <defs>
                        <marker id="journey-connector-arrow" markerWidth="8" markerHeight="8" refX="7" refY="4" orient="auto">
                            <path d="M0,0 L8,4 L0,8 Z" fill="#FF7A00" />
                        </marker>
                    </defs>
                </svg>

                {{-- Desktop --}}
                <div class="relative mx-auto hidden w-full max-w-5xl md:block">
                    <div
                        class="grid grid-cols-[minmax(0,1fr)_2.5rem_minmax(0,1fr)_2.5rem_minmax(0,1fr)_2.5rem_minmax(0,1fr)] items-start gap-x-4 lg:gap-x-8">
                        @foreach ($journeyRows[0] as $stepIndex => $step)
                            @php
                                $theme = (int) $step['num'] % 2 === 1 ? 'teal' : 'orange';
                            @endphp
                            <div class="flex flex-col items-center px-2 text-center lg:px-3">
                                <div class="flex h-[4.5rem] w-full items-center justify-center">
                                    <div @class([
                                        'flex h-16 w-16 items-center justify-center rounded-full text-white shadow-md lg:h-[4.5rem] lg:w-[4.5rem]',
                                        'bg-impetus-teal' => $theme === 'teal',
                                        'bg-impetus-orange' => $theme === 'orange',
                                    ])>
                                        <span class="text-lg font-extrabold font-outfit">{{ $step['num'] }}</span>
                                    </div>
                                </div>
                                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Step {{ $step['num'] }}</p>
                                <h3 class="mt-2 text-sm font-bold leading-snug text-slate-800 font-outfit">{{ $step['label'] }}</h3>
                            </div>

                            @if ($stepIndex < count($journeyRows[0]) - 1)
                                <div class="flex h-[4.5rem] items-center justify-center text-impetus-orange" aria-hidden="true">
                                    <svg class="h-5 w-5 lg:h-6 lg:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                    </svg>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="relative my-8 h-16 w-full lg:my-10 lg:h-20" aria-hidden="true">
                        <svg class="certification-journey-connector h-full w-full text-impetus-orange" viewBox="0 0 100 100"
                            fill="none" preserveAspectRatio="none">
                            <path
                                d="M 84 45
                                   H 14
                                   V 78"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                marker-end="url(#journey-connector-arrow)" />
                        </svg>
                    </div>

                    <div
                        class="grid grid-cols-[minmax(0,1fr)_2.5rem_minmax(0,1fr)_2.5rem_minmax(0,1fr)_2.5rem_minmax(0,1fr)] items-start gap-x-4 lg:gap-x-8">
                        @foreach ($journeyRows[1] as $stepIndex => $step)
                            @php
                                $theme = (int) $step['num'] % 2 === 1 ? 'teal' : 'orange';
                            @endphp
                            <div class="flex flex-col items-center px-2 text-center lg:px-3">
                                <div class="flex h-[4.5rem] w-full items-center justify-center">
                                    <div @class([
                                        'flex h-16 w-16 items-center justify-center rounded-full text-white shadow-md lg:h-[4.5rem] lg:w-[4.5rem]',
                                        'bg-impetus-teal' => $theme === 'teal',
                                        'bg-impetus-orange' => $theme === 'orange',
                                    ])>
                                        <span class="text-lg font-extrabold font-outfit">{{ $step['num'] }}</span>
                                    </div>
                                </div>
                                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Step {{ $step['num'] }}</p>
                                <h3 class="mt-2 text-sm font-bold leading-snug text-slate-800 font-outfit">{{ $step['label'] }}</h3>
                            </div>

                            @if ($stepIndex < count($journeyRows[1]) - 1)
                                <div class="flex h-[4.5rem] items-center justify-center text-impetus-orange" aria-hidden="true">
                                    <svg class="h-5 w-5 lg:h-6 lg:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                    </svg>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                {{-- Mobile --}}
                <div class="relative md:hidden">
                    <div class="grid grid-cols-2 gap-x-6 gap-y-10">
                        @foreach ($journeyRows[0] as $step)
                            @php
                                $theme = (int) $step['num'] % 2 === 1 ? 'teal' : 'orange';
                            @endphp
                            <div class="flex flex-col items-center px-2 text-center">
                                <div @class([
                                    'mb-3 flex h-16 w-16 items-center justify-center rounded-full text-white shadow-md',
                                    'bg-impetus-teal' => $theme === 'teal',
                                    'bg-impetus-orange' => $theme === 'orange',
                                ])>
                                    <span class="text-lg font-extrabold font-outfit">{{ $step['num'] }}</span>
                                </div>
                                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Step {{ $step['num'] }}</p>
                                <h3 class="mt-2 text-sm font-bold leading-snug text-slate-800 font-outfit">{{ $step['label'] }}</h3>
                            </div>
                        @endforeach
                    </div>

                    <div class="relative my-8 h-14 w-full" aria-hidden="true">
                        <svg class="certification-journey-connector h-full w-full text-impetus-orange" viewBox="0 0 100 100"
                            fill="none" preserveAspectRatio="none">
                            <path
                                d="M 78 30
                                   H 22
                                   V 78"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                marker-end="url(#journey-connector-arrow)" />
                        </svg>
                    </div>

                    <div class="grid grid-cols-2 gap-x-6 gap-y-10">
                        @foreach ($journeyRows[1] as $step)
                            @php
                                $theme = (int) $step['num'] % 2 === 1 ? 'teal' : 'orange';
                            @endphp
                            <div class="flex flex-col items-center px-2 text-center">
                                <div @class([
                                    'mb-3 flex h-16 w-16 items-center justify-center rounded-full text-white shadow-md',
                                    'bg-impetus-teal' => $theme === 'teal',
                                    'bg-impetus-orange' => $theme === 'orange',
                                ])>
                                    <span class="text-lg font-extrabold font-outfit">{{ $step['num'] }}</span>
                                </div>
                                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Step {{ $step['num'] }}</p>
                                <h3 class="mt-2 text-sm font-bold leading-snug text-slate-800 font-outfit">{{ $step['label'] }}</h3>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- Bottom CTA --}}
        <section class="pb-16 sm:pb-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="flex flex-col items-center justify-between gap-6 rounded-2xl bg-impetus-teal px-6 py-8 shadow-xl sm:flex-row sm:px-10 sm:py-10">
                    <div class="flex items-center gap-4">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/15 text-white">
                            <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.62 48.62 0 0112 20.904a48.62 48.62 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.636 50.636 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0112 13.489a50.702 50.702 0 017.74-3.342" />
                            </svg>
                        </div>
                        <div class="text-center sm:text-left">
                            <h2 class="text-xl font-extrabold !text-impetus-orange sm:text-2xl font-outfit">Start Your Certification Journey Today</h2>
                            <p class="mt-2 text-sm text-white/90 sm:text-base">
                                Register, complete your modules, and earn your CNE certification with confidence.
                            </p>
                        </div>
                    </div>
                    <a href="{{ route('cne.modules') }}"
                        class="inline-flex shrink-0 items-center gap-2 rounded-full bg-impetus-orange px-6 py-3 text-sm font-bold text-white shadow-lg shadow-impetus-orange/25 transition hover:bg-impetus-orange-hover font-outfit">
                        Get Certified
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection
