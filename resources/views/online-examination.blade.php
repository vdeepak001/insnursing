@extends('layouts.frontend.app')

@section('title', 'Online Test - IHS')

@php
    $heroImage = asset('images/online-test/Online_test_Banner.png');
@endphp

@section('content')
    <main class="overflow-hidden bg-white font-sans antialiased text-slate-800">
        {{-- Hero Section --}}
        <section class="relative bg-impetus-teal-muted py-16 sm:py-16">
            <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-center gap-12 lg:grid-cols-2 lg:items-stretch lg:gap-16">
                    <div>
                        <p
                            class="mb-4 flex items-center gap-3 text-sm font-bold uppercase tracking-widest text-impetus-teal font-outfit">
                            <span class="h-px w-8 bg-impetus-teal"></span>
                            Online Test
                        </p>
                        <h1
                            class="mb-4 text-3xl font-extrabold leading-tight text-slate-800 sm:text-4xl lg:text-[2.75rem] font-outfit">
                            Smart Testing<br>
                            <span class="text-impetus-teal">Stronger Nursing Career</span>
                        </h1>
                        <p class="mb-6 text-sm leading-relaxed text-slate-600 sm:text-base">
                            Our Online Test Platform is designed to help nursing professionals assess their knowledge,
                            strengthen skills, and achieve certification with confidence.
                        </p>

                        <div class="space-y-5 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                            <p>
                                An <strong>online test</strong> in Continuing Nursing Education is a structured
                                digital assessment conducted through an online learning platform to evaluate the knowledge,
                                understanding, and clinical competency of nurses and healthcare professionals after
                                completing a training module or course. It is an essential component of outcome-based
                                learning and is used to measure the effectiveness of the educational program.
                            </p>
                            <p>
                                Online CNE Test are designed using evidence-based nursing content and are aligned with
                                current clinical guidelines and competency standards. These assessments typically include
                                multiple-choice questions, case-based questions, scenario-based problem solving, and
                                application-oriented clinical questions that reflect real-life healthcare situations.
                            </p>
                        </div>

                        <div class="mt-8 grid grid-cols-2 gap-3 sm:grid-cols-4">
                            @foreach ([
            ['label' => 'Learn', 'icon' => 'M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25'],
            ['label' => 'Practice', 'icon' => 'M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z'],
            ['label' => 'Assess', 'icon' => 'M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z'],
            ['label' => 'Succeed', 'icon' => 'M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0V8.25a3 3 0 00-3-3H6.75a3 3 0 00-3 3v10.5a3 3 0 003 3h9.75z'],
        ] as $step)
                                <div
                                    class="flex flex-col items-center gap-2 rounded-xl border border-impetus-teal/10 bg-impetus-teal-muted/40 px-2 py-3 text-center">
                                    <span
                                        class="flex h-9 w-9 items-center justify-center rounded-full border-2 border-impetus-teal text-impetus-teal">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $step['icon'] }}" />
                                        </svg>
                                    </span>
                                    <span class="text-xs font-bold text-slate-700">{{ $step['label'] }}</span>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                            <a href="{{ route('cne.modules') }}"
                                class="inline-flex items-center justify-center gap-2 rounded-full bg-impetus-orange px-7 py-3.5 text-sm font-bold text-white shadow-lg shadow-impetus-orange/25 transition hover:bg-impetus-orange-hover font-outfit">
                                Start Online Test
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                            <a href="{{ route('practice.test') }}"
                                class="inline-flex items-center justify-center gap-2 rounded-full border-2 border-impetus-teal bg-white px-7 py-3.5 text-sm font-bold text-impetus-teal transition hover:bg-impetus-teal-muted font-outfit">
                                View All Tests
                            </a>
                        </div>
                    </div>

                    <div class="relative w-full self-stretch overflow-hidden rounded-2xl shadow-2xl ring-1 ring-white/60 min-h-[22rem] sm:min-h-[26rem] lg:min-h-[36rem]">
                        <img src="{{ $heroImage }}" alt="Online CNE Test"
                            class="absolute top-0 left-0 w-full h-[120%] object-cover object-top">
                    </div>
                </div>
            </div>
        </section>

        {{-- Purpose, Benefits & Features --}}
        <section class="border-y border-impetus-teal/10 bg-slate-50 py-16 sm:py-20">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="space-y-12 lg:space-y-16">
                    {{-- Purpose: image left, content right --}}
                    <div class="grid items-center gap-8 lg:grid-cols-2 lg:items-stretch lg:gap-12">
                        <div class="order-2 lg:order-1">
                            <img src="{{ asset('images/online-test/Purpose of _online_Test.png') }}"
                                alt="Purpose of Online CNE Test"
                                class="w-full rounded-2xl object-cover shadow-xl ring-1 ring-impetus-teal/10 lg:h-full"
                                loading="lazy">
                        </div>
                        <div class="order-1 lg:order-2">
                            <div class="mb-4 flex items-center gap-3">
                                <div
                                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-impetus-teal text-white shadow-md">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9.75h.008v.008H12V9.75z" />
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-extrabold text-impetus-teal font-outfit">Purpose of Online CNE Test
                                </h2>
                            </div>
                            <p class="mb-5 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                                Aligned with international clinical guidelines and continuous education frameworks, these
                                digital assessments secure critical educational outcomes:
                            </p>
                            <ul class="space-y-3">
                                @foreach (['To assess learners\' understanding of course content', 'To evaluate clinical knowledge and decision-making ability', 'To ensure achievement of learning outcomes', 'To support certification and continuing professional development requirements', 'To maintain standards of nursing education and competency'] as $purpose)
                                    <li class="flex items-start gap-2 text-sm text-slate-600 sm:text-base">
                                        <span
                                            class="mt-1 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-impetus-teal text-white">
                                            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.5 12.75l6 6 9-13.5" />
                                            </svg>
                                        </span>
                                        <span class="text-justify">{{ $purpose }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    {{-- Benefits: image only --}}
                    <img src="{{ asset('images/online-test/Benefits of online_test.png') }}"
                        alt="Benefits of Online CNE Test"
                        class="mx-auto w-full rounded-2xl object-contain shadow-xl ring-1 ring-impetus-orange/15"
                        loading="lazy">

                    {{-- Features: image left, content right --}}
                    <div class="grid items-center gap-8 lg:grid-cols-2 lg:items-stretch lg:gap-12">
                        <div class="relative order-2 lg:order-1">
                            <img src="{{ asset('images/online-test/Features of online test.png') }}"
                                alt="Features of Online CNE Test"
                                class="w-full rounded-2xl object-cover shadow-xl ring-1 ring-impetus-teal/10 lg:absolute lg:inset-0 lg:h-full"
                                loading="lazy">
                        </div>
                        <div class="order-1 lg:order-2">
                            <div class="mb-4 flex items-center gap-3">
                                <div
                                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-impetus-teal text-white shadow-md">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-extrabold text-impetus-teal font-outfit">Features of Online CNE
                                    Test</h2>
                            </div>
                            <p class="mb-5 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                                Our examination platform is built with rigorous protocols to deliver fair, robust, and
                                easily
                                navigable evaluations.
                            </p>
                            <ul class="grid gap-4 sm:grid-cols-2">
                                @foreach ([['title' => 'Fully Digital Access', 'text' => 'Fully digital and accessible through online platforms, eliminating physical test center constraints.'], ['title' => 'Flexible Formats', 'text' => 'Choose between time-bound proctored models or highly flexible, self-paced competency assessments.'], ['title' => 'Automated Evaluation', 'text' => 'Instant results, interactive performance scorecards, and immediate feedback rationales are delivered automatically.'], ['title' => 'Integrity-Secured Portal', 'text' => 'Protected login portals and integrated proctoring workflows maintain assessment integrity at all levels.'], ['title' => 'Randomized Questions', 'text' => 'Each attempt dynamically shuffles the question pool and answers to ensure complete transparency and fairness.'], ['title' => 'Holistic Concept Coverage', 'text' => 'Comprehensive assessment mapped thoroughly to encompass both critical theory and practical clinical decisions.']] as $feature)
                                    <li class="flex items-start gap-3">
                                        <span @class([
                                            'mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full text-white',
                                            'bg-impetus-teal' => $loop->even,
                                            'bg-impetus-orange' => $loop->odd,
                                        ])>
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.5 12.75l6 6 9-13.5" />
                                            </svg>
                                        </span>
                                        <div>
                                            <h3 class="text-sm font-bold text-slate-800 font-outfit sm:text-base">
                                                {{ $feature['title'] }}</h3>
                                            <p class="mt-0.5 text-sm text-slate-600 text-justify sm:text-base">
                                                {{ $feature['text'] }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Questions Difficulty Hierarchy --}}
        <section class="py-16 sm:py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto mb-12 max-w-3xl text-center">
                    <span
                        class="mb-3 block text-sm font-bold uppercase tracking-widest text-impetus-orange font-outfit">Rigorous
                        Taxonomy</span>
                    <h2 class="text-2xl font-extrabold text-impetus-teal sm:text-3xl font-outfit">Questions Difficulty
                        Hierarchy</h2>
                    <p class="mt-4 text-sm leading-relaxed text-slate-600 text-justify sm:text-center sm:text-base">
                        Online CNE Test are divided into three distinct diagnostic tiers to evaluate a candidate's holistic
                        clinical mastery.
                    </p>
                </div>

                <img src="{{ asset('images/online-test/Level of questions.png') }}"
                    alt="Questions Based on Difficulty Hierarchy"
                    class="mx-auto w-full rounded-2xl object-contain shadow-lg ring-1 ring-impetus-teal/10"
                    loading="lazy">

                <div class="mt-12 rounded-2xl bg-impetus-teal p-6 text-white shadow-lg sm:p-8">
                    <div class="flex flex-col items-stretch gap-4">
                        <div>
                            <h3 class="text-center text-lg font-extrabold text-impetus-orange font-outfit sm:text-xl">
                                Automated Feedback &amp; Detailed Scoring Rationale</h3>
                            <p class="mt-2 text-sm leading-relaxed text-white/90 text-center sm:text-base">
                                Immediate scoring and grading will be provided upon completion of the test, allowing
                                test-takers to identify areas of strength and weakness. This feedback is highly valuable for
                                self-evaluation, continuous improvement, and target CNE credit calculations.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- CTA Banner --}}
        <section class="bg-white py-16 sm:py-12">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div
                    class="flex flex-col items-center gap-6 rounded-3xl bg-impetus-orange p-8 text-center shadow-lg sm:flex-row sm:justify-between sm:p-10 sm:text-left">
                    <div class="flex items-center gap-4">
                        <div
                            class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-white/20 text-white">
                            <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="text-base leading-relaxed !text-white sm:text-left text-justify">
                                Online Test in CNE play a vital role in ensuring that healthcare professionals achieve
                                required competencies and maintain high standards of clinical practice. They help validate
                                learning outcomes and contribute to improved patient care, professional growth, and lifelong
                                learning in nursing education.
                            </p>
                        </div>
                    </div>
                    <a href="{{ route('cne.modules') }}"
                        class="inline-flex shrink-0 items-center gap-2 rounded-full bg-white px-6 py-3 text-sm font-bold text-impetus-orange shadow-lg transition hover:scale-105 font-outfit whitespace-nowrap">
                        Start Online Test
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection
