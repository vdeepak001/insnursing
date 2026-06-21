@extends('layouts.frontend.app')

@section('title', 'CNE Practice Test - IHS')

@php
    $heroImage = asset('images/design/WhatsApp Image 2026-06-11 at 17.26.40.jpeg');
@endphp

@section('content')
    <main class="overflow-hidden bg-white font-sans antialiased text-slate-800">
        <section class="relative bg-impetus-teal-muted py-16 sm:py-24">
            <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
                    <div>
                        <p class="mb-4 flex items-center gap-3 text-sm font-bold uppercase tracking-widest text-impetus-teal font-outfit">
                            <span class="h-px w-8 bg-impetus-teal"></span>
                            Self-Assessment Tools
                        </p>
                        <h1 class="mb-6 text-3xl font-extrabold leading-tight text-impetus-teal sm:text-4xl lg:text-[2.75rem] font-outfit">
                            CNE Practice Test
                        </h1>

                        <div class="space-y-5 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                            <p>
                                <strong>Practice Test</strong> in Online Continuing Nursing Education (CNE) are structured
                                assessment tools designed to evaluate and reinforce the knowledge and clinical understanding
                                of nurses and healthcare professionals during and after training modules. These Test are an
                                essential part of the learning process, enabling learners to assess their progress, identify
                                knowledge gaps, and strengthen their competency in various nursing and healthcare domains.
                            </p>
                            <p>
                                Online CNE practice Test are typically based on evidence-based guidelines and standardized
                                curricula. They include multiple-choice questions, case-based scenarios, clinical
                                problem-solving exercises, and situation-based questions that reflect real-world healthcare
                                practice. These assessments help learners apply theoretical knowledge to practical clinical
                                situations.
                            </p>
                        </div>

                        <a href="{{ route('cne.modules') }}"
                            class="mt-8 inline-flex items-center gap-2 rounded-full bg-impetus-orange px-7 py-3.5 text-sm font-bold text-white shadow-lg shadow-impetus-orange/25 transition hover:bg-impetus-orange-hover font-outfit">
                            Start Practice Test
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>

                    <div class="relative mx-auto w-full max-w-lg">
                        <div class="absolute -right-2 top-8 z-20 rounded-xl border border-impetus-teal/15 bg-white p-3 shadow-lg">
                            <p class="text-[10px] font-bold uppercase tracking-wider text-impetus-teal">Time Left</p>
                            <p class="text-lg font-extrabold text-slate-800 font-outfit">00:45:30</p>
                        </div>
                        <div class="absolute -left-2 bottom-20 z-20 rounded-xl border border-impetus-teal/15 bg-white p-3 shadow-lg">
                            <p class="text-[10px] font-bold text-impetus-teal">Progress 15 / 50</p>
                            <div class="mt-2 h-1.5 w-24 overflow-hidden rounded-full bg-impetus-teal-muted">
                                <div class="h-full w-[30%] rounded-full bg-impetus-teal"></div>
                            </div>
                        </div>
                        <div class="absolute left-1/2 top-1/2 h-72 w-72 -translate-x-1/2 -translate-y-1/2 rounded-full border-2 border-impetus-teal/20"></div>
                        <img src="{{ $heroImage }}" alt="CNE Practice Test"
                            class="relative z-10 mx-auto h-auto w-full max-w-md rounded-2xl object-cover shadow-xl">
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 sm:py-20">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-stretch gap-8 lg:grid-cols-2">
                    <div class="rounded-2xl border border-impetus-orange/20 bg-impetus-lightOrange p-6 shadow-md sm:p-8">
                        <div class="mb-6 flex h-14 w-14 items-center justify-center rounded-2xl bg-impetus-orange text-white shadow-md">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="mb-4 text-2xl font-extrabold text-impetus-teal font-outfit sm:text-3xl">Purpose of Practice Test</h3>
                        <p class="mb-6 text-base leading-relaxed text-slate-600 text-justify">
                            Structured to solidify understanding and verify active nursing competency, our practice
                            assessments serve several fundamental goals:
                        </p>
                        <ul class="space-y-3">
                            @foreach ([
                                'To assess understanding of course content',
                                'To reinforce key clinical concepts and guidelines',
                                'To identify areas requiring further study',
                                'To improve critical thinking and decision-making skills',
                                'To prepare learners for final assessments or certification examinations',
                            ] as $purpose)
                                <li class="flex items-start gap-3 rounded-xl border border-impetus-orange/15 bg-white/80 p-3">
                                    <span class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-impetus-orange text-white">
                                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </span>
                                    <span class="text-sm leading-relaxed text-slate-600 text-justify sm:text-base">{{ $purpose }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="rounded-2xl border border-impetus-teal/15 bg-impetus-teal-muted/40 p-6 shadow-md sm:p-8">
                        <div class="mb-6 flex h-14 w-14 items-center justify-center rounded-2xl bg-impetus-teal text-white shadow-md">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                        </div>
                        <h3 class="mb-4 text-2xl font-extrabold text-impetus-teal font-outfit sm:text-3xl">Benefits of Practice Test</h3>
                        <p class="mb-6 text-base leading-relaxed text-slate-600 text-justify">
                            Designed to accelerate your learning journey and build confidence, practicing regularly delivers
                            key advantages:
                        </p>
                        <ul class="space-y-3">
                            @foreach ([
                                ['title' => 'Enhances Retention', 'text' => 'Enhances retention of clinical knowledge.'],
                                ['title' => 'Builds Clinical Confidence', 'text' => 'Builds confidence in handling real-life clinical situations.'],
                                ['title' => 'Improves Decision Pacing', 'text' => 'Improves accuracy and speed in clinical decision-making.'],
                                ['title' => 'Supports Self-Evaluation', 'text' => 'Supports continuous self-evaluation and improvement.'],
                                ['title' => 'Exam Readiness', 'text' => 'Strengthens readiness for professional certification exams.'],
                            ] as $benefit)
                                <li class="flex gap-3 rounded-xl border border-impetus-teal/10 bg-white/80 p-3">
                                    <span class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-impetus-teal text-white">
                                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </span>
                                    <div>
                                        <h4 class="text-sm font-bold text-slate-800 font-outfit sm:text-base">{{ $benefit['title'] }}</h4>
                                        <p class="mt-1 text-sm text-slate-600 text-justify">{{ $benefit['text'] }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="border-y border-impetus-teal/10 bg-slate-50 py-16 sm:py-20">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <h2 class="mb-4 text-center text-2xl font-extrabold text-impetus-teal sm:text-3xl font-outfit">Features of Online CNE Practice Test</h2>
                <p class="mx-auto mb-10 max-w-3xl text-center text-sm text-slate-600 sm:text-base">
                    Engineered to provide a rich educational ecosystem, our practice assessments leverage evidence-based
                    standards to deliver optimal clinical learning.
                </p>
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ([
                        ['title' => 'Module-Wise Sets', 'text' => 'Topic-wise and module-wise question sets are tailored specifically to match every target knowledge domain in your CNE training modules.'],
                        ['title' => 'Flexible Assessments', 'text' => 'Enjoy self-paced learning with no constraints, or take time-bound practice assessments to simulate high-pressure, real-world exams.'],
                        ['title' => 'Instant Analytics', 'text' => 'Obtain instant feedback, detailed scoring guides, and robust clinical performance analysis to identify strength areas and knowledge gaps.'],
                        ['title' => 'Case-Driven Scenarios', 'text' => 'Practice with clinical problem-solving exercises, case-based questions, and real-world scenario metrics that accurately mimic daily practice.'],
                        ['title' => 'Unlimited Re-Attempts', 'text' => 'Enjoy repeated learning attempts on complex topics, ensuring perfect knowledge retention and readiness for final certification exams.'],
                        ['title' => 'Universal Platform', 'text' => 'Seamlessly optimized and accessible anywhere through our online learning platforms via desktops, laptops, tablets, and smartphones.'],
                    ] as $feature)
                        <div class="rounded-2xl border border-impetus-teal/10 bg-white p-5 shadow-md">
                            <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-impetus-teal text-white">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-base font-bold text-impetus-teal font-outfit">{{ $feature['title'] }}</h3>
                            <p class="mt-2 text-sm leading-relaxed text-slate-600 text-justify">{{ $feature['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- CTA Banner --}}
        <section class="bg-impetus-orange py-8 sm:py-10">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="flex flex-col items-center gap-5 sm:flex-row sm:text-left text-center">
                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-white/20 text-white">
                        <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-base leading-relaxed !text-white sm:text-left text-justify">
                            Practice Test in Online Continuing Nursing Education (CNE) play a vital role in ensuring effective learning by transforming theoretical knowledge into practical understanding. They help nursing professionals stay competent, confident, and prepared to deliver safe and high-quality patient care in clinical settings.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
