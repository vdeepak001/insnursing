@extends('layouts.frontend.app')

@section('title', 'CNE Certifications - IHS')

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
                <div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-16">
                    <div class="lg:col-span-8">
                        <span
                            class="text-sm font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-3 block">Professional
                            Credibility</span>
                        <h1
                            class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-impetus-navy tracking-tight font-outfit leading-tight mb-6">
                            CNE Certification
                        </h1>

                        <div class="space-y-6 text-slate-600 text-justify leading-relaxed text-sm sm:text-base">
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
                    </div>

                    <!-- Right Column: Visual Graphic/Accreditation Seal -->
                    <div class="lg:col-span-4 relative flex items-center justify-center lg:self-end lg:mb-2">
                        <div
                            class="absolute -inset-4 rounded-[2.5rem] bg-gradient-to-tr from-impetus-orange/10 via-transparent to-impetus-navy/10 blur-2xl -z-10">
                        </div>
                        <img src="{{ asset('images/CNE_Certification.jpeg') }}" alt="CNE Certification"
                            class="relative w-full max-w-[280px] sm:max-w-[320px] h-auto rounded-[2rem] shadow-xl border border-slate-200/50 transition-transform duration-500 hover:scale-[1.02]">
                    </div>
                </div>
            </div>
        </section>

        <!-- Purpose & Importance Section -->
        <section class="py-24 sm:py-32 relative bg-white border-b border-slate-200/60 overflow-hidden">
            <div
                class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-impetus-orange/5 via-transparent to-transparent pointer-events-none">
            </div>

            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-start gap-16 lg:grid-cols-12">

                    <!-- Purpose Column (Left) -->
                    <div
                        class="lg:col-span-6 bg-gradient-to-br from-white to-slate-50 border border-slate-200/80 rounded-[2.5rem] p-8 shadow-xl relative overflow-hidden">
                        <div class="absolute -right-16 -top-16 w-36 h-36 bg-impetus-orange/5 rounded-full blur-2xl pointer-events-none"></div>
                        <div
                            class="w-12 h-12 rounded-2xl bg-impetus-orange text-white flex items-center justify-center shrink-0 mb-6 shadow-lg shadow-impetus-orange/20 relative z-10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-extrabold text-impetus-navy font-outfit mb-4 relative z-10">Purpose of CNE Certification</h3>
                        <p class="text-sm sm:text-base text-slate-500 leading-relaxed text-justify mb-6 relative z-10">
                            Structured to drive concrete, high-quality skill benchmarks, CNE certification focuses on core
                            performance goals:
                        </p>
                        <ul class="space-y-4 relative z-10">
                            <!-- 1. Continuous Development (Orange Theme) -->
                            <li
                                class="flex gap-3 bg-gradient-to-br from-orange-50/40 via-white to-white p-4 rounded-xl border border-orange-100 shadow-sm hover:border-impetus-orange/30 hover:shadow-md hover:shadow-orange-500/5 transition-all duration-300">
                                <span
                                    class="text-impetus-orange shrink-0 bg-orange-100 w-8 h-8 rounded-lg flex items-center justify-center text-sm font-bold shadow-sm">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                </span>
                                <span class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify">
                                    To promote continuous professional development among nurses
                                </span>
                            </li>

                            <!-- 2. Update Clinical Knowledge (Emerald Theme) -->
                            <li
                                class="flex gap-3 bg-gradient-to-br from-emerald-50/40 via-white to-white p-4 rounded-xl border border-emerald-100 shadow-sm hover:border-emerald-500/30 hover:shadow-md hover:shadow-emerald-500/5 transition-all duration-300">
                                <span
                                    class="text-emerald-600 shrink-0 bg-emerald-100 w-8 h-8 rounded-lg flex items-center justify-center text-sm font-bold shadow-sm">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>
                                </span>
                                <span class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify">
                                    To update clinical knowledge and practical skills
                                </span>
                            </li>

                            <!-- 3. Quality & Safety (Navy Theme) -->
                            <li
                                class="flex gap-3 bg-gradient-to-br from-indigo-50/40 via-white to-white p-4 rounded-xl border border-indigo-100 shadow-sm hover:border-indigo-500/30 hover:shadow-md hover:shadow-indigo-500/5 transition-all duration-300">
                                <span
                                    class="text-indigo-600 shrink-0 bg-indigo-100 w-8 h-8 rounded-lg flex items-center justify-center text-sm font-bold shadow-sm">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z" />
                                    </svg>
                                </span>
                                <span class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify">
                                    To improve the quality of patient care and safety standards
                                </span>
                            </li>

                            <!-- 4. Specialized Areas (Orange Theme) -->
                            <li
                                class="flex gap-3 bg-gradient-to-br from-orange-50/40 via-white to-white p-4 rounded-xl border border-orange-100 shadow-sm hover:border-impetus-orange/30 hover:shadow-md hover:shadow-orange-500/5 transition-all duration-300">
                                <span
                                    class="text-impetus-orange shrink-0 bg-orange-100 w-8 h-8 rounded-lg flex items-center justify-center text-sm font-bold shadow-sm">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </span>
                                <span class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify">
                                    To strengthen competency in specialized nursing areas
                                </span>
                            </li>

                            <!-- 5. Regulatory Requirements (Emerald Theme) -->
                            <li
                                class="flex gap-3 bg-gradient-to-br from-emerald-50/40 via-white to-white p-4 rounded-xl border border-emerald-100 shadow-sm hover:border-emerald-500/30 hover:shadow-md hover:shadow-emerald-500/5 transition-all duration-300">
                                <span
                                    class="text-emerald-600 shrink-0 bg-emerald-100 w-8 h-8 rounded-lg flex items-center justify-center text-sm font-bold shadow-sm">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                    </svg>
                                </span>
                                <span class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify">
                                    To meet regulatory and professional education requirements
                                </span>
                            </li>
                        </ul>
                    </div>

                    <!-- Importance Column (Right) -->
                    <div class="lg:col-span-6 flex flex-col justify-center h-full">
                        <span
                            class="text-sm font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-3 block">High
                            Clinical Standards</span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-impetus-navy tracking-tight font-outfit mb-6">
                            Importance of CNE Certification</h2>

                        <div class="space-y-6 text-slate-600 text-justify leading-relaxed text-sm sm:text-base mb-8">
                            <p>
                                CNE certification plays a vital role in ensuring that nursing professionals maintain high
                                standards of practice by regularly updating their knowledge and skills. It enhances career
                                development, professional credibility, and clinical confidence while contributing to
                                improved healthcare outcomes and patient safety.
                            </p>
                        </div>

                        <!-- Takeaway Callout Box -->
                        <div
                            class="p-6 rounded-2xl bg-gradient-to-r from-impetus-navy to-impetus-navy/90 text-white shadow-xl shadow-slate-900/10">
                            <div class="flex gap-4 items-start">
                                <p
                                    class="text-sm sm:text-base text-slate-200 text-justify leading-relaxed font-outfit italic">
                                    “Overall, CNE certification reflects a commitment to lifelong learning and excellence in nursing practice.”
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Process Flow Section -->
        <section class="border-t border-slate-200/80 bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center mb-16">
                    <span
                        class="text-sm font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-3 block">Step-By-Step
                        Path</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-impetus-navy tracking-tight font-outfit">
                        Certification Journey</h2>
                    <p class="mt-4 text-slate-600 text-justify sm:text-center leading-relaxed">
                        To empower nurses with continuous learning opportunities that promote excellence in practice,
                        improve healthcare outcomes, and support professional advancement in a dynamic healthcare landscape.
                    </p>
                </div>

                @php
                    $steps = [
                        ['num' => '1', 'label' => 'Register', 'gradient' => 'from-emerald-500 to-teal-600 shadow-emerald-500/20'],
                        ['num' => '2', 'label' => 'Choose a module', 'gradient' => 'from-sky-500 to-blue-600 shadow-sky-500/20'],
                        ['num' => '3', 'label' => 'Take pre-test', 'gradient' => 'from-indigo-500 to-indigo-600 shadow-indigo-500/20'],
                        ['num' => '4', 'label' => 'Use learning resources', 'gradient' => 'from-violet-500 to-purple-600 shadow-violet-500/20'],
                        ['num' => '5', 'label' => 'Practice MCQs', 'gradient' => 'from-fuchsia-500 to-pink-600 shadow-fuchsia-500/20'],
                        ['num' => '6', 'label' => 'Take mock exam', 'gradient' => 'from-rose-500 to-red-600 shadow-rose-500/20'],
                        ['num' => '7', 'label' => 'Complete final exam', 'gradient' => 'from-orange-500 to-amber-600 shadow-orange-500/20'],
                        ['num' => '8', 'label' => 'Download CNE certificate', 'gradient' => 'from-amber-500 to-yellow-500 shadow-amber-500/20']
                    ];
                @endphp

                <div class="mt-8">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6 sm:gap-8 max-w-5xl mx-auto justify-items-center">
                        @foreach ($steps as $step)
                            <div class="group relative flex flex-col items-center">
                                {{-- Circle Element --}}
                                <div class="relative z-10 flex size-36 sm:size-40 flex-col items-center justify-center rounded-full bg-gradient-to-br {{ $step['gradient'] }} p-5 text-center text-white shadow-lg transition-transform duration-300 group-hover:scale-105 group-hover:shadow-xl">
                                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-white/70">Step {{ $step['num'] }}</span>
                                    <h4 class="mt-2 text-xs sm:text-sm font-extrabold leading-snug font-outfit uppercase tracking-wider">{{ $step['label'] }}</h4>
                                </div>
                                
                                {{-- Pulse highlight circle --}}
                                <div class="absolute inset-0 rounded-full bg-gradient-to-br {{ $step['gradient'] }} opacity-0 group-hover:opacity-10 blur-xl transition-opacity duration-300 pointer-events-none"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
