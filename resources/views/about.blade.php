@extends('layouts.frontend.app')

@section('title', 'About Us - IHS')

@php
    $heroImage = asset('aboutus-banner.png');
    $simulationImage = asset('images/design/WhatsApp Image 2026-06-11 at 17.14.41.jpeg');
    $aboutImage = fn(string $filename): string => asset('about/' . rawurlencode($filename));

    $simulationFeatures = [
        [
            'title' => 'Real-Life Scenarios',
            'text' => 'Hands-on practice in a safe, controlled environment.',
            'color' => 'teal',
        ],
        [
            'title' => 'Enhance Skills',
            'text' => 'Strengthen clinical judgment and critical thinking.',
            'color' => 'orange',
        ],
        [
            'title' => 'Build Confidence',
            'text' => 'Gain confidence through repetition and feedback.',
            'color' => 'teal',
        ],
        ['title' => 'Better Outcomes', 'text' => 'Improve competence. Ensure patient safety.', 'color' => 'orange'],
    ];

    $focusAreas = [
        [
            'id' => 'simulation-based-training',
            'number' => '01',
            'title' => 'Simulation Based Training',
            'tagline' => 'Developing Skills for Safe and Effective Patient Care',
            'paragraphs' => [
                'Impetus Healthcare Skills leverages advanced technologies and simulation-based learning to provide effective hands-on training for healthcare professionals. This innovative approach enhances knowledge, clinical skills, and confidence while improving the quality of healthcare services.',
                'IHS is committed to skilling, upskilling, and reskilling healthcare professionals to meet evolving industry demands. Our competency-based programs focus on developing the knowledge, practical skills, and professional attitudes required to deliver safe, high-quality patient care across diverse healthcare settings.',
            ],
            'link' => null,
            'link_label' => null,
            'layout' => 'simulation',
        ],
        [
            'id' => 'nursing-cms',
            'number' => '02',
            'title' => 'Smart College Management System',
            'tagline' => null,
            'paragraphs' => [
                'Nursing CMS is a comprehensive College Management System designed exclusively for nursing and healthcare education institutions. Built to address the unique academic, clinical, administrative, and regulatory requirements of nursing colleges, the platform provides an integrated digital environment that streamlines institutional operations and enhances collaboration among students, faculty, and administrators.',
                'The platform supports the complete student lifecycle, from admission to graduation, by integrating academic planning, attendance management, faculty administration, examinations, clinical rotations, accreditation documentation, and institutional reporting into a single system. With real-time dashboards, analytics, and automated workflows, Nursing CMS reduces administrative burden, improves operational efficiency, supports compliance requirements, and enables institutions to deliver high-quality nursing education.',
            ],
            'link' => 'https://www.nursingcms.com',
            'link_label' => 'Visit Nursing CMS',
            'image' => asset('about/CMS_1C.png'),
        ],
        [
            'id' => 'nursing-online-test',
            'number' => '03',
            'title' => 'Nursing Online Test',
            'subtitle' => 'Online Assessment Platform for Nursing Students',
            'tagline' => 'Empowering Nursing Students with Knowledge, Confidence, and Clinical Excellence',
            'paragraphs' => [
                'Nursing Online Test is a comprehensive, curriculum-based assessment platform designed to help nursing students evaluate their knowledge, strengthen core concepts, and improve examination readiness. Developed in alignment with the Indian Nursing Council (INC) and State Health University curricula, the platform features multiple question formats, including multiple-choice, case-based, image-based, and competency-based assessments.',
                'Instant feedback, detailed score reports, and performance analytics help learners identify strengths and areas for improvement. With flexible, self-paced access, Nursing Online Test promotes continuous learning, reinforces theoretical knowledge, enhances clinical reasoning, and prepares students for university examinations, licensure assessments, and professional nursing practice with confidence.',
            ],
            'link' => 'https://nursingonlinetest.com/nursing-students',
            'link_label' => 'Explore Nursing Online Test',
            'image' => asset('about/aboutus-Onlinetest.png'),
        ],
        [
            'id' => 'professional-knowledge-assessment',
            'number' => '04',
            'title' => 'Professional Knowledge Assessment for Nurses',
            'tagline' =>
                'Empowers nurses to strengthen their knowledge, build confidence, and achieve success in competitive examinations',
            'paragraphs' => [
                'Impetus Professional Knowledge Assessment is a comprehensive online platform designed to help nurses evaluate their professional knowledge and prepare effectively for competitive recruitment examinations. The platform offers structured assessments, topic-wise practice tests, full-length mock examinations, and detailed performance analytics to measure progress and identify knowledge gaps.',
                'Covering core nursing subjects and aligned with current examination patterns, it strengthens clinical knowledge, critical thinking, and decision-making skills. Instant feedback and flexible, self-paced learning enable continuous improvement and focused preparation. The platform enhances confidence, examination readiness, and professional competence, supporting success in government, private, and healthcare recruitment examinations and career advancement opportunities.',
            ],
            'link' => 'https://nursingonlinetest.com/nurse',
            'link_label' => 'Explore Professional Assessment',
            'image' => asset('about/Nurisng_Online Test_professional_Nurses_2A.png'),
        ],
        [
            'id' => 'capacity-building',
            'number' => '05',
            'title' => 'Capacity Building',
            'tagline' => 'Building Competence, Strengthening Communities, and Advancing Public Health Excellence',
            'paragraphs' => [
                'Capacity Building in Public Health Nursing is a comprehensive professional development program designed to strengthen nurses\' knowledge, skills, and competencies in health promotion, disease prevention, community health, epidemiology, and public health leadership. Through evidence-based training, competency-focused learning, and practical applications, the program prepares healthcare professionals to plan, implement, monitor, and evaluate public health interventions effectively.',
                'It enhances leadership, communication, and community engagement skills while promoting evidence-informed decision-making and quality healthcare delivery. By supporting continuous professional development, the program empowers nurses to address emerging public health challenges, improve population health, and contribute to stronger, more resilient healthcare systems.',
            ],
            'link' => null,
            'link_label' => null,
            'image' => asset('focus_publichealth.jpeg'),
        ],
        [
            'id' => 'research-development',
            'number' => '06',
            'title' => 'Research & Development',
            'tagline' => 'Transforming Evidence into Impact',
            'paragraphs' => [
                'Research at Impetus Healthcare Skills focuses on generating evidence-based knowledge to advance healthcare education, clinical practice, public health, and community well-being. Our multidisciplinary, outcome-oriented research addresses emerging healthcare challenges, evaluates innovative teaching methods, and develops practical solutions that improve healthcare delivery. By promoting collaboration among educators, healthcare professionals, researchers, and institutions, we encourage innovation and the translation of research into practice.',
                'Our research initiatives strengthen evidence-based decision-making, enhance workforce competencies, improve patient safety and healthcare quality, and contribute to better population health outcomes. Through continuous research and innovation, IHS supports excellence in healthcare education and sustainable healthcare development.',
            ],
            'link' => null,
            'link_label' => null,
            'image' => asset('research_development.jpeg'),
        ],
    ];
