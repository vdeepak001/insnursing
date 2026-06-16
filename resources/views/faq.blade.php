@extends('layouts.frontend.app')

@section('title', 'FAQ')

@section('content')
    <main class="relative isolate overflow-hidden bg-white pb-20 font-sans antialiased text-slate-800 sm:pb-28" x-data="{}">
        <div class="pointer-events-none absolute inset-x-0 top-0 -z-10 h-[480px] overflow-hidden">
            <div class="absolute left-10 top-24 h-72 w-72 rounded-full bg-impetus-orange/15 blur-[100px]"></div>
            <div class="absolute right-10 top-32 h-96 w-96 rounded-full bg-impetus-teal/10 blur-[100px]"></div>
        </div>

        <div class="mx-auto w-full max-w-2xl px-5 pt-28 sm:px-6 sm:pt-32 lg:px-8">
            <div class="text-center">
                <p class="mb-4 flex items-center justify-center gap-3 text-sm font-bold uppercase tracking-widest text-impetus-teal font-outfit">
                    <span class="h-px w-8 bg-impetus-teal"></span>
                    Help center
                    <span class="h-px w-8 bg-impetus-teal"></span>
                </p>
                <h1 class="text-3xl font-extrabold tracking-tight text-slate-800 sm:text-4xl font-outfit">
                    Frequently asked questions
                </h1>
                <p class="mx-auto mt-5 max-w-2xl text-lg leading-8 text-slate-600 text-justify">
                    Quick answers about courses, accounts, certifications, and using our platform.
                </p>
            </div>

            <div class="mt-14 space-y-4" x-data="{ open: 0 }">
                <div
                    class="overflow-hidden rounded-2xl border border-slate-200/90 bg-white/90 shadow-lg shadow-slate-200/50 ring-1 ring-slate-900/5 backdrop-blur-sm transition-shadow hover:shadow-xl hover:shadow-slate-300/40">
                    <button type="button"
                        class="flex w-full items-start gap-4 px-5 py-5 text-left outline-none ring-0 focus:outline-none focus:ring-0 focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-impetus-orange/40 sm:px-6 sm:py-6"
                        @click="open = open === 0 ? null : 0" :aria-expanded="open === 0">
                        <span
                            class="mt-0.5 flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-impetus-orange/15 text-impetus-orange ring-1 ring-impetus-orange/20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-lg font-semibold text-slate-900 sm:text-lg">How do I create an
                                account?</span>
                        </span>
                        <span
                            class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-500 transition-transform duration-200"
                            :class="open === 0 ? 'rotate-180 bg-impetus-orange/15 text-impetus-orange' : ''">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </button>
                    <div x-show="open === 0" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-1"
                        class="border-t border-slate-100 bg-slate-50/80 px-5 pb-5 pt-0 sm:px-6 sm:pb-6">
                        <p class="pl-0 text-lg leading-8 text-slate-600 sm:pl-14 text-justify">
                            Use the Register option in the site header, complete the form with a valid email address, and
                            verify your account when prompted. You can then sign in to access your dashboard and enrolled
                            materials.
                        </p>
                    </div>
                </div>

                <div
                    class="overflow-hidden rounded-2xl border border-slate-200/90 bg-white/90 shadow-lg shadow-slate-200/50 ring-1 ring-slate-900/5 backdrop-blur-sm transition-shadow hover:shadow-xl hover:shadow-slate-300/40">
                    <button type="button"
                        class="flex w-full items-start gap-4 px-5 py-5 text-left outline-none ring-0 focus:outline-none focus:ring-0 focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-impetus-orange/40 sm:px-6 sm:py-6"
                        @click="open = open === 1 ? null : 1" :aria-expanded="open === 1">
                        <span
                            class="mt-0.5 flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-impetus-teal/15 text-impetus-teal ring-1 ring-impetus-teal/20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v15.341A8.967 8.967 0 0118 12a8.967 8.967 0 00-6-5.958zM15 6.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-lg font-semibold text-slate-900 sm:text-lg">How do CNE modules and
                                credit hours work?</span>
                        </span>
                        <span
                            class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-500 transition-transform duration-200"
                            :class="open === 1 ? 'rotate-180 bg-impetus-orange/15 text-impetus-orange' : ''">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </button>
                    <div x-show="open === 1" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-1"
                        class="border-t border-slate-100 bg-slate-50/80 px-5 pb-5 pt-0 sm:px-6 sm:pb-6">
                        <p class="text-lg leading-8 text-slate-600 sm:pl-14 text-justify">
                            Each module lists its credit value and learning objectives. Complete the required content and
                            any assessments. Approved completion is reflected in your account and may be used toward your
                            continuing education requirements as applicable to your license.
                        </p>
                    </div>
                </div>

                <div
                    class="overflow-hidden rounded-2xl border border-slate-200/90 bg-white/90 shadow-lg shadow-slate-200/50 ring-1 ring-slate-900/5 backdrop-blur-sm transition-shadow hover:shadow-xl hover:shadow-slate-300/40">
                    <button type="button"
                        class="flex w-full items-start gap-4 px-5 py-5 text-left outline-none ring-0 focus:outline-none focus:ring-0 focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-impetus-orange/40 sm:px-6 sm:py-6"
                        @click="open = open === 2 ? null : 2" :aria-expanded="open === 2">
                        <span
                            class="mt-0.5 flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-impetus-teal/15 text-impetus-teal ring-1 ring-impetus-teal/20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                            </svg>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-lg font-semibold text-slate-900 sm:text-lg">Can I access courses on a
                                phone or tablet?</span>
                        </span>
                        <span
                            class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-500 transition-transform duration-200"
                            :class="open === 2 ? 'rotate-180 bg-impetus-orange/15 text-impetus-orange' : ''">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </button>
                    <div x-show="open === 2" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-1"
                        class="border-t border-slate-100 bg-slate-50/80 px-5 pb-5 pt-0 sm:px-6 sm:pb-6">
                        <p class="text-lg leading-8 text-slate-600 sm:pl-14 text-justify">
                            Yes. The platform is designed to work in modern browsers on desktop and mobile devices. For the
                            best experience during timed activities or exams, use a stable connection and avoid switching
                            apps mid-session.
                        </p>
                    </div>
                </div>

                <div
                    class="overflow-hidden rounded-2xl border border-slate-200/90 bg-white/90 shadow-lg shadow-slate-200/50 ring-1 ring-slate-900/5 backdrop-blur-sm transition-shadow hover:shadow-xl hover:shadow-slate-300/40">
                    <button type="button"
                        class="flex w-full items-start gap-4 px-5 py-5 text-left outline-none ring-0 focus:outline-none focus:ring-0 focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-impetus-orange/40 sm:px-6 sm:py-6"
                        @click="open = open === 3 ? null : 3" :aria-expanded="open === 3">
                        <span
                            class="mt-0.5 flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-impetus-orange/15 text-impetus-orange ring-1 ring-impetus-orange/20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.832-6.832c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                            </svg>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-lg font-semibold text-slate-900 sm:text-lg">How do I reset my
                                password?</span>
                        </span>
                        <span
                            class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-500 transition-transform duration-200"
                            :class="open === 3 ? 'rotate-180 bg-impetus-orange/15 text-impetus-orange' : ''">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </button>
                    <div x-show="open === 3" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-1"
                        class="border-t border-slate-100 bg-slate-50/80 px-5 pb-5 pt-0 sm:px-6 sm:pb-6">
                        <p class="text-lg leading-8 text-slate-600 sm:pl-14 text-justify">
                            From the login screen, use the password reset link and follow the instructions sent to your
                            registered email. If you do not see the message, check spam or junk folders.
                        </p>
                    </div>
                </div>

                <div
                    class="overflow-hidden rounded-2xl border border-slate-200/90 bg-white/90 shadow-lg shadow-slate-200/50 ring-1 ring-slate-900/5 backdrop-blur-sm transition-shadow hover:shadow-xl hover:shadow-slate-300/40">
                    <button type="button"
                        class="flex w-full items-start gap-4 px-5 py-5 text-left outline-none ring-0 focus:outline-none focus:ring-0 focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-impetus-orange/40 sm:px-6 sm:py-6"
                        @click="open = open === 4 ? null : 4" :aria-expanded="open === 4">
                        <span
                            class="mt-0.5 flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-impetus-teal/15 text-impetus-teal ring-1 ring-impetus-teal/20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-lg font-semibold text-slate-900 sm:text-lg">Who do I contact for
                                support?</span>
                        </span>
                        <span
                            class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-500 transition-transform duration-200"
                            :class="open === 4 ? 'rotate-180 bg-impetus-orange/15 text-impetus-orange' : ''">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </button>
                    <div x-show="open === 4" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-1"
                        class="border-t border-slate-100 bg-slate-50/80 px-5 pb-5 pt-0 sm:px-6 sm:pb-6">
                        <p class="text-lg leading-8 text-slate-600 sm:pl-14 text-justify">
                            Open <button type="button"
                                @click="window.dispatchEvent(new CustomEvent('open-contact-modal', { bubbles: true }))"
                                class="font-semibold text-impetus-teal underline decoration-impetus-teal/30 underline-offset-2 transition-colors hover:text-impetus-orange hover:decoration-impetus-orange/40">Contact Us</button>
                            to submit your query. Include your account email and a short description of the issue so we can help faster.
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-14 rounded-3xl bg-impetus-teal p-8 text-center shadow-xl sm:p-10">
                <h2 class="text-2xl font-extrabold text-white sm:text-3xl font-outfit">Still have questions?</h2>
                <p class="mx-auto mt-3 max-w-lg text-base leading-8 text-white/90 text-justify sm:text-center">
                    Our team is happy to help with account access, course selection, or technical issues.
                </p>
                <div class="mt-6 flex flex-col items-center justify-center gap-3 sm:flex-row sm:gap-4">
                    <button type="button"
                        @click="window.dispatchEvent(new CustomEvent('open-contact-modal', { bubbles: true }))"
                        class="inline-flex items-center justify-center rounded-full bg-impetus-orange px-6 py-3 text-sm font-bold text-white shadow-lg shadow-impetus-orange/30 transition hover:bg-impetus-orange-hover">
                        Contact Us
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection
