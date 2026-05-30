<!-- Footer -->
<footer class="bg-impetus-dark text-slate-400 py-16 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-12">
            <!-- Branding Column -->
            <div class="md:col-span-4">
                <div class="flex items-center gap-3 mb-6 transition-transform hover:scale-105">
                    <img src="{{ asset('Impetus-logo.png') }}" alt="IHS Nursing Logo" class="h-14 w-auto object-contain">
                </div>
                <p class="text-xs text-slate-500 leading-relaxed mb-4">
                    Building Intellectual Capability and clinical excellence through next-generation online learning
                    systems for nurses and healthcare professionals.
                </p>
            </div>

            <!-- Company Column -->
            <div class="md:col-span-3">
                <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 font-outfit font-bold">Company
                </h4>
                <ul class="space-y-2 text-xs">
                    <li><a href="{{ route('about') }}" class="hover:text-white transition-colors font-medium">About</a>
                    </li>
                    <li><a href="#" class="hover:text-white transition-colors font-medium">Careers</a></li>
                    <li><a href="{{ route('cne.modules') }}" class="hover:text-white transition-colors font-medium">CNE
                            Modules</a></li>
                    <li><a href="{{ route('cpd.certifications') }}"
                            class="hover:text-white transition-colors font-medium">CNE Certifications</a></li>
                    <li><a href="#" class="hover:text-white transition-colors font-medium">Partners</a></li>
                </ul>
            </div>

            <!-- Contact Info Column -->
            <div class="md:col-span-3">
                <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 font-outfit font-bold">Contact
                    Info</h4>
                <ul class="space-y-3 text-xs">
                    <li class="flex items-start gap-2">
                        <svg class="h-4 w-4 text-impetus-orange shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                        </svg>
                        <div class="space-y-1">
                            <a href="tel:+919445256977"
                                class="hover:text-impetus-orange transition-colors block font-medium">+91 -
                                9445256977</a>
                            <a href="tel:+919445296977"
                                class="hover:text-impetus-orange transition-colors block font-medium">+91 -
                                9445296977</a>
                            <a href="tel:+919019051277"
                                class="hover:text-impetus-orange transition-colors block font-medium">+91 -
                                9019051277</a>
                        </div>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="h-4 w-4 text-impetus-orange shrink-0" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                        <a href="mailto:support@ihsnursing.com"
                            class="hover:text-impetus-orange transition-colors font-medium">support@ihsnursing.com</a>
                    </li>
                </ul>
            </div>

            <!-- Legal Column -->
            <div class="md:col-span-2">
                <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 font-outfit font-bold">Legal</h4>
                <ul class="space-y-2 text-xs">
                    <li><a href="{{ route('faq') }}" class="hover:text-white transition-colors font-medium">FAQ</a>
                    </li>
                    <li><a href="{{ route('privacy.policy') }}"
                            class="hover:text-white transition-colors font-medium">Privacy Policy</a></li>
                    <li><a href="{{ route('cancellation.policy') }}"
                            class="hover:text-white transition-colors font-medium">Cancellation Policy</a></li>

                    <li><a href="{{ route('terms.conditions') }}"
                            class="hover:text-white transition-colors font-medium">Terms &amp; Conditions</a></li>
                </ul>
            </div>
        </div>

        <div
            class="pt-8 border-t border-slate-800 text-center text-[10px] text-slate-600 flex flex-col sm:flex-row items-center justify-between gap-4">
            <span>&copy; 2026 Impetus Healthcare Skills Private Limited. All rights reserved.</span>
            <div class="flex gap-4 font-semibold">
                <a href="{{ route('faq') }}" class="hover:text-slate-400">FAQ</a>
                <a href="{{ route('privacy.policy') }}" class="hover:text-slate-400">Privacy Policy</a>
                <a href="{{ route('cancellation.policy') }}" class="hover:text-slate-400">Cancellation Policy</a>

                <a href="{{ route('terms.conditions') }}" class="hover:text-slate-400">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