@endphp

@section('content')
    <main class="overflow-hidden bg-white">
        {{-- Hero Section --}}
        <section class="relative bg-impetus-teal-muted py-16 sm:py-16">
            <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
                    <div>
                        <p
                            class="mb-4 flex items-center gap-3 text-sm font-bold uppercase tracking-widest text-impetus-teal font-outfit">
                            <span class="h-px w-8 bg-impetus-teal"></span>
                            About IHS Nursing
                        </p>
                        <h1
                            class="mb-6 text-3xl font-extrabold leading-tight text-impetus-teal sm:text-4xl lg:text-[2.75rem] font-outfit">
                            About Impetus Healthcare Skills
                        </h1>
                        <div class="space-y-5 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                            <p>
                                <strong>Impetus Healthcare Skills Private Limited</strong> is a premier healthcare
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
                            class="relative z-10 h-auto w-full rounded-3xl object-cover shadow-xl ring-1 ring-impetus-teal/10"
                            style="height: 750px;">
                    </div>
                </div>
            </div>
        </section>

        {{-- Stats Bar --}}
        <section class="bg-impetus-teal py-4 sm:py-6">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid grid-cols-2 gap-6 text-center text-white md:grid-cols-5 md:gap-4">
                    <div class="flex flex-col items-center gap-2">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-white/15">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                        </div>
                        <p class="text-lg font-extrabold font-outfit sm:text-xl">15K+</p>
                        <p class="text-xs font-semibold uppercase tracking-wide text-white/90">Nurses Enrolled</p>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-impetus-orange">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                        </div>
                        <p class="text-lg font-extrabold font-outfit sm:text-xl">10K+</p>
                        <p class="text-xs font-semibold uppercase tracking-wide text-white/90">Online Tests Taken</p>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-white/15">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.62 48.62 0 0112 20.904a48.62 48.62 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.636 50.636 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0112 13.489a50.702 50.702 0 017.74-3.342" />
                            </svg>
                        </div>
                        <p class="text-lg font-extrabold font-outfit sm:text-xl">8K+</p>
                        <p class="text-xs font-semibold uppercase tracking-wide text-white/90">Certificates Issued</p>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-impetus-orange">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                            </svg>
                        </div>
                        <p class="text-lg font-extrabold font-outfit sm:text-xl">4.8/5</p>
                        <p class="text-xs font-semibold uppercase tracking-wide text-white/90">Learner Rating</p>
                    </div>
                    <div class="col-span-2 flex flex-col items-center gap-2 md:col-span-1">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-white/15">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.62 48.62 0 0112 20.904a48.62 48.62 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.636 50.636 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0112 13.489a50.702 50.702 0 017.74-3.342" />
                            </svg>
                        </div>
                        <p class="text-lg font-extrabold font-outfit sm:text-xl">26+</p>
                        <p class="text-xs font-semibold uppercase tracking-wide text-white/90">CNE Modules</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Our Focus --}}
        <section class="bg-white py-16 sm:py-12">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <h2 class="mb-16 text-center text-3xl font-extrabold text-impetus-teal sm:text-4xl font-outfit">
                    Our Focus
                </h2>

                <div class="space-y-12 sm:space-y-16">
                    @foreach ($focusAreas as $index => $area)
                        @php
                            $imageOnLeft = $index % 2 === 0;
                            $theme = match ($index % 3) {
                                0 => [
                                    'shell' =>
                                        'rounded-3xl border border-impetus-teal/20 bg-impetus-teal-muted p-8 shadow-sm sm:p-10',
                                    'badge' => 'bg-impetus-teal',
                                    'label' => 'text-impetus-orange',
                                    'btn' => 'bg-impetus-teal hover:bg-impetus-teal/90',
                                    'imgBorder' => 'border-impetus-teal/15',
                                ],
                                1 => [
                                    'shell' =>
                                        'rounded-3xl border border-impetus-orange/25 bg-impetus-lightOrange p-8 shadow-sm sm:p-10',
                                    'badge' => 'bg-impetus-orange',
                                    'label' => 'text-impetus-orange',
                                    'btn' => 'bg-impetus-orange hover:bg-impetus-orange-hover',
                                    'imgBorder' => 'border-impetus-orange/20',
                                ],
                                default => [
                                    'shell' => 'rounded-3xl border border-slate-200 bg-white p-8 shadow-md sm:p-10',
                                    'badge' => 'bg-impetus-teal',
                                    'label' => 'text-impetus-teal',
                                    'btn' => 'bg-impetus-teal hover:bg-impetus-teal/90',
                                    'imgBorder' => 'border-slate-200',
                                ],
                            };
                        @endphp

                        @if (($area['layout'] ?? null) === 'simulation')
                            <article id="{{ $area['id'] }}" class="{{ $theme['shell'] }}">
                                <div class="mb-8">
                                    <div class="mb-4 flex items-center gap-4">
                                        <span
                                            class="flex h-10 w-10 items-center justify-center rounded-full {{ $theme['badge'] }} text-sm font-extrabold text-white font-outfit">
                                            {{ $area['number'] }}
                                        </span>
                                        <span
                                            class="text-sm font-bold uppercase tracking-widest {{ $theme['label'] }} font-outfit">Our
                                            Focus</span>
                                    </div>

                                    <h3 class="mb-4 text-2xl font-extrabold text-impetus-teal sm:text-3xl font-outfit">
                                        {{ $area['title'] }}
                                    </h3>

                                    @if (!empty($area['tagline']))
                                        <p
                                            class="mb-4 text-base font-medium italic text-impetus-orange font-outfit sm:text-lg">
                                            &ldquo;{{ $area['tagline'] }}&rdquo;
                                        </p>
                                    @endif

                                    <div class="space-y-4 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                                        @foreach ($area['paragraphs'] as $paragraph)
                                            <p>{{ $paragraph }}</p>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="grid items-center gap-12 lg:grid-cols-2">
                                    <div class="space-y-8">
                                        @foreach ($simulationFeatures as $feature)
                                            <div class="flex gap-4">
                                                <div @class([
                                                    'flex h-14 w-14 shrink-0 items-center justify-center rounded-full text-white shadow-md',
                                                    'bg-impetus-teal' => $feature['color'] === 'teal',
                                                    'bg-impetus-orange' => $feature['color'] === 'orange',
                                                ])>
                                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor" stroke-width="1.8">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h4 @class([
                                                        'mb-1 text-base font-extrabold uppercase tracking-wide font-outfit',
                                                        'text-impetus-teal' => $feature['color'] === 'teal',
                                                        'text-impetus-orange' => $feature['color'] === 'orange',
                                                    ])>{{ $feature['title'] }}</h4>
                                                    <p class="text-sm leading-relaxed text-slate-600">
                                                        {{ $feature['text'] }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="relative">
                                        <img src="{{ $simulationImage }}" alt="Simulation lab training at IHS Nursing"
                                            class="w-full rounded-2xl border {{ $theme['imgBorder'] }} shadow-xl">
                                        <div
                                            class="absolute bottom-4 right-4 hidden max-w-[180px] rounded-xl border border-impetus-teal/20 bg-white p-4 shadow-lg sm:block">
                                            <p
                                                class="mb-3 text-xs font-extrabold uppercase tracking-wider text-impetus-teal font-outfit">
                                                Simulation Lab</p>
                                            @foreach (['Assess', 'Plan', 'Perform', 'Evaluate', 'Improve'] as $step)
                                                <div
                                                    class="mb-1.5 flex items-center gap-2 text-xs font-semibold uppercase text-impetus-teal">
                                                    <span
                                                        class="flex h-4 w-4 items-center justify-center rounded-full bg-impetus-teal text-[10px] text-white">✓</span>
                                                    {{ $step }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @elseif ($area['id'] === 'nursing-cms')
                            <article id="{{ $area['id'] }}" @class(['flex flex-col gap-8', $theme['shell']])>
                                <div>
                                    <div class="mb-4 flex items-center gap-4">
                                        <span @class([
                                            'flex h-10 w-10 items-center justify-center rounded-full text-sm font-extrabold text-white font-outfit',
                                            $theme['badge'],
                                        ])>
                                            {{ $area['number'] }}
                                        </span>
                                        <span @class([
                                            'text-sm font-bold uppercase tracking-widest font-outfit',
                                            $theme['label'],
                                        ])>Our Focus</span>
                                    </div>

                                    <h3 class="mb-3 text-2xl font-extrabold text-impetus-teal sm:text-3xl font-outfit">
                                        {{ $area['title'] }}
                                    </h3>

                                    @if (!empty($area['subtitle']))
                                        <p class="mb-3 text-base font-semibold text-impetus-teal font-outfit">
                                            {{ $area['subtitle'] }}
                                        </p>
                                    @endif

                                    @if (!empty($area['tagline']))
                                        <p
                                            class="mb-6 text-base font-medium italic text-impetus-orange font-outfit sm:text-lg">
                                            &ldquo;{{ $area['tagline'] }}&rdquo;
                                        </p>
                                    @endif

                                    <div
                                        class="space-y-5 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                                        @foreach ($area['paragraphs'] as $paragraph)
                                            <p>{{ $paragraph }}</p>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="relative w-full">
                                    <img src="{{ $area['image'] }}" alt="{{ $area['title'] }} at IHS Nursing"
                                        @class([
                                            'w-full rounded-2xl object-cover shadow-xl border',
                                            $theme['imgBorder'],
                                        ])>
                                    @if (!empty($area['link']))
                                        <div class="absolute right-4 sm:right-8 top-0 -translate-y-1/2 z-20">
                                            <a href="{{ $area['link'] }}" target="_blank" rel="noopener noreferrer"
                                                @class([
                                                    'inline-flex items-center gap-2 rounded-full px-5 py-2.5 text-xs sm:px-6 sm:py-3 sm:text-sm font-bold text-white shadow-md transition transform hover:scale-105 active:scale-95 font-outfit',
                                                    $theme['btn'],
                                                ])>
                                                {{ $area['link_label'] }}
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                                </svg>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </article>
                        @else
                            <article id="{{ $area['id'] }}" @class([
                                'grid items-center gap-10 lg:grid-cols-12 lg:items-stretch lg:gap-12',
                                $theme['shell'],
                            ])>
                                <div @class([
                                    'relative lg:col-span-5',
                                    $imageOnLeft ? 'order-1' : 'order-2',
                                ])>
                                    <img src="{{ $area['image'] }}" alt="{{ $area['title'] }} at IHS Nursing"
                                        @class([
                                            'w-full rounded-2xl object-cover object-top shadow-xl border lg:absolute lg:inset-0 lg:h-full',
                                            $theme['imgBorder'],
                                        ])>
                                </div>

                                <div @class(['lg:col-span-7', $imageOnLeft ? 'order-2' : 'order-1'])>
                                    <div class="mb-4 flex items-center gap-4">
                                        <span @class([
                                            'flex h-10 w-10 items-center justify-center rounded-full text-sm font-extrabold text-white font-outfit',
                                            $theme['badge'],
                                        ])>
                                            {{ $area['number'] }}
                                        </span>
                                        <span @class([
                                            'text-sm font-bold uppercase tracking-widest font-outfit',
                                            $theme['label'],
                                        ])>Our Focus</span>
                                    </div>

                                    <h3 class="mb-3 text-2xl font-extrabold text-impetus-teal sm:text-3xl font-outfit">
                                        {{ $area['title'] }}
                                    </h3>

                                    @if (!empty($area['subtitle']))
                                        <p class="mb-3 text-base font-semibold text-impetus-teal font-outfit">
                                            {{ $area['subtitle'] }}
                                        </p>
                                    @endif

                                    @if (!empty($area['tagline']))
                                        <p
                                            class="mb-6 text-base font-medium italic text-impetus-orange font-outfit sm:text-lg">
                                            &ldquo;{{ $area['tagline'] }}&rdquo;
                                        </p>
                                    @endif

                                    <div
                                        class="space-y-5 text-sm leading-relaxed text-slate-600 text-justify sm:text-base">
                                        @foreach ($area['paragraphs'] as $paragraph)
                                            <p>{{ $paragraph }}</p>
                                        @endforeach
                                    </div>

                                    @if (!empty($area['link']))
                                        <a href="{{ $area['link'] }}" target="_blank" rel="noopener noreferrer"
                                            @class([
                                                'mt-6 inline-flex items-center gap-2 rounded-full px-6 py-3 text-sm font-bold text-white shadow-md transition font-outfit',
                                                $theme['btn'],
                                            ])>
                                            {{ $area['link_label'] }}
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" stroke-width="2.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </article>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Vision & Goal --}}
        <section class="bg-white py-16 sm:py-12">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="rounded-3xl bg-impetus-teal p-8 text-white shadow-lg sm:p-10">
                    <p
                        class="mb-4 text-center text-sm font-extrabold uppercase tracking-widest text-impetus-orange font-outfit">
                        Our Core Vision &amp; Goal
                    </p>
                    <p class="mx-auto max-w-5xl text-justify text-base leading-relaxed text-white/95 sm:text-lg">
                        The organization aims to support lifelong learning in healthcare by empowering professionals
                        with updated clinical knowledge, practical expertise, and industry-relevant competencies
                        that contribute to improved patient care and healthcare outcomes.
                    </p>
                </div>
            </div>
        </section>

        {{-- Our Commitment --}}
        <section class="bg-white py-16 sm:py-12">
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
                                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="1.8">
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

        {{-- CTA Banner --}}
        <section class="bg-white py-16 sm:py-12">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div
                    class="flex flex-col items-center gap-6 rounded-3xl bg-impetus-orange p-8 text-center shadow-lg sm:flex-row sm:justify-between sm:p-10 sm:text-left">
                    <div class="flex items-center gap-4">
                        <div
                            class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-white/20 text-white">
                            <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-extrabold !text-white sm:text-2xl font-outfit">Together, We Build a
                                Healthier Tomorrow</h2>
                            <p class="mt-1 text-sm !text-white/90">Empowering nurses with the skills to deliver exceptional
                                patient care.</p>
                        </div>
                    </div>
                    <a href="{{ route('cne.modules') }}"
                        class="inline-flex items-center gap-2 rounded-full bg-white px-6 py-3 text-sm font-bold text-impetus-orange shadow-lg transition hover:scale-105 font-outfit">
                        Explore Courses
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection
