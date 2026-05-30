@extends('layouts.frontend.app')

@section('title', 'Cancellation and Refund Policy')

@section('content')
    <main class="relative isolate pb-20 sm:pb-28">
        <div class="pointer-events-none absolute inset-x-0 top-0 -z-10 h-[420px] overflow-hidden">
            <div class="absolute left-10 top-24 h-72 w-72 rounded-full bg-impetus-orange/15 blur-[100px]"></div>
            <div class="absolute right-10 top-28 h-96 w-96 rounded-full bg-logo-blue/10 blur-[100px]"></div>
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl" aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-logo-blue/12 to-impetus-orange/25 opacity-60 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
        </div>

        <div class="mx-auto max-w-4xl px-6 pt-28 sm:pt-32 lg:px-8">
            <div class="text-center">
                <span class="inline-flex items-center rounded-full bg-impetus-orange/10 px-4 py-1.5 text-lg font-medium text-impetus-orange ring-1 ring-inset ring-impetus-orange/20">
                    Legal
                </span>
                <h1 class="mt-6 text-3xl font-bold tracking-tight text-slate-900 sm:text-3xl lg:text-3xl font-serif">
                    Cancellation &amp; Refund Policy
                </h1>
                <p class="mt-4 inline-flex items-center gap-2 rounded-full border border-slate-200/80 bg-white/80 px-4 py-1.5 text-xs font-medium uppercase tracking-wider text-slate-500 shadow-sm backdrop-blur-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-impetus-orange">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5a2.25 2.25 0 002.25-2.25m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5a2.25 2.25 0 012.25 2.25v7.5" />
                    </svg>
                    Last updated May 29, 2026
                </p>
            </div>

            <div class="mt-14">
                <article class="overflow-hidden rounded-3xl border border-slate-200/90 bg-white/95 shadow-2xl shadow-slate-300/30 ring-1 ring-slate-900/5 backdrop-blur-sm">
                    <div class="border-b border-slate-100 bg-gradient-to-r from-slate-50/80 to-white px-6 py-8 sm:px-10 sm:py-10">
                        <div class="flex items-start gap-4">
                            <div class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-impetus-orange/25 to-impetus-orange/5 text-impetus-orange ring-1 ring-impetus-orange/20">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-10.5-12h21a2.25 2.25 0 012.25 2.25v13.5A2.25 2.25 0 0121 20.25H3a2.25 2.25 0 01-2.25-2.25V5.25A2.25 2.25 0 013 3z" />
                                </svg>
                            </div>
                            <div class="space-y-4">
                                <h2 class="font-serif text-3xl font-bold text-slate-900 sm:text-3xl">Cancellation &amp; Refund Policy</h2>
                                <p class="text-base sm:text-lg leading-relaxed text-slate-600 text-justify">
                                    Impetus Healthcare Skills Private Limited is committed to delivering quality educational and professional training services to its learners and clients.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="px-6 py-8 sm:px-10 sm:py-10 space-y-6 text-base leading-relaxed text-slate-600 text-justify">
                        <div class="rounded-2xl border border-red-100 bg-red-50/50 p-6 space-y-4">
                            <p class="font-semibold text-red-950">
                                Kindly note that all purchases made for courses, training programs, online modules, certification services, workshops, or any other services offered by Impetus Healthcare Skills Private Limited are final in nature. Once a service has been purchased or registered for, cancellation of the service shall not be permitted.
                            </p>
                            <p class="font-bold text-red-900">
                                Further, no refund, whether in full or in part, shall be provided under any circumstances after the successful purchase, enrolment, or registration of any service.
                            </p>
                        </div>

                        <p>
                            Applicants and participants are advised to carefully review all program details, eligibility criteria, service features, and related information prior to making any payment. Users are also encouraged to utilize any free demonstrations, sample content, trial access, or introductory materials made available by the company before purchasing any service.
                        </p>

                        <p>
                            By proceeding with the purchase of any service offered by Impetus Healthcare Skills Private Limited, the user shall be deemed to have read, understood, and accepted the terms of this Cancellation &amp; Refund Policy.
                        </p>

                        <div class="rounded-2xl border border-slate-100 bg-slate-50/50 p-5 mt-4">
                            <p class="text-sm text-slate-500 italic">
                                Impetus Healthcare Skills Private Limited reserves the right to modify, amend, or update this policy at its sole discretion without prior notice.
                            </p>
                        </div>
                    </div>
                </article>

                <p class="mt-8 text-center text-xs text-slate-500">
                    Related:
                    <a href="{{ route('privacy.policy') }}" class="font-medium text-logo-blue hover:underline">Privacy Policy</a>
                    <span class="mx-2 text-slate-300">·</span>
                    <a href="{{ route('terms.conditions') }}" class="font-medium text-logo-blue hover:underline">Terms &amp; Conditions</a>
                    <span class="mx-2 text-slate-300">·</span>
                    <a href="{{ route('faq') }}" class="font-medium text-logo-blue hover:underline">FAQ</a>
                </p>
            </div>
        </div>
    </main>
@endsection
