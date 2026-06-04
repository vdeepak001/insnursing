@extends('layouts.frontend.app')

@section('title', 'Privacy Policy')

@section('content')
    <main class="relative isolate pb-20 sm:pb-28" x-data="{}">
        <div class="pointer-events-none absolute inset-x-0 top-0 -z-10 h-[420px] overflow-hidden">
            <div class="absolute left-10 top-24 h-72 w-72 rounded-full bg-impetus-orange/15 blur-[100px]"></div>
            <div class="absolute right-10 top-28 h-96 w-96 rounded-full bg-logo-blue/10 blur-[100px]"></div>
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl" aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-logo-blue/12 to-impetus-orange/25 opacity-60 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
        </div>

        <div class="mx-auto max-w-6xl px-6 pt-28 sm:pt-32 lg:px-8">
            <div class="text-center">
                <span class="inline-flex items-center rounded-full bg-impetus-orange/10 px-4 py-1.5 text-lg font-medium text-impetus-orange ring-1 ring-inset ring-impetus-orange/20">
                    Legal
                </span>
                <h1 class="mt-6 text-3xl font-bold tracking-tight text-slate-900 sm:text-3xl lg:text-3xl font-serif">
                    Privacy Policy
                </h1>
                <p class="mt-4 inline-flex items-center gap-2 rounded-full border border-slate-200/80 bg-white/80 px-4 py-1.5 text-xs font-medium uppercase tracking-wider text-slate-500 shadow-sm backdrop-blur-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-impetus-orange">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5a2.25 2.25 0 002.25-2.25m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5a2.25 2.25 0 012.25 2.25v7.5" />
                    </svg>
                    Last updated May 29, 2026
                </p>
            </div>

            <div class="mt-14 lg:grid lg:grid-cols-12 lg:gap-10 xl:gap-14">
                <aside class="mb-10 lg:col-span-4 xl:col-span-3 lg:mb-0">
                    <nav class="sticky top-28 rounded-2xl border border-slate-200/90 bg-white/90 p-5 shadow-lg shadow-slate-200/40 ring-1 ring-slate-900/5 backdrop-blur-sm" aria-label="Privacy policy sections">
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">On this page</p>
                        <ul class="mt-4 space-y-1 text-sm">
                            <li><a href="#privacy-scope" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">1. Scope of Policy</a></li>
                            <li><a href="#privacy-collect" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">2. Information We Collect</a></li>
                            <li><a href="#privacy-automated" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">3. Automated Technologies</a></li>
                            <li><a href="#privacy-use" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">4. Purpose &amp; Use</a></li>
                            <li><a href="#privacy-sharing" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">5. Sharing &amp; Disclosure</a></li>
                            <li><a href="#privacy-legal" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">6. Legal Disclosures</a></li>
                            <li><a href="#privacy-public" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">7. Public Forums</a></li>
                            <li><a href="#privacy-access" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">8. Access &amp; Retention</a></li>
                            <li><a href="#privacy-security" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">9. Data Security</a></li>
                            <li><a href="#privacy-transfers" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">10. Cross-Border Transfers</a></li>
                            <li><a href="#privacy-amendments" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">11. Amendments</a></li>
                            <li><a href="#privacy-contact" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">12. Contact Details</a></li>
                        </ul>
                    </nav>
                </aside>

                <div class="lg:col-span-8 xl:col-span-9">
                    <article class="overflow-hidden rounded-3xl border border-slate-200/90 bg-white/95 shadow-2xl shadow-slate-300/30 ring-1 ring-slate-900/5 backdrop-blur-sm">
                        <div class="border-b border-slate-100 bg-gradient-to-r from-slate-50/80 to-white px-6 py-8 sm:px-10 sm:py-10">
                            <div class="flex items-start gap-4">
                                <div class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-impetus-orange/25 to-impetus-orange/5 text-impetus-orange ring-1 ring-impetus-orange/20">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                    </svg>
                                </div>
                                <div class="space-y-4">
                                    <h2 class="font-serif text-3xl font-bold text-slate-900 sm:text-3xl">Your privacy matters</h2>
                                    <p class="text-base sm:text-lg leading-relaxed text-slate-600 text-justify">
                                        Impetus Healthcare Skills Private Limited (“Impetus Healthcare Skills”, “Company”, “we”, “us”, or “our”) is committed to safeguarding the privacy, confidentiality, and security of the personal information entrusted to us. This Privacy Policy outlines the manner in which personal information is collected, used, maintained, disclosed, and protected through our website, applications, and associated services (“Services”).
                                    </p>
                                    <p class="text-base sm:text-lg leading-relaxed text-slate-600 text-justify">
                                        By accessing or using our Services, you acknowledge that you have read, understood, and agreed to the practices described in this Privacy Policy.
                                    </p>
                                    <div class="rounded-2xl border border-slate-100 bg-slate-50/50 p-5 mt-4">
                                        <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wide mb-2 font-outfit">About our Privacy Policy</h3>
                                        <p class="text-sm leading-relaxed text-slate-600 text-justify">
                                            This privacy policy describes how the personal information that is collected when you visit the Impetus Healthcare Skills website, application that posts a link to this privacy policy ("Service") will be used by Impetus Healthcare Skills Private Limited company that owns the Service ("Impetus Healthcare Skills," "we," "us" or "our"). This policy may be supplemented by additional privacy terms or notices set forth on certain areas of the Service.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="divide-y divide-slate-100">
                            <!-- Section 1 -->
                            <section id="privacy-scope" class="scroll-mt-28 px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-impetus-navy text-xs font-bold text-white">01</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">1. Scope of the Privacy Policy</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-3">
                                            <p>
                                                This Privacy Policy applies to all personal information collected through the websites, applications, online learning platforms, and related digital services operated by Impetus Healthcare Skills Private Limited.
                                            </p>
                                            <p>
                                                This Policy may be supplemented or modified by additional privacy notices applicable to specific services, programs, or transactions.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Section 2 -->
                            <section id="privacy-collect" class="scroll-mt-28 px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">02</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">2. Information We Collect</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-4">
                                            <p>
                                                We collect information from users through direct interactions and through automated technologies associated with the use of our Services.
                                            </p>
                                            
                                            <div>
                                                <h3 class="text-lg font-semibold text-slate-800 mb-1">2.1 Information Provided by Users</h3>
                                                <p>The categories of personal information collected may include, but are not limited to:</p>
                                            </div>

                                            <div class="bg-slate-50 border border-slate-100 rounded-2xl p-5 space-y-4">
                                                <div>
                                                    <h4 class="font-bold text-slate-800">2.2 Personal Identification Information</h4>
                                                    <p class="text-sm mt-1">Full name, Date of birth, Gender, Email address, Mobile number, and Correspondence address.</p>
                                                </div>
                                                <div>
                                                    <h4 class="font-bold text-slate-800">2.3 Professional and Educational Information</h4>
                                                    <p class="text-sm mt-1">Academic qualifications, Area of specialization, Year of completion of study, Name and address of institution attended, Affiliated university or educational board, and Nursing registration details, including Registered Nurse and Registered Midwife numbers.</p>
                                                </div>
                                                <div>
                                                    <h4 class="font-bold text-slate-800">2.4 Employment Information</h4>
                                                    <p class="text-sm mt-1">Name of employing institution or organization, Designation or professional role, and Total years of professional experience.</p>
                                                </div>
                                                <div>
                                                    <h4 class="font-bold text-slate-800">2.5 Account and Transaction Information</h4>
                                                    <ul class="list-disc pl-5 mt-1 space-y-1 text-sm">
                                                        <li>Username and password credentials</li>
                                                        <li>Payment and billing information, including debit or credit card details</li>
                                                        <li>Communication preferences</li>
                                                        <li>Feedback, comments, suggestions, and other user-submitted content</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <p>
                                                Users may be required to create an account and complete a registration process in order to access specific features, educational programs, assessments, or services offered by the Company.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Section 3 -->
                            <section id="privacy-automated" class="scroll-mt-28 px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">03</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">3. Information Collected Automatically</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-3">
                                            <p>
                                                When users access or interact with our Services, certain technical and usage-related information may be collected automatically through cookies, web beacons, server logs, and similar technologies.
                                            </p>
                                            <p>Such information may include:</p>
                                            <ul class="list-disc pl-5 space-y-1">
                                                <li>Internet Protocol (IP) address</li>
                                                <li>Browser type and browser version</li>
                                                <li>Operating system</li>
                                                <li>Device identifiers and device configuration details</li>
                                                <li>Mobile platform information</li>
                                                <li>Access dates and times</li>
                                                <li>Usage patterns and interaction data within the Services</li>
                                            </ul>
                                            <p>
                                                We may use aggregated or anonymized information for analytical, statistical, research, and operational purposes where such information does not identify any individual personally. Users may modify browser settings to refuse or restrict cookies; however, certain functionalities of the Services may not operate effectively if cookies are disabled.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Section 4 -->
                            <section id="privacy-use" class="scroll-mt-28 px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">04</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">4. Purpose of Collection and Use of Information</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-3">
                                            <p>
                                                The personal information collected by the Company may be used for the following purposes:
                                            </p>
                                            <ul class="list-disc pl-5 space-y-1">
                                                <li>To provide access to educational programs, training modules, assessments, certifications, and related services</li>
                                                <li>To process registrations, applications, transactions, and payments</li>
                                                <li>To communicate with users regarding services, updates, notifications, and support requests</li>
                                                <li>To provide technical assistance and customer support</li>
                                                <li>To personalize and improve user experience</li>
                                                <li>To develop, evaluate, and enhance our educational services, digital platforms, and operational processes</li>
                                                <li>To conduct research, audits, reporting, and usage analysis</li>
                                                <li>To ensure security, integrity, and proper functioning of the Services</li>
                                                <li>To inform users about new courses, programs, events, surveys, promotional offers, and other relevant communications</li>
                                                <li>To comply with legal, regulatory, and institutional obligations</li>
                                            </ul>
                                            <p>
                                                We may also combine information collected through online and offline sources, affiliated entities, or authorized third parties for the purposes described herein.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Section 5 -->
                            <section id="privacy-sharing" class="scroll-mt-28 px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">05</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">5. Disclosure and Sharing of Information</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-3">
                                            <p>Personal information may be shared with:</p>
                                            <ul class="list-disc pl-5 space-y-1">
                                                <li>Authorized service providers, consultants, agents, and technology partners engaged for operational and administrative support</li>
                                                <li>Affiliates, subsidiaries, and associated entities of Impetus Healthcare Skills</li>
                                                <li>Academic institutions, sponsors, professional bodies, or organizations associated with educational or certification activities</li>
                                                <li>Payment processing agencies and financial institutions for transaction-related purposes</li>
                                            </ul>
                                            <p>
                                                Where users access institutional or subscription-based learning services, relevant usage information and academic performance data may be shared with the sponsoring institution for educational administration, reporting, subscription management, assessment, and remediation purposes.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Section 6 -->
                            <section id="privacy-legal" class="scroll-mt-28 px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">06</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">6. Legal and Regulatory Disclosure</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-3">
                                            <p>
                                                The Company reserves the right to disclose personal information where such disclosure is necessary to:
                                            </p>
                                            <ul class="list-disc pl-5 space-y-1">
                                                <li>Comply with applicable laws, regulations, legal proceedings, court orders, or governmental requests</li>
                                                <li>Enforce the Company’s terms, policies, and legal rights</li>
                                                <li>Prevent, investigate, or address fraud, cybersecurity incidents, unauthorized access, or unlawful activities</li>
                                                <li>Protect the rights, property, safety, and security of users, employees, or the public</li>
                                                <li>Facilitate mergers, acquisitions, restructuring, transfer of assets, or business transitions involving the Company</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Section 7 -->
                            <section id="privacy-public" class="scroll-mt-28 px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">07</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">7. Publicly Shared Information</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-3">
                                            <p>
                                                Certain areas of the Services may permit users to post comments, discussions, feedback, or other content in publicly accessible sections.
                                            </p>
                                            <p>
                                                Any information voluntarily disclosed in public forums may be viewed, collected, or used by third parties and may become publicly searchable. Users are advised to exercise discretion when sharing personal information in such areas.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Section 8 -->
                            <section id="privacy-access" class="scroll-mt-28 px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">08</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">8. Access, Correction, and Retention of Information</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-3">
                                            <p>
                                                Registered users may review and update their account information through their user account login credentials.
                                            </p>
                                            <p>
                                                Users may also request access to personal information maintained by the Company or request correction, modification, or deletion of such information, subject to applicable legal and operational requirements.
                                            </p>
                                            <p>
                                                While the Company will make reasonable efforts to honor deletion requests, certain information may be retained:
                                            </p>
                                            <ul class="list-disc pl-5 space-y-1">
                                                <li>For legal or regulatory compliance</li>
                                                <li>For legitimate business purposes</li>
                                                <li>In archived or backup systems for a limited duration</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Section 9 -->
                            <section id="privacy-security" class="scroll-mt-28 px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">09</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">9. Data Security</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-3">
                                            <p>
                                                Impetus Healthcare Skills employs reasonable administrative, technical, and physical safeguards to protect personal information from unauthorized access, misuse, alteration, disclosure, loss, or destruction.
                                            </p>
                                            <p>
                                                Despite our best efforts, no method of electronic transmission or storage can be guaranteed to be completely secure. Users acknowledge and accept such inherent risks associated with digital communication and online services.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Section 10 -->
                            <section id="privacy-transfers" class="scroll-mt-28 px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">10</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">10. Cross-Border Transfer of Information</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-3">
                                            <p>
                                                Personal information may be processed, stored, or transferred to servers and facilities located outside the user’s country of residence where data protection laws may differ.
                                            </p>
                                            <p>
                                                By using the Services, users consent to such international transfer and processing of their information in accordance with this Privacy Policy.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Section 11 -->
                            <section id="privacy-amendments" class="scroll-mt-28 px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">11</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">11. Amendments to the Privacy Policy</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-3">
                                            <p>
                                                Impetus Healthcare Skills reserves the right to revise, amend, or update this Privacy Policy at any time without prior notice.
                                            </p>
                                            <p>
                                                Any modifications shall become effective immediately upon posting on the official website or digital platform, together with the updated revision date.
                                            </p>
                                            <p>
                                                Users are encouraged to review this Privacy Policy periodically.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Section 12 -->
                            <section id="privacy-contact" class="scroll-mt-28 bg-gradient-to-br from-slate-50/90 to-white px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-impetus-orange/20 text-xs font-bold text-impetus-orange">12</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">12. Contact Information</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-3">
                                            <p>
                                                For any questions, concerns, requests, or clarifications regarding this Privacy Policy or the processing of personal information, users may contact:
                                            </p>
                                            <div class="bg-white border border-slate-100 rounded-xl p-4 mt-2 space-y-1 text-sm shadow-sm max-w-md">
                                                <p class="font-bold text-slate-800">Impetus Healthcare Skills Private Limited</p>
                                                <p class="text-slate-600">
                                                    <button type="button"
                                                        @click="window.dispatchEvent(new CustomEvent('open-contact-modal', { bubbles: true }))"
                                                        class="text-impetus-orange font-semibold hover:underline">
                                                        Contact Us
                                                    </button>
                                                    to submit your query.
                                                </p>
                                            </div>
                                            <p class="mt-2">
                                                Users may also submit queries through
                                                <button type="button"
                                                    @click="window.dispatchEvent(new CustomEvent('open-contact-modal', { bubbles: true }))"
                                                    class="font-semibold text-impetus-orange hover:underline">
                                                    Contact Us
                                                </button>
                                                on our official website.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </article>

                    <p class="mt-8 text-center text-xs text-slate-500">
                        Related:
                        <a href="{{ route('terms.conditions') }}" class="font-medium text-logo-blue hover:underline">Terms &amp; Conditions</a>
                        <span class="mx-2 text-slate-300">·</span>
                        <a href="{{ route('cancellation.policy') }}" class="font-medium text-logo-blue hover:underline">Cancellation Policy</a>
                        <span class="mx-2 text-slate-300">·</span>
                        <a href="{{ route('faq') }}" class="font-medium text-logo-blue hover:underline">FAQ</a>
                    </p>
                </div>
            </div>
        </div>
    </main>
@endsection
