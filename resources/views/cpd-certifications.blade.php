@extends('layouts.frontend.app')

@section('title', 'CNE Certifications - IHS')

@section('content')
    <main class="overflow-hidden bg-white font-sans antialiased text-slate-800">
        {{-- Hero Section --}}
        <section class="relative overflow-hidden bg-gradient-to-br from-impetus-teal-muted via-white to-impetus-lightOrange/40 py-16 sm:py-16">
            {{-- Decorative blurred orbs --}}
            <div class="pointer-events-none absolute -left-24 -top-24 h-72 w-72 rounded-full bg-impetus-teal/15 blur-3xl"></div>
            <div class="pointer-events-none absolute -bottom-32 right-0 h-80 w-80 rounded-full bg-impetus-orange/15 blur-3xl"></div>
            <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_1px_1px,rgba(13,148,136,0.08)_1px,transparent_0)] [background-size:28px_28px]"></div>

            <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-center gap-12 lg:grid-cols-2 lg:items-stretch lg:gap-16">
                    <div>
                        <p
                            class="mb-5 inline-flex items-center gap-2 rounded-full border border-impetus-teal/20 bg-white/70 px-4 py-1.5 text-xs font-bold uppercase tracking-widest text-impetus-teal shadow-sm backdrop-blur font-outfit">
                            <span class="relative flex h-2 w-2">
                                <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-impetus-orange opacity-75"></span>
                                <span class="relative inline-flex h-2 w-2 rounded-full bg-impetus-orange"></span>
                            </span>
                            CNE Certification
                        </p>
                        <h1
                            class="mb-6 text-3xl font-extrabold leading-tight text-slate-800 sm:text-4xl lg:text-[2.75rem] font-outfit">
                            Certify Your Skills
                            <span class="text-impetus-teal">Elevate Your Career</span>
                        </h1>

                        <div class="space-y-5 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                            <p>
                                <strong>Continuing Nursing Education Certification</strong> is an official recognition
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
                            @foreach ([['label' => 'Accredited Programs', 'icon' => 'M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z'], ['label' => 'Digital Certificates', 'icon' => 'M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z'], ['label' => 'Professional Growth', 'icon' => 'M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.62 48.62 0 0112 20.904a48.62 48.62 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.636 50.636 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0112 13.489a50.702 50.702 0 017.74-3.342']] as $highlight)
                                <div
                                    class="group flex items-center gap-3 rounded-xl border border-impetus-teal/10 bg-white/70 px-3 py-3 shadow-sm backdrop-blur transition duration-300 hover:-translate-y-0.5 hover:border-impetus-teal/30 hover:shadow-md">
                                    <span
                                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-impetus-teal text-white shadow-sm transition duration-300 group-hover:scale-110">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="{{ $highlight['icon'] }}" />
                                        </svg>
                                    </span>
                                    <span
                                        class="text-xs font-bold leading-snug text-slate-700 sm:text-sm">{{ $highlight['label'] }}</span>
                                </div>
                            @endforeach
                        </div>

                        <a href="{{ route('cne.modules') }}"
                            class="group mt-8 inline-flex items-center gap-2 rounded-full bg-impetus-orange px-7 py-3.5 text-sm font-bold text-white shadow-lg shadow-impetus-orange/30 transition duration-300 hover:-translate-y-0.5 hover:bg-impetus-orange-hover hover:shadow-xl hover:shadow-impetus-orange/40 font-outfit">
                            Explore CNE Modules
                            <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>

                    <div class="relative flex w-full self-stretch">
                        <div
                            class="absolute left-1/2 top-1/2 aspect-square w-[min(100%,24rem)] -translate-x-1/2 -translate-y-1/2 rounded-full border-2 border-dashed border-impetus-orange/30 sm:w-[min(100%,28rem)] lg:w-[min(100%,36rem)]">
                        </div>
                        <div class="pointer-events-none absolute -inset-3 z-0 rounded-3xl bg-gradient-to-tr from-impetus-teal/20 to-impetus-orange/20 blur-2xl"></div>
                        <img src="{{ asset('images/CNE-Banner.jpeg') }}" alt="CNE Certification"
                            class="relative z-10 h-full w-full min-h-[22rem] rounded-2xl object-cover object-center shadow-2xl ring-1 ring-white/60 sm:min-h-[26rem] lg:min-h-[36rem]">

                        {{-- Floating accreditation badge --}}
                        <div class="absolute -bottom-5 left-5 z-20 hidden items-center gap-3 rounded-2xl border border-impetus-teal/10 bg-white/90 px-4 py-3 shadow-xl backdrop-blur sm:flex">
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-impetus-teal text-white shadow-md">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                            </span>
                            <div>
                                <p class="text-base font-extrabold leading-none text-impetus-teal font-outfit">Accredited</p>
                                <p class="mt-1 text-xs font-semibold text-slate-500">Recognized CNE Credits</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Purpose & Importance --}}
        <section class="border-y border-impetus-teal/10 bg-slate-50 py-16 sm:py-20">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto mb-12 max-w-3xl text-center">
                    <span class="mb-3 block text-sm font-bold uppercase tracking-widest text-impetus-orange font-outfit">Why It Matters</span>
                    <h2 class="text-2xl font-extrabold text-impetus-teal sm:text-3xl font-outfit">Purpose &amp; Importance</h2>
                </div>
                <div class="grid gap-12 grid-cols-1">
                    {{-- Purpose of CNE Certification --}}
                    <div
                        class="group overflow-hidden rounded-2xl border border-impetus-orange/20 bg-impetus-lightOrange shadow-md transition duration-300 hover:shadow-xl lg:grid lg:grid-cols-12 lg:items-stretch">
                        <div
                            class="lg:col-span-7 lg:border-r lg:border-impetus-orange/20 bg-impetus-lightOrange flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('images/CNE-certification-purposes.jpeg') }}"
                                alt="Purpose of CNE Certification" class="h-48 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-64 lg:h-full">
                        </div>
                        <div class="p-6 sm:p-10 lg:p-8 lg:col-span-5 lg:flex lg:flex-col lg:justify-center">
                            <div class="mb-6 flex items-center gap-4">
                                <div
                                    class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-impetus-orange text-white shadow-md">
                                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-slate-600 sm:text-base">
                                        Structured to drive concrete, high-quality skill benchmarks, CNE certification
                                        focuses on core performance goals:
                                    </p>
                                </div>
                            </div>
                            <ul class="space-y-4">
                                @foreach (['To promote continuous professional development among nurses', 'To update clinical knowledge and practical skills', 'To improve the quality of patient care and safety standards', 'To strengthen competency in specialized nursing areas', 'To meet regulatory and professional education requirements'] as $purpose)
                                    <li class="flex items-start gap-3">
                                        <span
                                            class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-impetus-orange text-white">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.5 12.75l6 6 9-13.5" />
                                            </svg>
                                        </span>
                                        <p class="text-sm leading-relaxed text-slate-600 text-justify">{{ $purpose }}
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    {{-- Importance of CNE Certification --}}
                    <div
                        class="group overflow-hidden rounded-2xl border border-impetus-teal/15 bg-white shadow-md transition duration-300 hover:shadow-xl lg:grid lg:grid-cols-12 lg:items-stretch">
                        <div class="p-6 sm:p-10 lg:p-8 lg:col-span-5 lg:order-first lg:flex lg:flex-col lg:justify-center">
                            <div class="mb-6 flex items-center gap-4">
                                <div
                                    class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-impetus-teal text-white shadow-md">
                                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-widest text-impetus-teal font-outfit">
                                        High Clinical Standards</p>
                                    <h2 class="text-2xl font-extrabold text-impetus-teal font-outfit">Importance of CNE
                                        Certification</h2>
                                </div>
                            </div>
                            <p class="mb-6 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                                CNE certification plays a vital role in ensuring that nursing professionals maintain high
                                standards of practice by regularly updating their knowledge and skills. It enhances career
                                development, professional credibility, and clinical confidence while contributing to
                                improved healthcare outcomes and patient safety.
                            </p>
                            <div class="rounded-xl bg-impetus-teal p-5">
                                <p
                                    class="text-sm italic leading-relaxed text-white/90 text-justify sm:text-base font-outfit">
                                    “Overall, CNE certification reflects a commitment to lifelong learning and excellence in
                                    nursing practice.”
                                </p>
                            </div>
                        </div>
                        <div
                            class="lg:col-span-7 lg:border-l lg:border-impetus-teal/15 lg:order-last bg-impetus-teal-muted/30 flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('images/importance-cne-certification.jpeg') }}"
                                alt="Importance of CNE Certification" class="h-48 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-64 lg:h-full">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Certification Journey --}}
        <section class="py-16 sm:py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto mb-12 max-w-3xl text-center">
                    <span
                        class="mb-3 block text-sm font-bold uppercase tracking-widest text-impetus-orange font-outfit">Step-By-Step
                        Path</span>
                    <h2 class="text-2xl font-extrabold text-impetus-teal sm:text-3xl font-outfit">Certification Journey</h2>
                    <p class="mt-4 text-sm leading-relaxed text-slate-600 text-justify sm:text-center sm:text-base">
                        To empower nurses with continuous learning opportunities that promote excellence in practice,
                        improve healthcare outcomes, and support professional advancement in a dynamic healthcare landscape.
                    </p>
                </div>

                @php
                    $cneSteps = [
                        [
                            'num' => '1',
                            'title' => 'Register',
                            'desc' => 'Create your account and complete the registration process',
                            'theme' => 'teal',
                            'icon' => 'user-plus',
                        ],
                        [
                            'num' => '2',
                            'title' => 'Purchase a Module',
                            'desc' => 'Choose and purchase the CNE module of your choice',
                            'theme' => 'orange',
                            'icon' => 'shopping-cart',
                        ],
                        [
                            'num' => '3',
                            'title' => 'Take Pre-Test',
                            'desc' => 'Assess your baseline knowledge through the pre-test',
                            'theme' => 'teal',
                            'icon' => 'clipboard-question',
                        ],
                        [
                            'num' => '4',
                            'title' => 'Use Learning Resources',
                            'desc' => 'Study the provided resources to build your knowledge',
                            'theme' => 'orange',
                            'icon' => 'book-open',
                        ],
                        [
                            'num' => '5',
                            'title' => 'Practice MCQs',
                            'desc' => 'Practice multiple-choice questions to reinforce your understanding',
                            'theme' => 'orange',
                            'icon' => 'clipboard-check',
                        ],
                        [
                            'num' => '6',
                            'title' => 'Take Mock Exam',
                            'desc' => 'Evaluate your preparation with a mock examination',
                            'theme' => 'teal',
                            'icon' => 'mock-exam',
                        ],
                        [
                            'num' => '7',
                            'title' => 'Complete Final Exam',
                            'desc' => 'Take and pass the final exam to earn your credits',
                            'theme' => 'orange',
                            'icon' => 'final-exam',
                        ],
                        [
                            'num' => '8',
                            'title' => 'Download CNE Certificate',
                            'desc' => 'Download your digital CNE certificate instantly',
                            'theme' => 'teal',
                            'icon' => 'download',
                        ],
                    ];
                    $journeyRows = array_chunk($cneSteps, 4);
                @endphp

                {{-- Desktop Layout (lg:block hidden) --}}
                <div
                    class="relative hidden lg:block border border-impetus-teal/80 rounded-[2rem] bg-white px-12 py-16 shadow-sm mt-12">
                    <!-- Header sitting on the top border -->
                    <div class="absolute -top-5 left-1/2 -translate-x-1/2 bg-white px-6 text-center">
                        <h3 class="text-xl md:text-2xl font-extrabold text-impetus-teal font-outfit whitespace-nowrap">
                            Process of CNE Certification
                        </h3>
                        <div class="w-10 h-1 bg-impetus-orange rounded-full mx-auto mt-1.5"></div>
                    </div>

                    <div class="relative overflow-visible">
                        <!-- Row 1 Grid -->
                        <div class="grid grid-cols-4 gap-x-6 relative z-10 items-start">
                            @foreach ($journeyRows[0] as $stepIndex => $step)
                                @php
                                    $isTeal = $step['theme'] === 'teal';
                                @endphp
                                <div class="relative flex flex-col items-center">
                                    <!-- Card -->
                                    <div
                                        class="relative w-full bg-white rounded-2xl border border-slate-100 shadow-sm transition hover:shadow-md hover:-translate-y-0.5 duration-300 flex flex-col items-center pt-8 pb-5 px-4">
                                        <!-- Number Badge -->
                                        <div @class([
                                            'absolute -top-4 left-1/2 -translate-x-1/2 flex h-8 w-8 items-center justify-center rounded-full text-sm font-extrabold text-white shadow-md ring-4 ring-white z-30',
                                            'bg-impetus-teal' => $isTeal,
                                            'bg-impetus-orange' => !$isTeal,
                                        ])>
                                            <span>{{ $step['num'] }}</span>
                                        </div>

                                        <!-- Icon Circle -->
                                        <div @class([
                                            'flex h-16 w-16 items-center justify-center rounded-full text-white shadow-md mb-4',
                                            'bg-impetus-teal' => $isTeal,
                                            'bg-impetus-orange' => !$isTeal,
                                        ])>
                                            @if ($step['icon'] === 'user-plus')
                                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="1.8">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                                </svg>
                                            @elseif ($step['icon'] === 'shopping-cart')
                                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="1.8">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                                </svg>
                                            @elseif ($step['icon'] === 'clipboard-question')
                                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="1.8">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 11h.01M12 14v-1a1 1 0 011-1h.5a1.5 1.5 0 000-3h-1.5a1.5 1.5 0 00-1.5 1.5M12 17h.01" />
                                                </svg>
                                            @elseif ($step['icon'] === 'book-open')
                                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="1.8">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                                </svg>
                                            @endif
                                        </div>

                                        <!-- Text -->
                                        <h4
                                            class="text-sm font-extrabold text-impetus-teal font-outfit mb-1 leading-snug text-center">
                                            {{ $step['title'] }}
                                        </h4>
                                        <p class="text-xs text-slate-500 font-medium leading-relaxed text-center">
                                            {{ $step['desc'] }}
                                        </p>
                                    </div>

                                    <!-- Arrow between cards (for steps 1, 2, 3) -->
                                    @if ($stepIndex < 3)
                                        <div
                                            class="absolute top-10 -right-4 flex items-center justify-center text-impetus-teal pointer-events-none z-20">
                                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" stroke-width="2.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <!-- Connector: step 4 → step 5 (down from card 4, across, down into card 5 only) -->
                        <div class="relative z-20 my-2 h-10 overflow-visible pointer-events-none" aria-hidden="true">
                            {{-- Down from card 4 --}}
                            <div
                                class="absolute top-0 right-[calc((100%-4.5rem)/8)] h-1/2 w-0.5 translate-x-1/2 bg-impetus-teal">
                            </div>

                            {{-- Across between rows --}}
                            <div
                                class="absolute top-1/2 left-[calc((100%-4.5rem)/8)] right-[calc((100%-4.5rem)/8)] -translate-y-1/2 h-0.5 bg-impetus-teal">
                            </div>

                            {{-- Down into card 5 (left end only) --}}
                            <div
                                class="absolute bottom-1 top-1/2 left-[calc((100%-4.5rem)/8)] w-0.5 -translate-x-1/2 bg-impetus-teal">
                            </div>

                            <div
                                class="absolute top-1/2 left-[58%] -translate-x-1/2 -translate-y-1/2 text-impetus-teal">
                                <svg class="h-4 w-4 rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </div>

                            <div
                                class="absolute top-0 right-[calc((100%-4.5rem)/8)] z-30 translate-x-1/2 -translate-y-1/2 text-impetus-teal">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" />
                                </svg>
                            </div>

                            <div
                                class="absolute bottom-1 left-[calc((100%-4.5rem)/8)] z-30 -translate-x-1/2 text-impetus-teal">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" />
                                </svg>
                            </div>
                        </div>

                        <!-- Row 2 Grid -->
                        <div class="grid grid-cols-4 gap-x-6 relative z-10 items-start pt-5">
                            @foreach ($journeyRows[1] as $stepIndex => $step)
                                @php
                                    $isTeal = $step['theme'] === 'teal';
                                @endphp
                                <div class="relative flex flex-col items-center">
                                    <!-- Card -->
                                    <div
                                        class="relative w-full bg-white rounded-2xl border border-slate-100 shadow-sm transition hover:shadow-md hover:-translate-y-0.5 duration-300 flex flex-col items-center pt-8 pb-5 px-4">
                                        <!-- Number Badge -->
                                        <div @class([
                                            'absolute -top-4 left-1/2 -translate-x-1/2 flex h-8 w-8 items-center justify-center rounded-full text-sm font-extrabold text-white shadow-md ring-4 ring-white z-30',
                                            'bg-impetus-teal' => $isTeal,
                                            'bg-impetus-orange' => !$isTeal,
                                        ])>
                                            <span>{{ $step['num'] }}</span>
                                        </div>

                                        <!-- Icon Circle -->
                                        <div @class([
                                            'flex h-16 w-16 items-center justify-center rounded-full text-white shadow-md mb-4',
                                            'bg-impetus-teal' => $isTeal,
                                            'bg-impetus-orange' => !$isTeal,
                                        ])>
                                            @if ($step['icon'] === 'clipboard-check')
                                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="1.8">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4m-4-4h4" />
                                                </svg>
                                            @elseif ($step['icon'] === 'mock-exam')
                                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="1.8">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 11.5L7 8.5L12 5.5L17 8.5L12 11.5zm0 0v3.5" />
                                                </svg>
                                            @elseif ($step['icon'] === 'final-exam')
                                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="1.8">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                            @elseif ($step['icon'] === 'download')
                                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="1.8">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                </svg>
                                            @endif
                                        </div>

                                        <!-- Text -->
                                        <h4
                                            class="text-sm font-extrabold text-impetus-teal font-outfit mb-1 leading-snug text-center">
                                            {{ $step['title'] }}
                                        </h4>
                                        <p class="text-xs text-slate-500 font-medium leading-relaxed text-center">
                                            {{ $step['desc'] }}
                                        </p>
                                    </div>

                                    <!-- Arrow between cards (for steps 5, 6, 7) -->
                                    @if ($stepIndex < 3)
                                        <div
                                            class="absolute top-10 -right-4 flex items-center justify-center text-impetus-teal pointer-events-none z-20">
                                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" stroke-width="2.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Mobile/Tablet Layout (lg:hidden) --}}
                <div class="lg:hidden mt-8">
                    <div class="relative border border-impetus-teal/80 rounded-[2rem] bg-white px-6 py-12 shadow-sm">
                        <!-- Header sitting on the top border -->
                        <div class="absolute -top-5 left-1/2 -translate-x-1/2 bg-white px-6 text-center">
                            <h3 class="text-lg md:text-xl font-extrabold text-impetus-teal font-outfit whitespace-nowrap">
                                Process of CNE Certification
                            </h3>
                            <div class="w-8 h-1 bg-impetus-orange rounded-full mx-auto mt-1.5"></div>
                        </div>

                        <!-- Vertical Timeline -->
                        <div class="relative space-y-6 mt-4">
                            <!-- Vertical Connector Line -->
                            <div class="absolute left-5 top-4 bottom-4 w-0.5 bg-impetus-teal z-0"></div>

                            @foreach ($cneSteps as $step)
                                @php
                                    $isTeal = $step['theme'] === 'teal';
                                @endphp
                                <div class="relative flex items-center gap-5 z-10">
                                    <!-- Step Number Badge on the Line -->
                                    <div @class([
                                        'flex h-10 w-10 shrink-0 items-center justify-center rounded-full text-base font-extrabold text-white shadow-md ring-4 ring-white transition duration-300 hover:scale-105',
                                        'bg-impetus-teal' => $isTeal,
                                        'bg-impetus-orange' => !$isTeal,
                                    ])>
                                        <span>{{ $step['num'] }}</span>
                                    </div>

                                    <!-- Step Card -->
                                    <div
                                        class="flex-1 bg-white border border-slate-100 rounded-2xl shadow-sm hover:shadow-md transition duration-300 flex items-stretch overflow-hidden">
                                        <!-- Left side icon panel matching the homepage CNE module card style -->
                                        <div class="relative flex w-20 shrink-0 items-center justify-center py-4">
                                            <div @class([
                                                'absolute inset-y-2.5 left-2.5 right-2.5 rounded-2xl',
                                                'bg-impetus-teal-muted/60' => $isTeal,
                                                'bg-impetus-lightOrange/70' => !$isTeal,
                                            ])></div>
                                            <div @class([
                                                'relative flex h-12 w-12 items-center justify-center rounded-full text-white shadow-md transition duration-300 hover:scale-105 z-10',
                                                'bg-impetus-teal' => $isTeal,
                                                'bg-impetus-orange' => !$isTeal,
                                            ])>
                                                @if ($step['icon'] === 'user-plus')
                                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor" stroke-width="1.8">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                                    </svg>
                                                @elseif ($step['icon'] === 'shopping-cart')
                                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor" stroke-width="1.8">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                                    </svg>
                                                @elseif ($step['icon'] === 'clipboard-question')
                                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor" stroke-width="1.8">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 11h.01M12 14v-1a1 1 0 011-1h.5a1.5 1.5 0 000-3h-1.5a1.5 1.5 0 00-1.5 1.5M12 17h.01" />
                                                    </svg>
                                                @elseif ($step['icon'] === 'book-open')
                                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor" stroke-width="1.8">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                                    </svg>
                                                @elseif ($step['icon'] === 'clipboard-check')
                                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor" stroke-width="1.8">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4m-4-4h4" />
                                                    </svg>
                                                @elseif ($step['icon'] === 'mock-exam')
                                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor" stroke-width="1.8">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 11.5L7 8.5L12 5.5L17 8.5L12 11.5zm0 0v3.5" />
                                                    </svg>
                                                @elseif ($step['icon'] === 'final-exam')
                                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor" stroke-width="1.8">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                @elseif ($step['icon'] === 'download')
                                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor" stroke-width="1.8">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                    </svg>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex flex-col justify-center py-4 pr-4 pl-1 min-w-0 flex-1">
                                            <h4
                                                class="text-sm font-extrabold text-impetus-teal font-outfit mb-0.5 leading-snug">
                                                {{ $step['title'] }}</h4>
                                            <p class="text-xs text-slate-500 font-medium leading-relaxed text-justify">
                                                {{ $step['desc'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- CTA Banner --}}
        <section class="bg-white py-16 sm:py-12">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div x-data class="relative flex flex-col items-center gap-6 overflow-hidden rounded-3xl bg-gradient-to-r from-impetus-orange to-impetus-orange-hover p-8 text-center shadow-xl sm:flex-row sm:justify-between sm:p-10 sm:text-left">
                    <div class="pointer-events-none absolute -right-10 -top-10 h-40 w-40 rounded-full bg-white/10 blur-2xl"></div>
                    <div class="pointer-events-none absolute -bottom-12 left-1/3 h-40 w-40 rounded-full bg-white/10 blur-2xl"></div>
                    <div class="relative flex items-center gap-4">
                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-white/20 text-white">
                            <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="text-base leading-relaxed !text-white sm:text-left text-justify">
                                Register, complete your modules, and earn your CNE certificate with confidence.
                            </p>
                        </div>
                    </div>
                    <button type="button" @click="$dispatch('open-register-modal')"
                        class="group relative inline-flex shrink-0 items-center gap-2 rounded-full bg-white px-6 py-3 text-sm font-bold text-impetus-orange shadow-lg transition duration-300 hover:scale-105 hover:shadow-xl font-outfit">
                        Register Now
                        <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </button>
                </div>
            </div>
        </section>
    </main>
@endsection
