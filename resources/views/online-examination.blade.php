@extends('layouts.frontend.app')

@section('title', 'Online Test - IHS')

@php
    $heroImage = asset('images/design/WhatsApp Image 2026-06-11 at 17.26.40.jpeg');
@endphp

@section('content')
    <main class="overflow-hidden bg-white font-sans antialiased text-slate-800">
        {{-- Hero Section --}}
        <section class="relative bg-white py-16 sm:py-24">
            <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
                    <div>
                        <p class="mb-4 flex items-center gap-3 text-sm font-bold uppercase tracking-widest text-impetus-teal font-outfit">
                            <span class="h-px w-8 bg-impetus-teal"></span>
                            Online Test
                        </p>
                        <h1 class="mb-4 text-3xl font-extrabold leading-tight text-impetus-teal sm:text-4xl lg:text-[2.75rem] font-outfit">
                            Smart Testing. Stronger Nursing Career.
                        </h1>
                        <p class="mb-6 text-sm leading-relaxed text-slate-600 sm:text-base">
                            Our Online Test Platform is designed to help nursing professionals assess their knowledge, strengthen skills, and achieve certification with confidence.
                        </p>

                        <div class="space-y-5 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                            <p>
                                An <strong>online test</strong> in Continuing Nursing Education (CNE) is a structured
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
                                <div class="flex flex-col items-center gap-2 rounded-xl border border-impetus-teal/10 bg-impetus-teal-muted/40 px-2 py-3 text-center">
                                    <span class="flex h-9 w-9 items-center justify-center rounded-full border-2 border-impetus-teal text-impetus-teal">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                            <a href="{{ route('practice.test') }}"
                                class="inline-flex items-center justify-center gap-2 rounded-full border-2 border-impetus-teal bg-white px-7 py-3.5 text-sm font-bold text-impetus-teal transition hover:bg-impetus-teal-muted font-outfit">
                                View All Tests
                            </a>
                        </div>
                    </div>

                    <div class="relative mx-auto w-full max-w-lg">
                        <div class="absolute -right-2 top-6 z-20 rounded-xl border border-impetus-teal/15 bg-white p-3 shadow-lg">
                            <p class="text-[10px] font-bold uppercase tracking-wider text-impetus-teal">Time Left</p>
                            <p class="text-lg font-extrabold text-slate-800 font-outfit">00:45:30</p>
                        </div>
                        <div class="absolute -left-2 top-1/3 z-20 rounded-xl border border-impetus-teal/15 bg-white p-3 shadow-lg">
                            <p class="text-[10px] font-bold uppercase tracking-wider text-impetus-teal">Progress</p>
                            <p class="text-sm font-bold text-slate-700">15 / 50 Questions</p>
                            <div class="mt-2 h-1.5 w-28 overflow-hidden rounded-full bg-impetus-teal-muted">
                                <div class="h-full w-[30%] rounded-full bg-impetus-teal"></div>
                            </div>
                        </div>
                        <div class="absolute -right-4 bottom-8 z-20 w-56 rounded-xl border border-impetus-teal/15 bg-white p-4 shadow-xl">
                            <p class="text-xs font-bold text-impetus-teal">Question 16 / 50</p>
                            <p class="mt-2 text-xs leading-snug text-slate-600">Which of the following is the primary purpose of hand hygiene?</p>
                            <div class="mt-3 space-y-1.5">
                                @foreach (['A. To clean hands', 'B. To remove dirt', 'C. To prevent infection', 'D. To dry hands'] as $option)
                                    <p @class([
                                        'rounded-lg border px-2 py-1 text-[10px]',
                                        'border-impetus-teal bg-impetus-teal-muted font-bold text-impetus-teal' => str_contains($option, 'C.'),
                                        'border-slate-200 text-slate-600' => ! str_contains($option, 'C.'),
                                    ])>{{ $option }}</p>
                                @endforeach
                            </div>
                            <span class="mt-3 inline-flex rounded-full bg-impetus-orange px-3 py-1 text-[10px] font-bold text-white">Next Question →</span>
                        </div>

                        <div class="absolute left-1/2 top-1/2 h-72 w-72 -translate-x-1/2 -translate-y-1/2 rounded-full border-2 border-impetus-teal/20"></div>
                        <img src="{{ $heroImage }}" alt="Online CNE Test"
                            class="relative z-10 mx-auto h-auto w-full max-w-md rounded-2xl object-cover shadow-xl">
                    </div>
                </div>
            </div>
        </section>

        {{-- Purpose, Benefits & Features --}}
        <section class="border-y border-impetus-teal/10 bg-slate-50 py-16 sm:py-20">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid gap-6 lg:grid-cols-3">
                    {{-- Purpose --}}
                    <div class="flex flex-col overflow-hidden rounded-2xl border border-impetus-teal/15 bg-impetus-teal-muted shadow-md">
                        <div class="flex flex-1 flex-col p-6">
                            <div class="mb-4 flex items-center gap-3">
                                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-impetus-teal text-white shadow-md">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75h.008v.008H12V9.75z" />
                                    </svg>
                                </div>
                                <h2 class="text-xl font-extrabold text-impetus-teal font-outfit">Purpose of Online CNE Test</h2>
                            </div>
                            <p class="mb-5 text-sm leading-relaxed text-slate-600 text-justify">
                                Aligned with international clinical guidelines and continuous education frameworks, these
                                digital assessments secure critical educational outcomes:
                            </p>
                            <ul class="space-y-3">
                                @foreach ([
                                    'To assess learners\' understanding of course content',
                                    'To evaluate clinical knowledge and decision-making ability',
                                    'To ensure achievement of learning outcomes',
                                    'To support certification and continuing professional development requirements',
                                    'To maintain standards of nursing education and competency',
                                ] as $purpose)
                                    <li class="flex items-start gap-2 text-sm text-slate-600">
                                        <span class="mt-1 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-impetus-teal text-white">
                                            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                            </svg>
                                        </span>
                                        <span class="text-justify">{{ $purpose }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="mt-6 flex justify-center">
                                <img src="{{ asset('images/factual-knowledge (2).jpeg') }}" alt="Online examination interface"
                                    class="h-36 w-full rounded-xl object-cover shadow-md" loading="lazy">
                            </div>
                        </div>
                        <div class="bg-impetus-teal px-4 py-3 text-center text-sm font-bold tracking-wider text-white font-outfit">
                            Assess • Improve • Excel
                        </div>
                    </div>

                    {{-- Benefits --}}
                    <div class="rounded-2xl border border-impetus-orange/20 bg-impetus-lightOrange p-6 shadow-md">
                        <div class="mb-4 flex items-center gap-3">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-impetus-orange text-white shadow-md">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-extrabold text-impetus-orange font-outfit">Benefits of Online CNE Test</h2>
                        </div>
                        <p class="mb-5 text-sm leading-relaxed text-slate-600 text-justify">
                            Designed to accelerate your learning journey and build confidence, practicing regularly delivers
                            key advantages:
                        </p>
                        <ul class="space-y-4">
                            @foreach ([
                                ['title' => 'Standardized Evaluation', 'text' => 'Provides objective and standardized assessment of learning.'],
                                ['title' => 'Enhanced Accountability', 'text' => 'Enhances accountability in professional education.'],
                                ['title' => 'Resource Efficiency', 'text' => 'Saves time and resources compared to traditional examinations.'],
                                ['title' => 'Universal Access', 'text' => 'Allows participation from any location.'],
                                ['title' => 'Continuous Progress Tracking', 'text' => 'Allows continuous monitoring of learning progress.'],
                                ['title' => 'Self-Discipline Habits', 'text' => 'Encourages self-discipline and focused study habits.'],
                            ] as $benefit)
                                <li class="flex items-start gap-3">
                                    <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-impetus-orange text-white">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </span>
                                    <div>
                                        <h3 class="text-sm font-bold text-slate-800 font-outfit">{{ $benefit['title'] }}</h3>
                                        <p class="mt-0.5 text-sm text-slate-600 text-justify">{{ $benefit['text'] }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Features --}}
                    <div class="rounded-2xl border border-impetus-teal/15 bg-white p-6 shadow-md">
                        <div class="mb-4 flex items-center gap-3">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-impetus-teal text-white shadow-md">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-extrabold text-impetus-teal font-outfit">Features of Online CNE Test</h2>
                        </div>
                        <p class="mb-5 text-sm leading-relaxed text-slate-600 text-justify">
                            Our examination platform is built with rigorous protocols to deliver fair, robust, and easily
                            navigable evaluations.
                        </p>
                        <ul class="space-y-4">
                            @foreach ([
                                ['title' => 'Fully Digital Access', 'text' => 'Fully digital and accessible through online platforms, eliminating physical test center constraints.'],
                                ['title' => 'Flexible Formats', 'text' => 'Choose between time-bound proctored models or highly flexible, self-paced competency assessments.'],
                                ['title' => 'Automated Evaluation', 'text' => 'Instant results, interactive performance scorecards, and immediate feedback rationales are delivered automatically.'],
                                ['title' => 'Integrity-Secured Portal', 'text' => 'Protected login portals and integrated proctoring workflows maintain assessment integrity at all levels.'],
                                ['title' => 'Randomized Questions', 'text' => 'Each attempt dynamically shuffles the question pool and answers to ensure complete transparency and fairness.'],
                                ['title' => 'Holistic Concept Coverage', 'text' => 'Comprehensive assessment mapped thoroughly to encompass both critical theory and practical clinical decisions.'],
                            ] as $feature)
                                <li class="flex items-start gap-3">
                                    <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-impetus-teal text-white">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </span>
                                    <div>
                                        <h3 class="text-sm font-bold text-slate-800 font-outfit">{{ $feature['title'] }}</h3>
                                        <p class="mt-0.5 text-sm text-slate-600 text-justify">{{ $feature['text'] }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        {{-- Questions Difficulty Hierarchy --}}
        <section class="py-16 sm:py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto mb-12 max-w-3xl text-center">
                    <span class="mb-3 block text-sm font-bold uppercase tracking-widest text-impetus-orange font-outfit">Rigorous Taxonomy</span>
                    <h2 class="text-2xl font-extrabold text-impetus-teal sm:text-3xl font-outfit">Questions Difficulty Hierarchy</h2>
                    <p class="mt-4 text-sm leading-relaxed text-slate-600 text-justify sm:text-center sm:text-base">
                        Online CNE Test are divided into three distinct diagnostic tiers to evaluate a candidate's holistic
                        clinical mastery.
                    </p>
                </div>

                <div class="grid gap-6 lg:grid-cols-3">
                    @foreach ([
                        ['tier' => 'Tier 1', 'title' => 'Level 1 - Factual Knowledge', 'theme' => 'orange', 'image' => 'images/factual-knowledge (1).jpeg', 'paragraphs' => [
                            'Focuses on the assessment of factual knowledge, evaluating the participant\'s foundational understanding of essential nursing concepts.',
                            'Supports accurate evaluation of basic theoretical knowledge required for safe and effective clinical nursing practice.',
                        ]],
                        ['tier' => 'Tier 2', 'title' => 'Level 2 - Functional Knowledge', 'theme' => 'teal', 'image' => 'images/factual-knowledge (2).jpeg', 'paragraphs' => [
                            'Focuses on the assessment of functional knowledge, measuring how well participants can apply learned concepts in practical nursing situations.',
                            'Focuses directly on the clinical application of skills and safety protocols in real-world healthcare scenarios.',
                        ]],
                        ['tier' => 'Tier 3', 'title' => 'Level 3 - Problem Solving', 'theme' => 'orange', 'image' => 'images/factual-knowledge (3).jpeg', 'paragraphs' => [
                            'Focuses on the assessment of problem-solving ability, challenging participants to use critical clinical judgement and decision-making in more complex scenarios.',
                            'Recognizes higher-order reasoning, immediate diagnostics, and advanced clinical application for professional development.',
                        ]],
                    ] as $level)
                        <article class="flex flex-col overflow-hidden rounded-2xl border border-impetus-teal/10 bg-white shadow-md">
                            <div class="relative h-44 overflow-hidden">
                                <img src="{{ asset($level['image']) }}" alt="{{ $level['title'] }}"
                                    class="h-full w-full object-cover" loading="lazy">
                                <span class="absolute bottom-3 left-4 rounded-full bg-white/90 px-3 py-1 text-xs font-bold uppercase tracking-wide text-impetus-teal">
                                    {{ $level['tier'] }}
                                </span>
                            </div>
                            <div class="flex flex-1 flex-col p-6">
                                <h3 @class([
                                    'mb-4 text-xl font-bold font-outfit',
                                    'text-impetus-orange' => $level['theme'] === 'orange',
                                    'text-impetus-teal' => $level['theme'] === 'teal',
                                ])>{{ $level['title'] }}</h3>
                                <div class="space-y-4 text-sm leading-relaxed text-slate-600 text-justify">
                                    @foreach ($level['paragraphs'] as $paragraph)
                                        <p>{{ $paragraph }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-12 rounded-2xl border-l-4 border-impetus-orange bg-impetus-lightOrange p-6 sm:p-8">
                    <div class="flex flex-col items-start gap-4 sm:flex-row sm:items-center">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-impetus-orange text-white shadow-md">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18V6.125c0-.621.504-1.125 1.125-1.125H9.75M9 5.25h6.75m-6.75 0a.75.75 0 00-.75.75v1.125c0 .414.336.75.75.75h6.75a.75.75 0 00.75-.75V6c0-.414-.336-.75-.75-.75M9 5.25V3.75A1.5 1.5 0 007.5 2.25h9A1.5 1.5 0 0018 3.75V5.25" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-extrabold text-impetus-teal font-outfit sm:text-xl">Automated Feedback &amp; Detailed Scoring Rationale</h3>
                            <p class="mt-2 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                                Immediate scoring and grading will be provided upon completion of the test, allowing
                                test-takers to identify areas of strength and weakness. This feedback is highly valuable for
                                self-evaluation, continuous improvement, and target CNE credit calculations.
                            </p>
                        </div>
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
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </div>
                        <div class="text-center sm:text-left">
                            <h2 class="text-xl font-extrabold !text-impetus-orange sm:text-2xl font-outfit">Test Today, Improve Everyday, Lead Tomorrow</h2>
                            <p class="mt-2 max-w-2xl text-sm leading-relaxed text-white/90 text-justify sm:text-base">
                                Online Test in CNE play a vital role in ensuring that healthcare professionals achieve required
                                competencies and maintain high standards of clinical practice. They help validate learning outcomes and
                                contribute to improved patient care, professional growth, and lifelong learning in nursing education.
                            </p>
                        </div>
                    </div>
                    <a href="{{ route('cne.modules') }}"
                        class="inline-flex shrink-0 items-center gap-2 rounded-full bg-impetus-orange px-6 py-3 text-sm font-bold text-white shadow-lg transition hover:bg-impetus-orange-hover font-outfit">
                        Start Online Test
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection
