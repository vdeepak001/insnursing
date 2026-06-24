@extends('layouts.frontend.app')

@section('title', 'About Us - IHS')

@php
    $heroImage = asset('images/design/about_hero_nurse_clean.png');
    $simulationImage = asset('images/design/WhatsApp Image 2026-06-11 at 17.14.41.jpeg');
@endphp

@section('content')
    <main class="overflow-hidden bg-white">
        {{-- Hero Section --}}
        <section class="relative bg-impetus-teal-muted py-16 sm:py-24">
            <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
                    <div>
                        <p class="mb-4 flex items-center gap-3 text-sm font-bold uppercase tracking-widest text-impetus-teal font-outfit">
                            <span class="h-px w-8 bg-impetus-teal"></span>
                            About IHS Nursing
                        </p>
                        <h1 class="mb-6 text-3xl font-extrabold leading-tight text-impetus-teal sm:text-4xl lg:text-[2.75rem] font-outfit">
                            About Impetus Healthcare Skills (IHS)
                        </h1>
                        <div class="space-y-5 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                            <p>
                                <strong>Impetus Healthcare Skills Private Limited (IHS)</strong> is a premier healthcare
                                education and professional training organization dedicated to advancing clinical excellence
                                through simulation-based learning and online education. The company specializes in
                                delivering innovative healthcare training programs designed to enhance the knowledge,
                                practical skills, and clinical competency of nurses and other healthcare professionals.
                            </p>
                            <p>
                                The organization offers a wide range of simulation training programs, hands-on skill
                                development workshops, and technology-enabled online courses in various nursing and
                                healthcare specialties. Its programs are designed to bridge the gap between theoretical
                                knowledge and real-world clinical practice through interactive learning methodologies,
                                virtual training platforms, and evidence-based educational approaches.
                            </p>
                            <p>
                                IHS focuses on Continuing Nursing Education (CNE), specialized nursing education, emergency
                                and critical care training, clinical skill enhancement, and competency-based healthcare
                                learning. The company integrates modern teaching techniques including virtual classrooms,
                                simulation laboratories, digital assessments, and self-paced e-learning modules to provide
                                accessible and high-quality education for healthcare professionals across different regions.
                            </p>
                        </div>
                    </div>

                    {{-- Hero Visual --}}
                    <div class="relative mx-auto flex w-full max-w-md items-center justify-center lg:max-w-none">
                        <img src="{{ $heroImage }}" alt="IHS Nursing healthcare professional"
                            class="relative z-10 h-auto w-full max-w-sm object-contain drop-shadow-xl lg:max-w-md">
                        <div class="absolute -right-2 top-8 flex h-11 w-11 items-center justify-center rounded-full bg-impetus-orange text-white shadow-lg">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </div>
                        <div class="absolute right-4 top-1/2 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-impetus-orange text-white shadow-lg">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                        <div class="absolute -left-2 bottom-16 flex h-11 w-11 items-center justify-center rounded-full bg-impetus-orange text-white shadow-lg">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.62 48.62 0 0112 20.904a48.62 48.62 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.636 50.636 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0112 13.489a50.702 50.702 0 017.74-3.342" />
                            </svg>
                        </div>
                        <div class="absolute bottom-6 right-8 flex h-11 w-11 items-center justify-center rounded-full bg-impetus-orange text-white shadow-lg">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Stats Bar --}}
        <section class="bg-impetus-teal py-8 sm:py-10">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid grid-cols-2 gap-6 text-center text-white md:grid-cols-5 md:gap-4">
                    <div class="flex flex-col items-center gap-2">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-white/15">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                        </div>
                        <p class="text-lg font-extrabold font-outfit sm:text-xl">15K+</p>
                        <p class="text-xs font-semibold uppercase tracking-wide text-white/90">Nurses Enrolled</p>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-impetus-orange">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                        </div>
                        <p class="text-lg font-extrabold font-outfit sm:text-xl">10K+</p>
                        <p class="text-xs font-semibold uppercase tracking-wide text-white/90">Online Tests Taken</p>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-white/15">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.62 48.62 0 0112 20.904a48.62 48.62 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.636 50.636 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0112 13.489a50.702 50.702 0 017.74-3.342" />
                            </svg>
                        </div>
                        <p class="text-lg font-extrabold font-outfit sm:text-xl">8K+</p>
                        <p class="text-xs font-semibold uppercase tracking-wide text-white/90">Certificates Issued</p>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-impetus-orange">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                            </svg>
                        </div>
                        <p class="text-lg font-extrabold font-outfit sm:text-xl">4.8/5</p>
                        <p class="text-xs font-semibold uppercase tracking-wide text-white/90">Learner Rating</p>
                    </div>
                    <div class="col-span-2 flex flex-col items-center gap-2 md:col-span-1">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-white/15">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.62 48.62 0 0112 20.904a48.62 48.62 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.636 50.636 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0112 13.489a50.702 50.702 0 017.74-3.342" />
                            </svg>
                        </div>
                        <p class="text-lg font-extrabold font-outfit sm:text-xl">26+</p>
                        <p class="text-xs font-semibold uppercase tracking-wide text-white/90">CNE Modules</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Our Focus Areas --}}
        <section class="bg-impetus-teal-muted py-16 sm:py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <h2 class="mb-12 text-center text-3xl font-extrabold text-impetus-teal sm:text-4xl font-outfit">
                    Our Focus Areas
                </h2>
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    <article id="about-impetus" class="rounded-2xl border border-impetus-teal/10 bg-white p-6 text-center shadow-sm transition hover:shadow-md">
                        <div class="mx-auto mb-5 flex h-28 w-full items-center justify-center rounded-xl bg-impetus-teal-muted">
                            <svg class="h-16 w-16 text-impetus-teal" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                            </svg>
                        </div>
                        <h3 class="mb-3 text-lg font-bold text-impetus-teal font-outfit">About Impetus</h3>
                        <p class="text-sm leading-relaxed text-slate-600 text-justify">
                            Impetus Healthcare Skills Private Limited (IHS) is a premier healthcare education and professional training organization dedicated to advancing clinical excellence through simulation-based learning and online education.
                        </p>
                    </article>
                    <article id="public-health" class="rounded-2xl border border-impetus-orange/10 bg-white p-6 text-center shadow-sm transition hover:shadow-md">
                        <div class="mx-auto mb-5 flex h-28 w-full items-center justify-center rounded-xl bg-impetus-lightOrange">
                            <svg class="h-16 w-16 text-impetus-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </div>
                        <h3 class="mb-3 text-lg font-bold text-impetus-orange font-outfit">Public Health Training</h3>
                        <p class="text-sm leading-relaxed text-slate-600 text-justify">
                            Maternal and newborn health is our core component, and we are committed to contributing to the country's efforts to achieve Millennium Development Goals 4, 5 and 6.
                        </p>
                    </article>
                    <article id="skilled-birth" class="rounded-2xl border border-impetus-orange/10 bg-white p-6 text-center shadow-sm transition hover:shadow-md">
                        <div class="mx-auto mb-5 flex h-28 w-full items-center justify-center rounded-xl bg-impetus-lightOrange">
                            <svg class="h-16 w-16 text-impetus-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </div>
                        <h3 class="mb-3 text-lg font-bold text-impetus-orange font-outfit">Skilled Birth Attendant Role</h3>
                        <p class="text-sm leading-relaxed text-slate-600 text-justify">
                            Nurses have an important role in significantly reducing the maternal mortality rate (MMR) and infant mortality rate (IMR) as Skilled Birth Attendants.
                        </p>
                    </article>
                    <article id="research" class="rounded-2xl border border-impetus-teal/10 bg-white p-6 text-center shadow-sm transition hover:shadow-md">
                        <div class="mx-auto mb-5 flex h-28 w-full items-center justify-center rounded-xl bg-impetus-teal-muted">
                            <svg class="h-16 w-16 text-impetus-teal" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23-.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.611L5 14.5" />
                            </svg>
                        </div>
                        <h3 class="mb-3 text-lg font-bold text-impetus-teal font-outfit">Research &amp; Development</h3>
                        <p class="text-sm leading-relaxed text-slate-600 text-justify">
                            Our multidisciplinary research activities focus on developing issue-based and setting-based designs that address existing and emerging healthcare challenges in India.
                        </p>
                    </article>
                </div>
            </div>
        </section>

        {{-- Detailed Content (preserved from original page) --}}
        <section class="bg-white py-16 sm:py-24">
            <div class="mx-auto max-w-7xl space-y-16 px-6 lg:px-8">
                {{-- Vision & Goal + Competency --}}
                <div class="rounded-3xl bg-impetus-teal p-8 text-white shadow-lg sm:p-10">
                    <p class="mb-4 text-center text-sm font-extrabold uppercase tracking-widest text-impetus-orange font-outfit">
                        Our Core Vision &amp; Goal
                    </p>
                    <p class="mx-auto max-w-5xl text-justify text-base leading-relaxed text-white/95 sm:text-lg">
                        The organization aims to support lifelong learning in healthcare by empowering professionals
                        with updated clinical knowledge, practical expertise, and industry-relevant competencies
                        that contribute to improved patient care and healthcare outcomes.
                    </p>
                </div>

                <div class="flex items-start gap-4 rounded-2xl border border-impetus-orange/20 bg-impetus-lightOrange p-6">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-impetus-orange text-white">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-base font-bold text-impetus-teal font-outfit">Competency-Based</h4>
                        <p class="mt-1 text-sm leading-relaxed text-slate-600 text-justify">
                            Designed for absolute clinical safety and patient outcomes.
                        </p>
                    </div>
                </div>

                {{-- Public Health Training --}}
                <div class="grid items-start gap-12 lg:grid-cols-12">
                    <div class="lg:col-span-7">
                        <span class="mb-3 block text-sm font-bold uppercase tracking-widest text-impetus-orange font-outfit">Capacity Building</span>
                        <h2 class="mb-8 text-3xl font-extrabold text-impetus-teal sm:text-4xl font-outfit">Public Health Training</h2>
                        <div class="space-y-6 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                            <p>
                                Maternal and newborn health is our core component, and we are committed to contributing to
                                the country's efforts to achieve Millennium Development Goals 4, 5 and 6. By addressing the
                                primary risk factors involved in maternal and neonatal deaths, we are actively engaged in
                                capacity-building activities within the public health system. The focus is mainly on
                                upgrading the health workforce with relevant materials and innovative methodologies that
                                involve the judicious use of extremely affordable technology, thus ensuring the delivery of
                                much-needed quality care at various levels of healthcare facilities.
                            </p>
                            <p>
                                IHS will provide multidisciplinary training programmes to healthcare professionals,
                                equipping them to meet the pressing health needs of individuals and communities, and thereby
                                improve the effectiveness of the nation's healthcare delivery systems.
                            </p>
                        </div>

                        <div class="my-8 overflow-hidden rounded-2xl bg-impetus-orange p-8 text-white shadow-lg">
                            <h3 class="mb-2 text-xs font-extrabold uppercase tracking-widest text-white/90 font-outfit">Our Deeply Cherished Motto</h3>
                            <p class="text-xl font-black italic leading-snug tracking-wide font-outfit sm:text-2xl">
                                "Save the lives of mothers and newborn babies every day, on every occasion"
                            </p>
                        </div>

                        <div class="space-y-6 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                            <p>
                                Mobile training, clinical mentoring and hand-holding support programmes for nurses are
                                innovative and involve first-of-their-kind approaches, which aim to substantially strengthen
                                nurses' skills to enable them to provide quality services in the public health delivery
                                system.
                            </p>
                            <p>
                                The Competency Based Training (CBT) approach is one of our preferred modes of training,
                                where emphasis is placed on acquiring competence in delivering quality care. The structured
                                approach of our training programmes helps us impart the right mix of knowledge and skills,
                                depending on the nature of the specified task. The emphasis of the competency-based training
                                program is on <strong>"Performing"</strong> rather than merely <strong>"Knowing"</strong>.
                            </p>
                        </div>
                    </div>

                    {{-- Skilled Birth Attendant --}}
                    <div class="rounded-3xl border border-impetus-teal/15 bg-impetus-teal-muted p-8 shadow-sm lg:col-span-5">
                        <div class="mb-6 flex h-12 w-12 items-center justify-center rounded-2xl bg-impetus-orange text-white shadow-md">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <h3 class="mb-4 text-xl font-extrabold text-impetus-teal font-outfit">Skilled Birth Attendant Role</h3>
                        <p class="mb-6 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                            Nurses have an important role in significantly reducing the maternal mortality rate (MMR) and
                            infant mortality rate (IMR) as Skilled Birth Attendants by providing:
                        </p>
                        <ul class="space-y-4">
                            <li class="flex gap-3 rounded-xl border border-impetus-orange/20 bg-white p-4">
                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-impetus-lightOrange text-impetus-orange">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </span>
                                <span class="text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                                    <strong>Comprehensive Care:</strong> Delivering professional antenatal, intranatal and postnatal care.
                                </span>
                            </li>
                            <li class="flex gap-3 rounded-xl border border-impetus-teal/20 bg-white p-4">
                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-impetus-teal-muted text-impetus-teal">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                                    </svg>
                                </span>
                                <span class="text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                                    <strong>Timely Identification:</strong> Quick assessment and identification of potential clinical complications.
                                </span>
                            </li>
                            <li class="flex gap-3 rounded-xl border border-impetus-orange/20 bg-white p-4">
                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-impetus-lightOrange text-impetus-orange">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                    </svg>
                                </span>
                                <span class="text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                                    <strong>Basic Management &amp; Referral:</strong> Administering immediate primary care, followed by timely referral to higher centers.
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Research & Development --}}
                <div class="grid items-center gap-12 lg:grid-cols-12">
                    <div class="lg:col-span-7">
                        <span class="mb-3 block text-sm font-bold uppercase tracking-widest text-impetus-orange font-outfit">Evidence &amp; Quality</span>
                        <h2 class="mb-8 text-3xl font-extrabold text-impetus-teal sm:text-4xl font-outfit">Research &amp; Development</h2>
                        <div class="space-y-6 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                            <p>
                                The Millennium Development Goals (MDGs), established based on key health issues, aim to
                                improve maternal and child health and reduce the incidence of malaria, tuberculosis, HIV,
                                and other health determinants.
                            </p>
                            <p>
                                Health promotion is integral to all national health programmes, with implementation
                                envisaged through the public health system, based on the principles of equitable
                                distribution, community participation, intersectoral coordination, and the use of
                                appropriate technology. Our multidisciplinary research activities focus on developing
                                issue-based and setting-based designs that address existing and emerging healthcare
                                challenges in India. We aim to translate research findings into suitable health promotion
                                models for diverse settings, helping to bridge the practice gap and contribute to the
                                improvement of national health indicators.
                            </p>
                            <p>
                                Evidence is central to our research activities and can clearly guide our efforts to improve
                                service delivery. We are continually strengthening the monitoring and evaluation of our
                                projects with the expertise of our R&amp;D team. Our projects are monitored for quality
                                improvement through well-defined indicators at regular intervals, thereby establishing their
                                inherent value beyond doubt.
                            </p>
                        </div>
                    </div>

                    <div class="rounded-3xl bg-impetus-teal p-8 text-white shadow-lg lg:col-span-5">
                        <div class="mb-8 flex items-center justify-between border-b border-white/15 pb-6">
                            <div>
                                <h4 class="text-lg font-extrabold font-outfit">Research &amp; Development</h4>
                                <p class="mt-0.5 text-xs font-semibold uppercase tracking-wider text-white/70 font-outfit">Continuous Evaluation Core</p>
                            </div>
                            <span class="rounded-full bg-impetus-orange px-3.5 py-1.5 text-xs font-bold uppercase tracking-wider font-outfit">Evidence Core</span>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-start gap-4 rounded-2xl border border-white/10 bg-white/10 p-4">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-impetus-orange text-sm font-bold font-outfit">1</div>
                                <div>
                                    <h5 class="mb-0.5 text-sm font-bold font-outfit sm:text-base">Issue &amp; Setting-Based Designs</h5>
                                    <p class="text-xs leading-relaxed text-white/85 text-justify sm:text-sm">Addressing existing and emerging healthcare challenges across India.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4 rounded-2xl border border-white/10 bg-white/10 p-4">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-impetus-orange text-sm font-bold font-outfit">2</div>
                                <div>
                                    <h5 class="mb-0.5 text-sm font-bold font-outfit sm:text-base">Actionable Health Promotion Models</h5>
                                    <p class="text-xs leading-relaxed text-white/85 text-justify sm:text-sm">Bridging the practice gap and directly improving national health indicators.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4 rounded-2xl border border-white/10 bg-white/10 p-4">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-impetus-orange text-sm font-bold font-outfit">3</div>
                                <div>
                                    <h5 class="mb-0.5 text-sm font-bold font-outfit sm:text-base">Continuous Monitoring &amp; Evaluation</h5>
                                    <p class="text-xs leading-relaxed text-white/85 text-justify sm:text-sm">Establishing absolute value and transparency with well-defined metrics.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Our Commitment --}}
        <section class="bg-white py-16 sm:py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <h2 class="mb-12 text-center text-3xl font-extrabold text-impetus-teal sm:text-4xl font-outfit">
                    Our Commitment
                </h2>
                <div class="grid grid-cols-2 gap-8 md:grid-cols-5 md:gap-4">
                    @foreach ([
                        ['label' => 'Quality Education', 'color' => 'teal', 'icon' => 'M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z'],
                        ['label' => 'Community Impact', 'color' => 'orange', 'icon' => 'M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z'],
                        ['label' => 'Innovation', 'color' => 'teal', 'icon' => 'M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18'],
                        ['label' => 'Empowerment', 'color' => 'orange', 'icon' => 'M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z'],
                        ['label' => 'Ethics & Integrity', 'color' => 'teal', 'icon' => 'M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z'],
                    ] as $item)
                        <div class="flex flex-col items-center text-center">
                            <div @class([
                                'mb-4 flex h-16 w-16 items-center justify-center rounded-full text-white shadow-md',
                                'bg-impetus-teal' => $item['color'] === 'teal',
                                'bg-impetus-orange' => $item['color'] === 'orange',
                            ])>
                                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                                </svg>
                            </div>
                            <p @class([
                                'text-sm font-bold font-outfit',
                                'text-impetus-teal' => $item['color'] === 'teal',
                                'text-impetus-orange' => $item['color'] === 'orange',
                            ])>{{ $item['label'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Simulation-Based Training --}}
        <section class="bg-impetus-teal-muted py-16 sm:py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mb-10 text-center lg:text-left">
                    <div class="mb-4 flex items-center justify-center gap-3 lg:justify-start">
                        <h2 class="text-3xl font-extrabold text-impetus-teal sm:text-4xl font-outfit">Simulation-Based Training</h2>
                        <svg class="hidden h-8 w-24 text-impetus-teal sm:block" viewBox="0 0 120 24" fill="none" aria-hidden="true">
                            <path d="M0 12h8M12 12h8M24 4v16M36 4v16M48 12h8M60 12h8M72 4v16M84 4v16M96 12h8M108 12h8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <p class="text-lg font-semibold text-impetus-teal font-outfit">Practice. Learn. Improve. Deliver Better Patient Care.</p>
                </div>

                <div class="grid items-center gap-12 lg:grid-cols-2">
                    <div class="space-y-8">
                        @foreach ([
                            ['title' => 'Real-Life Scenarios', 'text' => 'Hands-on practice in a safe, controlled environment.', 'color' => 'teal'],
                            ['title' => 'Enhance Skills', 'text' => 'Strengthen clinical judgment and critical thinking.', 'color' => 'orange'],
                            ['title' => 'Build Confidence', 'text' => 'Gain confidence through repetition and feedback.', 'color' => 'teal'],
                            ['title' => 'Better Outcomes', 'text' => 'Improve competence. Ensure patient safety.', 'color' => 'orange'],
                        ] as $feature)
                            <div class="flex gap-4">
                                <div @class([
                                    'flex h-14 w-14 shrink-0 items-center justify-center rounded-full text-white shadow-md',
                                    'bg-impetus-teal' => $feature['color'] === 'teal',
                                    'bg-impetus-orange' => $feature['color'] === 'orange',
                                ])>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 @class([
                                        'mb-1 text-base font-extrabold uppercase tracking-wide font-outfit',
                                        'text-impetus-teal' => $feature['color'] === 'teal',
                                        'text-impetus-orange' => $feature['color'] === 'orange',
                                    ])>{{ $feature['title'] }}</h3>
                                    <p class="text-sm leading-relaxed text-slate-600">{{ $feature['text'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="relative">
                        <img src="{{ $simulationImage }}" alt="Simulation lab training at IHS Nursing"
                            class="w-full rounded-2xl border border-impetus-teal/10 shadow-xl">
                        <div class="absolute bottom-4 right-4 hidden max-w-[180px] rounded-xl border border-impetus-teal/20 bg-white p-4 shadow-lg sm:block">
                            <p class="mb-3 text-xs font-extrabold uppercase tracking-wider text-impetus-teal font-outfit">Simulation Lab</p>
                            @foreach (['Assess', 'Plan', 'Perform', 'Evaluate', 'Improve'] as $step)
                                <div class="mb-1.5 flex items-center gap-2 text-xs font-semibold uppercase text-impetus-teal">
                                    <span class="flex h-4 w-4 items-center justify-center rounded-full bg-impetus-teal text-[10px] text-white">✓</span>
                                    {{ $step }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- CTA Banner --}}
        <section class="bg-impetus-orange py-10 sm:py-12">
            <div class="mx-auto flex max-w-7xl flex-col items-center gap-6 px-6 text-center sm:flex-row sm:justify-between sm:text-left lg:px-8">
                <div class="flex items-center gap-4">
                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-white/20 text-white">
                        <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-extrabold !text-white sm:text-2xl font-outfit">Together, We Build a Healthier Tomorrow</h2>
                        <p class="mt-1 text-sm !text-white/90">Empowering nurses with the skills to deliver exceptional patient care.</p>
                    </div>
                </div>
                <a href="{{ route('cne.modules') }}"
                    class="inline-flex items-center gap-2 rounded-full bg-white px-6 py-3 text-sm font-bold text-impetus-orange shadow-lg transition hover:scale-105 font-outfit">
                    Explore Courses
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>
        </section>
    </main>
@endsection
