@extends('layouts.frontend.app')

@section('title', 'CNE Learning Resources - IHS')

@section('content')
    <main class="overflow-hidden bg-[#F8FAFC]">
        <!-- Hero Section -->
        <section class="relative bg-gradient-to-br from-white via-slate-50 to-slate-100/50 py-20 sm:py-28 border-b border-slate-200/60">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-impetus-orange/5 via-transparent to-transparent pointer-events-none"></div>
            <div class="absolute top-1/2 left-0 w-80 h-80 bg-impetus-orange/5 rounded-full blur-[120px] pointer-events-none"></div>
            
            <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-center gap-16 lg:grid-cols-12">
                    <div class="lg:col-span-7">
                        <span class="text-sm font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-3 block">Flexible Learning Assets</span>
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-impetus-navy tracking-tight font-outfit leading-tight mb-6">
                            CNE Learning Resources
                        </h1>
                        
                        <div class="space-y-6 text-slate-600 text-justify leading-relaxed text-base sm:text-lg">
                            <p>
                                <strong>Learning resources</strong> in Online Continuing Nursing Education (CNE) refer to a wide range of digital educational materials and tools designed to support effective, flexible, and self-paced learning for nurses and healthcare professionals. These resources are developed to enhance clinical knowledge, strengthen practical skills, and promote evidence-based nursing practice in an accessible online learning environment.
                            </p>
                            <p>
                                Online CNE learning resources are structured to provide comprehensive support for learners through various formats such as multimedia content, interactive tools, and reference materials. They enable participants to understand complex clinical concepts, revise key topics, and apply knowledge in real-world healthcare settings.
                            </p>
                        </div>
                    </div>

                    <!-- Right Column: Visual Graphic -->
                    <div class="lg:col-span-5 relative flex items-center justify-center">
                        <div class="absolute -inset-4 rounded-[2.5rem] bg-gradient-to-tr from-impetus-orange/10 via-transparent to-impetus-navy/10 blur-2xl -z-10"></div>
                        <img src="{{ asset('images/Benefits-of-E-Learning-Materials-1024x585.png') }}" alt="CNE Learning Resources"
                            class="relative w-full max-w-[400px] h-auto rounded-[2rem] shadow-2xl border border-slate-200/60 transition-transform duration-500 hover:scale-[1.02]">
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-24 sm:py-32 relative bg-white border-b border-slate-200/60 overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-impetus-orange/5 via-transparent to-transparent pointer-events-none"></div>
            
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center mb-16">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-impetus-navy tracking-tight font-outfit">
                        Features of CNE Learning Resources
                    </h2>
                    <p class="mt-4 text-slate-600 leading-relaxed text-justify sm:text-center max-w-3xl mx-auto">
                        Engineered to provide a rich educational ecosystem, our resources leverage evidence-based standards to deliver optimal clinical learning.
                    </p>
                </div>

                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Feature Card 1 -->
                    <div class="rounded-3xl border border-slate-200/80 bg-slate-50/50 p-6 shadow-sm hover:shadow-md transition-shadow flex flex-col items-start">
                        <div class="w-10 h-10 rounded-xl bg-impetus-orange/10 flex items-center justify-center mb-5">
                            <svg class="w-5 h-5 text-impetus-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-impetus-navy font-outfit mb-2">Universal Access</h4>
                        <p class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify">
                            Easily accessible anytime and anywhere through modern, responsive digital learning platforms.
                        </p>
                    </div>

                    <!-- Feature Card 2 -->
                    <div class="rounded-3xl border border-slate-200/80 bg-slate-50/50 p-6 shadow-sm hover:shadow-md transition-shadow flex flex-col items-start">
                        <div class="w-10 h-10 rounded-xl bg-impetus-navy/10 flex items-center justify-center mb-5">
                            <svg class="w-5 h-5 text-impetus-navy" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-impetus-navy font-outfit mb-2">Evidence-Based Focus</h4>
                        <p class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify">
                            Designed specifically based on evidence-based nursing standards, peer-reviewed clinical guidelines, and protocols.
                        </p>
                    </div>

                    <!-- Feature Card 3 -->
                    <div class="rounded-3xl border border-slate-200/80 bg-slate-50/50 p-6 shadow-sm hover:shadow-md transition-shadow flex flex-col items-start">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500/10 flex items-center justify-center mb-5">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-impetus-navy font-outfit mb-2">Continuous Updates</h4>
                        <p class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify">
                            Regularly updated in real time to reflect current healthcare practices, drug formulas, and clinical discoveries.
                        </p>
                    </div>

                    <!-- Feature Card 4 -->
                    <div class="rounded-3xl border border-slate-200/80 bg-slate-50/50 p-6 shadow-sm hover:shadow-md transition-shadow flex flex-col items-start lg:col-span-1">
                        <div class="w-10 h-10 rounded-xl bg-purple-500/10 flex items-center justify-center mb-5">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-impetus-navy font-outfit mb-2">Adaptive Learning Paths</h4>
                        <p class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify">
                            Highly suitable for self-paced independent study as well as highly structured formal educational models.
                        </p>
                    </div>

                    <!-- Feature Card 5 -->
                    <div class="rounded-3xl border border-slate-200/80 bg-slate-50/50 p-6 shadow-sm hover:shadow-md transition-shadow flex flex-col items-start sm:col-span-2 lg:col-span-2">
                        <div class="w-10 h-10 rounded-xl bg-blue-500/10 flex items-center justify-center mb-5">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-impetus-navy font-outfit mb-2">Multimodal Integration</h4>
                        <p class="text-sm sm:text-base text-slate-600 leading-relaxed text-justify">
                            Supports different learning styles including visual, auditory, and practical learners, using a blend of audio-video lectures, simulation guides, clinical mock-ups, and reference files.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Importance Section -->
        <section class="border-t border-slate-200/80 bg-slate-50/40 py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid items-center gap-16 lg:grid-cols-12">
                    
                    <!-- Importance Copy (Left) -->
                    <div class="lg:col-span-7">
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-impetus-navy tracking-tight font-outfit mb-6">
                            Importance of Learning Resources in Online CNE
                        </h2>
                        <div class="space-y-6 text-slate-600 text-justify leading-relaxed text-sm sm:text-base">
                            <p>
                                Learning resources play a crucial role in enhancing the effectiveness of online CNE programmes by making education more engaging, interactive, and learner-friendly. They help healthcare professionals stay up to date with current clinical practices, improve competency, and enhance the quality of patient care.
                            </p>
                        </div>
                    </div>

                    <!-- Standing Callout Box (Right) -->
                    <div class="lg:col-span-5">
                        <div class="p-8 rounded-3xl bg-gradient-to-r from-impetus-navy to-impetus-navy/90 text-white shadow-xl shadow-slate-900/10 relative overflow-hidden">
                            <div class="absolute right-0 bottom-0 translate-x-12 translate-y-12 w-48 h-48 bg-impetus-orange/10 rounded-full blur-2xl"></div>
                            
                            <div class="relative flex flex-col gap-4">
                                <p class="text-sm sm:text-base text-slate-200 text-justify leading-relaxed font-outfit italic">
                                    “Overall, well-designed learning resources in online CNE ensure continuous professional development and strengthen the knowledge base of the nursing workforce within a flexible digital learning environment.”
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection

