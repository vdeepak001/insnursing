@extends('layouts.frontend.app')

@section('title', 'CNE Practice Tests - IHS')

@section('content')
    <main class="overflow-hidden bg-[#F8FAFC]">
        <!-- Hero Section -->
        <section class="relative bg-gradient-to-br from-white via-slate-50 to-slate-100/50 py-20 sm:py-28 border-b border-slate-200/60">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-impetus-orange/5 via-transparent to-transparent pointer-events-none"></div>
            <div class="absolute top-1/2 left-0 w-80 h-80 bg-impetus-orange/5 rounded-full blur-[120px] pointer-events-none"></div>
            
            <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-center gap-16 lg:grid-cols-12">
                    <div class="lg:col-span-7">
                        <span class="text-sm font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-3 block">Self-Assessment Tools</span>
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-impetus-navy tracking-tight font-outfit leading-tight mb-6">
                            CNE Practice Tests
                        </h1>
                        
                        <div class="space-y-6 text-slate-600 text-justify leading-relaxed text-sm sm:text-base">
                            <p>
                                <strong>Practice tests</strong> in Online Continuing Nursing Education (CNE) are structured assessment tools designed to evaluate and reinforce the knowledge and clinical understanding of nurses and healthcare professionals during and after training modules. These tests are an essential part of the learning process, enabling learners to assess their progress, identify knowledge gaps, and strengthen their competency in various nursing and healthcare domains.
                            </p>
                            <p>
                                Online CNE practice tests are typically based on evidence-based guidelines and standardized curricula. They include multiple-choice questions, case-based scenarios, clinical problem-solving exercises, and situation-based questions that reflect real-world healthcare practice. These assessments help learners apply theoretical knowledge to practical clinical situations.
                            </p>
                        </div>
                    </div>

                    <!-- Right Column: Visual Checklist/Illustrative Dashboard -->
                    <div class="lg:col-span-5 relative">
                        <div class="absolute -inset-4 rounded-[2.5rem] bg-gradient-to-tr from-impetus-orange/10 via-transparent to-impetus-navy/10 blur-2xl -z-10"></div>
                        <div class="relative overflow-hidden rounded-[2rem] border border-slate-200/80 bg-white p-4 shadow-2xl">
                            <!-- SVG Graphic Representation -->
                            <svg class="w-full h-auto max-h-[350px]" viewBox="0 0 500 350" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <!-- Grid pattern -->
                                <defs>
                                    <pattern id="grid" width="20" height="20" patternUnits="userSpaceOnUse">
                                        <circle cx="2" cy="2" r="1" fill="#E2E8F0" />
                                    </pattern>
                                </defs>
                                <rect width="500" height="350" rx="16" fill="url(#grid)" />
                                
                                <!-- Base Glows -->
                                <circle cx="250" cy="175" r="120" fill="#F36E21" opacity="0.05" filter="blur(40px)" />
                                <circle cx="380" cy="220" r="80" fill="#0A1931" opacity="0.05" filter="blur(30px)" />
                                
                                <!-- Checklist Dashboard -->
                                <rect x="80" y="40" width="340" height="250" rx="16" fill="white" stroke="#E2E8F0" stroke-width="1.5" />
                                <rect x="80" y="40" width="340" height="60" rx="16 16 0 0" fill="#0A1931" />
                                
                                <!-- Dashboard Header -->
                                <circle cx="110" cy="70" r="14" fill="#F36E21" />
                                <!-- Checklist symbol inside orange circle -->
                                <path d="M106 70 L109 73 L114 66" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <text x="135" y="74" fill="white" font-family="Outfit, sans-serif" font-weight="bold" font-size="16">CNE Practice Exam</text>
                                
                                <!-- Timer Widget (Right Top) -->
                                <rect x="300" y="52" width="105" height="36" rx="8" fill="#1E293B" />
                                <circle cx="320" cy="70" r="8" fill="none" stroke="#F36E21" stroke-width="2" />
                                <path d="M320 66 V70 H324" stroke="#F36E21" stroke-width="1.5" stroke-linecap="round" />
                                <text x="334" y="75" fill="white" font-family="monospace" font-weight="bold" font-size="13">45:00</text>
                                
                                <!-- Test Questions (Rows) -->
                                <!-- Row 1 -->
                                <rect x="100" y="120" width="22" height="22" rx="6" fill="#F36E21" opacity="0.1" />
                                <text x="108" y="136" fill="#F36E21" font-family="Outfit, sans-serif" font-weight="bold" font-size="14">1</text>
                                <rect x="135" y="124" width="160" height="12" rx="4" fill="#0A1931" />
                                <rect x="340" y="122" width="60" height="18" rx="9" fill="#ECFDF5" />
                                <text x="350" y="134" fill="#047857" font-family="Outfit, sans-serif" font-weight="bold" font-size="10">Correct</text>
                                
                                <!-- Row 2 -->
                                <rect x="100" y="155" width="22" height="22" rx="6" fill="#F36E21" opacity="0.1" />
                                <text x="108" y="171" fill="#F36E21" font-family="Outfit, sans-serif" font-weight="bold" font-size="14">2</text>
                                <rect x="135" y="159" width="180" height="12" rx="4" fill="#94A3B8" opacity="0.4" />
                                <rect x="340" y="157" width="60" height="18" rx="9" fill="#ECFDF5" />
                                <text x="350" y="169" fill="#047857" font-family="Outfit, sans-serif" font-weight="bold" font-size="10">Correct</text>

                                <!-- Row 3 (Current Active Question) -->
                                <rect x="100" y="190" width="22" height="22" rx="6" fill="#0A1931" />
                                <text x="108" y="206" fill="white" font-family="Outfit, sans-serif" font-weight="bold" font-size="14">3</text>
                                <rect x="135" y="194" width="145" height="12" rx="4" fill="#0A1931" />
                                <rect x="340" y="192" width="60" height="18" rx="9" fill="#EFF6FF" />
                                <text x="352" y="204" fill="#1D4ED8" font-family="Outfit, sans-serif" font-weight="bold" font-size="10">Active</text>
                                
                                <!-- Active selection options -->
                                <circle cx="145" cy="225" r="6" fill="none" stroke="#F36E21" stroke-width="2" />
                                <circle cx="145" cy="225" r="3" fill="#F36E21" />
                                <rect x="160" y="220" width="90" height="10" rx="3" fill="#0A1931" opacity="0.8" />
                                
                                <circle cx="270" cy="225" r="6" fill="none" stroke="#94A3B8" stroke-width="1.5" />
                                <rect x="285" y="220" width="90" height="10" rx="3" fill="#94A3B8" opacity="0.4" />
                                
                                <!-- Score Widget (Floating Bottom-Right) -->
                                <rect x="310" y="240" width="130" height="70" rx="16" fill="white" stroke="#E2E8F0" stroke-width="1.5" />
                                <circle cx="340" cy="275" r="18" fill="#ECFDF5" />
                                <!-- Small check icon -->
                                <path d="M335 275 L338 278 L345 271" stroke="#10B981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none" />
                                <text x="368" y="268" fill="#94A3B8" font-family="Outfit, sans-serif" font-size="10" font-weight="bold">SCORE</text>
                                <text x="368" y="286" fill="#0A1931" font-family="Outfit, sans-serif" font-size="18" font-weight="extrabold">95%</text>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Purpose & Benefits Section -->
        <section class="py-24 sm:py-32 relative bg-white border-b border-slate-200/60 overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-impetus-orange/5 via-transparent to-transparent pointer-events-none"></div>
            
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-start gap-16 lg:grid-cols-12">
                    
                    <!-- Purpose Column (Left) -->
                    <div class="lg:col-span-6 bg-slate-50 border border-slate-200/80 rounded-[2rem] p-8 shadow-lg">
                        <div class="w-12 h-12 rounded-2xl bg-impetus-orange text-white flex items-center justify-center shrink-0 mb-6 shadow-md shadow-impetus-orange/10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-extrabold text-impetus-navy font-outfit mb-4">Purpose of Practice Tests</h3>
                        <p class="text-sm text-slate-500 leading-relaxed text-justify mb-6">
                            Structured to solidify understanding and verify active nursing competency, our practice assessments serve several fundamental goals:
                        </p>
                        <ul class="space-y-4">
                            <li class="flex gap-3 bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:border-slate-200 transition-colors">
                                <span class="text-impetus-orange font-bold text-lg leading-none mt-0.5 shrink-0">&bull;</span>
                                <span class="text-xs sm:text-sm text-slate-600 leading-relaxed text-justify">
                                    To assess understanding of course content
                                </span>
                            </li>
                            <li class="flex gap-3 bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:border-slate-200 transition-colors">
                                <span class="text-impetus-orange font-bold text-lg leading-none mt-0.5 shrink-0">&bull;</span>
                                <span class="text-xs sm:text-sm text-slate-600 leading-relaxed text-justify">
                                    To reinforce key clinical concepts and guidelines
                                </span>
                            </li>
                            <li class="flex gap-3 bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:border-slate-200 transition-colors">
                                <span class="text-impetus-orange font-bold text-lg leading-none mt-0.5 shrink-0">&bull;</span>
                                <span class="text-xs sm:text-sm text-slate-600 leading-relaxed text-justify">
                                    To identify areas requiring further study
                                </span>
                            </li>
                            <li class="flex gap-3 bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:border-slate-200 transition-colors">
                                <span class="text-impetus-orange font-bold text-lg leading-none mt-0.5 shrink-0">&bull;</span>
                                <span class="text-xs sm:text-sm text-slate-600 leading-relaxed text-justify">
                                    To improve critical thinking and decision-making skills
                                </span>
                            </li>
                            <li class="flex gap-3 bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:border-slate-200 transition-colors">
                                <span class="text-impetus-orange font-bold text-lg leading-none mt-0.5 shrink-0">&bull;</span>
                                <span class="text-xs sm:text-sm text-slate-600 leading-relaxed text-justify">
                                    To prepare learners for final assessments or certification examinations
                                </span>
                            </li>
                        </ul>
                    </div>

                    <!-- Benefits Column (Right) -->
                    <div class="lg:col-span-6 flex flex-col justify-center h-full">
                        <span class="text-sm font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-3 block">Measurable Growth</span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-impetus-navy tracking-tight font-outfit mb-6">Benefits of Practice Tests</h2>
                        
                        <ul class="space-y-4">
                            <li class="flex items-start gap-4">
                                <div class="mt-1 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-impetus-navy font-outfit">Enhances Retention</h4>
                                    <p class="text-sm text-slate-500">Enhances retention of clinical knowledge.</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="mt-1 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-impetus-navy font-outfit">Builds Clinical Confidence</h4>
                                    <p class="text-sm text-slate-500">Builds confidence in handling real-life clinical situations.</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="mt-1 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-impetus-navy font-outfit">Improves Decision Pacing</h4>
                                    <p class="text-sm text-slate-500">Improves accuracy and speed in clinical decision-making.</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="mt-1 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-impetus-navy font-outfit">Supports Self-Evaluation</h4>
                                    <p class="text-sm text-slate-500">Supports continuous self-evaluation and improvement.</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="mt-1 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-impetus-navy font-outfit">Exam Readiness</h4>
                                    <p class="text-sm text-slate-500">Strengthens readiness for professional certification exams.</p>
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
                    <span class="text-sm font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-3 block">High-Fidelity Evaluation</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-impetus-navy tracking-tight font-outfit">
                        Features of Online CNE Practice Tests
                    </h2>
                    <p class="mt-4 text-slate-600 leading-relaxed text-justify sm:text-center max-w-3xl mx-auto">
                        Engineered to provide a rich educational ecosystem, our practice assessments leverage evidence-based standards to deliver optimal clinical learning.
                    </p>
                </div>

                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Feature Card 1 -->
                    <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col items-start relative overflow-hidden group">
                        <div class="w-12 h-12 rounded-2xl bg-orange-500/10 text-orange-600 flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-3.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V6.75a2.25 2.25 0 01-2.25 2.25H15A2.25 2.25 0 0113.5 6.75V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">Module-Wise Sets</h4>
                        <p class="text-sm text-slate-600 leading-relaxed text-justify">
                            Topic-wise and module-wise question sets are tailored specifically to match every target knowledge domain in your CNE training modules.
                        </p>
                    </div>

                    <!-- Feature Card 2 -->
                    <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col items-start relative overflow-hidden group">
                        <div class="w-12 h-12 rounded-2xl bg-sky-500/10 text-sky-600 flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">Flexible Assessments</h4>
                        <p class="text-sm text-slate-600 leading-relaxed text-justify">
                            Enjoy self-paced learning with no constraints, or take time-bound practice assessments to simulate high-pressure, real-world exams.
                        </p>
                    </div>

                    <!-- Feature Card 3 -->
                    <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col items-start relative overflow-hidden group">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">Instant Analytics</h4>
                        <p class="text-sm text-slate-600 leading-relaxed text-justify">
                            Obtain instant feedback, detailed scoring guides, and robust clinical performance analysis to identify strength areas and knowledge gaps.
                        </p>
                    </div>

                    <!-- Feature Card 4 -->
                    <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col items-start relative overflow-hidden group">
                        <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 text-indigo-600 flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">Case-Driven Scenarios</h4>
                        <p class="text-sm text-slate-600 leading-relaxed text-justify">
                            Practice with clinical problem-solving exercises, case-based questions, and real-world scenario metrics that accurately mimic daily practice.
                        </p>
                    </div>

                    <!-- Feature Card 5 -->
                    <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col items-start relative overflow-hidden group">
                        <div class="w-12 h-12 rounded-2xl bg-rose-500/10 text-rose-600 flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">Unlimited Re-Attempts</h4>
                        <p class="text-sm text-slate-600 leading-relaxed text-justify">
                            Enjoy repeated learning attempts on complex topics, ensuring perfect knowledge retention and readiness for final certification exams.
                        </p>
                    </div>

                    <!-- Feature Card 6 -->
                    <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col items-start relative overflow-hidden group">
                        <div class="w-12 h-12 rounded-2xl bg-violet-500/10 text-violet-600 flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25A2.25 2.25 0 015.25 3h13.5A2.25 2.25 0 0121 5.25z" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">Universal Platform</h4>
                        <p class="text-sm text-slate-600 leading-relaxed text-justify">
                            Seamlessly optimized and accessible anywhere through our online learning platforms via desktops, laptops, tablets, and smartphones.
                        </p>
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
                    <span class="text-xs sm:text-sm font-bold uppercase tracking-wider font-outfit text-slate-200">Continuous Mastery</span>
                </div>
                
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight font-outfit mb-6 leading-tight max-w-3xl mx-auto">
                    Transforming Nursing Knowledge Into Clinical Competence
                </h2>
                
                <p class="text-base sm:text-lg text-slate-300 leading-relaxed text-justify sm:text-center max-w-4xl mx-auto mb-10">
                    Practice tests in Online Continuing Nursing Education (CNE) play a vital role in ensuring effective learning by transforming theoretical knowledge into practical understanding. They help nursing professionals stay competent, confident, and prepared to deliver safe and high-quality patient care in clinical settings.
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('cne.modules') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-2xl bg-impetus-orange text-white font-bold hover:bg-impetus-orange/90 active:scale-95 transition-all shadow-lg shadow-impetus-orange/20 font-outfit text-sm tracking-wide">
                        Explore CNE Modules
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                    <a href="{{ route('about') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-2xl bg-white/5 border border-white/20 text-white font-bold hover:bg-white/10 active:scale-95 transition-all font-outfit text-sm tracking-wide">
                        About IHS Training
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection
