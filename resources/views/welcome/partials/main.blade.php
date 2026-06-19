<main class="font-sans antialiased text-slate-800">
    @php
        $heroImage = asset('banner-image-removebg-preview.png');
        $simulationImage = asset('images/design/WhatsApp Image 2026-06-11 at 17.14.41.jpeg');
    @endphp

    <!-- Hero Section -->
    <section id="home" class="relative overflow-hidden bg-white py-16 md:py-24">
        <div class="pointer-events-none absolute inset-0 opacity-40"
            style="background-image: radial-gradient(#045A5D12 1px, transparent 1px); background-size: 32px 32px;">
        </div>

        <div class="relative mx-auto max-w-7xl px-6 sm:px-8">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2 lg:gap-16">
                <div class="text-center lg:text-left">
                    <p class="mb-4 text-sm font-bold uppercase tracking-[0.2em] text-impetus-teal font-outfit">
                        Empowering Nurses. Impacting Care.
                    </p>

                    <h1
                        class="text-4xl font-extrabold leading-tight tracking-tight text-slate-800 sm:text-5xl lg:text-[3.25rem] font-outfit">
                        Professional eLearning Engineered for <span class="text-impetus-teal whitespace-nowrap">Clinical
                            Impact</span>

                    </h1>

                    <p class="mt-6 max-w-2xl text-base leading-relaxed text-slate-600 text-justify sm:text-lg lg:mx-0">
                        <strong>Impetus Healthcare Skills Private Limited (IHS)</strong> is a pioneering healthcare
                        education and skills development organization committed to strengthening the competency of
                        healthcare professionals through innovative and outcome-oriented training programs. The company
                        specializes in the design, development, and implementation of competency-based educational
                        initiatives that support the continuous enhancement of healthcare delivery systems.
                    </p>
                    <p class="mt-4 max-w-2xl text-base leading-relaxed text-slate-600 text-justify sm:text-lg lg:mx-0">
                        The core objective of IHS is to equip healthcare professionals with advanced knowledge,
                        practical skills, and professional competencies required to meet the evolving demands of modern
                        healthcare practice. Through carefully structured training programs, IHS promotes excellence in
                        clinical practice, patient safety, and quality healthcare services across diverse healthcare
                        settings.
                    </p>

                    <ul class="mt-8 space-y-3 text-left">
                        @foreach (['26+ CNE Modules with evidence-based curriculum', 'Innovative outcome-oriented training programs', 'Clinical practice excellence and patient safety focus', '100% accredited course content for healthcare professionals'] as $bullet)
                            <li class="flex items-start gap-3 text-sm text-slate-600 sm:text-base">
                                <span
                                    class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-impetus-teal text-white">
                                    <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </span>
                                <span>{{ $bullet }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div
                        class="mt-8 flex flex-col gap-4 sm:flex-row sm:justify-start sm:justify-center lg:justify-start">
                        <a href="{{ route('cne.modules') }}"
                            class="inline-flex items-center justify-center gap-2 rounded-full bg-impetus-orange px-7 py-3.5 text-sm font-bold text-white shadow-lg shadow-impetus-orange/25 transition hover:bg-impetus-orange-hover font-outfit">
                            Explore Courses
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                        <a href="{{ route('practice.test') }}"
                            class="inline-flex items-center justify-center gap-2 rounded-full border-2 border-impetus-teal bg-white px-7 py-3.5 text-sm font-bold text-impetus-teal transition hover:bg-impetus-teal-muted font-outfit">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                            Practice Tests
                        </a>
                    </div>
                </div>

                <div class="relative mx-auto flex w-full max-w-md items-center justify-center lg:max-w-none">
                    <div
                        class="absolute h-72 w-72 rounded-full border-2 border-impetus-orange/30 sm:h-80 sm:w-80 lg:h-[22rem] lg:w-[22rem]">
                    </div>
                    <img src="{{ $heroImage }}" alt="IHS Nursing healthcare professional"
                        class="relative z-10 h-auto w-full max-w-sm object-contain lg:max-w-md">
                    <div
                        class="absolute -right-1 top-10 flex h-10 w-10 items-center justify-center rounded-full bg-impetus-orange text-white shadow-md">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.62 48.62 0 0112 20.904a48.62 48.62 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.636 50.636 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0112 13.489a50.702 50.702 0 017.74-3.342" />
                        </svg>
                    </div>
                    <div
                        class="absolute right-6 top-1/2 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full bg-impetus-orange text-white shadow-md">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </div>
                    <div
                        class="absolute bottom-12 left-0 flex h-10 w-10 items-center justify-center rounded-full bg-impetus-orange text-white shadow-md">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                        </svg>
                    </div>
                    <div
                        class="absolute bottom-6 right-10 flex h-10 w-10 items-center justify-center rounded-full bg-impetus-orange text-white shadow-md">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Bar -->
    <section class="bg-impetus-teal py-8 sm:py-10">
        <div class="mx-auto max-w-7xl px-6 sm:px-8">
            <div class="grid grid-cols-2 gap-6 text-center text-white md:grid-cols-5 md:gap-4">
                @foreach ([
        ['icon' => 'M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.62 48.62 0 0112 20.904a48.62 48.62 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.636 50.636 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0112 13.489a50.702 50.702 0 017.74-3.342', 'value' => '26+', 'label' => 'CNE Modules'],
        ['icon' => 'M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z', 'value' => '1.4 Lakhs+', 'label' => 'Active Users'],
        ['icon' => 'M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z', 'value' => '4.9', 'label' => 'Users Rating'],
        ['icon' => 'M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'value' => '100%', 'label' => 'Accredited Course Content'],
        ['icon' => 'M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z', 'value' => '4.8/5', 'label' => 'Learner Rating'],
    ] as $stat)
                    <div @class([
                        'flex flex-col items-center gap-2',
                        'col-span-2 md:col-span-1' => $loop->last && $loop->count % 2 !== 0,
                    ])>
                        <div @class([
                            'flex h-11 w-11 items-center justify-center rounded-full',
                            'bg-white/15' => $loop->iteration % 2 === 1,
                            'bg-impetus-orange' => $loop->iteration % 2 === 0,
                        ])>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $stat['icon'] }}" />
                            </svg>
                        </div>
                        <p class="text-lg font-extrabold font-outfit sm:text-xl">{{ $stat['value'] }}</p>
                        <p class="text-[11px] font-semibold uppercase tracking-wide text-white/90 sm:text-xs">
                            {{ $stat['label'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <!-- Vision & Mission section -->
    <section id="vision-mission" class="bg-impetus-teal-muted py-24">
        <div class="mx-auto max-w-7xl px-6 sm:px-8">
            <p class="mx-auto mb-10 max-w-3xl text-center text-base leading-relaxed text-slate-600 sm:text-lg">
                At IHS Nursing Solutions, we are dedicated to providing meaningful continuing education that fosters
                professional excellence and improves healthcare delivery.
            </p>

            <div class="overflow-hidden rounded-2xl border border-impetus-teal/10 shadow-sm lg:flex">
                {{-- Our Vision --}}
                <article
                    class="flex flex-1 gap-5 bg-impetus-lightOrange p-8 sm:gap-6 sm:p-10 lg:border-r lg:border-impetus-orange/20">
                    <div
                        class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-impetus-orange/15 text-impetus-orange sm:h-16 sm:w-16">
                        <svg class="h-7 w-7 sm:h-8 sm:w-8" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <h3
                            class="text-base font-extrabold uppercase tracking-wide text-impetus-orange sm:text-lg font-outfit">
                            Our Vision
                        </h3>
                        <div class="mt-2 mb-4 h-1 w-14 rounded-full bg-impetus-orange sm:w-16"></div>
                        <p class="text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                            To serve as a Centre of Excellence for healthcare skill development initiatives and be at
                            the
                            forefront in carrying out the noble mission of achieving health goals of national and
                            international importance.
                        </p>
                    </div>
                </article>

                {{-- Our Mission --}}
                <article
                    class="flex flex-1 gap-5 border-t border-impetus-teal/15 bg-impetus-teal-muted p-8 sm:gap-6 sm:p-10 lg:border-t-0">
                    <div
                        class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-impetus-teal/10 text-impetus-teal sm:h-16 sm:w-16">
                        <svg class="h-7 w-7 sm:h-8 sm:w-8" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor">
                            <circle cx="12" cy="12" r="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <circle cx="12" cy="12" r="6" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <circle cx="12" cy="12" r="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <h3
                            class="text-base font-extrabold uppercase tracking-wide text-impetus-teal sm:text-lg font-outfit">
                            Our Mission
                        </h3>
                        <div class="mt-2 mb-4 h-1 w-14 rounded-full bg-impetus-teal sm:w-16"></div>
                        <p class="text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                            Our mission is to provide relevant, comprehensive training programmes to multidisciplinary
                            healthcare professionals, enabling them to achieve high levels of professional excellence in
                            clinical practice.
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- About IHS Nursing section -->
    <section id="about" class="overflow-hidden bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid grid-cols-1 items-center gap-y-12 lg:grid-cols-12 lg:gap-x-16">
                <div class="lg:col-span-7">
                    <h2 class="mb-3 text-base font-bold uppercase tracking-widest text-impetus-orange font-outfit">
                        About IHS</h2>
                    <h3 class="mb-6 text-3xl font-extrabold tracking-tight text-impetus-teal sm:text-4xl font-outfit">
                        Empowering Healthcare Through Competency-Based Training
                    </h3>
                    <p class="mb-4 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                        <strong>Impetus Healthcare Skills Private Limited (IHS)</strong> is a unique healthcare
                        skills training company that focuses on designing and implementing competency-based training
                        programmes for the development of human resources in the healthcare delivery system. The
                        primary objective of these programmes is to facilitate the acquisition of professional
                        skills that will empower healthcare professionals at all required levels.
                    </p>
                    <p class="text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                        The strategic and innovative approaches used in designing specific training modules involve
                        the careful application of emerging, technically sound educational tools. Our training
                        programmes enable significant and valuable contributions to the delivery of quality care.
                    </p>
                </div>
                <div class="relative lg:col-span-5">
                    <img src="{{ asset('images/Screenshot-2026-05-19-073517.webp') }}" alt="Nursing Team"
                        class="h-[420px] w-full rounded-3xl object-cover shadow-xl ring-1 ring-impetus-teal/10 sm:h-[500px] lg:h-[560px]" />
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values -->
    <section id="our-values" class="bg-impetus-teal-muted py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <h2
                class="mb-12 text-center text-3xl font-extrabold uppercase tracking-widest text-impetus-teal sm:text-4xl font-outfit">
                Our Values
            </h2>
            <div class="relative">
                <div
                    class="absolute left-8 right-8 top-8 hidden h-px border-t border-dashed border-impetus-teal/25 lg:block">
                </div>
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6">
                    @foreach ([
        ['title' => 'Ethical Values', 'text' => 'Imparting medical ethics, emphasizing morally sound practices.', 'theme' => 'teal', 'icon' => 'M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z'],
        ['title' => 'Excellence', 'text' => 'Achieving excellence recognized for its high quality and standards.', 'theme' => 'orange', 'icon' => 'M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z'],
        ['title' => 'Team Work', 'text' => 'Demonstrating the values of teamwork and creating a highly conducive working environment.', 'theme' => 'teal', 'icon' => 'M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z'],
        ['title' => 'Integrity', 'text' => 'Nurturing honesty, integrity, accountability, and flexibility in all endeavors.', 'theme' => 'orange', 'icon' => 'M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
        ['title' => 'Innovation', 'text' => 'Supporting commendable creativity and valuable innovation in all our preferred approaches.', 'theme' => 'teal', 'icon' => 'M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18'],
        ['title' => 'Synergy', 'text' => 'Developing strong interdisciplinary, synergistic, and collegial relationships.', 'theme' => 'orange', 'icon' => 'M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z'],
    ] as $value)
                        <div class="relative flex flex-col items-center text-center">
                            <div @class([
                                'relative z-10 mb-4 flex h-16 w-16 items-center justify-center rounded-full text-white shadow-md',
                                'bg-impetus-teal' => $value['theme'] === 'teal',
                                'bg-impetus-orange' => $value['theme'] === 'orange',
                            ])>
                                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $value['icon'] }}" />
                                </svg>
                            </div>
                            <h3 class="mb-2 text-sm font-bold text-slate-800 font-outfit">{{ $value['title'] }}</h3>
                            <p class="text-xs leading-relaxed text-slate-600 sm:text-sm">{{ $value['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- IHS' Strengths Section -->
    <section class="relative border-b border-impetus-teal/10 bg-white py-16 sm:py-24">
        <div
            class="pointer-events-none absolute right-0 top-0 h-64 w-64 rounded-full bg-impetus-orange/5 blur-[100px]">
        </div>

        <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto mb-12 max-w-3xl text-center sm:mb-16">
                <h2
                    class="text-2xl font-extrabold uppercase tracking-widest text-impetus-teal sm:text-3xl font-outfit">
                    Our Core Strengths
                </h2>
                {{-- <p class="mt-4 text-base leading-relaxed text-slate-600 sm:text-lg">
                    Impetus Healthcare Skills Private Limited has strong expertise in simulation-based healthcare
                    training and online education, enabling healthcare professionals to acquire practical knowledge and
                    clinical competence through innovative learning methods. Our key strengths include:
                </p> --}}
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ([
        ['title' => 'Advanced Simulation Training', 'text' => 'We provide realistic, skill-oriented simulation training programs that help learners develop hands-on clinical experience in a safe and controlled environment before direct patient care exposure.', 'icon' => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 9.172V5L8 4z'],
        ['title' => 'Comprehensive Learning', 'text' => 'We offer flexible, accessible online courses with interactive learning modules, recorded sessions, assessments, and digital study materials, allowing healthcare professionals to learn anytime and from any location.', 'icon' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
        ['title' => 'Specialized Healthcare Programs', 'text' => 'Conducts training in nursing specialties including; life support, basic/advanced health assessment, critical care nursing, emergency nursing, airway management, neonatal care, infection control, and clinical skills.', 'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'],
        ['title' => 'Industry-Relevant Curriculum', 'text' => 'Training programs are designed according to current healthcare standards, evidence-based practices, and professional competency requirements to ensure practical applicability in clinical settings.', 'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
        ['title' => 'Experienced Educators', 'text' => 'The company is supported by highly qualified healthcare educators, clinical experts, and industry professionals with extensive academic and practical experience.', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
        ['title' => 'Focus on Skill Development', 'text' => 'It emphasizes competency-based education and outcome-oriented training to improve clinical decision-making, patient safety, and professional confidence.', 'icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138z'],
        ['title' => 'Technology-Driven Education', 'text' => 'Integrates modern technologies such as virtual classrooms, simulation scenarios, online assessments, digital certifications, and e-learning platforms.', 'icon' => 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z'],
        ['title' => 'Continuing Nursing Education', 'text' => 'Supports lifelong learning through structured continuing education programs and skill upgradation courses for healthcare professionals.', 'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z'],
    ] as $strength)
                    @php
                        $iconTheme = $loop->iteration % 2 === 1 ? 'teal' : 'orange';
                    @endphp
                    <div
                        class="flex items-start gap-3 rounded-xl border border-impetus-teal/10 bg-white p-4 shadow-sm transition hover:border-impetus-teal/25 hover:shadow-md">
                        <div @class([
                            'flex h-9 w-9 shrink-0 items-center justify-center rounded-md text-white',
                            'bg-impetus-teal' => $iconTheme === 'teal',
                            'bg-impetus-orange' => $iconTheme === 'orange',
                        ])>
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $strength['icon'] }}" />
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <h3 class="text-sm font-bold leading-snug text-impetus-teal font-outfit">
                                {{ $strength['title'] }}</h3>
                            <p class="mt-1.5 text-xs leading-relaxed text-slate-600">{{ $strength['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4 flex items-start gap-4 rounded-xl bg-impetus-teal p-5 sm:items-center sm:p-6">
                <div
                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-md bg-impetus-orange text-white shadow-md">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138z" />
                    </svg>
                </div>
                <div class="min-w-0">
                    <h3 class="text-base font-bold text-white font-outfit sm:text-lg">Commitment to Quality Healthcare
                        Education</h3>
                    <p class="mt-1.5 text-sm leading-relaxed text-white/90 sm:text-base">
                        We are profoundly dedicated to improving healthcare workforce competence and strengthening
                        patient care outcomes through high-quality, comprehensive education and training services.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- CNE Modules Carousel Section -->
    <section id="cne-modules" class="relative overflow-hidden bg-white py-24">
        <div class="pointer-events-none absolute left-0 top-0 h-64 w-64 rounded-full bg-impetus-teal/5 blur-[80px]">
        </div>
        <div class="mx-auto max-w-7xl px-6 sm:px-8">
            <h2
                class="mb-12 text-center text-3xl font-extrabold uppercase tracking-widest text-impetus-teal sm:text-4xl font-outfit">
                CNE Modules
            </h2>

            @if ($latestCourses->isEmpty())
                <div class="rounded-2xl border border-impetus-teal/10 bg-impetus-teal-muted px-8 py-12 text-center">
                    <p class="text-base leading-relaxed text-slate-600">No modules are available yet. Please check back
                        later.</p>
                </div>
            @else
                <div x-data="{
                    intervalId: null,
                    scrollByCard(dir) {
                        const track = this.$refs.track;
                        const card = track.querySelector('[data-module-card]');
                        const amount = (card ? card.offsetWidth + 24 : 360) * dir;
                        track.scrollBy({ left: amount, behavior: 'smooth' });
                    },
                    startAutoScroll() {
                        this.stopAutoScroll();
                        this.intervalId = setInterval(() => {
                            const track = this.$refs.track;
                            const card = track.querySelector('[data-module-card]');
                            const amount = card ? card.offsetWidth + 24 : 360;
                            const maxScroll = track.scrollWidth - track.clientWidth;

                            if (track.scrollLeft >= maxScroll - 5) {
                                track.scrollTo({ left: 0, behavior: 'smooth' });
                            } else {
                                track.scrollBy({ left: amount, behavior: 'smooth' });
                            }
                        }, 4000);
                    },
                    stopAutoScroll() {
                        if (this.intervalId) {
                            clearInterval(this.intervalId);
                            this.intervalId = null;
                        }
                    },
                    init() {
                        this.startAutoScroll();
                    },
                    destroy() {
                        this.stopAutoScroll();
                    },
                }" @mouseenter="stopAutoScroll()" @mouseleave="startAutoScroll()"
                    class="relative">

                    {{-- Left Arrow --}}
                    <button
                        @click="stopAutoScroll(); scrollByCard(-1); setTimeout(() => startAutoScroll(), 3000)"
                        class="absolute left-0 top-1/2 z-10 -translate-y-1/2 -translate-x-1 flex h-10 w-10 items-center justify-center rounded-full bg-white shadow-lg ring-1 ring-impetus-teal/20 text-impetus-teal transition hover:bg-impetus-teal hover:text-white hover:shadow-impetus-teal/30 focus:outline-none"
                        aria-label="Scroll left">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </button>

                    {{-- Scroll Track --}}
                    <div x-ref="track"
                        class="flex snap-x snap-mandatory gap-6 overflow-x-auto pb-2 px-2 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                        @foreach ($latestCourses as $course)
                            @include('cne-modules.partials.module-card', [
                                'course' => $course,
                                'moduleIndex' => $loop->iteration,
                                'carousel' => true,
                            ])
                        @endforeach
                    </div>

                    {{-- Right Arrow --}}
                    <button
                        @click="stopAutoScroll(); scrollByCard(1); setTimeout(() => startAutoScroll(), 3000)"
                        class="absolute right-0 top-1/2 z-10 -translate-y-1/2 translate-x-1 flex h-10 w-10 items-center justify-center rounded-full bg-white shadow-lg ring-1 ring-impetus-teal/20 text-impetus-teal transition hover:bg-impetus-teal hover:text-white hover:shadow-impetus-teal/30 focus:outline-none"
                        aria-label="Scroll right">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </div>
            @endif

            <div class="mt-12 text-center">
                <a href="{{ route('cne.modules') }}"
                    class="inline-flex items-center gap-2 rounded-full bg-impetus-teal px-8 py-4 text-sm font-bold text-white shadow-lg shadow-impetus-teal/20 transition hover:-translate-y-0.5 hover:bg-impetus-teal-hover font-outfit">
                    Explore CNE Modules
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>


    <!-- Simulation Based Training Section -->
    {{-- <section class="relative overflow-hidden border-b border-impetus-teal/10 bg-impetus-teal-muted py-24 sm:py-32">
        <div class="pointer-events-none absolute -left-16 top-1/4 h-72 w-72 rounded-full bg-impetus-teal/5 blur-[100px]"></div>
        <div class="pointer-events-none absolute -right-16 bottom-1/4 h-72 w-72 rounded-full bg-impetus-orange/5 blur-[100px]"></div>

        <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid items-center gap-16 lg:grid-cols-12">
                <!-- Left: Graphic Card / Info Visual -->
                <div class="relative order-last lg:order-first lg:col-span-5">
                    <div class="relative overflow-hidden rounded-2xl border-2 border-impetus-teal/20 bg-white p-2 shadow-xl ring-1 ring-impetus-orange/10">
                        <img src="{{ $simulationImage }}"
                            alt="Simulation Lab" class="h-[450px] w-full rounded-xl object-cover" />
                        <div class="pointer-events-none absolute inset-x-2 bottom-2 h-24 rounded-b-xl bg-gradient-to-t from-impetus-teal/40 to-transparent"></div>
                    </div>
                </div>

                <!-- Right: Narrative content -->
                <div class="lg:col-span-7">
                    <span class="mb-3 block text-sm font-bold uppercase tracking-widest text-impetus-orange font-outfit">Pedagogical
                        Innovation</span>
                    <h2 class="mb-8 text-3xl font-extrabold tracking-tight text-impetus-teal sm:text-4xl font-outfit">
                        Simulation-Based Training</h2>

                    <div class="space-y-6 text-slate-600 text-justify leading-relaxed text-sm sm:text-base">
                        <p>
                            Impetus Healthcare Skills stays up to date with the latest technologies, including
                            pedagogically rich simulation-based learning, which enables effective hands-on training for
                            healthcare professionals. This approach enhances their knowledge and skills, significantly
                            contributing to the improvement of healthcare service quality. Simulation is becoming
                            increasingly popular as a method for providing healthcare professionals with innovative
                            learning experiences, fostering a deeper understanding of didactic content. In healthcare,
                            simulation serves as an excellent adjunct to live clinical experiences and reduces barriers
                            associated with clinical learning.
                        </p>
                        <p>
                            It offers opportunities to assess clinical judgement and critical thinking without
                            compromising patient safety. Simulated experiences allow healthcare professionals to
                            critically analyze their actions, reflect on their skills and clinical reasoning, and
                            evaluate their clinical decisions. Simulation provides a new avenue for educators and
                            researchers to improve healthcare education and practice, as well as to advance the field to
                            meet global standards.
                        </p>
                        <p>
                            IHS focuses on equipping healthcare professionals with relevant skills to ensure they are
                            industry-ready. We have identified niche segments within the healthcare sector where the
                            need for skilling, upskilling, and reskilling of human resources is high, particularly in
                            improving the quality of care to meet stipulated standards of practice. As practical skills
                            are now of utmost importance, our courses aim to motivate healthcare professionals to
                            develop the knowledge, essential skills, and attitudes that will guide them in delivering
                            excellent care across various healthcare settings.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    <!-- Sleek Contact Form & Lead Capture -->

</main>
