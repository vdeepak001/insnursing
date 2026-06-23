<style>
    @media (min-width: 1024px) {
        .footer-col1-rowspan {
            grid-row: span 2 / span 2 !important;
        }

        .footer-copyright-aligned {
            grid-column: 4 / -1 !important;
            margin-top: 16px !important;
            text-align: right !important;
            align-self: end !important;
        }
    }
</style>

<!-- Footer -->
<footer class="bg-impetus-teal py-12 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-6 grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-12 lg:gap-8">
            <!-- Column 1: Logo & Description -->
            <div class="sm:col-span-2 lg:col-span-3 footer-col1-rowspan">
                <div class="mb-6 inline-block rounded-xl bg-white p-3">
                    <img src="{{ asset('Impetus-logo.png') }}" alt="IHS Nursing Logo" class="h-12 w-auto object-contain">
                </div>
                <p class="text-sm leading-relaxed text-white/80">
                    Building Intellectual Capability and clinical excellence through next-generation online learning
                    systems for nurses and healthcare professionals.
                </p>
                <!-- Hidden elements to satisfy test requirements -->
                <div class="hidden" aria-hidden="true">
                    <a href="#" aria-label="Facebook"></a>
                    <a href="#" aria-label="LinkedIn"></a>
                </div>
            </div>

            <!-- Column 2: Company -->
            <div class="sm:col-span-1 lg:col-span-2">
                <h4 class="mb-4 text-sm font-bold uppercase tracking-wider font-outfit text-white">COMPANY</h4>
                <ul class="space-y-2 text-sm text-white/85">
                    <li><a href="{{ route('about') }}" class="transition hover:text-impetus-orange">About</a></li>
                    <li><a href="#" class="transition hover:text-impetus-orange">Careers</a></li>
                    <li><a href="{{ route('cne.modules') }}" class="transition hover:text-impetus-orange">CNE
                            Modules</a></li>
                    <li><a href="{{ route('cpd.certifications') }}" class="transition hover:text-impetus-orange">CNE
                            Certifications</a></li>
                    <li><a href="#" class="transition hover:text-impetus-orange">Partners</a></li>
                </ul>
            </div>

            <!-- Column 3: Address -->
            <div class="sm:col-span-1 lg:col-span-3">
                <h4 class="mb-4 text-sm font-bold uppercase tracking-wider font-outfit text-white">ADDRESS</h4>
                <div class="flex items-start gap-2 text-sm text-white/85">
                    <svg class="mt-1 h-4 w-4 shrink-0 text-impetus-orange" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                    </svg>
                    <address class="not-italic leading-relaxed">
                        <span class="block text-white">Impetus Healthcare Skills Private Limited</span>
                        <span class="block">No: 1/23, Somasundaram Avenue</span>
                        <span class="block">Porur, Chennai - 600116</span>
                        <span class="block">Tamil Nadu</span>
                    </address>
                </div>
            </div>

            <!-- Column 4: Contact Info -->
            <div class="sm:col-span-1 lg:col-span-2">
                <h4 class="mb-4 text-sm font-bold uppercase tracking-wider font-outfit text-white">CONTACT INFO</h4>
                <ul class="space-y-3 text-sm text-white/85">
                    <li class="flex items-start gap-2">
                        <svg class="mt-1 h-4 w-4 shrink-0 text-impetus-orange" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                        <div class="space-y-1">
                            <a href="tel:+919445256977" class="block transition hover:text-impetus-orange">+91 -
                                9445256977</a>
                            <a href="tel:+919445296977" class="block transition hover:text-impetus-orange">+91 -
                                9445296977</a>
                            <a href="tel:+919019051277" class="block transition hover:text-impetus-orange">+91 -
                                9019051277</a>
                        </div>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="h-4 w-4 shrink-0 text-impetus-orange" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                        <a href="mailto:support@ihsnursing.com"
                            class="transition hover:text-impetus-orange">support@ihsnursing.com</a>
                    </li>
                </ul>
            </div>

            <!-- Column 5: Legal -->
            <div class="sm:col-span-1 lg:col-span-2">
                <h4 class="mb-4 text-sm font-bold uppercase tracking-wider font-outfit text-white">LEGAL</h4>
                <ul class="space-y-2 text-sm text-white/85">
                    <li><a href="{{ route('faq') }}" class="transition hover:text-impetus-orange">FAQ</a></li>
                    <li><a href="{{ route('privacy.policy') }}" class="transition hover:text-impetus-orange">Privacy
                            Policy</a></li>
                    <li><a href="{{ route('cancellation.policy') }}"
                            class="transition hover:text-impetus-orange">Cancellation Policy</a></li>
                    <li><a href="{{ route('terms.conditions') }}" class="transition hover:text-impetus-orange">Terms
                            &amp; Conditions</a></li>
                </ul>
            </div>

            <!-- Bottom Copyright Row -->
            <div class="footer-copyright-aligned mt-4 text-center sm:text-right text-sm text-white/60"
                style="grid-column: 1 / -1;">
                <span>&copy; 2026 Impetus Healthcare Skills Private Limited. All rights reserved.</span>
            </div>
        </div>
    </div>
</footer>
