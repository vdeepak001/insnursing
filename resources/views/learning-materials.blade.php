@extends('layouts.frontend.app')

@section('title', 'Learning Resources - IHS')

@php
    $heroImage = asset('images/design/WhatsApp Image 2026-06-11 at 17.26.40.jpeg');
@endphp

@section('content')
    <main class="overflow-hidden bg-white font-sans antialiased text-slate-800">
        {{-- Hero Section --}}
        <section class="relative bg-impetus-teal-muted py-16 sm:py-24">
            <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
                    <div>
                        <p class="mb-4 flex items-center gap-3 text-sm font-bold uppercase tracking-widest text-impetus-teal font-outfit">
                            <span class="h-px w-8 bg-impetus-teal"></span>
                            Learning Resources
                        </p>
                        <h1 class="mb-6 text-3xl font-extrabold leading-tight text-slate-800 sm:text-4xl lg:text-[2.75rem] font-outfit">
                            Learn. Grow. Excel. <span class="text-impetus-teal">Your Knowledge Hub</span>
                        </h1>

                        <div class="space-y-5 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                            <p>
                                <strong>Learning resources</strong> in Online Continuing Nursing Education (CNE) refer to a wide range of digital educational materials and tools designed to support effective, flexible, and self-paced learning for nurses and healthcare professionals. These resources are developed to enhance clinical knowledge, strengthen practical skills, and promote evidence-based nursing practice in an accessible online learning environment.
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

                    <div class="relative mx-auto flex w-full max-w-md items-center justify-center lg:max-w-none">
                        <div class="absolute h-72 w-72 rounded-full border-2 border-impetus-teal/20 sm:h-80 sm:w-80 lg:h-[22rem] lg:w-[22rem]"></div>
                        <img src="{{ $heroImage }}" alt="CNE Learning Resources"
                            class="relative z-10 h-auto w-full max-w-sm rounded-2xl object-cover shadow-xl lg:max-w-md">
                    </div>
                </div>
            </div>
        </section>

        {{-- Browse Resources by Category --}}
        <section id="categories" class="border-y border-impetus-teal/10 bg-impetus-teal-muted/30 py-16 sm:py-20">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <h2 class="mb-10 text-center text-2xl font-extrabold uppercase tracking-widest text-impetus-teal sm:text-3xl font-outfit">
                    Browse Resources by Category
                </h2>

                <div
                    x-data="{
                        intervalId: null,
                        startAutoScroll() {
                            this.stopAutoScroll();
                            this.intervalId = setInterval(() => {
                                const track = this.$refs.track;
                                const card = track.querySelector('[data-category-card]');
                                const amount = card ? card.offsetWidth + 24 : 180;
                                const maxScroll = track.scrollWidth - track.clientWidth;

                                if (track.scrollLeft >= maxScroll - 5) {
                                    track.scrollTo({ left: 0, behavior: 'smooth' });
                                } else {
                                    track.scrollBy({ left: amount, behavior: 'smooth' });
                                }
                            }, 3500);
                        },
                        stopAutoScroll() {
                            if (this.intervalId) {
                                clearInterval(this.intervalId);
                                this.intervalId = null;
                            }
                        },
                        init() { this.startAutoScroll(); },
                        destroy() { this.stopAutoScroll(); },
                    }"
                    @mouseenter="stopAutoScroll()"
                    @mouseleave="startAutoScroll()"
                    class="relative overflow-hidden"
                >
                    <div
                        x-ref="track"
                        class="flex snap-x snap-mandatory gap-6 overflow-x-auto pb-2 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden"
                    >
                        @foreach ([
                            ['title' => 'Clinical Nursing', 'count' => '120+ Resources', 'theme' => 'teal', 'icon' => 'M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z'],
                            ['title' => 'Maternal & Child Health', 'count' => '85+ Resources', 'theme' => 'orange', 'icon' => 'M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z'],
                            ['title' => 'Critical Care Nursing', 'count' => '95+ Resources', 'theme' => 'teal', 'icon' => 'M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5'],
                            ['title' => 'Mental Health Nursing', 'count' => '70+ Resources', 'theme' => 'orange', 'icon' => 'M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z'],
                            ['title' => 'Oncology Nursing', 'count' => '60+ Resources', 'theme' => 'teal', 'icon' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                            ['title' => 'Emergency Nursing', 'count' => '110+ Resources', 'theme' => 'orange', 'icon' => 'M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126z'],
                        ] as $category)
                            <div
                                data-category-card
                                class="flex w-44 shrink-0 snap-start flex-col items-center rounded-2xl border border-impetus-teal/10 bg-white px-4 py-6 text-center shadow-md sm:w-48"
                            >
                                <div @class([
                                    'mb-4 flex h-20 w-20 items-center justify-center rounded-full text-white shadow-md',
                                    'bg-impetus-teal' => $category['theme'] === 'teal',
                                    'bg-impetus-orange' => $category['theme'] === 'orange',
                                ])>
                                    <svg class="h-9 w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $category['icon'] }}" />
                                    </svg>
                                </div>
                                <h3 class="text-sm font-bold text-slate-800 font-outfit">{{ $category['title'] }}</h3>
                                <p @class([
                                    'mt-1 text-xs font-semibold',
                                    'text-impetus-teal' => $category['theme'] === 'teal',
                                    'text-impetus-orange' => $category['theme'] === 'orange',
                                ])>{{ $category['count'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- Features & Importance --}}
        <section class="bg-slate-50 py-16 sm:py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid gap-10 lg:grid-cols-2 lg:gap-12">
                    {{-- Features Column --}}
                    <div class="rounded-2xl border border-impetus-teal/15 bg-white p-6 shadow-md sm:p-8">
                        <div class="mb-6 flex items-start gap-4">
                            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-impetus-teal text-white shadow-md">
                                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-extrabold text-impetus-teal font-outfit">Features of Learning Resources</h2>
                                <p class="mt-2 text-sm leading-relaxed text-slate-600 sm:text-base">
                                    Engineered to provide a rich educational ecosystem, our resources leverage evidence-based standards to deliver optimal clinical learning.
                                </p>
                            </div>
                        </div>

                        <ul class="space-y-5">
                            @foreach ([
                                ['title' => 'Universal Access', 'text' => 'Easily accessible anytime and anywhere through modern, responsive digital learning platforms.'],
                                ['title' => 'Evidence-Based Focus', 'text' => 'Designed specifically based on evidence-based nursing standards, peer-reviewed clinical guidelines, and protocols.'],
                                ['title' => 'Continuous Updates', 'text' => 'Regularly updated in real time to reflect current healthcare practices, drug formulas, and clinical discoveries.'],
                                ['title' => 'Adaptive Learning Paths', 'text' => 'Highly suitable for self-paced independent study as well as highly structured formal educational models.'],
                                ['title' => 'Multimodal Integration', 'text' => 'Supports different learning styles including visual, auditory, and practical learners, using a blend of audio-video lectures, simulation guides, clinical mock-ups, and reference files.'],
                            ] as $feature)
                                <li class="flex items-start gap-3">
                                    <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-impetus-teal text-white">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </span>
                                    <div>
                                        <h3 class="text-sm font-bold text-slate-800 font-outfit sm:text-base">{{ $feature['title'] }}</h3>
                                        <p class="mt-1 text-sm leading-relaxed text-slate-600 text-justify">{{ $feature['text'] }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Importance Column --}}
                    <div class="rounded-2xl border border-impetus-orange/20 bg-white p-6 shadow-md sm:p-8">
                        <div class="mb-6 flex items-start gap-4">
                            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-impetus-orange text-white shadow-md">
                                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-extrabold text-impetus-orange font-outfit">Importance of Learning Resources in Online CNE</h2>
                                <p class="mt-2 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                                    Learning resources play a crucial role in enhancing the effectiveness of online CNE programmes by making education more engaging, interactive, and learner-friendly. They help healthcare professionals stay up to date with current clinical practices, improve competency, and enhance the quality of patient care.
                                </p>
                            </div>
                        </div>

                        <ul class="mb-6 space-y-5">
                            @foreach ([
                                ['title' => 'Stay Current', 'text' => 'Helps nurses remain updated with current clinical practices and healthcare advancements.'],
                                ['title' => 'Enhance Knowledge & Skills', 'text' => 'Strengthens clinical knowledge and practical competency through structured digital content.'],
                                ['title' => 'Support Clinical Decision-Making', 'text' => 'Provides reference materials that reinforce evidence-based nursing practice.'],
                                ['title' => 'Improve Patient Outcomes', 'text' => 'Enhances the quality of patient care through better-informed healthcare professionals.'],
                                ['title' => 'Promote Lifelong Learning', 'text' => 'Encourages continuous professional development in a flexible digital environment.'],
                                ['title' => 'Strengthen Professional Competency', 'text' => 'Builds confidence and competence across diverse nursing specialties and care settings.'],
                            ] as $importance)
                                <li class="flex items-start gap-3">
                                    <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-impetus-orange text-white">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </span>
                                    <div>
                                        <h3 class="text-sm font-bold text-slate-800 font-outfit sm:text-base">{{ $importance['title'] }}</h3>
                                        <p class="mt-1 text-sm leading-relaxed text-slate-600 text-justify">{{ $importance['text'] }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <div class="rounded-xl bg-impetus-teal p-5">
                            <p class="text-sm italic leading-relaxed text-white/90 text-justify sm:text-base font-outfit">
                                “Overall, well-designed learning resources in online CNE ensure continuous professional development and strengthen the knowledge base of the nursing workforce within a flexible digital learning environment.”
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Resource Types --}}
        <section class="py-16 sm:py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <h2 class="mb-12 text-center text-2xl font-extrabold uppercase tracking-widest text-impetus-teal sm:text-3xl font-outfit">
                    Resource Types
                </h2>

                <div class="grid gap-8 lg:grid-cols-2">
                    <div class="rounded-2xl border border-impetus-teal/15 bg-white p-6 shadow-lg sm:p-8">
                        <div class="mb-6 flex items-center gap-4">
                            <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-impetus-teal text-white shadow-md">
                                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
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
                                <li class="flex items-start gap-3 text-sm text-slate-600">
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
                                <span class="text-3xl font-extrabold font-outfit">P</span>
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
                                <li class="flex items-start gap-3 text-sm text-slate-600">
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
        <section class="bg-impetus-orange py-8 sm:py-10">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="flex flex-col items-center gap-5 sm:flex-row sm:text-left text-center">
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
            </div>
        </section>
    </main>
@endsection
