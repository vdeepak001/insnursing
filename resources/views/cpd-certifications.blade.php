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
                    <div class="lg:col-span-4 relative flex items-center justify-center">
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
                    <div class="lg:col-span-6 bg-slate-50 border border-slate-200/80 rounded-[2rem] p-8 shadow-lg">
                        <div
                            class="w-12 h-12 rounded-2xl bg-impetus-orange text-white flex items-center justify-center shrink-0 mb-6 shadow-md shadow-impetus-orange/10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-extrabold text-impetus-navy font-outfit mb-4">Purpose of CNE Certification
                        </h3>
                        <p class="text-sm sm:text-base text-slate-500 leading-relaxed text-justify mb-6">
                            Structured to drive concrete, high-quality skill benchmarks, CNE certification focuses on core
                            performance goals:
                        </p>
                        <ul class="space-y-4">
                            <li
                                class="flex gap-3 bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:border-slate-200 transition-colors">
                                <span
                                    class="text-impetus-orange font-bold text-lg leading-none mt-0.5 shrink-0">&bull;</span>
                                <span class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify">
                                    To promote continuous professional development among nurses
                                </span>
                            </li>
                            <li
                                class="flex gap-3 bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:border-slate-200 transition-colors">
                                <span
                                    class="text-impetus-orange font-bold text-lg leading-none mt-0.5 shrink-0">&bull;</span>
                                <span class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify">
                                    To update clinical knowledge and practical skills
                                </span>
                            </li>
                            <li
                                class="flex gap-3 bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:border-slate-200 transition-colors">
                                <span
                                    class="text-impetus-orange font-bold text-lg leading-none mt-0.5 shrink-0">&bull;</span>
                                <span class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify">
                                    To improve the quality of patient care and safety standards
                                </span>
                            </li>
                            <li
                                class="flex gap-3 bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:border-slate-200 transition-colors">
                                <span
                                    class="text-impetus-orange font-bold text-lg leading-none mt-0.5 shrink-0">&bull;</span>
                                <span class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify">
                                    To strengthen competency in specialized nursing areas
                                </span>
                            </li>
                            <li
                                class="flex gap-3 bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:border-slate-200 transition-colors">
                                <span
                                    class="text-impetus-orange font-bold text-lg leading-none mt-0.5 shrink-0">&bull;</span>
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

                <!-- Mobile / Tablet Vertical Timeline -->
                <div class="relative mx-auto max-w-lg lg:hidden">
                    <div class="absolute start-6 top-3 bottom-3 w-0.5 bg-gradient-to-b from-impetus-orange via-[#8c4324] to-impetus-navy"
                        aria-hidden="true"></div>
                    @php
                        $mobileSteps = [
                            ['label' => 'Register', 'tone' => 'from-impetus-orange to-[#e05d14] shadow-impetus-orange/20'],
                            ['label' => 'Choose a module', 'tone' => 'from-impetus-navy to-[#112547] shadow-impetus-navy/20'],
                            ['label' => 'Take pre-test', 'tone' => 'from-impetus-orange to-[#e05d14] shadow-impetus-orange/20'],
                            ['label' => 'Use learning resources', 'tone' => 'from-impetus-navy to-[#112547] shadow-impetus-navy/20'],
                            ['label' => 'Practice MCQs', 'tone' => 'from-impetus-orange to-[#e05d14] shadow-impetus-orange/20'],
                            ['label' => 'Take mock exam', 'tone' => 'from-impetus-navy to-[#112547] shadow-impetus-navy/20'],
                            ['label' => 'Complete final exam', 'tone' => 'from-impetus-orange to-[#e05d14] shadow-impetus-orange/20'],
                            ['label' => 'Download CNE certificate', 'tone' => 'from-impetus-navy to-[#112547] shadow-impetus-navy/20'],
                        ];
                    @endphp
                    <ol class="relative list-none space-y-0 p-0">
                        @foreach ($mobileSteps as $index => $step)
                            <li class="relative flex gap-4 pb-10 last:pb-0">
                                <div
                                    class="relative z-10 flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br {{ $step['tone'] }} text-sm font-bold text-white shadow-lg ring-4 ring-white">
                                    {{ $index + 1 }}
                                </div>
                                <div class="min-w-0 flex-1 pt-1">
                                    <p class="text-base font-semibold text-slate-900 font-outfit">{{ $step['label'] }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                </div>

                <!-- Desktop Snake Flow -->
                <div class="mt-14 hidden lg:block">
                    @php
                        $arrowRight =
                            '<svg class="h-8 w-8 shrink-0 text-slate-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" /></svg>';
                        $arrowLeft =
                            '<svg class="h-8 w-8 shrink-0 text-slate-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>';
                        $arrowDown =
                            '<svg class="h-10 w-10 text-slate-300" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" /></svg>';
                    @endphp

                    <div class="mx-auto max-w-5xl">
                        <!-- Row 1: LTR -->
                        <div class="flex flex-wrap items-center justify-center gap-4">
                            <div
                                class="flex min-h-[88px] min-w-[160px] max-w-[200px] flex-1 items-center justify-center rounded-2xl bg-gradient-to-br from-impetus-orange to-[#e05d14] px-4 py-4 text-center text-sm font-semibold text-white shadow-lg shadow-impetus-orange/20 font-outfit">
                                Register</div>
                            {!! $arrowRight !!}
                            <div
                                class="flex min-h-[88px] min-w-[160px] max-w-[200px] flex-1 items-center justify-center rounded-2xl bg-gradient-to-br from-impetus-navy to-[#112547] px-4 py-4 text-center text-sm font-semibold text-white shadow-lg shadow-impetus-navy/20 font-outfit">
                                Choose a module</div>
                            {!! $arrowRight !!}
                            <div
                                class="flex min-h-[88px] min-w-[160px] max-w-[200px] flex-1 items-center justify-center rounded-2xl bg-gradient-to-br from-impetus-orange to-[#e05d14] px-4 py-4 text-center text-sm font-semibold text-white shadow-lg shadow-impetus-orange/20 font-outfit">
                                Take pre-test</div>
                        </div>

                        <div class="flex justify-end pe-[calc(8%-1rem)] xl:pe-[calc(12.5%-2rem)]">
                            <div class="py-2">{!! $arrowDown !!}</div>
                        </div>

                        <!-- Row 2: RTL Boxes -->
                        <div class="flex flex-wrap items-center justify-center gap-4">
                            <div
                                class="flex min-h-[88px] min-w-[160px] max-w-[200px] flex-1 items-center justify-center rounded-2xl bg-gradient-to-br from-impetus-navy to-[#112547] px-4 py-4 text-center text-sm font-semibold text-white shadow-lg shadow-impetus-navy/20 font-outfit">
                                Use learning resources</div>
                            {!! $arrowLeft !!}
                            <div
                                class="flex min-h-[88px] min-w-[160px] max-w-[200px] flex-1 items-center justify-center rounded-2xl bg-gradient-to-br from-impetus-orange to-[#e05d14] px-4 py-4 text-center text-sm font-semibold text-white shadow-lg shadow-impetus-orange/20 font-outfit">
                                Practice MCQs</div>
                            {!! $arrowLeft !!}
                            <div
                                class="flex min-h-[88px] min-w-[160px] max-w-[200px] flex-1 items-center justify-center rounded-2xl bg-gradient-to-br from-impetus-navy to-[#112547] px-4 py-4 text-center text-sm font-semibold text-white shadow-lg shadow-impetus-navy/20 font-outfit">
                                Take mock exam</div>
                        </div>

                        <div class="flex justify-start ps-[calc(8%-1rem)] xl:ps-[calc(12.5%-2rem)]">
                            <div class="py-2">{!! $arrowDown !!}</div>
                        </div>

                        <!-- Row 3: LTR -->
                        <div class="flex flex-wrap items-center justify-center gap-4">
                            <div
                                class="flex min-h-[88px] min-w-[180px] max-w-[240px] flex-1 items-center justify-center rounded-2xl bg-gradient-to-br from-impetus-orange to-[#e05d14] px-4 py-4 text-center text-sm font-semibold text-white shadow-lg shadow-impetus-orange/20 font-outfit">
                                Complete final exam</div>
                            {!! $arrowRight !!}
                            <div
                                class="flex min-h-[88px] min-w-[180px] max-w-[280px] flex-1 items-center justify-center rounded-2xl bg-gradient-to-br from-impetus-navy to-[#112547] px-4 py-4 text-center text-sm font-semibold text-white shadow-lg shadow-impetus-navy/20 font-outfit">
                                Download CNE certificate</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
