@extends('layouts.frontend.app')

@section('title', 'CNE Practice Tests - IHS')

@section('content')
    <main class="overflow-hidden bg-[#F8FAFC]">
        <!-- Hero Section -->
        <section
            class="relative bg-gradient-to-br from-white via-slate-50 to-slate-100/50 py-20 sm:py-28 border-b border-slate-200/60">
            <div
                class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-impetus-orange/5 via-transparent to-transparent pointer-events-none">
            </div>
            <div class="absolute top-1/2 left-0 w-80 h-80 bg-impetus-orange/5 rounded-full blur-[120px] pointer-events-none">
            </div>

            <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-center gap-16 lg:grid-cols-12">
                    <div class="lg:col-span-7">
                        <span
                            class="text-sm font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-3 block">Self-Assessment
                            Tools</span>
                        <h1
                            class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-impetus-navy tracking-tight font-outfit leading-tight mb-6">
                            CNE Practice Tests
                        </h1>

                        <div class="space-y-6 text-slate-600 text-justify leading-relaxed text-sm sm:text-base">
                            <p>
                                <strong>Practice tests</strong> in Online Continuing Nursing Education (CNE) are structured
                                assessment tools designed to evaluate and reinforce the knowledge and clinical understanding
                                of nurses and healthcare professionals during and after training modules. These tests are an
                                essential part of the learning process, enabling learners to assess their progress, identify
                                knowledge gaps, and strengthen their competency in various nursing and healthcare domains.
                            </p>
                            <p>
                                Online CNE practice tests are typically based on evidence-based guidelines and standardized
                                curricula. They include multiple-choice questions, case-based scenarios, clinical
                                problem-solving exercises, and situation-based questions that reflect real-world healthcare
                                practice. These assessments help learners apply theoretical knowledge to practical clinical
                                situations.
                            </p>
                        </div>
                    </div>

                    <!-- Right Column: Visual Checklist/Illustrative Dashboard -->
                    <div class="lg:col-span-5 relative">
                        <div
                            class="absolute -inset-4 rounded-[2.5rem] bg-gradient-to-tr from-impetus-orange/10 via-transparent to-impetus-navy/10 blur-2xl -z-10">
                        </div>
                        <div
                            class="relative overflow-hidden rounded-[2rem] border border-slate-200/80 bg-white p-3 shadow-2xl">
                            <img src="{{ asset('images/practice_test_hero.png') }}" alt="CNE Practice Tests"
                                class="w-full h-auto rounded-2xl shadow-inner object-cover" />
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-slate-950/20 via-transparent to-transparent rounded-[2rem] pointer-events-none">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Purpose & Benefits Section -->
        <section class="py-24 sm:py-32 relative bg-white border-b border-slate-200/60 overflow-hidden">
            <div
                class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-impetus-orange/5 via-transparent to-transparent pointer-events-none">
            </div>

            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-stretch gap-16 lg:grid-cols-12">

                    <!-- Purpose Column (Left) -->
                    <div
                        class="lg:col-span-6 bg-gradient-to-br from-white to-slate-50 border border-slate-200/80 rounded-[2.5rem] p-8 shadow-xl relative overflow-hidden flex flex-col h-full">
                        <div
                            class="absolute -right-16 -top-16 w-36 h-36 bg-impetus-orange/5 rounded-full blur-2xl pointer-events-none">
                        </div>
                        <div
                            class="w-12 h-12 rounded-2xl bg-impetus-orange text-white flex items-center justify-center shrink-0 mb-6 shadow-lg shadow-impetus-orange/20 relative z-10 animate-pulse">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl sm:text-3xl font-extrabold text-impetus-navy font-outfit mb-4 relative z-10">
                            Purpose of Practice Tests</h3>
                        <p class="text-base text-slate-500 leading-relaxed text-justify mb-6 relative z-10">
                            Structured to solidify understanding and verify active nursing competency, our practice
                            assessments serve several fundamental goals:
                        </p>
                        <ul class="space-y-4 flex-grow relative z-10">
                            <!-- Purpose 1 (Orange Theme) -->
                            <li
                                class="flex gap-3 bg-gradient-to-br from-orange-50/40 via-white to-white p-4 rounded-xl border border-orange-100 shadow-sm hover:border-impetus-orange/30 hover:shadow-md hover:shadow-orange-500/5 transition-all duration-300">
                                <span
                                    class="text-impetus-orange bg-orange-100 w-8 h-8 rounded-lg flex items-center justify-center shrink-0 shadow-sm font-bold">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                    </svg>
                                </span>
                                <span class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify font-medium">
                                    To assess understanding of course content
                                </span>
                            </li>

                            <!-- Purpose 2 (Emerald Theme) -->
                            <li
                                class="flex gap-3 bg-gradient-to-br from-emerald-50/40 via-white to-white p-4 rounded-xl border border-emerald-100 shadow-sm hover:border-emerald-500/30 hover:shadow-md hover:shadow-emerald-500/5 transition-all duration-300">
                                <span
                                    class="text-emerald-600 bg-emerald-100 w-8 h-8 rounded-lg flex items-center justify-center shrink-0 shadow-sm font-bold">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                </span>
                                <span class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify font-medium">
                                    To reinforce key clinical concepts and guidelines
                                </span>
                            </li>

                            <!-- Purpose 3 (Indigo/Navy Theme) -->
                            <li
                                class="flex gap-3 bg-gradient-to-br from-indigo-50/40 via-white to-white p-4 rounded-xl border border-indigo-100 shadow-sm hover:border-indigo-500/30 hover:shadow-md hover:shadow-indigo-500/5 transition-all duration-300">
                                <span
                                    class="text-indigo-600 bg-indigo-100 w-8 h-8 rounded-lg flex items-center justify-center shrink-0 shadow-sm font-bold">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </span>
                                <span class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify font-medium">
                                    To identify areas requiring further study
                                </span>
                            </li>

                            <!-- Purpose 4 (Orange Theme) -->
                            <li
                                class="flex gap-3 bg-gradient-to-br from-orange-50/40 via-white to-white p-4 rounded-xl border border-orange-100 shadow-sm hover:border-impetus-orange/30 hover:shadow-md hover:shadow-orange-500/5 transition-all duration-300">
                                <span
                                    class="text-impetus-orange bg-orange-100 w-8 h-8 rounded-lg flex items-center justify-center shrink-0 shadow-sm font-bold">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                    </svg>
                                </span>
                                <span class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify font-medium">
                                    To improve critical thinking and decision-making skills
                                </span>
                            </li>

                            <!-- Purpose 5 (Emerald Theme) -->
                            <li
                                class="flex gap-3 bg-gradient-to-br from-emerald-50/40 via-white to-white p-4 rounded-xl border border-emerald-100 shadow-sm hover:border-emerald-500/30 hover:shadow-md hover:shadow-emerald-500/5 transition-all duration-300">
                                <span
                                    class="text-emerald-600 bg-emerald-100 w-8 h-8 rounded-lg flex items-center justify-center shrink-0 shadow-sm font-bold">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0017.25 4.5H6.75A2.25 2.25 0 004.5 6.75v10.5A2.25 2.25 0 006.75 19.5h3.75" />
                                    </svg>
                                </span>
                                <span class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify font-medium">
                                    To prepare learners for final assessments or certification examinations
                                </span>
                            </li>
                        </ul>
                    </div>

                    <!-- Benefits Column (Right) -->
                    <div
                        class="lg:col-span-6 bg-gradient-to-br from-white to-slate-50 border border-slate-200/80 rounded-[2.5rem] p-8 shadow-xl relative overflow-hidden flex flex-col h-full">
                        <div
                            class="absolute -right-16 -top-16 w-36 h-36 bg-emerald-500/5 rounded-full blur-2xl pointer-events-none">
                        </div>
                        <div
                            class="w-12 h-12 rounded-2xl bg-emerald-500 text-white flex items-center justify-center shrink-0 mb-6 shadow-lg shadow-emerald-500/20 relative z-10 animate-pulse">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                        </div>
                        <h3 class="text-2xl sm:text-3xl font-extrabold text-impetus-navy font-outfit mb-4 relative z-10">
                            Benefits of Practice Tests</h3>
                        <p class="text-base text-slate-500 leading-relaxed text-justify mb-6 relative z-10">
                            Designed to accelerate your learning journey and build confidence, practicing regularly delivers
                            key advantages:
                        </p>
                        <ul class="space-y-4 flex-grow relative z-10">
                            <!-- Benefit 1 (Emerald Theme) -->
                            <li
                                class="flex gap-4 bg-gradient-to-br from-emerald-50/40 via-white to-white p-4 rounded-xl border border-emerald-100 shadow-sm hover:border-emerald-500/30 hover:shadow-md hover:shadow-emerald-500/5 transition-all duration-300">
                                <div
                                    class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600 shadow-sm">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-base font-bold text-impetus-navy font-outfit">Enhances Retention</h4>
                                    <p class="text-sm text-slate-500 mt-1 leading-relaxed">Enhances retention of clinical
                                        knowledge.</p>
                                </div>
                            </li>

                            <!-- Benefit 2 (Orange Theme) -->
                            <li
                                class="flex gap-4 bg-gradient-to-br from-orange-50/40 via-white to-white p-4 rounded-xl border border-orange-100 shadow-sm hover:border-impetus-orange/30 hover:shadow-md hover:shadow-orange-500/5 transition-all duration-300">
                                <div
                                    class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-orange-100 text-impetus-orange shadow-sm">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-base font-bold text-impetus-navy font-outfit">Builds Clinical
                                        Confidence</h4>
                                    <p class="text-sm text-slate-500 mt-1 leading-relaxed">Builds confidence in handling
                                        real-life clinical situations.</p>
                                </div>
                            </li>

                            <!-- Benefit 3 (Indigo/Navy Theme) -->
                            <li
                                class="flex gap-4 bg-gradient-to-br from-indigo-50/40 via-white to-white p-4 rounded-xl border border-indigo-100 shadow-sm hover:border-indigo-500/30 hover:shadow-md hover:shadow-indigo-500/5 transition-all duration-300">
                                <div
                                    class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-indigo-100 text-indigo-600 shadow-sm">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-base font-bold text-impetus-navy font-outfit">Improves Decision Pacing
                                    </h4>
                                    <p class="text-sm text-slate-500 mt-1 leading-relaxed">Improves accuracy and speed in
                                        clinical decision-making.</p>
                                </div>
                            </li>

                            <!-- Benefit 4 (Emerald Theme) -->
                            <li
                                class="flex gap-4 bg-gradient-to-br from-emerald-50/40 via-white to-white p-4 rounded-xl border border-emerald-100 shadow-sm hover:border-emerald-500/30 hover:shadow-md hover:shadow-emerald-500/5 transition-all duration-300">
                                <div
                                    class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600 shadow-sm">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-base font-bold text-impetus-navy font-outfit">Supports Self-Evaluation
                                    </h4>
                                    <p class="text-sm text-slate-500 mt-1 leading-relaxed">Supports continuous
                                        self-evaluation and improvement.</p>
                                </div>
                            </li>

                            <!-- Benefit 5 (Orange Theme) -->
                            <li
                                class="flex gap-4 bg-gradient-to-br from-orange-50/40 via-white to-white p-4 rounded-xl border border-orange-100 shadow-sm hover:border-impetus-orange/30 hover:shadow-md hover:shadow-orange-500/5 transition-all duration-300">
                                <div
                                    class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-orange-100 text-impetus-orange shadow-sm">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-base font-bold text-impetus-navy font-outfit">Exam Readiness</h4>
                                    <p class="text-sm text-slate-500 mt-1 leading-relaxed">Strengthens readiness for
                                        professional certification exams.</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-24 sm:py-32 relative bg-slate-50/40 border-b border-slate-200/60 overflow-hidden">
            <div
                class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-impetus-orange/5 via-transparent to-transparent pointer-events-none">
            </div>

            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center mb-16">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-impetus-navy tracking-tight font-outfit">
                        Features of Online CNE Practice Tests
                    </h2>
                    <p class="mt-4 text-base text-slate-600 leading-relaxed text-justify sm:text-center max-w-3xl mx-auto">
                        Engineered to provide a rich educational ecosystem, our practice assessments leverage evidence-based
                        standards to deliver optimal clinical learning.
                    </p>
                </div>

                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Feature Card 1 (Orange Theme) -->
                    <div
                        class="rounded-3xl border border-orange-100 bg-gradient-to-br from-orange-50/40 via-white to-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-orange-500/5 flex flex-col items-start relative overflow-hidden group">
                        <div
                            class="w-12 h-12 rounded-2xl bg-orange-500/10 text-orange-600 flex items-center justify-center mb-6 ring-1 ring-orange-200/50 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-3.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V6.75a2.25 2.25 0 01-2.25 2.25H15A2.25 2.25 0 0113.5 6.75V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                            </svg>
                        </div>
                        <h4
                            class="text-xl font-extrabold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">
                            Module-Wise Sets</h4>
                        <p class="text-base text-slate-600 leading-relaxed text-justify">
                            Topic-wise and module-wise question sets are tailored specifically to match every target
                            knowledge domain in your CNE training modules.
                        </p>
                    </div>

                    <!-- Feature Card 2 (Sky Theme) -->
                    <div
                        class="rounded-3xl border border-sky-100 bg-gradient-to-br from-sky-50/40 via-white to-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-sky-500/5 flex flex-col items-start relative overflow-hidden group">
                        <div
                            class="w-12 h-12 rounded-2xl bg-sky-500/10 text-sky-600 flex items-center justify-center mb-6 ring-1 ring-sky-200/50 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h4
                            class="text-xl font-extrabold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">
                            Flexible Assessments</h4>
                        <p class="text-base text-slate-600 leading-relaxed text-justify">
                            Enjoy self-paced learning with no constraints, or take time-bound practice assessments to
                            simulate high-pressure, real-world exams.
                        </p>
                    </div>

                    <!-- Feature Card 3 (Emerald Theme) -->
                    <div
                        class="rounded-3xl border border-emerald-100 bg-gradient-to-br from-emerald-50/40 via-white to-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-emerald-500/5 flex flex-col items-start relative overflow-hidden group">
                        <div
                            class="w-12 h-12 rounded-2xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center mb-6 ring-1 ring-emerald-200/50 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                            </svg>
                        </div>
                        <h4
                            class="text-xl font-extrabold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">
                            Instant Analytics</h4>
                        <p class="text-base text-slate-600 leading-relaxed text-justify">
                            Obtain instant feedback, detailed scoring guides, and robust clinical performance analysis to
                            identify strength areas and knowledge gaps.
                        </p>
                    </div>

                    <!-- Feature Card 4 (Indigo Theme) -->
                    <div
                        class="rounded-3xl border border-indigo-100 bg-gradient-to-br from-indigo-50/40 via-white to-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-indigo-500/5 flex flex-col items-start relative overflow-hidden group">
                        <div
                            class="w-12 h-12 rounded-2xl bg-indigo-500/10 text-indigo-600 flex items-center justify-center mb-6 ring-1 ring-indigo-200/50 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                            </svg>
                        </div>
                        <h4
                            class="text-xl font-extrabold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">
                            Case-Driven Scenarios</h4>
                        <p class="text-base text-slate-600 leading-relaxed text-justify">
                            Practice with clinical problem-solving exercises, case-based questions, and real-world scenario
                            metrics that accurately mimic daily practice.
                        </p>
                    </div>

                    <!-- Feature Card 5 (Rose Theme) -->
                    <div
                        class="rounded-3xl border border-rose-100 bg-gradient-to-br from-rose-50/40 via-white to-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-rose-500/5 flex flex-col items-start relative overflow-hidden group">
                        <div
                            class="w-12 h-12 rounded-2xl bg-rose-500/10 text-rose-600 flex items-center justify-center mb-6 ring-1 ring-rose-200/50 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                        </div>
                        <h4
                            class="text-xl font-extrabold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">
                            Unlimited Re-Attempts</h4>
                        <p class="text-base text-slate-600 leading-relaxed text-justify">
                            Enjoy repeated learning attempts on complex topics, ensuring perfect knowledge retention and
                            readiness for final certification exams.
                        </p>
                    </div>

                    <!-- Feature Card 6 (Violet Theme) -->
                    <div
                        class="rounded-3xl border border-violet-100 bg-gradient-to-br from-violet-50/40 via-white to-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-violet-500/5 flex flex-col items-start relative overflow-hidden group">
                        <div
                            class="w-12 h-12 rounded-2xl bg-violet-500/10 text-violet-600 flex items-center justify-center mb-6 ring-1 ring-violet-200/50 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25A2.25 2.25 0 015.25 3h13.5A2.25 2.25 0 0121 5.25z" />
                            </svg>
                        </div>
                        <h4
                            class="text-xl font-extrabold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">
                            Universal Platform</h4>
                        <p class="text-base text-slate-600 leading-relaxed text-justify">
                            Seamlessly optimized and accessible anywhere through our online learning platforms via desktops,
                            laptops, tablets, and smartphones.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Concluding Takeaway & CTA Section -->
        <section class="py-20 sm:py-24 relative bg-impetus-navy text-white overflow-hidden">
            <!-- Decorative vector glows -->
            <div
                class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_right,_var(--tw-gradient-stops))] from-impetus-orange/20 via-transparent to-transparent pointer-events-none">
            </div>
            <div
                class="absolute -top-24 -left-24 w-96 h-96 bg-impetus-orange/10 rounded-full blur-[120px] pointer-events-none">
            </div>

            <div class="relative mx-auto max-w-5xl px-6 lg:px-8 text-center">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-md border border-white/20 mb-8">
                    <span class="w-2.5 h-2.5 rounded-full bg-impetus-orange animate-pulse"></span>
                    <span
                        class="text-xs sm:text-sm font-bold uppercase tracking-wider font-outfit text-slate-200">Continuous
                        Mastery</span>
                </div>

                <h2
                    class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight font-outfit mb-6 leading-tight max-w-3xl mx-auto">
                    Transforming Nursing Knowledge Into Clinical Competence
                </h2>

                <p
                    class="text-base sm:text-lg text-slate-300 leading-relaxed text-justify sm:text-center max-w-4xl mx-auto mb-10">
                    Practice tests in Online Continuing Nursing Education (CNE) play a vital role in ensuring effective
                    learning by transforming theoretical knowledge into practical understanding. They help nursing
                    professionals stay competent, confident, and prepared to deliver safe and high-quality patient care in
                    clinical settings.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('cne.modules') }}"
                        class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-2xl bg-impetus-orange text-white font-bold hover:bg-impetus-orange/90 active:scale-95 transition-all shadow-lg shadow-impetus-orange/20 font-outfit text-sm tracking-wide">
                        Explore CNE Modules
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                    <a href="{{ route('about') }}"
                        class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-2xl bg-white/5 border border-white/20 text-white font-bold hover:bg-white/10 active:scale-95 transition-all font-outfit text-sm tracking-wide">
                        About IHS
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection
