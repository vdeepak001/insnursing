@extends('layouts.frontend.app')

@section('title', 'CNE Modules')

@section('content')
    <main class="font-sans antialiased text-slate-800">
        <section class="bg-impetus-teal-muted py-12 sm:py-16">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="relative overflow-hidden rounded-[2rem] border border-impetus-teal/10 bg-white p-8 shadow-xl shadow-impetus-teal/5 sm:p-10">
                    <div class="pointer-events-none absolute inset-x-0 top-0 h-40 bg-gradient-to-b from-impetus-orange/5 to-transparent"></div>

                    <div class="relative">
                        <span class="mb-3 block text-xs font-bold uppercase tracking-widest text-impetus-orange font-outfit">
                            Professional Excellence
                        </span>
                        <h1 class="mb-6 text-3xl font-extrabold tracking-tight text-impetus-teal sm:text-4xl font-outfit">
                            Online Continuing Nursing Education (CNE) Modules
                        </h1>

                        <div class="grid gap-8 text-sm leading-relaxed text-slate-600 text-justify sm:text-base lg:grid-cols-2">
                            <p>
                                Online Continuing Nursing Education (CNE) Modules are structured digital learning programs
                                designed to help nurses and healthcare professionals enhance their knowledge, clinical
                                skills, and professional competence through flexible and accessible online education. These
                                modules support lifelong learning and continuing professional development by providing
                                up-to-date, evidence-based nursing education aligned with current healthcare practices and
                                standards.
                            </p>
                            <p>
                                Online CNE modules are developed to enable participants to learn at their own pace through
                                interactive platforms that may include video lectures, presentations, clinical
                                demonstrations, reading materials, quizzes, assignments, and online assessments. The
                                programs can be accessed from anywhere, making professional education convenient and
                                accessible for working healthcare professionals.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pb-16 pt-12 sm:pt-16">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                @php
                    $purchasedCourses = $courses->filter(
                        fn ($c) => isset($purchasedCourseIds) && $purchasedCourseIds->contains($c->id),
                    );
                    $otherCourses = $courses->reject(
                        fn ($c) => isset($purchasedCourseIds) && $purchasedCourseIds->contains($c->id),
                    );
                @endphp

                @if ($courses->isEmpty())
                    <div class="rounded-2xl border border-impetus-teal/10 bg-impetus-teal-muted px-8 py-14 text-center">
                        <p class="text-lg leading-8 text-slate-600">No modules are available yet. Please check back later.</p>
                    </div>
                @else
                    @if ($purchasedCourses->isNotEmpty())
                        <div class="mb-8">
                            <h2 class="text-2xl font-extrabold uppercase tracking-widest text-impetus-teal sm:text-3xl font-outfit">
                                Purchased Modules
                            </h2>
                            <div class="mt-2 h-1 w-20 rounded-full bg-impetus-orange"></div>
                        </div>
                        <div class="mb-16 grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                            @foreach ($purchasedCourses as $course)
                                @php
                                    $creditPoints = 'N/A';
                                    if ($course->stateCouncils->count() > 0) {
                                        $rawPoints = $course->stateCouncils->first()->pivot->points;
                                        $creditPoints = is_array($rawPoints) ? array_sum($rawPoints) : $rawPoints;
                                        $creditPoints = ! empty($creditPoints) ? $creditPoints : 'N/A';
                                    }
                                @endphp
                                @include('cne-modules.partials.module-card', [
                                    'course' => $course,
                                    'moduleIndex' => $loop->iteration,
                                    'creditPoints' => $creditPoints,
                                ])
                            @endforeach
                        </div>
                    @endif

                    @if ($otherCourses->isNotEmpty())
                        <div class="mb-8">
                            <h2 class="text-2xl font-extrabold uppercase tracking-widest text-impetus-teal sm:text-3xl font-outfit">
                                {{ $purchasedCourses->isNotEmpty() ? 'Other Modules' : 'Available Modules' }}
                            </h2>
                            <div class="mt-2 h-1 w-20 rounded-full bg-impetus-orange"></div>
                        </div>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                            @foreach ($otherCourses as $course)
                                @php
                                    $creditPoints = 'N/A';
                                    if ($course->stateCouncils->count() > 0) {
                                        $rawPoints = $course->stateCouncils->first()->pivot->points;
                                        $creditPoints = is_array($rawPoints) ? array_sum($rawPoints) : $rawPoints;
                                        $creditPoints = ! empty($creditPoints) ? $creditPoints : 'N/A';
                                    }
                                @endphp
                                @include('cne-modules.partials.module-card', [
                                    'course' => $course,
                                    'moduleIndex' => $loop->iteration,
                                    'creditPoints' => $creditPoints,
                                ])
                            @endforeach
                        </div>
                    @endif
                @endif

                <div class="mt-16 grid grid-cols-1 gap-8 md:grid-cols-2">
                    <div class="rounded-2xl border border-impetus-orange/20 bg-impetus-lightOrange p-6 shadow-md">
                        <h2 class="mb-5 text-xl sm:text-2xl font-extrabold text-impetus-teal font-outfit">
                            Features of Online CNE Modules
                        </h2>
                        <ul class="space-y-4">
                            @foreach ([
                                'Self-paced, flexible learning',
                                'Interactive digital content and assessments',
                                'Accessible via computers and mobile devices',
                                'Content developed by expert faculty and clinical resource persons',
                                'Evidence-based, updated curriculum',
                                'Digital certificates awarded upon successful completion',
                                'Supports Continuing Nursing Education (CNE)',
                            ] as $feature)
                                <li class="flex items-start gap-3 text-base text-slate-600">
                                    <span class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-impetus-orange text-white shadow-sm">
                                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </span>
                                    <span>{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="rounded-2xl border border-impetus-teal/20 bg-impetus-teal-muted p-6 shadow-md">
                        <h2 class="mb-5 text-xl sm:text-2xl font-extrabold text-impetus-teal font-outfit">
                            Benefits of Online CNE Modules
                        </h2>
                        <ul class="space-y-4">
                            @foreach ([
                                'Enhances clinical knowledge and professional competence',
                                'Promotes continuous learning and skill upgradation',
                                'Enables learning without interrupting professional duties',
                                'Improves the quality of patient care and clinical outcomes',
                                'Encourages evidence-based nursing practice',
                                'Provides equal learning opportunities across geographic locations',
                            ] as $benefit)
                                <li class="flex items-start gap-3 text-base text-slate-600">
                                    <span class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-impetus-teal text-white shadow-sm">
                                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </span>
                                    <span>{{ $benefit }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="mt-8 rounded-2xl bg-impetus-orange p-6 shadow-xl sm:p-8">
                    <div class="flex flex-col items-center gap-6 sm:flex-row sm:justify-between sm:text-left">
                        <div class="flex flex-col items-center gap-4 sm:flex-row">
                            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-white/20 text-white">
                                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                            </div>
                            <div class="min-w-0 flex-1 text-center sm:text-left">
                                <h3 class="text-xl font-extrabold !text-white sm:text-2xl font-outfit">Together, We Build a Healthier Tomorrow</h3>
                                <p class="mt-1 text-sm leading-relaxed !text-white/95 sm:text-left text-justify">
                                    Online CNE modules play an important role in strengthening the healthcare workforce by helping nurses stay updated with advancements in healthcare, improve clinical performance, and meet professional education requirements in a flexible and technology-enabled learning environment.
                                </p>
                            </div>
                        </div>
                        <a href="{{ route('practice.test') }}"
                            class="inline-flex shrink-0 items-center gap-2 rounded-full bg-white px-6 py-3 text-sm font-bold text-impetus-orange shadow-lg transition hover:scale-105 font-outfit">
                            Practice Tests
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
