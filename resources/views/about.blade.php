@extends('layouts.frontend.app')

@section('title', 'About Us - IHS')

@section('content')
    <main class="overflow-hidden bg-[#F8FAFC]">
        <!-- Hero & Company Overview Section -->
        <section class="relative bg-gradient-to-br from-white via-slate-50 to-slate-100/50 py-20 sm:py-28 border-b border-slate-200/60">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-impetus-orange/5 via-transparent to-transparent pointer-events-none"></div>
            <div class="absolute top-1/2 left-0 w-80 h-80 bg-impetus-orange/5 rounded-full blur-[120px] pointer-events-none"></div>
            
            <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-center gap-16 lg:grid-cols-12">
                    <div class="lg:col-span-7">
                        <span class="text-sm font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-3 block">Who We Are</span>
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-impetus-navy tracking-tight font-outfit leading-tight mb-6">
                            Impetus Healthcare Skills Private Limited
                        </h1>
                        
                        <div class="space-y-6 text-slate-600 text-justify leading-relaxed text-sm sm:text-base">
                            <p>
                                <strong>Impetus Healthcare Skills Private Limited (IHS)</strong> is a premier healthcare education and professional training organization dedicated to advancing clinical excellence through simulation-based learning and online education. The company specializes in delivering innovative healthcare training programs designed to enhance the knowledge, practical skills, and clinical competency of nurses and other healthcare professionals.
                            </p>
                            <p>
                                The organization offers a wide range of simulation training programs, hands-on skill development workshops, and technology-enabled online courses in various nursing and healthcare specialties. Its programs are designed to bridge the gap between theoretical knowledge and real-world clinical practice through interactive learning methodologies, virtual training platforms, and evidence-based educational approaches.
                            </p>
                            <p>
                                IHS focuses on Continuing Nursing Education (CNE), specialized nursing education, emergency and critical care training, clinical skill enhancement, and competency-based healthcare learning. The company integrates modern teaching techniques including virtual classrooms, simulation laboratories, digital assessments, and self-paced e-learning modules to provide accessible and high-quality education for healthcare professionals across different regions.
                            </p>
                        </div>

                        <!-- Commitment Card -->
                        <div class="mt-8 p-6 rounded-2xl bg-gradient-to-r from-impetus-navy to-impetus-navy/90 text-white shadow-xl shadow-slate-900/10">
                            <p class="font-semibold font-outfit text-impetus-orange mb-2 text-xs uppercase tracking-wider">Our Core Vision & Goal</p>
                            <p class="text-xs sm:text-sm text-slate-300 text-justify leading-relaxed">
                                The organization aims to support lifelong learning in healthcare by empowering professionals with updated clinical knowledge, practical expertise, and industry-relevant competencies that contribute to improved patient care and healthcare outcomes.
                            </p>
                        </div>
                    </div>

                    <!-- Right Column: Visual / Image Wrapper -->
                    <div class="lg:col-span-5 relative">
                        <div class="absolute -inset-4 rounded-[2.5rem] bg-gradient-to-tr from-impetus-orange/10 via-transparent to-impetus-navy/10 blur-2xl -z-10"></div>
                        <div class="relative overflow-hidden rounded-[2rem] border border-slate-200/80 bg-white p-3 shadow-2xl">
                            <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                                 alt="Healthcare training and excellence" 
                                 class="w-full h-[450px] object-cover rounded-2xl shadow-inner" />
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/40 via-transparent to-transparent rounded-[2rem] pointer-events-none"></div>
                        </div>
                        
                        <!-- Floating Glass Metric Card -->
                        <div class="absolute -bottom-6 -left-6 bg-white/90 backdrop-blur-md border border-slate-200/80 p-5 rounded-2xl shadow-xl flex items-center gap-4 max-w-xs hover:scale-105 transition-transform duration-300">
                            <div class="w-12 h-12 rounded-xl bg-impetus-lightOrange text-impetus-orange flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-impetus-navy font-outfit">Competency-Based</h4>
                                <p class="text-[11px] text-slate-500 mt-0.5 leading-snug">Designed for absolute clinical safety and patient outcomes.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- IHS' Strengths Section -->
        <section class="py-24 sm:py-32 relative bg-white border-b border-slate-200/60">
            <div class="absolute top-0 right-0 w-80 h-80 bg-impetus-orange/5 rounded-full blur-[120px] pointer-events-none"></div>
            
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-3xl text-center mb-20">
                    <span class="text-sm font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-3 block">What Sets Us Apart</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-impetus-navy tracking-tight font-outfit">IHS’ Core Strengths</h2>
                    <p class="mt-4 text-slate-500 text-justify leading-relaxed text-sm sm:text-base">
                        Impetus Healthcare Skills Private Limited has strong expertise in simulation-based healthcare training and online education, enabling healthcare professionals to acquire practical knowledge and clinical competence through innovative learning methods. Our key strengths include:
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Strength 1 -->
                    <div class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-slate-50/50 p-8 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:bg-white hover:border-impetus-orange/30">
                        <div class="w-12 h-12 rounded-2xl bg-impetus-lightOrange text-impetus-orange flex items-center justify-center font-bold mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 9.172V5L8 4z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-impetus-navy font-outfit mb-3">Advanced Simulation Training</h3>
                        <p class="text-sm text-slate-500 text-justify leading-relaxed">
                            We provide realistic, skill-oriented simulation training programs that help learners develop hands-on clinical experience in a safe and controlled environment before direct patient care exposure.
                        </p>
                    </div>

                    <!-- Strength 2 -->
                    <div class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-slate-50/50 p-8 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:bg-white hover:border-impetus-orange/30">
                        <div class="w-12 h-12 rounded-2xl bg-impetus-lightOrange text-impetus-orange flex items-center justify-center font-bold mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-impetus-navy font-outfit mb-3">Comprehensive Learning</h3>
                        <p class="text-sm text-slate-500 text-justify leading-relaxed">
                            We offer flexible, accessible online courses with interactive learning modules, recorded sessions, assessments, and digital study materials, allowing healthcare professionals to learn anytime and from any location.
                        </p>
                    </div>

                    <!-- Strength 3 -->
                    <div class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-slate-50/50 p-8 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:bg-white hover:border-impetus-orange/30">
                        <div class="w-12 h-12 rounded-2xl bg-impetus-lightOrange text-impetus-orange flex items-center justify-center font-bold mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-impetus-navy font-outfit mb-3">Specialized Healthcare Programs</h3>
                        <p class="text-sm text-slate-500 text-justify leading-relaxed">
                            Conducts training in nursing specialties including; life support, basic/advanced health assessment, critical care nursing, emergency nursing, airway management, neonatal care, infection control, and clinical skills.
                        </p>
                    </div>

                    <!-- Strength 4 -->
                    <div class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-slate-50/50 p-8 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:bg-white hover:border-impetus-orange/30">
                        <div class="w-12 h-12 rounded-2xl bg-impetus-lightOrange text-impetus-orange flex items-center justify-center font-bold mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-impetus-navy font-outfit mb-3">Industry-Relevant Curriculum</h3>
                        <p class="text-sm text-slate-500 text-justify leading-relaxed">
                            Training programs are designed according to current healthcare standards, evidence-based practices, and professional competency requirements to ensure practical applicability in clinical settings.
                        </p>
                    </div>

                    <!-- Strength 5 -->
                    <div class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-slate-50/50 p-8 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:bg-white hover:border-impetus-orange/30">
                        <div class="w-12 h-12 rounded-2xl bg-impetus-lightOrange text-impetus-orange flex items-center justify-center font-bold mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-impetus-navy font-outfit mb-3">Experienced Educators</h3>
                        <p class="text-sm text-slate-500 text-justify leading-relaxed">
                            The company is supported by highly qualified healthcare educators, clinical experts, and industry professionals with extensive academic and practical experience.
                        </p>
                    </div>

                    <!-- Strength 6 -->
                    <div class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-slate-50/50 p-8 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:bg-white hover:border-impetus-orange/30">
                        <div class="w-12 h-12 rounded-2xl bg-impetus-lightOrange text-impetus-orange flex items-center justify-center font-bold mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-impetus-navy font-outfit mb-3">Focus on Skill Development</h3>
                        <p class="text-sm text-slate-500 text-justify leading-relaxed">
                            It emphasizes competency-based education and outcome-oriented training to improve clinical decision-making, patient safety, and professional confidence.
                        </p>
                    </div>

                    <!-- Strength 7 -->
                    <div class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-slate-50/50 p-8 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:bg-white hover:border-impetus-orange/30">
                        <div class="w-12 h-12 rounded-2xl bg-impetus-lightOrange text-impetus-orange flex items-center justify-center font-bold mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-impetus-navy font-outfit mb-3">Technology-Driven Education</h3>
                        <p class="text-sm text-slate-500 text-justify leading-relaxed">
                            Integrates modern technologies such as virtual classrooms, simulation scenarios, online assessments, digital certifications, and e-learning platforms.
                        </p>
                    </div>

                    <!-- Strength 8 -->
                    <div class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-slate-50/50 p-8 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:bg-white hover:border-impetus-orange/30">
                        <div class="w-12 h-12 rounded-2xl bg-impetus-lightOrange text-impetus-orange flex items-center justify-center font-bold mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-impetus-navy font-outfit mb-3">Continuing Nursing Education</h3>
                        <p class="text-sm text-slate-500 text-justify leading-relaxed">
                            Supports lifelong learning through structured continuing education programs and skill upgradation courses for healthcare professionals.
                        </p>
                    </div>

                    <!-- Strength 9 -->
                    <div class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-slate-50/50 p-8 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:bg-white hover:border-impetus-orange/30">
                        <div class="w-12 h-12 rounded-2xl bg-impetus-lightOrange text-impetus-orange flex items-center justify-center font-bold mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2h2.945M11 20.935V19a2 2 0 012-2h1.87M16.5 3.5L19 6m0 0l-2.5 2.5M19 6h-6.5"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-impetus-navy font-outfit mb-3">Scalable & Accessible Model</h3>
                        <p class="text-sm text-slate-500 text-justify leading-relaxed">
                            Ability to deliver high-quality training programs to participants across different geographic locations through online and hybrid learning models.
                        </p>
                    </div>
                </div>

                <!-- 10th Strength Custom Box (Commitment to Quality) -->
                <div class="mt-8 bg-gradient-to-br from-slate-50 to-slate-100 border border-slate-200 rounded-3xl p-8 hover:border-impetus-orange/20 transition-all duration-300 shadow-sm flex flex-col md:flex-row items-start md:items-center gap-6">
                    <div class="w-14 h-14 rounded-2xl bg-impetus-orange text-white flex items-center justify-center shrink-0 shadow-lg shadow-impetus-orange/20">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-impetus-navy font-outfit mb-1">Commitment to Quality Healthcare Education</h3>
                        <p class="text-sm text-slate-500 text-justify leading-relaxed">
                            We are profoundly dedicated to improving healthcare workforce competence and strengthening patient care outcomes through high-quality, comprehensive education and training services.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Simulation Based Training Section -->
        <section class="py-24 sm:py-32 relative bg-slate-50 border-b border-slate-200/60 overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(50%_50%_at_50%_50%,_var(--tw-gradient-stops))] from-impetus-orange/5 via-transparent to-transparent pointer-events-none"></div>
            
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-center gap-16 lg:grid-cols-12">
                    <!-- Left: Graphic Card / Info Visual -->
                    <div class="lg:col-span-5 order-last lg:order-first relative">
                        <div class="absolute -inset-4 rounded-[2.5rem] bg-gradient-to-tr from-impetus-orange/5 via-transparent to-impetus-navy/10 blur-2xl -z-10"></div>
                        <div class="relative overflow-hidden rounded-[2rem] border border-slate-200/80 bg-white p-3 shadow-2xl">
                            <img src="https://images.unsplash.com/photo-1516549655169-df83a0774514?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                                 alt="Simulation Lab" 
                                 class="w-full h-[450px] object-cover rounded-2xl shadow-inner" />
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/30 via-transparent to-transparent rounded-[2rem] pointer-events-none"></div>
                        </div>
                    </div>

                    <!-- Right: Narrative content -->
                    <div class="lg:col-span-7">
                        <span class="text-sm font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-3 block">Pedagogical Innovation</span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-impetus-navy tracking-tight font-outfit mb-8">Simulation-Based Training</h2>
                        
                        <div class="space-y-6 text-slate-600 text-justify leading-relaxed text-sm sm:text-base">
                            <p>
                                Impetus Healthcare Skills stays up to date with the latest technologies, including pedagogically rich simulation-based learning, which enables effective hands-on training for healthcare professionals. This approach enhances their knowledge and skills, significantly contributing to the improvement of healthcare service quality. Simulation is becoming increasingly popular as a method for providing healthcare professionals with innovative learning experiences, fostering a deeper understanding of didactic content. In healthcare, simulation serves as an excellent adjunct to live clinical experiences and reduces barriers associated with clinical learning.
                            </p>
                            <p>
                                It offers opportunities to assess clinical judgement and critical thinking without compromising patient safety. Simulated experiences allow healthcare professionals to critically analyze their actions, reflect on their skills and clinical reasoning, and evaluate their clinical decisions. Simulation provides a new avenue for educators and researchers to improve healthcare education and practice, as well as to advance the field to meet global standards.
                            </p>
                            <p>
                                IHS focuses on equipping healthcare professionals with relevant skills to ensure they are industry-ready. We have identified niche segments within the healthcare sector where the need for skilling, upskilling, and reskilling of human resources is high, particularly in improving the quality of care to meet stipulated standards of practice. As practical skills are now of utmost importance, our courses aim to motivate healthcare professionals to develop the knowledge, essential skills, and attitudes that will guide them in delivering excellent care across various healthcare settings.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Public Health Training Section -->
        <section class="py-24 sm:py-32 relative bg-white border-b border-slate-200/60 overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-impetus-orange/5 via-transparent to-transparent pointer-events-none"></div>
            
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-start gap-16 lg:grid-cols-12">
                    <div class="lg:col-span-7">
                        <span class="text-sm font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-3 block">Capacity Building</span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-impetus-navy tracking-tight font-outfit mb-8">Public Health Training</h2>
                        
                        <div class="space-y-6 text-slate-600 text-justify leading-relaxed text-sm sm:text-base">
                            <p>
                                Maternal and newborn health is our core component, and we are committed to contributing to the country’s efforts to achieve Millennium Development Goals 4, 5 and 6. By addressing the primary risk factors involved in maternal and neonatal deaths, we are actively engaged in capacity-building activities within the public health system. The focus is mainly on upgrading the health workforce with relevant materials and innovative methodologies that involve the judicious use of extremely affordable technology, thus ensuring the delivery of much-needed quality care at various levels of healthcare facilities.
                            </p>
                            <p>
                                IHS will provide multidisciplinary training programmes to healthcare professionals, equipping them to meet the pressing health needs of individuals and communities, and thereby improve the effectiveness of the nation’s healthcare delivery systems.
                            </p>
                        </div>

                        <!-- Brand Motto Block -->
                        <div class="my-8 relative overflow-hidden rounded-[2rem] bg-gradient-to-r from-impetus-orange to-amber-500 p-8 text-white shadow-xl shadow-impetus-orange/20">
                            <div class="absolute right-0 bottom-0 opacity-10 pointer-events-none">
                                <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-xs uppercase font-extrabold tracking-widest text-slate-100 font-outfit mb-2">Our Deeply Cherished Motto</h3>
                            <p class="text-xl sm:text-2xl font-black italic tracking-wide font-outfit leading-snug">
                                “Save the lives of mothers and newborn babies every day, on every occasion”
                            </p>
                        </div>

                        <div class="space-y-6 text-slate-600 text-justify leading-relaxed text-sm sm:text-base">
                            <p>
                                Mobile training, clinical mentoring and hand-holding support programmes for nurses are innovative and involve first-of-their-kind approaches, which aim to substantially strengthen nurses’ skills to enable them to provide quality services in the public health delivery system.
                            </p>
                            <p>
                                The Competency Based Training (CBT) approach is one of our preferred modes of training, where emphasis is placed on acquiring competence in delivering quality care. The structured approach of our training programmes helps us impart the right mix of knowledge and skills, depending on the nature of the specified task. The emphasis of the competency-based training program is on <strong>"Performing"</strong> rather than merely <strong>"Knowing"</strong>.
                            </p>
                        </div>
                    </div>

                    <!-- Right side: Specialized Skilled Birth Attendant roles -->
                    <div class="lg:col-span-5 lg:sticky lg:top-8 bg-slate-50 border border-slate-200/80 rounded-[2rem] p-8 shadow-lg">
                        <div class="w-12 h-12 rounded-2xl bg-impetus-orange text-white flex items-center justify-center shrink-0 mb-6 shadow-md shadow-impetus-orange/10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-extrabold text-impetus-navy font-outfit mb-4">Skilled Birth Attendant Role</h3>
                        <p class="text-sm text-slate-500 leading-relaxed text-justify mb-6">
                            Nurses have an important role in significantly reducing the maternal mortality rate (MMR) and infant mortality rate (IMR) as Skilled Birth Attendants by providing:
                        </p>
                        <ul class="space-y-4">
                            <li class="flex gap-3 bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:border-slate-200 transition-colors">
                                <span class="text-impetus-orange font-bold text-lg leading-none mt-0.5 shrink-0">&bull;</span>
                                <span class="text-xs sm:text-sm text-slate-600 leading-relaxed text-justify">
                                    <strong>Comprehensive Care:</strong> Delivering professional antenatal, intranatal and postnatal care.
                                </span>
                            </li>
                            <li class="flex gap-3 bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:border-slate-200 transition-colors">
                                <span class="text-impetus-orange font-bold text-lg leading-none mt-0.5 shrink-0">&bull;</span>
                                <span class="text-xs sm:text-sm text-slate-600 leading-relaxed text-justify">
                                    <strong>Timely Identification:</strong> Quick assessment and identification of potential clinical complications.
                                </span>
                            </li>
                            <li class="flex gap-3 bg-white p-4 rounded-xl border border-slate-100 shadow-sm hover:border-slate-200 transition-colors">
                                <span class="text-impetus-orange font-bold text-lg leading-none mt-0.5 shrink-0">&bull;</span>
                                <span class="text-xs sm:text-sm text-slate-600 leading-relaxed text-justify">
                                    <strong>Basic Management & Referral:</strong> Administering immediate primary care, followed by timely referral to higher centers.
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Research Activities Section -->
        <section class="py-24 sm:py-32 relative bg-slate-50 overflow-hidden">
            <div class="absolute inset-0 bg-[linear-gradient(to_bottom,rgba(243,110,33,0.02),transparent)] pointer-events-none"></div>
            
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-center gap-16 lg:grid-cols-12">
                    <!-- Left: Text -->
                    <div class="lg:col-span-7">
                        <span class="text-sm font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-3 block">Evidence & Quality</span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-impetus-navy tracking-tight font-outfit mb-8">Research & Development</h2>
                        
                        <div class="space-y-6 text-slate-600 text-justify leading-relaxed text-sm sm:text-base">
                            <p>
                                The Millennium Development Goals (MDGs), established based on key health issues, aim to improve maternal and child health and reduce the incidence of malaria, tuberculosis, HIV, and other health determinants.
                            </p>
                            <p>
                                Health promotion is integral to all national health programmes, with implementation envisaged through the public health system, based on the principles of equitable distribution, community participation, intersectoral coordination, and the use of appropriate technology. Our multidisciplinary research activities focus on developing issue-based and setting-based designs that address existing and emerging healthcare challenges in India. We aim to translate research findings into suitable health promotion models for diverse settings, helping to bridge the practice gap and contribute to the improvement of national health indicators.
                            </p>
                            <p>
                                Evidence is central to our research activities and can clearly guide our efforts to improve service delivery. We are continually strengthening the monitoring and evaluation of our projects with the expertise of our R&D team. Our projects are monitored for quality improvement through well-defined indicators at regular intervals, thereby establishing their inherent value beyond doubt.
                            </p>
                        </div>
                    </div>

                    <!-- Right: Blueprint Decorative Card -->
                    <div class="lg:col-span-5 relative">
                        <div class="absolute -inset-4 rounded-[2.5rem] bg-gradient-to-tr from-impetus-orange/10 via-transparent to-impetus-navy/5 blur-2xl -z-10"></div>
                        <div class="relative overflow-hidden rounded-[2rem] border border-slate-200/80 bg-white p-8 shadow-2xl flex flex-col justify-between">
                            <div class="flex items-center justify-between mb-8 pb-6 border-b border-slate-100">
                                <div>
                                    <h4 class="text-sm font-extrabold text-impetus-navy font-outfit">Research & Development</h4>
                                    <p class="text-[10px] text-slate-400 mt-0.5 tracking-wider uppercase font-outfit">Continuous Evaluation Core</p>
                                </div>
                                <span class="bg-impetus-lightOrange text-impetus-orange px-3 py-1 rounded-full text-[10px] font-bold tracking-wider font-outfit uppercase">Evidence Core</span>
                            </div>

                            <div class="space-y-6">
                                <div class="flex items-start gap-4">
                                    <div class="w-8 h-8 rounded-lg bg-impetus-lightOrange text-impetus-orange flex items-center justify-center shrink-0 text-xs font-bold font-outfit">1</div>
                                    <div>
                                        <h5 class="text-xs font-bold text-impetus-navy font-outfit mb-0.5">Issue & Setting-Based Designs</h5>
                                        <p class="text-[11px] text-slate-500 leading-relaxed text-justify">Addressing existing and emerging healthcare challenges across India.</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="w-8 h-8 rounded-lg bg-impetus-lightOrange text-impetus-orange flex items-center justify-center shrink-0 text-xs font-bold font-outfit">2</div>
                                    <div>
                                        <h5 class="text-xs font-bold text-impetus-navy font-outfit mb-0.5">Actionable Health Promotion Models</h5>
                                        <p class="text-[11px] text-slate-500 leading-relaxed text-justify">Bridging the practice gap and directly improving national health indicators.</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="w-8 h-8 rounded-lg bg-impetus-lightOrange text-impetus-orange flex items-center justify-center shrink-0 text-xs font-bold font-outfit">3</div>
                                    <div>
                                        <h5 class="text-xs font-bold text-impetus-navy font-outfit mb-0.5">Continuous Monitoring & Evaluation</h5>
                                        <p class="text-[11px] text-slate-500 leading-relaxed text-justify">Establishing absolute value and transparency with well-defined metrics.</p>
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
