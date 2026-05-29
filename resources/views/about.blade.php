@extends('layouts.frontend.app')

@section('title', 'About Us - IHS')

@section('content')
    <main class="overflow-hidden bg-[#F8FAFC]">
        <!-- Hero & Company Overview Section -->
        <section
            class="relative bg-gradient-to-br from-white via-slate-50 to-slate-100/50 py-20 sm:py-28 border-b border-slate-200/60">
            <div
                class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-impetus-orange/5 via-transparent to-transparent pointer-events-none">
            </div>
            <div class="absolute top-1/2 left-0 w-80 h-80 bg-impetus-orange/5 rounded-full blur-[120px] pointer-events-none">
            </div>

            <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-center gap-16 lg:grid-cols-12 mb-16">
                    <div class="lg:col-span-7">
                        <span
                            class="text-sm font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-3 block">Who
                            We Are</span>
                        <h1
                            class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-impetus-navy tracking-tight font-outfit leading-tight mb-6">
                            Impetus Healthcare Skills Private Limited
                        </h1>

                        <div class="space-y-6 text-slate-600 text-justify leading-relaxed text-sm sm:text-base">
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

                    <!-- Right Column: Visual / Image Wrapper -->
                    <div class="lg:col-span-5 relative">
                        <div
                            class="absolute -inset-4 rounded-[2.5rem] bg-gradient-to-tr from-impetus-orange/10 via-transparent to-impetus-navy/10 blur-2xl -z-10">
                        </div>
                        <div
                            class="relative overflow-hidden rounded-[2rem] border border-slate-200/80 bg-white p-3 shadow-2xl">
                            <img src="{{ asset('images/Screenshot-2026-05-19-073517.webp') }}"
                                alt="Healthcare training and excellence"
                                class="w-full h-[450px] object-cover rounded-2xl shadow-inner" />
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-slate-950/40 via-transparent to-transparent rounded-[2rem] pointer-events-none">
                            </div>
                        </div>

                        <!-- Competency Card Underneath Image -->
                        <div
                            class="mt-6 bg-white border border-slate-200/80 p-5 rounded-2xl shadow-lg flex items-center gap-4 hover:scale-[1.02] transition-transform duration-300">
                            <div
                                class="w-12 h-12 rounded-xl bg-impetus-lightOrange text-impetus-orange flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-base font-bold text-impetus-navy font-outfit">Competency-Based</h4>
                                <p class="text-xs text-slate-500 mt-0.5 leading-snug">Designed for absolute clinical
                                    safety and patient outcomes.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Full-Width Our Core Vision & Goal Card -->
                <div
                    class="p-8 sm:p-10 rounded-[2.5rem] bg-gradient-to-br from-impetus-navy to-slate-900 text-white shadow-xl shadow-slate-900/10 border border-white/5 relative overflow-hidden">
                    <!-- Decorative glowing vector details -->
                    <div
                        class="absolute -right-20 -bottom-20 w-64 h-64 bg-impetus-orange/10 rounded-full blur-3xl pointer-events-none">
                    </div>
                    <div
                        class="absolute -left-20 -top-20 w-64 h-64 bg-emerald-500/5 rounded-full blur-3xl pointer-events-none">
                    </div>

                    <div class="relative z-10">
                        <p
                            class="font-extrabold font-outfit text-impetus-orange mb-4 text-sm sm:text-base uppercase tracking-widest text-center">
                            Our Core Vision & Goal
                        </p>
                        <p
                            class="text-base sm:text-lg md:text-xl text-slate-200 text-justify leading-relaxed max-w-5xl mx-auto font-sans">
                            The organization aims to support lifelong learning in healthcare by empowering professionals
                            with updated clinical knowledge, practical expertise, and industry-relevant competencies
                            that contribute to improved patient care and healthcare outcomes.
                        </p>
                    </div>
                </div>
            </div>
        </section>



        <!-- Public Health Training Section -->
        <section class="py-24 sm:py-32 relative bg-white border-b border-slate-200/60 overflow-hidden">
            <div
                class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-impetus-orange/5 via-transparent to-transparent pointer-events-none">
            </div>

            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-start gap-16 lg:grid-cols-12">
                    <div class="lg:col-span-7">
                        <span
                            class="text-sm font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-3 block">Capacity
                            Building</span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-impetus-navy tracking-tight font-outfit mb-8">
                            Public Health Training</h2>

                        <div class="space-y-6 text-slate-600 text-justify leading-relaxed text-sm sm:text-base">
                            <p>
                                Maternal and newborn health is our core component, and we are committed to contributing to
                                the country’s efforts to achieve Millennium Development Goals 4, 5 and 6. By addressing the
                                primary risk factors involved in maternal and neonatal deaths, we are actively engaged in
                                capacity-building activities within the public health system. The focus is mainly on
                                upgrading the health workforce with relevant materials and innovative methodologies that
                                involve the judicious use of extremely affordable technology, thus ensuring the delivery of
                                much-needed quality care at various levels of healthcare facilities.
                            </p>
                            <p>
                                IHS will provide multidisciplinary training programmes to healthcare professionals,
                                equipping them to meet the pressing health needs of individuals and communities, and thereby
                                improve the effectiveness of the nation’s healthcare delivery systems.
                            </p>
                        </div>

                        <!-- Brand Motto Block -->
                        <div
                            class="my-8 relative overflow-hidden rounded-[2rem] bg-gradient-to-r from-impetus-orange to-amber-500 p-8 text-white shadow-xl shadow-impetus-orange/20">
                            <div class="absolute right-0 bottom-0 opacity-10 pointer-events-none">
                                <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xs uppercase font-extrabold tracking-widest text-slate-100 font-outfit mb-2">Our
                                Deeply Cherished Motto</h3>
                            <p class="text-xl sm:text-2xl font-black italic tracking-wide font-outfit leading-snug">
                                “Save the lives of mothers and newborn babies every day, on every occasion”
                            </p>
                        </div>

                        <div class="space-y-6 text-slate-600 text-justify leading-relaxed text-sm sm:text-base">
                            <p>
                                Mobile training, clinical mentoring and hand-holding support programmes for nurses are
                                innovative and involve first-of-their-kind approaches, which aim to substantially strengthen
                                nurses’ skills to enable them to provide quality services in the public health delivery
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

                    <!-- Right side: Specialized Skilled Birth Attendant roles -->
                    <div
                        class="lg:col-span-5 lg:sticky lg:top-8 bg-slate-50 border border-slate-200/80 rounded-[2rem] p-8 shadow-lg">
                        <div
                            class="w-12 h-12 rounded-2xl bg-impetus-orange text-white flex items-center justify-center shrink-0 mb-6 shadow-md shadow-impetus-orange/10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-extrabold text-impetus-navy font-outfit mb-4">Skilled Birth Attendant Role
                        </h3>
                        <p class="text-sm sm:text-base text-slate-500 leading-relaxed text-justify mb-6">
                            Nurses have an important role in significantly reducing the maternal mortality rate (MMR) and
                            infant mortality rate (IMR) as Skilled Birth Attendants by providing:
                        </p>
                        <ul class="space-y-4">
                            <li
                                class="flex gap-3 bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:border-slate-200 transition-colors">
                                <span
                                    class="text-impetus-orange font-bold text-lg leading-none mt-0.5 shrink-0">&bull;</span>
                                <span class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify">
                                    <strong>Comprehensive Care:</strong> Delivering professional antenatal, intranatal and
                                    postnatal care.
                                </span>
                            </li>
                            <li
                                class="flex gap-3 bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:border-slate-200 transition-colors">
                                <span
                                    class="text-impetus-orange font-bold text-lg leading-none mt-0.5 shrink-0">&bull;</span>
                                <span class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify">
                                    <strong>Timely Identification:</strong> Quick assessment and identification of potential
                                    clinical complications.
                                </span>
                            </li>
                            <li
                                class="flex gap-3 bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:border-slate-200 transition-colors">
                                <span
                                    class="text-impetus-orange font-bold text-lg leading-none mt-0.5 shrink-0">&bull;</span>
                                <span class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify">
                                    <strong>Basic Management & Referral:</strong> Administering immediate primary care,
                                    followed by timely referral to higher centers.
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Research Activities Section -->
        <section class="py-24 sm:py-32 relative bg-slate-50 overflow-hidden">
            <div
                class="absolute inset-0 bg-[linear-gradient(to_bottom,rgba(243,110,33,0.02),transparent)] pointer-events-none">
            </div>

            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-center gap-16 lg:grid-cols-12">
                    <!-- Left: Text -->
                    <div class="lg:col-span-7">
                        <span
                            class="text-sm font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-3 block">Evidence
                            & Quality</span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-impetus-navy tracking-tight font-outfit mb-8">
                            Research & Development</h2>

                        <div class="space-y-6 text-slate-600 text-justify leading-relaxed text-sm sm:text-base">
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
                                projects with the expertise of our R&D team. Our projects are monitored for quality
                                improvement through well-defined indicators at regular intervals, thereby establishing their
                                inherent value beyond doubt.
                            </p>
                        </div>
                    </div>

                    <!-- Right: Blueprint Decorative Card -->
                    <div class="lg:col-span-5 relative">
                        <div
                            class="absolute -inset-4 rounded-[2.5rem] bg-gradient-to-tr from-impetus-orange/10 via-transparent to-impetus-navy/5 blur-2xl -z-10">
                        </div>
                        <div
                            class="relative overflow-hidden rounded-[2rem] border border-slate-200/80 bg-white p-8 shadow-2xl flex flex-col justify-between">
                            <div class="flex items-center justify-between mb-8 pb-6 border-b border-slate-100">
                                <div>
                                    <h4 class="text-lg font-extrabold text-impetus-navy font-outfit">Research & Development
                                    </h4>
                                    <p
                                        class="text-xs font-semibold text-slate-400 mt-0.5 tracking-wider uppercase font-outfit">
                                        Continuous Evaluation Core</p>
                                </div>
                                <span
                                    class="bg-impetus-lightOrange text-impetus-orange px-3.5 py-1.5 rounded-full text-xs font-bold tracking-wider font-outfit uppercase">Evidence
                                    Core</span>
                            </div>

                            <div class="space-y-6">
                                <div class="flex items-start gap-4">
                                    <div
                                        class="w-9 h-9 rounded-lg bg-impetus-lightOrange text-impetus-orange flex items-center justify-center shrink-0 text-sm font-bold font-outfit">
                                        1</div>
                                    <div>
                                        <h5 class="text-sm sm:text-base font-bold text-impetus-navy font-outfit mb-0.5">
                                            Issue &
                                            Setting-Based Designs</h5>
                                        <p class="text-xs sm:text-sm text-slate-500 leading-relaxed text-justify">Addressing
                                            existing and emerging healthcare challenges across India.</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div
                                        class="w-9 h-9 rounded-lg bg-impetus-lightOrange text-impetus-orange flex items-center justify-center shrink-0 text-sm font-bold font-outfit">
                                        2</div>
                                    <div>
                                        <h5 class="text-sm sm:text-base font-bold text-impetus-navy font-outfit mb-0.5">
                                            Actionable Health
                                            Promotion Models</h5>
                                        <p class="text-xs sm:text-sm text-slate-500 leading-relaxed text-justify">Bridging
                                            the
                                            practice gap and directly improving national health indicators.</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div
                                        class="w-9 h-9 rounded-lg bg-impetus-lightOrange text-impetus-orange flex items-center justify-center shrink-0 text-sm font-bold font-outfit">
                                        3</div>
                                    <div>
                                        <h5 class="text-sm sm:text-base font-bold text-impetus-navy font-outfit mb-0.5">
                                            Continuous
                                            Monitoring & Evaluation</h5>
                                        <p class="text-xs sm:text-sm text-slate-500 leading-relaxed text-justify">
                                            Establishing
                                            absolute value and transparency with well-defined metrics.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
