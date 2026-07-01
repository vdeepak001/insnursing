@extends('layouts.frontend.app')

@section('title', isset($course) ? 'Practice Test' : 'Practice Tests - IHS')

@php
    $heroImage = asset('Practice_test_banner.png');
@endphp

@section('content')
    <main class="overflow-hidden bg-white font-sans antialiased text-slate-800">
        @unless (isset($course))
            {{-- Landing Page --}}
            <section class="relative bg-impetus-teal-muted py-16 sm:py-16">
                <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="grid items-center gap-12 lg:grid-cols-2 lg:items-stretch lg:gap-16">
                        <div>
                            <p class="mb-4 flex items-center gap-3 text-sm font-bold uppercase tracking-widest text-impetus-teal font-outfit">
                                <span class="h-px w-8 bg-impetus-teal"></span>
                                Practice Tests
                            </p>
                            <h1 class="mb-6 text-3xl font-extrabold leading-tight text-slate-800 sm:text-4xl lg:text-[2.75rem] font-outfit">
                                Practice Today<br>
                                <span class="text-impetus-teal">Excel Tomorrow</span>
                            </h1>

                            <div class="space-y-5 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                                <p>
                                    <strong>Practice Test</strong> in Online Continuing Nursing Education are structured
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

                        <div class="relative flex w-full self-stretch">
                            <div class="absolute left-1/2 top-1/2 h-56 w-56 -translate-x-1/2 -translate-y-1/2 rounded-full border-2 border-impetus-teal/20 sm:h-64 sm:w-64 lg:h-72 lg:w-72"></div>
                            <img src="{{ $heroImage }}" alt="CNE Practice Test"
                                class="relative z-10 h-full w-full min-h-[22rem] rounded-2xl object-cover object-center shadow-2xl ring-1 ring-white/60 sm:min-h-[26rem] lg:min-h-[36rem]">
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-16 sm:py-12">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <h2 class="mb-10 text-center text-2xl font-extrabold text-impetus-teal sm:text-3xl font-outfit">Why Practice Tests Matter</h2>
                    <div class="grid items-stretch gap-10 lg:grid-cols-2 lg:gap-12">
                        {{-- Content --}}
                        <div class="space-y-5">
                            @foreach ([
                                ['title' => 'Assess Knowledge', 'text' => 'To assess understanding of course content and measure learning progress effectively.', 'theme' => 'teal'],
                                ['title' => 'Reinforce Learning', 'text' => 'To reinforce key clinical concepts and guidelines through structured repetition.', 'theme' => 'orange'],
                                ['title' => 'Identify Learning Gaps', 'text' => 'To identify areas requiring further study before final certification examinations.', 'theme' => 'teal'],
                                ['title' => 'Prepare for Certification', 'text' => 'To prepare learners for final assessments and professional certification examinations.', 'theme' => 'orange'],
                            ] as $item)
                                <div class="flex items-start gap-4 rounded-2xl border border-impetus-teal/10 bg-white p-3 shadow-md">
                                    <div @class([
                                        'flex h-12 w-12 shrink-0 items-center justify-center rounded-full text-white shadow-md',
                                        'bg-impetus-teal' => $item['theme'] === 'teal',
                                        'bg-impetus-orange' => $item['theme'] === 'orange',
                                    ])>
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-base font-bold text-slate-800 font-outfit">{{ $item['title'] }}</h3>
                                        <p class="mt-1 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">{{ $item['text'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Image --}}
                        <div class="relative min-h-[20rem] overflow-hidden rounded-2xl shadow-lg">
                            <img src="{{ asset('why_practice_test_matters.png') }}" alt="Why Practice Tests Matter"
                                class="absolute inset-0 h-full w-full object-cover object-top">
                        </div>
                    </div>
                </div>
            </section>

            {{-- Purpose of Practice Tests --}}
            <section class="border-y border-impetus-teal/10 bg-slate-50 py-16 sm:py-12">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="overflow-hidden rounded-2xl">
                        <img src="{{ asset(rawurlencode('Purpose of aPractice test_1.png')) }}" alt="Purpose of Practice Tests"
                            class="mx-auto h-auto w-full object-contain">
                    </div>
                </div>
            </section>

            {{-- Purpose of Practice Tests (previous grid layout, hidden for now)
            <section class="border-y border-impetus-teal/10 bg-slate-50 py-16 sm:py-12">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <h2 class="mb-4 text-center text-2xl font-extrabold text-impetus-teal sm:text-3xl font-outfit">Purpose of Practice Tests</h2>
                    <p class="mx-auto mb-10 max-w-3xl text-center text-sm text-slate-600 sm:text-base">
                        Structured to solidify understanding and verify active nursing competency, our practice assessments serve several fundamental goals:
                    </p>
                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ([
                            'To assess understanding of course content',
                            'To reinforce key clinical concepts and guidelines',
                            'To identify areas requiring further study',
                            'To improve critical thinking and decision-making skills',
                            'To prepare learners for final assessments or certification examinations',
                        ] as $purpose)
                            <div class="flex items-start gap-3 rounded-xl border border-impetus-teal/10 bg-white p-4 shadow-sm">
                                <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-impetus-teal text-white">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </span>
                                <p class="text-sm leading-relaxed text-slate-600 text-justify sm:text-base">{{ $purpose }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            --}}

            <section class="py-16 sm:py-12">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <h2 class="mb-4 text-center text-2xl font-extrabold text-impetus-teal sm:text-3xl font-outfit">Benefits of Practice Tests</h2>
                    <p class="mx-auto mb-5 max-w-3xl text-center text-sm text-slate-600 sm:text-base">
                        Designed to accelerate your learning journey and build confidence, practicing regularly delivers key advantages:
                    </p>
                    <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-12">
                        {{-- Image --}}
                        <div class="overflow-hidden rounded-2xl">
                            <img src="{{ asset(rawurlencode('benefits_practice test.png')) }}" alt="Benefits of Practice Tests"
                                class="h-auto w-full object-contain">
                        </div>

                        {{-- Content --}}
                        <div class="grid gap-4 sm:grid-cols-1">
                            @foreach ([
                                ['title' => 'Enhances Retention', 'text' => 'Enhances retention of clinical knowledge.'],
                                ['title' => 'Builds Clinical Confidence', 'text' => 'Builds confidence in handling real-life clinical situations.'],
                                ['title' => 'Improves Decision Pacing', 'text' => 'Improves accuracy and speed in clinical decision-making.'],
                                ['title' => 'Supports Self-Evaluation', 'text' => 'Supports continuous self-evaluation and improvement.'],
                                ['title' => 'Exam Readiness', 'text' => 'Strengthens readiness for professional certification exams.'],
                                ['title' => 'Performance Tracking', 'text' => 'Monitor progress and identify areas to improve through attempt history.'],
                            ] as $benefit)
                                <div class="flex items-start gap-3 rounded-xl border border-impetus-orange/15 bg-impetus-lightOrange/50 p-3">
                                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-impetus-orange text-white shadow-sm">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </span>
                                    <div>
                                        <h3 class="text-sm font-bold text-slate-800 font-outfit sm:text-base">{{ $benefit['title'] }}</h3>
                                        <p class="mt-1 text-sm text-slate-600 text-justify sm:text-base">{{ $benefit['text'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <section class="border-t border-impetus-teal/10 bg-impetus-teal-muted/20 py-16 sm:py-12">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <h2 class="mb-4 text-center text-2xl font-extrabold text-impetus-teal sm:text-3xl font-outfit">Features of Online CNE Practice Tests</h2>
                    <p class="mx-auto mb-10 max-w-3xl text-center text-sm text-slate-600 sm:text-base">
                        Engineered to provide a rich educational ecosystem, our practice assessments leverage evidence-based standards to deliver optimal clinical learning.
                    </p>
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ([
                            ['title' => 'Module-Wise Sets', 'text' => 'Topic-wise and module-wise question sets are tailored specifically to match every target knowledge domain in your CNE training modules.', 'theme' => 'teal'],
                            ['title' => 'Flexible Assessments', 'text' => 'Enjoy self-paced learning with no constraints, or take time-bound practice assessments to simulate high-pressure, real-world exams.', 'theme' => 'orange'],
                            ['title' => 'Instant Analytics', 'text' => 'Obtain instant feedback, detailed scoring guides, and robust clinical performance analysis to identify strength areas and knowledge gaps.', 'theme' => 'teal'],
                            ['title' => 'Case-Driven Scenarios', 'text' => 'Practice with clinical problem-solving exercises, case-based questions, and real-world scenario metrics that accurately mimic daily practice.', 'theme' => 'orange'],
                            ['title' => 'Unlimited Re-Attempts', 'text' => 'Enjoy repeated learning attempts on complex topics, ensuring perfect knowledge retention and readiness for final certification exams.', 'theme' => 'teal'],
                            ['title' => 'Universal Platform', 'text' => 'Seamlessly optimized and accessible anywhere through our online learning platforms via desktops, laptops, tablets, and smartphones.', 'theme' => 'orange'],
                        ] as $feature)
                            <div @class([
                                'rounded-2xl border bg-white p-3 shadow-md',
                                'border-impetus-teal/10' => $feature['theme'] === 'teal',
                                'border-impetus-orange/15' => $feature['theme'] === 'orange',
                            ])>
                                <div @class([
                                    'mb-3 flex h-10 w-10 items-center justify-center rounded-lg text-white shadow-sm',
                                    'bg-impetus-teal' => $feature['theme'] === 'teal',
                                    'bg-impetus-orange' => $feature['theme'] === 'orange',
                                ])>
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h3 @class([
                                    'text-base font-bold font-outfit',
                                    'text-impetus-teal' => $feature['theme'] === 'teal',
                                    'text-impetus-orange' => $feature['theme'] === 'orange',
                                ])>{{ $feature['title'] }}</h3>
                                <p class="mt-2 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">{{ $feature['text'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="py-16 sm:py-12">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <h2 class="mb-10 text-center text-2xl font-extrabold text-impetus-teal sm:text-3xl font-outfit">How Practice Tests Work</h2>
                    <div class="overflow-hidden rounded-2xl">
                        <img src="{{ asset(rawurlencode('how-practice-test works.png')) }}" alt="How Practice Tests Work"
                            class="mx-auto h-auto w-full object-contain">
                    </div>
                </div>
            </section>

            {{-- CTA Banner --}}
            <section class="bg-white py-16 sm:py-12">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="flex flex-col items-center gap-6 rounded-3xl bg-impetus-orange p-8 text-center shadow-lg sm:flex-row sm:justify-between sm:p-10 sm:text-left">
                        <div class="flex items-center gap-4">
                            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-white/20 text-white">
                                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                </svg>
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-base leading-relaxed !text-white sm:text-left text-justify">
                                    Practice Test in Online Continuing Nursing Education play a vital role in ensuring effective learning by transforming theoretical knowledge into practical understanding. They help nursing professionals stay competent, confident, and prepared to deliver safe and high-quality patient care in clinical settings.
                                </p>
                            </div>
                        </div>
                        <a href="{{ route('cne.modules') }}"
                            class="inline-flex shrink-0 items-center gap-2 rounded-full bg-white px-6 py-3 text-sm font-bold text-impetus-orange shadow-lg transition hover:scale-105 font-outfit whitespace-nowrap">
                            Start Practice Test
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </section>
        @else
            {{-- Module Practice UI --}}
            <section class="py-12 sm:py-16">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                        <div>
                            <p class="mb-2 text-sm font-bold uppercase tracking-widest text-impetus-teal font-outfit">Practice Test</p>
                            <h1 class="text-3xl font-extrabold text-impetus-teal sm:text-4xl font-outfit">{{ $course->couse_name }}</h1>
                        </div>
                        <a href="{{ route('cne.modules.show', $course->couse_name) }}"
                            class="inline-flex items-center gap-2 rounded-full border-2 border-impetus-teal px-5 py-2.5 text-sm font-bold text-impetus-teal transition hover:bg-impetus-teal-muted">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                            </svg>
                            Back to Module
                        </a>
                    </div>

                    <p class="mt-8 text-justify text-base leading-relaxed text-slate-600 sm:text-lg">
                        Practice test is designed for the user to practice the questions in E-Learning platform. Each module has many sets of questions and each set has 20 questions. Each set is allowed to practice for two times for repetitive learning. It is advised to practice the test provided in this section before taking Mock / Final examination to obtain better score in the examination.
                    </p>

                    <div class="mt-16 space-y-16">
                        @php
                            $totalSets = 0;
                            foreach ($levelCounts as $c) {
                                $totalSets += floor($c / 20);
                            }
                            $hasAnyQuestions = $totalSets > 0;
                        @endphp

                        @if (! $hasAnyQuestions)
                            <div class="rounded-2xl border-2 border-dashed border-impetus-teal/20 bg-impetus-teal-muted/30 p-12 text-center">
                                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-white shadow-sm">
                                    <svg class="h-8 w-8 text-impetus-teal" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                    </svg>
                                </div>
                                <h3 class="mt-6 text-lg font-bold text-impetus-teal font-outfit">No questions available yet</h3>
                                <p class="mt-2 text-slate-600">We couldn't find any practice questions for this module. Please check back later or contact support.</p>
                                <a href="{{ route('cne.modules.show', $course->couse_name) }}" class="mt-8 inline-flex items-center gap-2 font-semibold text-impetus-orange hover:underline">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                                    </svg>
                                    Back to module
                                </a>
                            </div>
                        @endif

                        @foreach (['Level 1', 'Level 2', 'Level 3', 'Other'] as $idx => $levelLabel)
                            @php
                                $isOther = $levelLabel === 'Other';
                                $levelKey = $isOther ? 'other' : (string) ($idx + 1);
                                $levelNum = $isOther ? -1 : (int) $levelKey;
                                $count = $levelCounts[$levelKey] ?? 0;
                                $setCount = floor($count / 20);
                                $theme = in_array($levelLabel, ['Level 1', 'Level 3'], true) ? 'teal' : 'orange';
                            @endphp

                            @if ($setCount > 0)
                                <div class="flex flex-col gap-6 lg:flex-row lg:items-start">
                                    <div class="shrink-0 lg:w-40">
                                        <div @class([
                                            'inline-flex rounded-lg px-5 py-2 text-sm font-bold uppercase tracking-widest text-white shadow-md',
                                            'bg-impetus-teal' => $theme === 'teal',
                                            'bg-impetus-orange' => $theme === 'orange',
                                        ])>
                                            {{ $levelLabel }}
                                        </div>
                                    </div>

                                    <div class="w-full overflow-hidden rounded-2xl border border-impetus-teal/10 bg-white shadow-lg">
                                        <table class="w-full text-left">
                                            <thead @class([
                                                'text-xs font-bold uppercase tracking-wider text-white',
                                                'bg-impetus-teal' => $theme === 'teal',
                                                'bg-impetus-orange' => $theme === 'orange',
                                            ])>
                                                <tr>
                                                    <th class="px-6 py-4">Questions</th>
                                                    <th class="w-32 px-6 py-4 text-center">View Progress</th>
                                                    <th class="px-6 py-4 text-center">Attempts</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-impetus-teal/10">
                                                @for ($s = 0; $s < $setCount; $s++)
                                                    @php
                                                        $start = ($s * 20) + 1;
                                                        $end = min(($s + 1) * 20, $count);
                                                        $setAttempts = $userAttempts[$levelNum][$s + 1] ?? collect();
                                                        $attemptCount = $setAttempts->count();
                                                        $isLocked = $attemptCount >= 2;
                                                        $practiceUrl = route('cne.modules.test', [$course->couse_name, 'practice']) . "?level={$levelNum}&set=" . ($s + 1);
                                                    @endphp
                                                    <tr @class(['transition', 'hover:bg-impetus-teal-muted/30' => ! $isLocked, 'bg-slate-50/60 opacity-75' => $isLocked])>
                                                        <td class="px-6 py-4">
                                                            @if ($isLocked)
                                                                <div class="flex items-center gap-2 font-semibold text-slate-400">
                                                                    <span class="rounded bg-slate-100 px-2 py-0.5 text-[10px]">SET {{ $s + 1 }}</span>
                                                                    {{ $start }} - {{ $end }}
                                                                </div>
                                                            @else
                                                                <a href="{{ $practiceUrl }}" class="group flex items-center gap-2 font-semibold text-slate-700 hover:text-impetus-orange">
                                                                    <span class="rounded bg-impetus-teal-muted px-2 py-0.5 text-[10px] text-impetus-teal group-hover:bg-impetus-orange/10 group-hover:text-impetus-orange">SET {{ $s + 1 }}</span>
                                                                    {{ $start }} - {{ $end }}
                                                                </a>
                                                            @endif
                                                        </td>
                                                        <td class="w-32 px-6 py-4 text-center">
                                                            <div class="relative flex justify-center" x-data="{ open: false }">
                                                                <button type="button" @click="open = !open" @click.outside="open = false"
                                                                    @disabled($attemptCount === 0)
                                                                    @class([
                                                                        'inline-flex rounded-lg p-2 transition',
                                                                        'text-impetus-orange hover:bg-impetus-orange/10' => $attemptCount > 0,
                                                                        'cursor-not-allowed text-slate-300' => $attemptCount === 0,
                                                                    ])>
                                                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                                    </svg>
                                                                </button>
                                                                <div x-show="open" x-cloak x-transition
                                                                    class="absolute left-full top-1/2 z-[60] ml-3 w-40 -translate-y-1/2" style="display: none;">
                                                                    <div class="relative overflow-hidden rounded-xl border border-impetus-teal/15 bg-white p-3 shadow-2xl">
                                                                        <p class="mb-2 text-[10px] font-bold uppercase tracking-wider text-impetus-teal">Attempt History</p>
                                                                        <div class="space-y-2">
                                                                            @foreach ($setAttempts as $attIdx => $att)
                                                                                <div class="flex items-center justify-between border-t border-slate-100 pt-2 first:border-0 first:pt-0">
                                                                                    <div class="text-[11px] font-medium text-slate-700">
                                                                                        #{{ $attemptCount - $attIdx }}
                                                                                        <span class="ml-1 text-[9px] font-normal text-slate-500">{{ $att->completed_at?->displayDate() }}</span>
                                                                                    </div>
                                                                                    <div @class([
                                                                                        'text-xs font-bold',
                                                                                        'text-impetus-teal' => $att->score_percent >= 80,
                                                                                        'text-impetus-orange' => $att->score_percent >= 50 && $att->score_percent < 80,
                                                                                        'text-slate-500' => $att->score_percent < 50,
                                                                                    ])>
                                                                                        {{ round($att->score_percent) }}%
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 text-center font-mono text-sm">
                                                            @if ($attemptCount === 0)
                                                                <span class="font-medium text-slate-400">0 / 2</span>
                                                            @elseif ($attemptCount === 1)
                                                                <span class="font-bold text-impetus-orange">1 / 2</span>
                                                            @else
                                                                <span class="font-bold text-slate-500">2 / 2</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
        @endunless
    </main>
@endsection
