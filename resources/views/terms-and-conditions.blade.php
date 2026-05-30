@extends('layouts.frontend.app')

@section('title', 'Terms and Conditions')

@section('content')
    <main class="relative isolate pb-20 sm:pb-28">
        <div class="pointer-events-none absolute inset-x-0 top-0 -z-10 h-[420px] overflow-hidden">
            <div class="absolute left-10 top-24 h-72 w-72 rounded-full bg-logo-blue/10 blur-[100px]"></div>
            <div class="absolute right-10 top-28 h-96 w-96 rounded-full bg-impetus-orange/15 blur-[100px]"></div>
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl" aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-impetus-orange/25 to-logo-blue/15 opacity-60 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
        </div>

        <div class="mx-auto max-w-6xl px-6 pt-28 sm:pt-32 lg:px-8">
            <div class="text-center">
                <span class="inline-flex items-center rounded-full bg-impetus-orange/10 px-4 py-1.5 text-lg font-medium text-impetus-orange ring-1 ring-inset ring-impetus-orange/20">
                    Legal
                </span>
                <h1 class="mt-6 text-3xl font-bold tracking-tight text-slate-900 sm:text-3xl lg:text-3xl font-serif">
                    Terms &amp; Conditions
                </h1>
                <p class="mt-4 inline-flex items-center gap-2 rounded-full border border-slate-200/80 bg-white/80 px-4 py-1.5 text-xs font-medium uppercase tracking-wider text-slate-500 shadow-sm backdrop-blur-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-impetus-orange">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    Last updated May 29, 2026
                </p>
            </div>

            <div class="mt-14 lg:grid lg:grid-cols-12 lg:gap-10 xl:gap-14">
                <aside class="mb-10 lg:col-span-4 xl:col-span-3 lg:mb-0">
                    <nav class="sticky top-28 rounded-2xl border border-slate-200/90 bg-white/90 p-5 shadow-lg shadow-slate-200/40 ring-1 ring-slate-900/5 backdrop-blur-sm" aria-label="Terms sections">
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">On this page</p>
                        <ul class="mt-4 space-y-1 text-sm">
                            <li><a href="#terms-modifications" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">1. Modifications</a></li>
                            <li><a href="#terms-intellectual" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">2. Intellectual Property</a></li>
                            <li><a href="#terms-permitted" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">3. Permitted Use</a></li>
                            <li><a href="#terms-submissions" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">4. User Submissions</a></li>
                            <li><a href="#terms-thirdparty" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">5. External Links</a></li>
                            <li><a href="#terms-availability" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">6. System Availability</a></li>
                            <li><a href="#terms-disclaimer" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">7. Disclaimer</a></li>
                            <li><a href="#terms-liability" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">8. Limitation of Liability</a></li>
                            <li><a href="#terms-indemnification" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">9. Indemnification</a></li>
                            <li><a href="#terms-compliance" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">10. Compliance</a></li>
                            <li><a href="#terms-governing" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">11. Governing Law</a></li>
                            <li><a href="#terms-contact" class="block rounded-lg px-3 py-2 text-slate-600 transition hover:bg-impetus-orange/10 hover:text-impetus-orange">12. Contact Details</a></li>
                        </ul>
                    </nav>
                </aside>

                <div class="lg:col-span-8 xl:col-span-9">
                    <article class="overflow-hidden rounded-3xl border border-slate-200/90 bg-white/95 shadow-2xl shadow-slate-300/30 ring-1 ring-slate-900/5 backdrop-blur-sm">
                        <div class="border-b border-slate-100 bg-gradient-to-r from-slate-50/80 to-white px-6 py-8 sm:px-10 sm:py-10">
                            <div class="flex items-start gap-4">
                                <div class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-impetus-orange/25 to-impetus-orange/5 text-impetus-orange ring-1 ring-impetus-orange/20">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v15.341A8.967 8.967 0 0118 12a8.967 8.967 0 00-6-5.958zM15 6.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div class="space-y-4">
                                    <h2 class="font-serif text-3xl font-bold text-slate-900 sm:text-3xl">Please read carefully</h2>
                                    <p class="text-base sm:text-lg leading-relaxed text-slate-600 text-justify">
                                        These Terms and Conditions (“Terms”) govern the access to and use of the corporate website of Impetus Healthcare Skills Private Limited located at <a href="https://www.ihsnursing.com" class="text-impetus-orange font-semibold hover:underline">www.ihsnursing.com</a>, together with all associated websites, web pages, applications, and online services that display or link to these Terms (collectively referred to as the “Website” or “Site”).
                                    </p>
                                    <p class="text-base sm:text-lg leading-relaxed text-slate-600 text-justify">
                                        Throughout these Terms, “Impetus Healthcare Skills Private Limited”, “Company”, “we”, “us”, or “our” shall refer to Impetus Healthcare Skills Private Limited and its affiliated entities, as applicable.
                                    </p>
                                    <p class="text-base sm:text-lg leading-relaxed text-slate-600 text-justify">
                                        By accessing, browsing, or using the Website, you acknowledge that you have read, understood, and agreed to be bound by these Terms and Conditions, including the Privacy Policy, Cancellation &amp; Refund Policy, and any additional policies, notices, guidelines, or disclaimers published on the Website. If you do not agree with these Terms, you are advised not to access or use the Website.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="divide-y divide-slate-100">
                            <!-- Section 1 -->
                            <section id="terms-modifications" class="scroll-mt-28 px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-impetus-navy text-xs font-bold text-white">01</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">1. Modifications to Terms</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-3">
                                            <p>
                                                Impetus Healthcare Skills Private Limited reserves the right to revise, amend, modify, or update these Terms and Conditions at any time without prior notice.
                                            </p>
                                            <p>
                                                Users are encouraged to review these Terms periodically. Continued use of the Website following the publication of any modifications shall constitute acceptance of the revised Terms and Conditions.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Section 2 -->
                            <section id="terms-intellectual" class="scroll-mt-28 px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">02</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">2. Ownership of Content and Intellectual Property Rights</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-4">
                                            <p>
                                                All content available on or accessible through the Website, including but not limited to text, graphics, logos, trademarks, service marks, photographs, illustrations, audio, video, educational materials, training modules, software, applications, source code, layouts, designs, user interfaces, databases, and other materials (collectively referred to as the “Content”), is the exclusive property of Impetus Healthcare Skills Private Limited or its licensors and is protected under applicable copyright, trademark, intellectual property, and unfair competition laws.
                                            </p>
                                            <p>
                                                Except as expressly permitted in writing by Impetus Healthcare Skills Private Limited, <strong>users shall not:</strong>
                                            </p>
                                            <ul class="list-disc pl-5 space-y-2 bg-slate-50 border border-slate-100 rounded-2xl p-5 text-sm">
                                                <li>Copy, reproduce, republish, distribute, transmit, display, modify, publish, upload, post, translate, or create derivative works from any Content;</li>
                                                <li>Sell, lease, license, or commercially exploit any part of the Website or its Content;</li>
                                                <li>Reverse engineer, decompile, disassemble, or otherwise attempt to derive the source code of any software used on the Website;</li>
                                                <li>Use automated systems such as robots, crawlers, spiders, scrapers, or data mining tools to access, monitor, extract, or copy Website content;</li>
                                                <li>Attempt to gain unauthorized access to any portion of the Website, servers, databases, or connected systems;</li>
                                                <li>Circumvent or interfere with the Website’s security features or operational integrity.</li>
                                            </ul>
                                            <p class="font-medium text-slate-800">
                                                Any unauthorized use of the Website or its Content may result in legal action under applicable laws.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Section 3 -->
                            <section id="terms-permitted" class="scroll-mt-28 px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">03</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">3. Permitted Use of the Website</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-4">
                                            <p>
                                                The Website and its Content are intended solely for lawful educational, informational, and professional purposes.
                                            </p>
                                            <p>
                                                <strong>Users agree not to:</strong>
                                            </p>
                                            <ul class="list-disc pl-5 space-y-2 bg-slate-50 border border-slate-100 rounded-2xl p-5 text-sm">
                                                <li>Use the Website for any unlawful, fraudulent, harmful, or unauthorized purpose;</li>
                                                <li>Upload, post, transmit, or distribute any content that is defamatory, obscene, offensive, abusive, threatening, misleading, or otherwise objectionable;</li>
                                                <li>Introduce viruses, malware, malicious code, or other harmful software into the Website;</li>
                                                <li>Use the Website for unauthorized advertising, promotional activities, or solicitation;</li>
                                                <li>Disrupt or interfere with the functioning, accessibility, or security of the Website.</li>
                                            </ul>
                                            <p>
                                                Impetus Healthcare Skills Private Limited reserves the right to suspend, restrict, or terminate user access to the Website for any violation of these Terms and Conditions.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Section 4 -->
                            <section id="terms-submissions" class="scroll-mt-28 px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">04</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">4. User Submissions and Communications</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-4">
                                            <p>
                                                Any feedback, suggestions, comments, messages, ideas, documents, or other materials submitted, uploaded, posted, or transmitted through the Website (“Submissions”) shall remain the responsibility of the submitting user.
                                            </p>
                                            <p>
                                                By submitting any content through the Website, the user grants Impetus Healthcare Skills Private Limited a perpetual, irrevocable, worldwide, royalty-free, transferable, and non-exclusive right to use, reproduce, modify, adapt, publish, distribute, display, and otherwise utilize such Submissions for operational, educational, promotional, research, or business purposes.
                                            </p>
                                            <p>
                                                <strong>Users represent and warrant that:</strong>
                                            </p>
                                            <ul class="list-disc pl-5 space-y-1">
                                                <li>They possess all necessary rights and permissions relating to the submitted content;</li>
                                                <li>The Submission does not infringe the rights of any third party;</li>
                                                <li>The Submission complies with all applicable laws and regulations.</li>
                                            </ul>
                                            <p>
                                                Impetus Healthcare Skills Private Limited reserves the right, but not the obligation, to monitor, review, edit, refuse, or remove any Submission at its sole discretion.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Section 5 -->
                            <section id="terms-thirdparty" class="scroll-mt-28 px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">05</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">5. Third-Party Websites and External Links</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-3">
                                            <p>
                                                The Website may contain links to third-party websites, resources, or services for user convenience and reference. Such links do not constitute endorsement, sponsorship, or approval by Impetus Healthcare Skills Private Limited.
                                            </p>
                                            <p>
                                                <strong>Impetus Healthcare Skills Private Limited shall not be responsible or liable for:</strong>
                                            </p>
                                            <ul class="list-disc pl-5 space-y-1">
                                                <li>The availability, content, accuracy, or reliability of external websites;</li>
                                                <li>Any products, services, advertisements, or materials offered by third parties;</li>
                                                <li>Any damages, losses, or issues arising from the use of third-party websites or services.</li>
                                            </ul>
                                            <p>
                                                Users are advised to review the terms, policies, and privacy practices of any external websites they visit.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Section 6 -->
                            <section id="terms-availability" class="scroll-mt-28 px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">06</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">6. System Availability and Technical Limitations</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-3">
                                            <p>
                                                Impetus Healthcare Skills Private Limited endeavors to maintain continuous availability and functionality of the Website. However, uninterrupted access cannot be guaranteed.
                                            </p>
                                            <p>
                                                <strong>The Company shall not be liable for:</strong>
                                            </p>
                                            <ul class="list-disc pl-5 space-y-1">
                                                <li>Temporary or permanent Website unavailability;</li>
                                                <li>Technical malfunctions, interruptions, delays, or failures;</li>
                                                <li>Loss, corruption, or alteration of data or information;</li>
                                                <li>Any consequences arising from system maintenance, technical issues, or external factors beyond reasonable control.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Section 7 -->
                            <section id="terms-disclaimer" class="scroll-mt-28 px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">07</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">7. Disclaimer of Warranties</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-4">
                                            <p>
                                                The Website, its Content, products, services, educational materials, and resources are provided on an “as is” and “as available” basis without warranties or representations of any kind, whether express, implied, statutory, or otherwise.
                                            </p>
                                            <p>
                                                <strong>To the fullest extent permitted by applicable law, Impetus Healthcare Skills Private Limited disclaims all warranties, including but not limited to:</strong>
                                            </p>
                                            <ul class="list-disc pl-5 space-y-1">
                                                <li>Accuracy, completeness, or reliability of information;</li>
                                                <li>Merchantability or fitness for a particular purpose;</li>
                                                <li>Non-infringement of intellectual property rights;</li>
                                                <li>Continuous, secure, or error-free operation of the Website.</li>
                                            </ul>
                                            <div class="rounded-2xl border border-amber-100 bg-amber-50/50 p-5 mt-2">
                                                <p class="text-sm font-semibold text-amber-800 leading-relaxed">
                                                    Healthcare professionals and users are advised to exercise independent professional and clinical judgment when applying any healthcare-related information, procedures, methods, or recommendations available through the Website.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Section 8 -->
                            <section id="terms-liability" class="scroll-mt-28 px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">08</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">8. Limitation of Liability</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-4">
                                            <p>
                                                To the maximum extent permitted under applicable law, Impetus Healthcare Skills Private Limited, its directors, officers, employees, affiliates, licensors, and service providers shall not be liable for any direct, indirect, incidental, consequential, special, exemplary, or punitive damages arising out of or related to:
                                            </p>
                                            <ul class="list-disc pl-5 space-y-1">
                                                <li>Access to or use of the Website;</li>
                                                <li>Inability to access or use the Website;</li>
                                                <li>Reliance upon Website content or services;</li>
                                                <li>Technical failures, interruptions, or data loss;</li>
                                                <li>Loss of business, profits, revenue, goodwill, or information.</li>
                                            </ul>
                                            <p class="font-semibold text-slate-800">
                                                Use of the Website and its services shall be entirely at the user’s own risk.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Section 9 -->
                            <section id="terms-indemnification" class="scroll-mt-28 px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">09</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">9. Indemnification</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-3">
                                            <p>
                                                Users agree to indemnify, defend, and hold harmless Impetus Healthcare Skills Private Limited, its directors, officers, employees, affiliates, licensors, and agents from and against any claims, liabilities, damages, losses, costs, or expenses, including reasonable legal fees, arising out of:
                                            </p>
                                            <ul class="list-disc pl-5 space-y-1">
                                                <li>Violation of these Terms and Conditions;</li>
                                                <li>Misuse of the Website or its services;</li>
                                                <li>Violation of any applicable laws or third-party rights.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Section 10 -->
                            <section id="terms-compliance" class="scroll-mt-28 px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">10</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">10. Compliance with Applicable Laws</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-3">
                                            <p>
                                                Users agree to comply with all applicable local, state, national, and international laws, regulations, and legal requirements while accessing or using the Website and its services.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Section 11 -->
                            <section id="terms-governing" class="scroll-mt-28 px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-600">11</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">11. Governing Law and Jurisdiction</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-3">
                                            <p>
                                                These Terms and Conditions shall be governed by and construed in accordance with the laws of India.
                                            </p>
                                            <p>
                                                Any disputes arising out of or relating to the use of the Website shall be subject to the exclusive jurisdiction of the competent courts located in <strong>Chennai, Tamil Nadu, India</strong>.
                                            </p>
                                            <p>
                                                Any claim arising from the use of the Website or its services must be initiated within one (1) year from the date on which the cause of action arose, failing which such claim shall be permanently barred.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Section 12 -->
                            <section id="terms-contact" class="scroll-mt-28 bg-gradient-to-br from-slate-50/90 to-white px-6 py-8 sm:px-10 sm:py-10">
                                <div class="flex gap-5">
                                    <span class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-impetus-orange/20 text-xs font-bold text-impetus-orange">12</span>
                                    <div>
                                        <h2 class="text-2xl font-semibold text-slate-900 sm:text-2xl font-serif">12. Contact Information</h2>
                                        <div class="mt-3 text-base leading-relaxed text-slate-600 text-justify space-y-3">
                                            <p>
                                                For any queries, permissions, complaints, or legal communications regarding these Terms and Conditions, users may contact:
                                            </p>
                                            <div class="bg-white border border-slate-100 rounded-xl p-4 mt-2 space-y-1 text-sm shadow-sm max-w-md">
                                                <p class="font-bold text-slate-800">Impetus Healthcare Skills Private Limited</p>
                                                <p class="text-slate-600">Website: <a href="https://www.ihsnursing.com" class="text-impetus-orange font-semibold hover:underline">www.ihsnursing.com</a></p>
                                                <p class="text-slate-600">Email: <a href="mailto:support@ihsnursing.com" class="text-impetus-orange font-semibold hover:underline">support@ihsnursing.com</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </article>

                    <p class="mt-8 text-center text-xs text-slate-500">
                        Related:
                        <a href="{{ route('privacy.policy') }}" class="font-medium text-logo-blue hover:underline">Privacy Policy</a>
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
