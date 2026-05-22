@extends('layouts.frontend.app')

@section('title', 'CPD Modules')

@section('content')
    <main class="pb-16">

        <section class="py-12 sm:py-16">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mb-8 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                </div>

                <div class="mb-16 rounded-[2rem] border border-slate-200/80 bg-gradient-to-br from-white via-slate-50 to-slate-100 p-8 shadow-xl shadow-slate-200/30 sm:p-10 relative overflow-hidden">
                    <div class="absolute inset-x-0 top-0 h-40 bg-gradient-to-b from-impetus-orange/5 to-transparent pointer-events-none"></div>
                    <div class="relative">
                        <span class="text-xs font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-3 block">Professional Excellence</span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-impetus-navy tracking-tight font-outfit mb-6">Online Continuing Nursing Education (CNE) Modules</h2>
                        
                        <div class="grid gap-8 lg:grid-cols-2 mb-10 text-slate-600 text-justify leading-relaxed text-sm sm:text-base">
                            <p>
                                Online Continuing Nursing Education (CNE) Modules are structured digital learning programs designed to help nurses and healthcare professionals enhance their knowledge, clinical skills, and professional competence through flexible and accessible online education. These modules support lifelong learning and continuing professional development by providing up-to-date, evidence-based nursing education aligned with current healthcare practices and standards.
                            </p>
                            <p>
                                Online CNE modules are developed to enable participants to learn at their own pace through interactive platforms that may include video lectures, presentations, clinical demonstrations, reading materials, quizzes, assignments, and online assessments. The programs can be accessed from anywhere, making professional education convenient and accessible for working healthcare professionals.
                            </p>
                        </div>

                        <!-- Features & Benefits Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                            <!-- Features Card -->
                            <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition-all duration-300">
                                <h3 class="text-lg font-bold text-impetus-navy font-outfit mb-4 flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-impetus-orange inline-block"></span>
                                    Features of Online CNE Modules
                                </h3>
                                <ul class="space-y-3">
                                    <li class="flex items-start gap-3 text-xs sm:text-sm text-slate-600">
                                        <span class="text-impetus-orange font-bold text-lg leading-none shrink-0">&bull;</span>
                                        <span>Self-paced, flexible learning</span>
                                    </li>
                                    <li class="flex items-start gap-3 text-xs sm:text-sm text-slate-600">
                                        <span class="text-impetus-orange font-bold text-lg leading-none shrink-0">&bull;</span>
                                        <span>Interactive digital content and assessments</span>
                                    </li>
                                    <li class="flex items-start gap-3 text-xs sm:text-sm text-slate-600">
                                        <span class="text-impetus-orange font-bold text-lg leading-none shrink-0">&bull;</span>
                                        <span>Accessible via computers and mobile devices</span>
                                    </li>
                                    <li class="flex items-start gap-3 text-xs sm:text-sm text-slate-600">
                                        <span class="text-impetus-orange font-bold text-lg leading-none shrink-0">&bull;</span>
                                        <span>Content developed by expert faculty and clinical resource persons</span>
                                    </li>
                                    <li class="flex items-start gap-3 text-xs sm:text-sm text-slate-600">
                                        <span class="text-impetus-orange font-bold text-lg leading-none shrink-0">&bull;</span>
                                        <span>Evidence-based, updated curriculum</span>
                                    </li>
                                    <li class="flex items-start gap-3 text-xs sm:text-sm text-slate-600">
                                        <span class="text-impetus-orange font-bold text-lg leading-none shrink-0">&bull;</span>
                                        <span>Digital certificates awarded upon successful completion</span>
                                    </li>
                                    <li class="flex items-start gap-3 text-xs sm:text-sm text-slate-600">
                                        <span class="text-impetus-orange font-bold text-lg leading-none shrink-0">&bull;</span>
                                        <span>Supports Continuing Nursing Education (CNE)</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- Benefits Card -->
                            <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition-all duration-300">
                                <h3 class="text-lg font-bold text-impetus-navy font-outfit mb-4 flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 inline-block"></span>
                                    Benefits of Online CNE Modules
                                </h3>
                                <ul class="space-y-3">
                                    <li class="flex items-start gap-3 text-xs sm:text-sm text-slate-600">
                                        <span class="text-emerald-500 font-bold text-lg leading-none shrink-0">&bull;</span>
                                        <span>Enhances clinical knowledge and professional competence</span>
                                    </li>
                                    <li class="flex items-start gap-3 text-xs sm:text-sm text-slate-600">
                                        <span class="text-emerald-500 font-bold text-lg leading-none shrink-0">&bull;</span>
                                        <span>Promotes continuous learning and skill upgradation</span>
                                    </li>
                                    <li class="flex items-start gap-3 text-xs sm:text-sm text-slate-600">
                                        <span class="text-emerald-500 font-bold text-lg leading-none shrink-0">&bull;</span>
                                        <span>Enables learning without interrupting professional duties</span>
                                    </li>
                                    <li class="flex items-start gap-3 text-xs sm:text-sm text-slate-600">
                                        <span class="text-emerald-500 font-bold text-lg leading-none shrink-0">&bull;</span>
                                        <span>Improves the quality of patient care and clinical outcomes</span>
                                    </li>
                                    <li class="flex items-start gap-3 text-xs sm:text-sm text-slate-600">
                                        <span class="text-emerald-500 font-bold text-lg leading-none shrink-0">&bull;</span>
                                        <span>Encourages evidence-based nursing practice</span>
                                    </li>
                                    <li class="flex items-start gap-3 text-xs sm:text-sm text-slate-600">
                                        <span class="text-emerald-500 font-bold text-lg leading-none shrink-0">&bull;</span>
                                        <span>Provides equal learning opportunities across geographic locations</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Closing Takeaway Paragraph -->
                        <div class="p-6 rounded-2xl bg-gradient-to-r from-impetus-navy to-impetus-navy/90 text-white shadow-xl shadow-slate-900/10">
                            <p class="text-xs sm:text-sm text-slate-300 text-justify leading-relaxed">
                                Online CNE modules play an important role in strengthening the healthcare workforce by helping nurses stay updated with advancements in healthcare, improve clinical performance, and meet professional education requirements in a flexible and technology-enabled learning environment.
                            </p>
                        </div>
                    </div>
                </div>

                @php
                    $purchasedCourses = $courses->filter(fn($c) => isset($purchasedCourseIds) && $purchasedCourseIds->contains($c->id));
                    $otherCourses = $courses->reject(fn($c) => isset($purchasedCourseIds) && $purchasedCourseIds->contains($c->id));
                @endphp

                @if ($courses->isEmpty())
                    <div class="rounded-3xl border border-slate-200/80 bg-white px-8 py-14 text-center shadow-lg shadow-slate-200/50 ring-1 ring-slate-100">
                        <p class="text-lg leading-8 text-slate-600 text-justify">No modules are available yet. Please check back later.</p>
                    </div>
                @else
                    {{-- Purchased Modules Section --}}
                    @if($purchasedCourses->isNotEmpty())
                        <div class="mb-8">
                            <h3 class="font-serif text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Purchased Modules</h3>
                            <div class="mt-2 h-1 w-20 rounded-full bg-emerald-500"></div>
                        </div>
                        <div class="mb-16 grid grid-cols-1 gap-7 sm:grid-cols-2 lg:grid-cols-4">
                            @foreach ($purchasedCourses as $course)
                                @php
                                    $title = $course->couse_name;
                                    $detailUrl = route('cne.modules.show', $course->couse_name);
                                    $creditPoints = 'N/A';
                                    if(isset($course->stateCouncils) && $course->stateCouncils->count() > 0) {
                                        $rawPoints = $course->stateCouncils->first()->pivot->points;
                                        $creditPoints = is_array($rawPoints) ? array_sum($rawPoints) : $rawPoints;
                                        $creditPoints = !empty($creditPoints) ? $creditPoints : 'N/A';
                                    }
                                @endphp
                                <article class="group flex flex-col overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-md shadow-slate-200/50 ring-1 ring-slate-100 transition hover:-translate-y-0.5 hover:border-logo-light-green/30 hover:shadow-xl hover:shadow-slate-300/40 hover:ring-logo-light-green/20">
                                    <a href="{{ $detailUrl }}" class="relative flex flex-1 flex-col focus:outline-none focus-visible:ring-2 focus-visible:ring-logo-blue focus-visible:ring-offset-2">
                                        <div class="relative aspect-[4/3] w-full shrink-0 overflow-hidden bg-slate-100">
                                            <img
                                                src="{{ asset('images/course.jpeg') }}"
                                                alt=""
                                                class="h-full w-full object-cover transition duration-300 group-hover:scale-[1.03]"
                                                loading="lazy"
                                                decoding="async"
                                            >
                                            <div class="absolute inset-0 flex items-center justify-center p-4">
                                                <span class="block max-w-full text-balance text-center text-base font-bold uppercase leading-snug tracking-tight text-logo-blue sm:text-3xl">
                                                    {{ $title ?? '—' }}
                                                </span>
                                            </div>
                                            @auth
                                                @if (auth()->user()?->role_type === 'user')
                                                    <div class="absolute bottom-4 right-4 z-10 flex items-center rounded-sm bg-green-500 px-2.5 py-1 text-xs font-bold tracking-wide text-white shadow-sm">
                                                        Credit Point: {{ $creditPoints }}
                                                    </div>
                                                @endif
                                            @endauth
                                        </div>
                                    </a>
                                </article>
                            @endforeach
                        </div>
                    @endif

                    {{-- Other Modules Section --}}
                    @if($otherCourses->isNotEmpty())
                        <div class="mb-8">
                            <h3 class="font-serif text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                                {{ $purchasedCourses->isNotEmpty() ? 'Other Modules' : 'Available Modules' }}
                            </h3>
                            <div class="mt-2 h-1 w-20 rounded-full bg-logo-blue"></div>
                        </div>
                        <div class="grid grid-cols-1 gap-7 sm:grid-cols-2 lg:grid-cols-4">
                            @foreach ($otherCourses as $course)
                                @php
                                    $title = $course->couse_name;
                                    $detailUrl = route('cne.modules.show', $course->couse_name);
                                    $creditPoints = 'N/A';
                                    if(isset($course->stateCouncils) && $course->stateCouncils->count() > 0) {
                                        $rawPoints = $course->stateCouncils->first()->pivot->points;
                                        $creditPoints = is_array($rawPoints) ? array_sum($rawPoints) : $rawPoints;
                                        $creditPoints = !empty($creditPoints) ? $creditPoints : 'N/A';
                                    }
                                @endphp
                                <article class="group flex flex-col overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-md shadow-slate-200/50 ring-1 ring-slate-100 transition hover:-translate-y-0.5 hover:border-logo-light-green/30 hover:shadow-xl hover:shadow-slate-300/40 hover:ring-logo-light-green/20">
                                    <a href="{{ $detailUrl }}" class="relative flex flex-1 flex-col focus:outline-none focus-visible:ring-2 focus-visible:ring-logo-blue focus-visible:ring-offset-2">
                                        <div class="relative aspect-[4/3] w-full shrink-0 overflow-hidden bg-slate-100">
                                            <img
                                                src="{{ asset('images/course.jpeg') }}"
                                                alt=""
                                                class="h-full w-full object-cover transition duration-300 group-hover:scale-[1.03]"
                                                loading="lazy"
                                                decoding="async"
                                            >
                                            <div class="absolute inset-0 flex items-center justify-center p-4">
                                                <span class="block max-w-full text-balance text-center text-base font-bold uppercase leading-snug tracking-tight text-logo-blue sm:text-3xl">
                                                    {{ $title ?? '—' }}
                                                </span>
                                            </div>
                                            @auth
                                                @if (auth()->user()?->role_type === 'user')
                                                    <div class="absolute bottom-4 right-4 z-10 flex items-center rounded-sm bg-green-500 px-2.5 py-1 text-xs font-bold tracking-wide text-white shadow-sm">
                                                        Credit Point: {{ $creditPoints }}
                                                    </div>
                                                @endif
                                            @endauth
                                        </div>
                                    </a>
                                </article>
                            @endforeach
                        </div>
                    @endif
                @endif
            </div>
        </section>
    </main>
@endsection
