@extends('layouts.frontend.app')

@section('title', 'Cancellation and Refund Policy')

@section('content')
    <main class="relative isolate overflow-hidden bg-white pb-20 font-sans antialiased text-slate-800 sm:pb-28">
        <div class="pointer-events-none absolute inset-x-0 top-0 -z-10 h-[420px] overflow-hidden">
            <div class="absolute left-10 top-24 h-72 w-72 rounded-full bg-impetus-orange/15 blur-[100px]"></div>
            <div class="absolute right-10 top-28 h-96 w-96 rounded-full bg-impetus-teal/10 blur-[100px]"></div>
        </div>

        <div class="mx-auto max-w-4xl px-6 pt-28 sm:pt-32 lg:px-8">
            <div class="text-center">
                <p class="mb-4 flex items-center justify-center gap-3 text-sm font-bold uppercase tracking-widest text-impetus-teal font-outfit">
                    <span class="h-px w-8 bg-impetus-teal"></span>
                    Legal
                    <span class="h-px w-8 bg-impetus-teal"></span>
                </p>
                <h1 class="text-3xl font-extrabold tracking-tight text-slate-800 sm:text-4xl font-outfit">
                    Cancellation &amp; Refund Policy
                </h1>
                <p class="mt-4 inline-flex items-center gap-2 rounded-full border border-impetus-teal/15 bg-impetus-teal-muted/40 px-4 py-1.5 text-xs font-medium uppercase tracking-wider text-slate-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-impetus-orange">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5a2.25 2.25 0 002.25-2.25m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5a2.25 2.25 0 012.25 2.25v7.5" />
                    </svg>
                    Last updated May 29, 2026
                </p>
            </div>

            <div class="mt-14">
                <article class="overflow-hidden rounded-3xl border border-impetus-teal/10 bg-white shadow-xl">
                    <div class="border-b border-impetus-teal/10 bg-impetus-teal-muted/30 px-6 py-8 sm:px-10 sm:py-10">
                        <div class="flex items-start gap-4">
                            <div class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-2xl bg-impetus-orange text-white shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-10.5-12h21a2.25 2.25 0 012.25 2.25v13.5A2.25 2.25 0 0121 20.25H3a2.25 2.25 0 01-2.25-2.25V5.25A2.25 2.25 0 013 3z" />
                                </svg>
                            </div>
                            <div class="space-y-4">
                                <h2 class="text-2xl font-extrabold text-impetus-teal sm:text-3xl font-outfit">Cancellation &amp; Refund Policy</h2>
                                <p class="text-base leading-relaxed text-slate-600 text-justify sm:text-lg">
                                    Impetus Healthcare Skills Private Limited is committed to delivering quality educational and professional training services to its learners and clients.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6 px-6 py-8 text-base leading-relaxed text-slate-600 text-justify sm:px-10 sm:py-10">
                        <div class="space-y-4 rounded-2xl border border-impetus-orange/20 bg-impetus-lightOrange/60 p-6">
                            <p class="font-semibold text-slate-800">
                                Kindly note that all purchases made for courses, training programs, online modules, certification services, workshops, or any other services offered by Impetus Healthcare Skills Private Limited are final in nature. Once a service has been purchased or registered for, cancellation of the service shall not be permitted.
                            </p>
                            <p class="font-bold text-slate-800">
                                Further, no refund, whether in full or in part, shall be provided under any circumstances after the successful purchase, enrolment, or registration of any service.
                            </p>
                        </div>

                        <p>
                            Applicants and participants are advised to carefully review all program details, eligibility criteria, service features, and related information prior to making any payment. Users are also encouraged to utilize any free demonstrations, sample content, trial access, or introductory materials made available by the company before purchasing any service.
                        </p>

                        <p>
                            By proceeding with the purchase of any service offered by Impetus Healthcare Skills Private Limited, the user shall be deemed to have read, understood, and accepted the terms of this Cancellation &amp; Refund Policy.
                        </p>

                        <div class="mt-4 rounded-2xl border border-impetus-teal/10 bg-impetus-teal-muted/30 p-5">
                            <p class="text-sm italic text-slate-600">
                                Impetus Healthcare Skills Private Limited reserves the right to modify, amend, or update this policy at its sole discretion without prior notice.
                            </p>
                        </div>
                    </div>
                </article>

                <p class="mt-8 text-center text-xs text-slate-500">
                    Related:
                    <a href="{{ route('privacy.policy') }}" class="font-medium text-impetus-teal hover:text-impetus-orange hover:underline">Privacy Policy</a>
                    <span class="mx-2 text-slate-300">·</span>
                    <a href="{{ route('terms.conditions') }}" class="font-medium text-impetus-teal hover:text-impetus-orange hover:underline">Terms &amp; Conditions</a>
                    <span class="mx-2 text-slate-300">·</span>
                    <a href="{{ route('faq') }}" class="font-medium text-impetus-teal hover:text-impetus-orange hover:underline">FAQ</a>
                </p>
            </div>
        </div>
    </main>
@endsection
