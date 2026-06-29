@extends('layouts.frontend.app')

@section('title', 'Learning Resources - IHS')

@php
    $heroImage = asset(rawurlencode('Importance _of_Learning_resource_1.png'));
@endphp

@section('content')
    <main class="overflow-hidden bg-white font-sans antialiased text-slate-800">
        {{-- Hero Section --}}
        <section class="relative bg-impetus-teal-muted py-16 sm:py-16">
            <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-center gap-12 lg:grid-cols-2 lg:items-stretch lg:gap-16">
                    <div>
                        <p class="mb-4 flex items-center gap-3 text-sm font-bold uppercase tracking-widest text-impetus-teal font-outfit">
                            <span class="h-px w-8 bg-impetus-teal"></span>
                            Learning Resources
                        </p>
                        <h1 class="mb-6 text-3xl font-extrabold leading-tight text-slate-800 sm:text-4xl lg:text-[2.75rem] font-outfit">
                            Learn. Grow. Excel.<br>
                            <span class="text-impetus-teal">Your Knowledge Hub</span>
                        </h1>

                        <div class="space-y-5 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                            <p>
                                <strong>Learning Resources</strong> in Online Continuing Nursing Education refer to a wide range of digital educational materials and tools designed to support effective, flexible, and self-paced learning for nurses and healthcare professionals. These resources are developed to enhance clinical knowledge, strengthen practical skills, and promote evidence-based nursing practice in an accessible online learning environment.
                            </p>
                            <p>
                                Online CNE learning resources are structured to provide comprehensive support for learners through various formats such as multimedia content, interactive tools, and reference materials. They enable participants to understand complex clinical concepts, revise key topics, and apply knowledge in real-world healthcare settings.
                            </p>
                        </div>

                        <div class="mt-8 grid gap-4 sm:grid-cols-3">
                            @foreach ([
                                ['label' => 'Expert-Reviewed Content', 'icon' => 'M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                                ['label' => 'Evidence-Based Resources', 'icon' => 'M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25'],
                                ['label' => 'Regularly Updated Materials', 'icon' => 'M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99'],
                            ] as $highlight)
                                <div class="flex items-center gap-3 rounded-xl border border-impetus-teal/10 bg-impetus-teal-muted/40 px-3 py-3">
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border-2 border-impetus-teal text-impetus-teal">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $highlight['icon'] }}" />
                                        </svg>
                                    </span>
                                    <span class="text-xs font-bold leading-snug text-slate-700 sm:text-sm">{{ $highlight['label'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="relative w-full self-stretch min-h-[22rem] sm:min-h-[26rem] lg:min-h-0">
                        <div class="absolute left-1/2 top-1/2 h-72 w-72 -translate-x-1/2 -translate-y-1/2 rounded-full border-2 border-impetus-teal/20 sm:h-80 sm:w-80 lg:h-[22rem] lg:w-[22rem]"></div>
                        <img src="{{ $heroImage }}" alt="CNE Learning Resources"
                            class="relative z-10 h-full w-full rounded-2xl object-cover object-center shadow-2xl ring-1 ring-white/60 lg:absolute lg:inset-0">
                    </div>
                </div>
            </div>
        </section>

        {{-- Features of Learning Resources --}}
        <section class="bg-white py-16 sm:py-12">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-3xl text-center">
                    <h2 class="text-2xl font-extrabold text-impetus-teal sm:text-3xl font-outfit">Features of Learning Resources</h2>
                    <p class="mt-3 text-sm leading-relaxed text-slate-600 sm:text-base">
                        Engineered to provide a rich educational ecosystem, our resources leverage evidence-based standards to deliver optimal clinical learning.
                    </p>
                </div>

                <div class="overflow-hidden rounded-2xl">
                    <img src="{{ asset(rawurlencode('Features-leanring fesources.png')) }}"
                        alt="Features of Learning Resources"
                        class="mx-auto h-auto w-full object-contain">
                </div>
            </div>
        </section>

        {{-- Importance of Learning Resources --}}
        <section class="bg-impetus-teal-muted py-16 sm:py-12">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto mb-10 max-w-3xl text-center">
                    <h2 class="text-2xl font-extrabold text-impetus-orange sm:text-3xl font-outfit">Importance of Learning Resources in Online CNE</h2>
                    <p class="mt-3 text-sm leading-relaxed text-slate-600 sm:text-base">
                        Learning resources play a crucial role in enhancing the effectiveness of online CNE programmes by making education more engaging, interactive, and learner-friendly. They help healthcare professionals stay up to date with current clinical practices, improve competency, and enhance the quality of patient care.
                    </p>
                </div>

                <ul class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ([
                        ['title' => 'Stay Current', 'text' => 'Helps nurses remain updated with current clinical practices and healthcare advancements.'],
                        ['title' => 'Enhance Knowledge & Skills', 'text' => 'Strengthens clinical knowledge and practical competency through structured digital content.'],
                        ['title' => 'Support Clinical Decision-Making', 'text' => 'Provides reference materials that reinforce evidence-based nursing practice.'],
                        ['title' => 'Improve Patient Outcomes', 'text' => 'Enhances the quality of patient care through better-informed healthcare professionals.'],
                        ['title' => 'Promote Lifelong Learning', 'text' => 'Encourages continuous professional development in a flexible digital environment.'],
                        ['title' => 'Strengthen Professional Competency', 'text' => 'Builds confidence and competence across diverse nursing specialties and care settings.'],
                    ] as $importance)
                        <li class="flex items-start gap-3 rounded-2xl border border-impetus-orange/15 bg-white p-5 shadow-sm">
                            <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-impetus-orange text-white">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </span>
                            <div>
                                <h3 class="text-sm font-bold text-slate-800 font-outfit sm:text-base">{{ $importance['title'] }}</h3>
                                <p class="mt-1 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">{{ $importance['text'] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <div class="mt-8 rounded-xl bg-impetus-teal p-6 sm:p-8">
                    <p class="text-sm italic leading-relaxed text-white/90 text-justify sm:text-base font-outfit">
                        “Overall, well-designed learning resources in online CNE ensure continuous professional development and strengthen the knowledge base of the nursing workforce within a flexible digital learning environment.”
                    </p>
                </div>
            </div>
        </section>

        {{-- Resource Types --}}
        <section class="py-16 sm:py-12">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <h2 class="mb-12 text-center text-2xl font-extrabold uppercase tracking-widest text-impetus-teal sm:text-3xl font-outfit">
                    Resource Types
                </h2>

                <div class="grid gap-8 lg:grid-cols-2">
                    <div class="rounded-2xl border border-impetus-teal/15 bg-white p-6 shadow-lg sm:p-8">
                        <div class="mb-6 flex items-center gap-4">
                            <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-impetus-teal text-white shadow-md">
                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-extrabold text-impetus-teal font-outfit">Study Materials</h3>
                                <p class="text-sm font-semibold text-slate-600">PDF Learning Resources</p>
                            </div>
                        </div>
                        <ul class="space-y-3">
                            @foreach ([
                                'Downloadable PDF guides and reference documents',
                                'Clinical protocols and evidence-based practice summaries',
                                'Self-assessment worksheets and study notes',
                                'Accessible across desktop and mobile devices',
                            ] as $item)
                                <li class="flex items-start gap-3 text-sm text-slate-600 sm:text-base">
                                    <span class="mt-0.5 text-impetus-teal">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </span>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="rounded-2xl border border-impetus-orange/20 bg-white p-6 shadow-lg sm:p-8">
                        <div class="mb-6 flex items-center gap-4">
                            <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-impetus-orange text-white shadow-md">
                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-extrabold text-impetus-orange font-outfit">PowerPoint Presentations</h3>
                                <p class="text-sm font-semibold text-slate-600">PowerPoint Slide Materials</p>
                            </div>
                        </div>
                        <ul class="space-y-3">
                            @foreach ([
                                'Structured slide decks for module-based learning',
                                'Visual summaries of key clinical concepts',
                                'Instructor-led and self-paced presentation formats',
                                'Ideal for revision and classroom-style review',
                            ] as $item)
                                <li class="flex items-start gap-3 text-sm text-slate-600 sm:text-base">
                                    <span class="mt-0.5 text-impetus-orange">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </span>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
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
                                Explore CNE Learning Resources and advance your clinical expertise.
                            </p>
                        </div>
                    </div>
                    <a href="{{ route('cne.modules') }}"
                        class="inline-flex shrink-0 items-center gap-2 rounded-full bg-white px-6 py-3 text-sm font-bold text-impetus-orange shadow-lg transition hover:scale-105 font-outfit whitespace-nowrap">
                        Explore Resources
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection
