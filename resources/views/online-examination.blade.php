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
                    <div class="lg:col-span-7">
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
                    <div class="lg:col-span-5 relative">
                        <div class="absolute -inset-4 rounded-[2.5rem] bg-gradient-to-tr from-impetus-orange/10 via-transparent to-impetus-navy/10 blur-2xl -z-10"></div>
                        <div class="relative overflow-hidden rounded-[2rem] border border-slate-200/80 bg-white p-4 shadow-2xl">
                            <svg class="w-full h-auto max-h-[350px]" viewBox="0 0 500 350" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <!-- Dot Grid Pattern -->
                                <defs>
                                    <pattern id="dot-grid" width="20" height="20" patternUnits="userSpaceOnUse">
                                        <circle cx="2" cy="2" r="1" fill="#E2E8F0" />
                                    </pattern>
                                </defs>
                                <rect width="500" height="350" rx="16" fill="url(#dot-grid)" />
                                
                                <!-- Decorative Gradients -->
                                <circle cx="150" cy="175" r="120" fill="#F36E21" opacity="0.05" filter="blur(40px)" />
                                <circle cx="350" cy="175" r="120" fill="#0A1931" opacity="0.05" filter="blur(40px)" />
                                
                                <!-- Main Proctoring Portal Frame -->
                                <rect x="50" y="30" width="400" height="270" rx="16" fill="#0A1931" stroke="#1E293B" stroke-width="4" />
                                <rect x="60" y="40" width="380" height="230" rx="8" fill="#F8FAFC" />
                                
                                <!-- Base stand -->
                                <path d="M150 300 L350 300 L370 320 L130 320 Z" fill="#E2E8F0" stroke="#CBD5E1" stroke-width="1.5" />
                                <rect x="180" y="320" width="140" height="6" rx="3" fill="#94A3B8" />
                                
                                <!-- Secure Header Bar -->
                                <rect x="70" y="50" width="360" height="30" rx="6" fill="white" stroke="#E2E8F0" stroke-width="1" />
                                <circle cx="86" cy="65" r="6" fill="#10B981" />
                                <path d="M83 65 L85 67 L89 63" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none" />
                                <text x="100" y="69" fill="#0A1931" font-family="Outfit, sans-serif" font-weight="bold" font-size="10">SECURE EXAM SYSTEM</text>
                                
                                <!-- Live Proctor Video Bubble (Right-Top) -->
                                <rect x="290" y="90" width="130" height="85" rx="8" fill="#1E293B" stroke="#F36E21" stroke-width="1.5" />
                                <circle cx="355" cy="120" r="16" fill="#475569" />
                                <path d="M338 150 C338 140 345 138 355 138 C365 138 372 140 372 150" fill="#475569" />
                                <circle cx="304" cy="104" r="4.5" fill="#34D399" />
                                <text x="314" y="107" fill="#34D399" font-family="Outfit, sans-serif" font-weight="bold" font-size="8">LIVE FEED</text>
                                
                                <!-- Exam Paper Widget (Left Side) -->
                                <rect x="70" y="90" width="210" height="170" rx="8" fill="white" stroke="#E2E8F0" stroke-width="1" />
                                <rect x="80" y="102" width="170" height="8" rx="2" fill="#0A1931" />
                                <rect x="80" y="114" width="130" height="8" rx="2" fill="#0A1931" />
                                <rect x="80" y="126" width="150" height="8" rx="2" fill="#94A3B8" opacity="0.3" />
                                
                                <!-- Multiple Choice Radio Options -->
                                <circle cx="88" cy="154" r="6" fill="none" stroke="#F36E21" stroke-width="2" />
                                <circle cx="88" cy="154" r="3" fill="#F36E21" />
                                <rect x="102" y="150" width="120" height="8" rx="2" fill="#0A1931" />
                                
                                <circle cx="88" cy="174" r="6" fill="none" stroke="#94A3B8" stroke-width="1.5" />
                                <rect x="102" y="170" width="100" height="8" rx="2" fill="#94A3B8" opacity="0.4" />
                                
                                <circle cx="88" cy="194" r="6" fill="none" stroke="#94A3B8" stroke-width="1.5" />
                                <rect x="102" y="190" width="130" height="8" rx="2" fill="#94A3B8" opacity="0.4" />
                                
                                <!-- Timer block (Bottom of exam card) -->
                                <rect x="70" y="222" width="210" height="38" rx="0 0 8 8" fill="#F8FAFC" stroke="#E2E8F0" stroke-width="1" />
                                <circle cx="86" cy="241" r="7" fill="none" stroke="#F36E21" stroke-width="1.5" />
                                <path d="M86 237 V241 H90" stroke="#F36E21" stroke-width="1.2" stroke-linecap="round" />
                                <text x="98" y="245" fill="#F36E21" font-family="monospace" font-weight="bold" font-size="11">Time Left: 24:18</text>
                                
                                <!-- Integrity Checked Shield (Bottom Right) -->
                                <rect x="290" y="185" width="130" height="75" rx="8" fill="#F0FDF4" stroke="#BBF7D0" stroke-width="1.5" />
                                <path d="M308 206 L318 201 L328 206 V216 C328 222 324 228 318 230 C312 228 308 222 308 216 V206 Z" fill="#34D399" opacity="0.2" stroke="#10B981" stroke-width="1.5" />
                                <path d="M315 216 L317 218 L321 213" stroke="#10B981" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none" />
                                <text x="336" y="215" fill="#047857" font-family="Outfit, sans-serif" font-weight="extrabold" font-size="9">INTEGRITY</text>
                                <text x="336" y="227" fill="#047857" font-family="Outfit, sans-serif" font-weight="bold" font-size="8">VERIFIED</text>
                                <rect x="300" y="242" width="110" height="12" rx="4" fill="#10B981" opacity="0.1" />
                                <text x="314" y="251" fill="#047857" font-family="Outfit, sans-serif" font-weight="black" font-size="7">PROCTORING ACTIVE</text>
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
                        <div class="w-12 h-12 rounded-2xl bg-impetus-navy text-white flex items-center justify-center shrink-0 mb-6 shadow-md shadow-impetus-navy/10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.03 0 1.9.693 2.166 1.638m-7.377 2.24A2.251 2.251 0 0 1 7.5 6.108V16.5a2.25 2.25 0 0 0 2.25 2.25h1.5m-.1-12.75a48.367 48.367 0 0 1 1 .08M7.5 6.108c0-1.135.845-2.098 1.976-2.192A48.424 48.424 0 0 1 10.6 3.84" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-extrabold text-impetus-navy font-outfit mb-4">Purpose of Online CNE Tests</h3>
                        <p class="text-sm text-slate-500 leading-relaxed text-justify mb-6">
                            Aligned with international clinical guidelines and continuous education frameworks, these digital assessments secure critical educational outcomes:
                        </p>
                        <ul class="space-y-4">
                            <li class="flex gap-3 bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:border-slate-200 transition-colors">
                                <span class="text-impetus-orange font-bold text-lg leading-none mt-0.5 shrink-0">&bull;</span>
                                <span class="text-xs sm:text-sm text-slate-600 leading-relaxed text-justify">
                                    To assess learners' understanding of course content
                                </span>
                            </li>
                            <li class="flex gap-3 bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:border-slate-200 transition-colors">
                                <span class="text-impetus-orange font-bold text-lg leading-none mt-0.5 shrink-0">&bull;</span>
                                <span class="text-xs sm:text-sm text-slate-600 leading-relaxed text-justify">
                                    To evaluate clinical knowledge and decision-making ability
                                </span>
                            </li>
                            <li class="flex gap-3 bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:border-slate-200 transition-colors">
                                <span class="text-impetus-orange font-bold text-lg leading-none mt-0.5 shrink-0">&bull;</span>
                                <span class="text-xs sm:text-sm text-slate-600 leading-relaxed text-justify">
                                    To ensure achievement of learning outcomes
                                </span>
                            </li>
                            <li class="flex gap-3 bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:border-slate-200 transition-colors">
                                <span class="text-impetus-orange font-bold text-lg leading-none mt-0.5 shrink-0">&bull;</span>
                                <span class="text-xs sm:text-sm text-slate-600 leading-relaxed text-justify">
                                    To support certification and continuing professional development requirements
                                </span>
                            </li>
                            <li class="flex gap-3 bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:border-slate-200 transition-colors">
                                <span class="text-impetus-orange font-bold text-lg leading-none mt-0.5 shrink-0">&bull;</span>
                                <span class="text-xs sm:text-sm text-slate-600 leading-relaxed text-justify">
                                    To maintain standards of nursing education and competency
                                </span>
                            </li>
                        </ul>
                    </div>

                    <!-- Benefits Column (Right) -->
                    <div class="lg:col-span-6 flex flex-col justify-center h-full">
                        <span class="text-sm font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-3 block">Measurable Professional Growth</span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-impetus-navy tracking-tight font-outfit mb-6">Benefits of Online CNE Tests</h2>
                        
                        <ul class="space-y-6">
                            <li class="flex items-start gap-4">
                                <div class="mt-1 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-impetus-navy font-outfit">Standardized Evaluation</h4>
                                    <p class="text-sm text-slate-500">Provides objective and standardized assessment of learning.</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="mt-1 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-impetus-navy font-outfit">Enhanced Accountability</h4>
                                    <p class="text-sm text-slate-500">Enhances accountability in professional education.</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="mt-1 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-impetus-navy font-outfit">Resource Efficiency</h4>
                                    <p class="text-sm text-slate-500">Saves time and resources compared to traditional examinations.</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="mt-1 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-impetus-navy font-outfit">Universal Access</h4>
                                    <p class="text-sm text-slate-500">Allows participation from any location.</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="mt-1 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-impetus-navy font-outfit">Continuous Progress Tracking</h4>
                                    <p class="text-sm text-slate-500">Allows continuous monitoring of learning progress.</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="mt-1 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-impetus-navy font-outfit">Self-Discipline Habits</h4>
                                    <p class="text-sm text-slate-500">Encourages self-discipline and focused study habits.</p>
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
                    <span class="text-sm font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-3 block">High-Fidelity Systems</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-impetus-navy tracking-tight font-outfit">
                        Features of Online CNE Tests
                    </h2>
                    <p class="mt-4 text-slate-600 leading-relaxed text-justify sm:text-center max-w-3xl mx-auto">
                        Our examination platform is built with rigorous protocols to deliver fair, robust, and easily navigable evaluations.
                    </p>
                </div>

                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Card 1 -->
                    <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col items-start relative overflow-hidden group">
                        <div class="w-12 h-12 rounded-2xl bg-orange-500/10 text-orange-600 flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25A2.25 2.25 0 015.25 3h13.5A2.25 2.25 0 0121 5.25z" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">Fully Digital Access</h4>
                        <p class="text-sm text-slate-600 leading-relaxed text-justify">
                            Fully digital and accessible through online platforms.
                        </p>
                    </div>

                    <!-- Card 2 -->
                    <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col items-start relative overflow-hidden group">
                        <div class="w-12 h-12 rounded-2xl bg-sky-500/10 text-sky-600 flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">Flexible Formats</h4>
                        <p class="text-sm text-slate-600 leading-relaxed text-justify">
                            Time-bound or flexible assessment formats.
                        </p>
                    </div>

                    <!-- Card 3 -->
                    <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col items-start relative overflow-hidden group">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">Automated Evaluation</h4>
                        <p class="text-sm text-slate-600 leading-relaxed text-justify">
                            Automated evaluation and instant result generation.
                        </p>
                    </div>

                    <!-- Card 4 -->
                    <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col items-start relative overflow-hidden group">
                        <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 text-indigo-600 flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">Integrity-Secured Portal</h4>
                        <p class="text-sm text-slate-600 leading-relaxed text-justify">
                            Secure login and controlled access to maintain integrity.
                        </p>
                    </div>

                    <!-- Card 5 -->
                    <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col items-start relative overflow-hidden group">
                        <div class="w-12 h-12 rounded-2xl bg-rose-500/10 text-rose-600 flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7C4.547 9.547 4.5 10.768 4.5 12s.047 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7C19.453 14.453 19.5 13.232 19.5 12z" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">Randomized Questions</h4>
                        <p class="text-sm text-slate-600 leading-relaxed text-justify">
                            Randomized question sets to ensure fairness.
                        </p>
                    </div>

                    <!-- Card 6 -->
                    <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col items-start relative overflow-hidden group">
                        <div class="w-12 h-12 rounded-2xl bg-violet-500/10 text-violet-600 flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-impetus-navy font-outfit mb-3 group-hover:text-impetus-orange transition-colors">Holistic Concept Coverage</h4>
                        <p class="text-sm text-slate-600 leading-relaxed text-justify">
                            Coverage of theoretical and clinical concepts.
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
                                src="https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?auto=format&fit=crop&w=900&q=80"
                                alt="Study materials and preparation for a nursing examination"
                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                width="900"
                                height="600"
                                loading="lazy"
                                decoding="async"
                            >
                            <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-slate-900/50 via-transparent to-transparent"></div>
                            <div class="absolute bottom-4 left-6 flex items-center gap-2">
                                <span class="rounded-full bg-white/20 px-3 py-1 text-xs font-bold text-white backdrop-blur-md border border-white/10 uppercase tracking-wide">Tier 1</span>
                            </div>
                        </div>
                        <div class="flex min-h-0 flex-1 flex-col p-8">
                            <h3 class="text-xl font-bold text-impetus-navy font-outfit mb-4">Level 1 - Factual Knowledge</h3>
                            <div class="flex-1 space-y-4 text-sm text-slate-600 leading-relaxed text-justify">
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
                                src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=80"
                                alt="Laptop showing an online multiple-choice examination"
                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                width="900"
                                height="600"
                                loading="lazy"
                                decoding="async"
                            >
                            <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-slate-900/50 via-transparent to-transparent"></div>
                            <div class="absolute bottom-4 left-6 flex items-center gap-2">
                                <span class="rounded-full bg-white/20 px-3 py-1 text-xs font-bold text-white backdrop-blur-md border border-white/10 uppercase tracking-wide">Tier 2</span>
                            </div>
                        </div>
                        <div class="flex min-h-0 flex-1 flex-col p-8">
                            <h3 class="text-xl font-bold text-impetus-navy font-outfit mb-4">Level 2 - Functional Knowledge</h3>
                            <div class="flex-1 space-y-4 text-sm text-slate-600 leading-relaxed text-justify">
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
                                src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=900&q=80"
                                alt="Graduates celebrating achievement and certification"
                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                width="900"
                                height="600"
                                loading="lazy"
                                decoding="async"
                            >
                            <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-slate-900/50 via-transparent to-transparent"></div>
                            <div class="absolute bottom-4 left-6 flex items-center gap-2">
                                <span class="rounded-full bg-white/20 px-3 py-1 text-xs font-bold text-white backdrop-blur-md border border-white/10 uppercase tracking-wide">Tier 3</span>
                            </div>
                        </div>
                        <div class="flex min-h-0 flex-1 flex-col p-8">
                            <h3 class="text-xl font-bold text-impetus-navy font-outfit mb-4">Level 3 - Problem Solving</h3>
                            <div class="flex-1 space-y-4 text-sm text-slate-600 leading-relaxed text-justify">
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
                <div class="mt-16 rounded-[2rem] border border-impetus-orange/10 bg-gradient-to-br from-impetus-orange/[0.02] to-transparent p-8 shadow-sm">
                    <div class="flex flex-col sm:flex-row items-start gap-5">
                        <div class="w-12 h-12 rounded-xl bg-impetus-orange/10 text-impetus-orange flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18V6.125c0-.621.504-1.125 1.125-1.125H9.75M9 5.25h6.75m-6.75 0a.75.75 0 00-.75.75v1.125c0 .414.336.75.75.75h6.75a.75.75 0 00.75-.75V6c0-.414-.336-.75-.75-.75M9 5.25V3.75A1.5 1.5 0 007.5 2.25h9A1.5 1.5 0 0018 3.75V5.25" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-impetus-navy font-outfit mb-2">Automated Feedback & Detailed Scoring Rationale</h4>
                            <p class="text-sm text-slate-600 leading-relaxed text-justify">
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
