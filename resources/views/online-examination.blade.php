@extends('layouts.frontend.app')

@section('title', 'Online CNE Tests - IHS')

@section('content')
    <main class="overflow-hidden bg-[#F8FAFC]">
        <!-- Hero Section -->
        <section class="relative bg-gradient-to-br from-white via-slate-50 to-slate-100/50 py-20 sm:py-28 border-b border-slate-200/60">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-impetus-orange/5 via-transparent to-transparent pointer-events-none"></div>
            <div class="absolute top-1/2 left-0 w-80 h-80 bg-impetus-orange/5 rounded-full blur-[120px] pointer-events-none"></div>
            
            <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-center gap-16 lg:grid-cols-12">
                    <div class="lg:col-span-6">
                        <span class="text-sm font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-3 block">Competency Assessment</span>
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-impetus-navy tracking-tight font-outfit leading-tight mb-6">
                            Online CNE Tests
                        </h1>
                        
                        <div class="space-y-6 text-slate-600 text-justify leading-relaxed text-sm sm:text-base">
                            <p>
                                An <strong>online test</strong> in Continuing Nursing Education (CNE) is a structured digital assessment conducted through an online learning platform to evaluate the knowledge, understanding, and clinical competency of nurses and healthcare professionals after completing a training module or course. It is an essential component of outcome-based learning and is used to measure the effectiveness of the educational program.
                            </p>
                            <p>
                                Online CNE tests are designed using evidence-based nursing content and are aligned with current clinical guidelines and competency standards. These assessments typically include multiple-choice questions, case-based questions, scenario-based problem solving, and application-oriented clinical questions that reflect real-life healthcare situations.
                            </p>
                        </div>
                    </div>

                    <!-- Right Column: Premium Proctoring Exam Dashboard SVG -->
                    <div class="lg:col-span-6 relative flex items-center justify-center">
                        <div class="absolute -inset-4 rounded-[2.5rem] bg-gradient-to-tr from-impetus-orange/10 via-transparent to-impetus-navy/10 blur-2xl -z-10"></div>
                        <div class="relative overflow-hidden rounded-[2rem] border border-slate-200/80 bg-white p-3 shadow-2xl w-full max-w-[550px]">
                            <img src="{{ asset('images/66ccc0d0b5e3701731775c0c_652728a7077ae3384cfda548_Online20Proctoring20To20Cheating.png') }}"
                                alt="Online CNE Tests and Proctoring"
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
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-impetus-orange/5 via-transparent to-transparent pointer-events-none"></div>
            
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-stretch gap-16 lg:grid-cols-12">
                    
                    <!-- Purpose Column (Left) -->
                    <div class="lg:col-span-6 bg-gradient-to-br from-white to-slate-50 border border-slate-200/80 rounded-[2.5rem] p-8 shadow-xl relative overflow-hidden flex flex-col h-full">
                        <div class="absolute -right-16 -top-16 w-36 h-36 bg-impetus-orange/5 rounded-full blur-2xl pointer-events-none"></div>
                        <div class="w-12 h-12 rounded-2xl bg-impetus-navy text-white flex items-center justify-center shrink-0 mb-6 shadow-lg shadow-impetus-navy/20 relative z-10 animate-pulse">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.03 0 1.9.693 2.166 1.638m-7.377 2.24A2.251 2.251 0 0 1 7.5 6.108V16.5a2.25 2.25 0 0 0 2.25 2.25h1.5m-.1-12.75a48.367 48.367 0 0 1 1 .08M7.5 6.108c0-1.135.845-2.098 1.976-2.192A48.424 48.424 0 0 1 10.6 3.84" />
                            </svg>
                        </div>
                        <h3 class="text-2xl sm:text-3xl font-extrabold text-impetus-navy font-outfit mb-4 relative z-10">Purpose of Online CNE Tests</h3>
                        <p class="text-base text-slate-500 leading-relaxed text-justify mb-6 relative z-10">
                            Aligned with international clinical guidelines and continuous education frameworks, these digital assessments secure critical educational outcomes:
                        </p>
                        <ul class="space-y-4 flex-grow relative z-10">
                            <!-- Purpose 1 (Orange Theme) -->
                            <li class="flex gap-3 bg-gradient-to-br from-orange-50/40 via-white to-white p-4 rounded-xl border border-orange-100 shadow-sm hover:border-impetus-orange/30 hover:shadow-md hover:shadow-orange-500/5 transition-all duration-300">
                                <span class="text-impetus-orange bg-orange-100 w-8 h-8 rounded-lg flex items-center justify-center shrink-0 shadow-sm font-bold">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                    </svg>
                                </span>
                                <span class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify font-medium">
                                    To assess learners' understanding of course content
                                </span>
                            </li>

                            <!-- Purpose 2 (Emerald Theme) -->
                            <li class="flex gap-3 bg-gradient-to-br from-emerald-50/40 via-white to-white p-4 rounded-xl border border-emerald-100 shadow-sm hover:border-emerald-500/30 hover:shadow-md hover:shadow-emerald-500/5 transition-all duration-300">
                                <span class="text-emerald-600 bg-emerald-100 w-8 h-8 rounded-lg flex items-center justify-center shrink-0 shadow-sm font-bold">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                </span>
                                <span class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify font-medium">
                                    To evaluate clinical knowledge and decision-making ability
                                </span>
                            </li>

                            <!-- Purpose 3 (Indigo Theme) -->
                            <li class="flex gap-3 bg-gradient-to-br from-indigo-50/40 via-white to-white p-4 rounded-xl border border-indigo-100 shadow-sm hover:border-indigo-500/30 hover:shadow-md hover:shadow-indigo-500/5 transition-all duration-300">
                                <span class="text-indigo-600 bg-indigo-100 w-8 h-8 rounded-lg flex items-center justify-center shrink-0 shadow-sm font-bold">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138z" />
                                    </svg>
                                </span>
                                <span class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify font-medium">
                                    To ensure achievement of learning outcomes
                                </span>
                            </li>

                            <!-- Purpose 4 (Orange Theme) -->
                            <li class="flex gap-3 bg-gradient-to-br from-orange-50/40 via-white to-white p-4 rounded-xl border border-orange-100 shadow-sm hover:border-impetus-orange/30 hover:shadow-md hover:shadow-orange-500/5 transition-all duration-300">
                                <span class="text-impetus-orange bg-orange-100 w-8 h-8 rounded-lg flex items-center justify-center shrink-0 shadow-sm font-bold">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.504-1.125-1.125-1.125h-6.75a1.125 1.125 0 00-1.125 1.125v3.375m9 0M9 10.5h.008v.008H9V10.5zm.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 10.5h.008v.008H12V10.5zm.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm2.25 0h.008v.008H15V10.5zm.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                </span>
                                <span class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify font-medium">
                                    To support certification and continuing professional development requirements
                                </span>
                            </li>

                            <!-- Purpose 5 (Emerald Theme) -->
                            <li class="flex gap-3 bg-gradient-to-br from-emerald-50/40 via-white to-white p-4 rounded-xl border border-emerald-100 shadow-sm hover:border-emerald-500/30 hover:shadow-md hover:shadow-emerald-500/5 transition-all duration-300">
                                <span class="text-emerald-600 bg-emerald-100 w-8 h-8 rounded-lg flex items-center justify-center shrink-0 shadow-sm font-bold">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0017.25 4.5H6.75A2.25 2.25 0 004.5 6.75v10.5A2.25 2.25 0 006.75 19.5h3.75" />
                                    </svg>
                                </span>
                                <span class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify font-medium">
                                    To maintain standards of nursing education and competency
                                </span>
                            </li>
                        </ul>
                    </div>

                    <!-- Benefits Column (Right) -->
                    <div class="lg:col-span-6 bg-gradient-to-br from-white to-slate-50 border border-slate-200/80 rounded-[2.5rem] p-8 shadow-xl relative overflow-hidden flex flex-col h-full">
                        <div class="absolute -right-16 -top-16 w-36 h-36 bg-emerald-500/5 rounded-full blur-2xl pointer-events-none"></div>
                        <div class="w-12 h-12 rounded-2xl bg-emerald-500 text-white flex items-center justify-center shrink-0 mb-6 shadow-lg shadow-emerald-500/20 relative z-10 animate-pulse">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl sm:text-3xl font-extrabold text-impetus-navy font-outfit mb-4 relative z-10">Benefits of Online CNE Tests</h3>
                        <p class="text-base text-slate-500 leading-relaxed text-justify mb-6 relative z-10">
                            Designed to accelerate your learning journey and build confidence, practicing regularly delivers key advantages:
                        </p>
                        <ul class="space-y-4 flex-grow relative z-10">
                            <!-- Benefit 1 (Emerald Theme) -->
                            <li class="flex gap-4 bg-gradient-to-br from-emerald-50/40 via-white to-white p-4 rounded-xl border border-emerald-100 shadow-sm hover:border-emerald-500/30 hover:shadow-md hover:shadow-emerald-500/5 transition-all duration-300">
                                <div class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600 shadow-sm">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </div>
                                <div>
                                    <h4 class="text-base font-bold text-impetus-navy font-outfit">Standardized Evaluation</h4>
                                    <p class="text-sm text-slate-500 mt-1 leading-relaxed">Provides objective and standardized assessment of learning.</p>
                                </div>
                            </li>

                            <!-- Benefit 2 (Orange Theme) -->
                            <li class="flex gap-4 bg-gradient-to-br from-orange-50/40 via-white to-white p-4 rounded-xl border border-orange-100 shadow-sm hover:border-impetus-orange/30 hover:shadow-md hover:shadow-orange-500/5 transition-all duration-300">
                                <div class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-orange-100 text-impetus-orange shadow-sm">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </div>
                                <div>
                                    <h4 class="text-base font-bold text-impetus-navy font-outfit">Enhanced Accountability</h4>
                                    <p class="text-sm text-slate-500 mt-1 leading-relaxed">Enhances accountability in professional education.</p>
                                </div>
                            </li>

                            <!-- Benefit 3 (Indigo Theme) -->
                            <li class="flex gap-4 bg-gradient-to-br from-indigo-50/40 via-white to-white p-4 rounded-xl border border-indigo-100 shadow-sm hover:border-indigo-500/30 hover:shadow-md hover:shadow-indigo-500/5 transition-all duration-300">
                                <div class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-indigo-100 text-indigo-600 shadow-sm">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </div>
                                <div>
                                    <h4 class="text-base font-bold text-impetus-navy font-outfit">Resource Efficiency</h4>
                                    <p class="text-sm text-slate-500 mt-1 leading-relaxed">Saves time and resources compared to traditional examinations.</p>
                                </div>
                            </li>

                            <!-- Benefit 4 (Emerald Theme) -->
                            <li class="flex gap-4 bg-gradient-to-br from-emerald-50/40 via-white to-white p-4 rounded-xl border border-emerald-100 shadow-sm hover:border-emerald-500/30 hover:shadow-md hover:shadow-emerald-500/5 transition-all duration-300">
                                <div class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600 shadow-sm">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </div>
                                <div>
                                    <h4 class="text-base font-bold text-impetus-navy font-outfit">Universal Access</h4>
                                    <p class="text-sm text-slate-500 mt-1 leading-relaxed">Allows participation from any location.</p>
                                </div>
                            </li>

                            <!-- Benefit 5 (Orange Theme) -->
                            <li class="flex gap-4 bg-gradient-to-br from-orange-50/40 via-white to-white p-4 rounded-xl border border-orange-100 shadow-sm hover:border-impetus-orange/30 hover:shadow-md hover:shadow-orange-500/5 transition-all duration-300">
                                <div class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-orange-100 text-impetus-orange shadow-sm">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </div>
                                <div>
                                    <h4 class="text-base font-bold text-impetus-navy font-outfit">Continuous Progress Tracking</h4>
                                    <p class="text-sm text-slate-500 mt-1 leading-relaxed">Allows continuous monitoring of learning progress.</p>
                                </div>
                            </li>

                            <!-- Benefit 6 (Indigo Theme) -->
                            <li class="flex gap-4 bg-gradient-to-br from-indigo-50/40 via-white to-white p-4 rounded-xl border border-indigo-100 shadow-sm hover:border-indigo-500/30 hover:shadow-md hover:shadow-indigo-500/5 transition-all duration-300">
                                <div class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-indigo-100 text-indigo-600 shadow-sm">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </div>
                                <div>
                                    <h4 class="text-base font-bold text-impetus-navy font-outfit">Self-Discipline Habits</h4>
                                    <p class="text-sm text-slate-500 mt-1 leading-relaxed">Encourages self-discipline and focused study habits.</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-24 sm:py-32 relative bg-slate-50/40 border-b border-slate-200/60 overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-impetus-orange/5 via-transparent to-transparent pointer-events-none"></div>
            
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center mb-16">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-impetus-navy tracking-tight font-outfit">
                        Features of Online CNE Tests
                    </h2>
                    <p class="mt-4 text-slate-600 leading-relaxed text-justify sm:text-center max-w-3xl mx-auto">
                        Our examination platform is built with rigorous protocols to deliver fair, robust, and easily navigable evaluations.
                    </p>
                </div>

                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Feature Card 1 (Orange Theme) -->
                    <div class="rounded-3xl border border-orange-100 bg-gradient-to-br from-orange-50/40 via-white to-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-orange-500/5 flex flex-col items-start relative overflow-hidden group">
                        <div class="w-12 h-12 rounded-2xl bg-orange-500/10 text-orange-600 flex items-center justify-center mb-6 ring-1 ring-orange-200/50 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25A2.25 2.25 0 015.25 3h13.5A2.25 2.25 0 0121 5.25z" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-extrabold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">Fully Digital Access</h4>
                        <p class="text-base text-slate-600 leading-relaxed text-justify">
                            Fully digital and accessible through online platforms, eliminating physical test center constraints.
                        </p>
                    </div>

                    <!-- Feature Card 2 (Sky Theme) -->
                    <div class="rounded-3xl border border-sky-100 bg-gradient-to-br from-sky-50/40 via-white to-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-sky-500/5 flex flex-col items-start relative overflow-hidden group">
                        <div class="w-12 h-12 rounded-2xl bg-sky-500/10 text-sky-600 flex items-center justify-center mb-6 ring-1 ring-sky-200/50 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-extrabold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">Flexible Formats</h4>
                        <p class="text-base text-slate-600 leading-relaxed text-justify">
                            Choose between time-bound proctored models or highly flexible, self-paced competency assessments.
                        </p>
                    </div>

                    <!-- Feature Card 3 (Emerald Theme) -->
                    <div class="rounded-3xl border border-emerald-100 bg-gradient-to-br from-emerald-50/40 via-white to-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-emerald-500/5 flex flex-col items-start relative overflow-hidden group">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center mb-6 ring-1 ring-emerald-200/50 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-extrabold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">Automated Evaluation</h4>
                        <p class="text-base text-slate-600 leading-relaxed text-justify">
                            Instant results, interactive performance scorecards, and immediate feedback rationales are delivered automatically.
                        </p>
                    </div>

                    <!-- Feature Card 4 (Indigo Theme) -->
                    <div class="rounded-3xl border border-indigo-100 bg-gradient-to-br from-indigo-50/40 via-white to-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-indigo-500/5 flex flex-col items-start relative overflow-hidden group">
                        <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 text-indigo-600 flex items-center justify-center mb-6 ring-1 ring-indigo-200/50 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-extrabold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">Integrity-Secured Portal</h4>
                        <p class="text-base text-slate-600 leading-relaxed text-justify">
                            Protected login portals and integrated proctoring workflows maintain assessment integrity at all levels.
                        </p>
                    </div>

                    <!-- Feature Card 5 (Rose Theme) -->
                    <div class="rounded-3xl border border-rose-100 bg-gradient-to-br from-rose-50/40 via-white to-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-rose-500/5 flex flex-col items-start relative overflow-hidden group">
                        <div class="w-12 h-12 rounded-2xl bg-rose-500/10 text-rose-600 flex items-center justify-center mb-6 ring-1 ring-rose-200/50 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7C4.547 9.547 4.5 10.768 4.5 12s.047 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7C19.453 14.453 19.5 13.232 19.5 12z" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-extrabold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">Randomized Questions</h4>
                        <p class="text-base text-slate-600 leading-relaxed text-justify">
                            Each attempt dynamically shuffles the question pool and answers to ensure complete transparency and fairness.
                        </p>
                    </div>

                    <!-- Feature Card 6 (Violet Theme) -->
                    <div class="rounded-3xl border border-violet-100 bg-gradient-to-br from-violet-50/40 via-white to-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-violet-500/5 flex flex-col items-start relative overflow-hidden group">
                        <div class="w-12 h-12 rounded-2xl bg-violet-500/10 text-violet-600 flex items-center justify-center mb-6 ring-1 ring-violet-200/50 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                        <h4 class="text-xl font-extrabold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">Holistic Concept Coverage</h4>
                        <p class="text-base text-slate-600 leading-relaxed text-justify">
                            Comprehensive assessment mapped thoroughly to encompass both critical theory and practical clinical decisions.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Level of Questions Section -->
        <section class="border-t border-slate-200/80 bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-3xl text-center mb-16">
                    <span class="text-sm font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-3 block">Rigorous Taxonomy</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-impetus-navy tracking-tight font-outfit">
                        Questions Difficulty Hierarchy
                    </h2>
                    <p class="mt-4 text-slate-600 leading-relaxed text-justify sm:text-center max-w-3xl mx-auto">
                        Online CNE tests are divided into three distinct diagnostic tiers to evaluate a candidate's holistic clinical mastery.
                    </p>
                </div>

                <div class="grid gap-8 lg:grid-cols-3 lg:items-stretch">
                    <!-- Level 1 Card -->
                    <article class="flex h-full min-h-0 flex-col overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-sm transition-all hover:shadow-lg hover:-translate-y-1 border-t-4 border-t-impetus-orange group">
                        <div class="relative h-48 w-full shrink-0 overflow-hidden bg-slate-100">
                            <img
                                src="{{ asset('images/nurses_education-1000x675.png') }}"
                                alt="Study materials and preparation for a nursing examination"
                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                width="900"
                                height="600"
                                loading="lazy"
                                decoding="async"
                            >
                            <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-slate-950/40 via-transparent to-transparent"></div>
                            <div class="absolute bottom-4 left-6 flex items-center gap-2">
                                <span class="rounded-full bg-white/20 px-3 py-1 text-xs font-bold text-white backdrop-blur-md border border-white/10 uppercase tracking-wide">Tier 1</span>
                            </div>
                        </div>
                        <div class="flex min-h-0 flex-1 flex-col p-8">
                            <h3 class="text-2xl font-bold text-impetus-navy font-outfit mb-4">Level 1 - Factual Knowledge</h3>
                            <div class="flex-1 space-y-4 text-base sm:text-lg text-slate-600 leading-relaxed text-justify">
                                <p>
                                    Focuses on the assessment of factual knowledge, evaluating the participant's foundational understanding of essential nursing concepts.
                                </p>
                                <p>
                                    Supports accurate evaluation of basic theoretical knowledge required for safe and effective clinical nursing practice.
                                </p>
                            </div>
                        </div>
                    </article>

                    <!-- Level 2 Card -->
                    <article class="flex h-full min-h-0 flex-col overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-sm transition-all hover:shadow-lg hover:-translate-y-1 border-t-4 border-t-impetus-navy group">
                        <div class="relative h-48 w-full shrink-0 overflow-hidden bg-slate-100">
                            <img
                                src="{{ asset('images/skill-based-education.jpg') }}"
                                alt="Laptop showing an online multiple-choice examination"
                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                width="900"
                                height="600"
                                loading="lazy"
                                decoding="async"
                            >
                            <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-slate-950/40 via-transparent to-transparent"></div>
                            <div class="absolute bottom-4 left-6 flex items-center gap-2">
                                <span class="rounded-full bg-white/20 px-3 py-1 text-xs font-bold text-white backdrop-blur-md border border-white/10 uppercase tracking-wide">Tier 2</span>
                            </div>
                        </div>
                        <div class="flex min-h-0 flex-1 flex-col p-8">
                            <h3 class="text-2xl font-bold text-impetus-navy font-outfit mb-4">Level 2 - Functional Knowledge</h3>
                            <div class="flex-1 space-y-4 text-base sm:text-lg text-slate-600 leading-relaxed text-justify">
                                <p>
                                    Focuses on the assessment of functional knowledge, measuring how well participants can apply learned concepts in practical nursing situations.
                                </p>
                                <p>
                                    Focuses directly on the clinical application of skills and safety protocols in real-world healthcare scenarios.
                                </p>
                            </div>
                        </div>
                    </article>

                    <!-- Level 3 Card -->
                    <article class="flex h-full min-h-0 flex-col overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-sm transition-all hover:shadow-lg hover:-translate-y-1 border-t-4 border-t-[#8B5CF6] group">
                        <div class="relative h-48 w-full shrink-0 overflow-hidden bg-slate-100">
                            <img
                                src="{{ asset('images/nursing-next-generation.jpg') }}"
                                alt="Graduates celebrating achievement and certification"
                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                width="900"
                                height="600"
                                loading="lazy"
                                decoding="async"
                            >
                            <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-slate-950/40 via-transparent to-transparent"></div>
                            <div class="absolute bottom-4 left-6 flex items-center gap-2">
                                <span class="rounded-full bg-white/20 px-3 py-1 text-xs font-bold text-white backdrop-blur-md border border-white/10 uppercase tracking-wide">Tier 3</span>
                            </div>
                        </div>
                        <div class="flex min-h-0 flex-1 flex-col p-8">
                            <h3 class="text-2xl font-bold text-impetus-navy font-outfit mb-4">Level 3 - Problem Solving</h3>
                            <div class="flex-1 space-y-4 text-base sm:text-lg text-slate-600 leading-relaxed text-justify">
                                <p>
                                    Focuses on the assessment of problem-solving ability, challenging participants to use critical clinical judgement and decision-making in more complex scenarios.
                                </p>
                                <p>
                                    Recognizes higher-order reasoning, immediate diagnostics, and advanced clinical application for professional development.
                                </p>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Live Feedback & Scoring Notice Banner -->
                <div class="mt-16 rounded-[2rem] border border-impetus-orange/20 border-l-8 border-l-impetus-orange bg-gradient-to-r from-impetus-orange/10 via-impetus-orange/[0.02] to-transparent p-8 sm:p-10 shadow-md">
                    <div class="flex flex-col sm:flex-row items-start gap-6">
                        <div class="w-14 h-14 rounded-2xl bg-impetus-orange text-white flex items-center justify-center shrink-0 shadow-lg shadow-impetus-orange/25">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18V6.125c0-.621.504-1.125 1.125-1.125H9.75M9 5.25h6.75m-6.75 0a.75.75 0 00-.75.75v1.125c0 .414.336.75.75.75h6.75a.75.75 0 00.75-.75V6c0-.414-.336-.75-.75-.75M9 5.25V3.75A1.5 1.5 0 007.5 2.25h9A1.5 1.5 0 0018 3.75V5.25" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-xl sm:text-2xl font-extrabold text-impetus-navy font-outfit mb-3">Automated Feedback &amp; Detailed Scoring Rationale</h4>
                            <p class="text-base sm:text-lg text-slate-700 leading-relaxed text-justify">
                                Immediate scoring and grading will be provided upon completion of the test, allowing test-takers to identify areas of strength and weakness. This feedback is highly valuable for self-evaluation, continuous improvement, and target CNE credit calculations.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Concluding Takeaway & CTA Section -->
        <section class="py-20 sm:py-24 relative bg-impetus-navy text-white overflow-hidden">
            <!-- Decorative vector glows -->
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_right,_var(--tw-gradient-stops))] from-impetus-orange/20 via-transparent to-transparent pointer-events-none"></div>
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-impetus-orange/10 rounded-full blur-[120px] pointer-events-none"></div>
            
            <div class="relative mx-auto max-w-5xl px-6 lg:px-8 text-center">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-md border border-white/20 mb-8">
                    <span class="w-2.5 h-2.5 rounded-full bg-impetus-orange animate-pulse"></span>
                    <span class="text-xs sm:text-sm font-bold uppercase tracking-wider font-outfit text-slate-200">Outcome Validation</span>
                </div>
                
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight font-outfit mb-6 leading-tight max-w-3xl mx-auto">
                    Transforming Theoretical Frameworks into Quality Patient Care
                </h2>
                
                <p class="text-base sm:text-lg text-slate-300 leading-relaxed text-justify sm:text-center max-w-4xl mx-auto mb-10">
                    Online tests in CNE play a vital role in ensuring that healthcare professionals achieve required competencies and maintain high standards of clinical practice. They help validate learning outcomes and contribute to improved patient care, professional growth, and lifelong learning in nursing education.
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('cne.modules') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-2xl bg-impetus-orange text-white font-bold hover:bg-impetus-orange/90 active:scale-95 transition-all shadow-lg shadow-impetus-orange/20 font-outfit text-sm tracking-wide">
                        View CNE Modules
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                    <a href="{{ route('practice.test') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-2xl bg-white/5 border border-white/20 text-white font-bold hover:bg-white/10 active:scale-95 transition-all font-outfit text-sm tracking-wide">
                        Try Practice Tests
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection
