<!-- Footer -->
<footer class="bg-impetus-dark text-slate-400 py-16 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <div class="md:col-span-1">
                <div class="flex items-center gap-3 mb-6 transition-transform hover:scale-105">
                    <img src="{{ asset('Impetus-logo.png') }}" alt="IHS Nursing Logo" class="h-12 w-auto object-contain">
                </div>
                <p class="text-xs text-slate-500 leading-relaxed mb-4">Building Intellectual Capability and clinical
                    excellence through next-generation online learning systems for nurses and healthcare professionals.
                </p>
            </div>

            <div>
                <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 font-outfit font-bold">Solutions
                </h4>
                <ul class="space-y-2 text-xs">
                    <li><a href="{{ route('cne.modules') }}" class="hover:text-white transition-colors">Clinical & CPD
                            Modules</a></li>
                    <li><a href="{{ route('cpd.certifications') }}" class="hover:text-white transition-colors">CPD
                            Certifications</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 font-outfit font-bold">Company
                </h4>
                <ul class="space-y-2 text-xs">
                    <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">About Us</a></li>
                    <li><a href="{{ route('faq') }}" class="hover:text-white transition-colors">FAQ</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 font-outfit font-bold">Legal &amp;
                    Policy</h4>
                <ul class="space-y-2 text-xs">
                    <li><a href="{{ route('privacy.policy') }}" class="hover:text-white transition-colors">Privacy
                            Policy</a></li>
                    <li><a href="{{ route('terms.conditions') }}" class="hover:text-slate-400 transition-colors">Terms
                            &amp; Conditions</a></li>
                </ul>
            </div>
        </div>

        <div
            class="pt-8 border-t border-slate-800 text-center text-[10px] text-slate-600 flex flex-col sm:flex-row items-center justify-between gap-4">
            <span>&copy; {{ date('Y') }} IHS Nursing Solutions. All rights reserved.</span>
            <div class="flex gap-4 font-semibold">
                <a href="{{ route('faq') }}" class="hover:text-slate-400">FAQ</a>
                <a href="{{ route('privacy.policy') }}" class="hover:text-slate-400">Privacy Policy</a>
                <a href="{{ route('terms.conditions') }}" class="hover:text-slate-400">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
