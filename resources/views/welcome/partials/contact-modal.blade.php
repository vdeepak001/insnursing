<div x-data="{
         open: {{ ($errors->has('name') || $errors->has('email') || $errors->has('mobile') || $errors->has('query_for')) ? 'true' : 'false' }}
     }"
     x-show="open"
     x-cloak
     id="contact-modal"
     role="dialog"
     aria-modal="true"
     aria-labelledby="contact-modal-title"
     class="fixed inset-0 z-[9999] grid place-items-center p-4 sm:p-6"
     @open-contact-modal.window="open = true"
     @keydown.escape.window="open = false">
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity"
         x-transition:enter="ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="open = false"></div>

    <div class="relative z-10 w-full max-w-4xl rounded-3xl border border-slate-200/80 bg-white p-0 shadow-2xl shadow-slate-900/10 overflow-hidden"
         x-transition:enter="ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="ease-in duration-150"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         @click.stop>
        
        <div class="grid grid-cols-1 md:grid-cols-5">
            <!-- Left Panel: Form -->
            <div class="md:col-span-3 p-6 sm:p-8 flex flex-col justify-between">
                <div class="mb-5 flex items-start justify-between gap-4">
                    <div>
                        <h2 id="contact-modal-title" class="font-serif text-2xl font-bold text-slate-900 mb-1">Contact Us</h2>
                        <p class="text-xs sm:text-sm text-slate-600">Send us an inquiry and we'll get back to you shortly.</p>
                    </div>
                    <button type="button"
                            @click="open = false"
                            class="shrink-0 rounded-full p-2 text-slate-500 transition-colors hover:bg-slate-100 hover:text-slate-800 md:hidden"
                            aria-label="Close contact dialog">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form method="POST" action="{{ route('contact.submit') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label for="contact-name" class="mb-1 block text-xs font-bold text-slate-700 uppercase tracking-wider font-outfit">Name <span class="text-rose-500 font-bold">*</span></label>
                        <input type="text"
                               id="contact-name"
                               name="name"
                               value="{{ auth()->check() ? auth()->user()->name : old('name') }}"
                               required
                               class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm text-slate-900 placeholder:text-slate-400 focus:border-impetus-orange focus:outline-none focus:ring-2 focus:ring-impetus-orange/25" />
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="contact-email" class="mb-1 block text-xs font-bold text-slate-700 uppercase tracking-wider font-outfit">Email ID <span class="text-rose-500 font-bold">*</span></label>
                            <input type="email"
                                   id="contact-email"
                                   name="email"
                                   value="{{ auth()->check() ? auth()->user()->email : old('email') }}"
                                   required
                                   class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm text-slate-900 placeholder:text-slate-400 focus:border-impetus-orange focus:outline-none focus:ring-2 focus:ring-impetus-orange/25" />
                            <x-input-error :messages="$errors->get('email')" class="mt-1" />
                        </div>

                        <div>
                            <label for="contact-mobile" class="mb-1 block text-xs font-bold text-slate-700 uppercase tracking-wider font-outfit">Mobile # <span class="text-rose-500 font-bold">*</span></label>
                            <input type="text"
                                   id="contact-mobile"
                                   name="mobile"
                                   value="{{ auth()->check() ? auth()->user()->phone : old('mobile') }}"
                                   required
                                   class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm text-slate-900 placeholder:text-slate-400 focus:border-impetus-orange focus:outline-none focus:ring-2 focus:ring-impetus-orange/25" />
                            <x-input-error :messages="$errors->get('mobile')" class="mt-1" />
                        </div>
                    </div>

                    <div>
                        <label for="contact-ihsid" class="mb-1 block text-xs font-bold text-slate-700 uppercase tracking-wider font-outfit">IHSID <span class="text-slate-400 text-xs font-normal">(Optional)</span></label>
                        <input type="text"
                               id="contact-ihsid"
                               name="ihsid"
                               value="{{ auth()->check() ? auth()->user()->unique_sequence_number : old('ihsid') }}"
                               class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm text-slate-900 placeholder:text-slate-400 focus:border-impetus-orange focus:outline-none focus:ring-2 focus:ring-impetus-orange/25" />
                        <x-input-error :messages="$errors->get('ihsid')" class="mt-1" />
                    </div>

                    <div>
                        <label for="contact-query" class="mb-1 block text-xs font-bold text-slate-700 uppercase tracking-wider font-outfit">Query for <span class="text-rose-500 font-bold">*</span></label>
                        <textarea id="contact-query"
                                  name="query_for"
                                  required
                                  rows="3"
                                  placeholder="Please enter details of your query..."
                                  class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm text-slate-900 placeholder:text-slate-400 focus:border-impetus-orange focus:outline-none focus:ring-2 focus:ring-impetus-orange/25">{{ old('query_for') }}</textarea>
                        <x-input-error :messages="$errors->get('query_for')" class="mt-1" />
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                                class="w-full rounded-full bg-impetus-orange px-4 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-impetus-orange/90 focus:outline-none focus:ring-2 focus:ring-impetus-orange focus:ring-offset-2 font-outfit">
                            Submit Query
                        </button>
                    </div>
                </form>
            </div>

            <!-- Right Panel: Contact Information -->
            <div class="md:col-span-2 bg-gradient-to-br from-impetus-navy to-slate-900 text-white p-6 sm:p-8 flex flex-col justify-between relative overflow-hidden">
                <!-- Decorative background glow -->
                <div class="absolute -right-10 -bottom-10 w-36 h-36 bg-impetus-orange/15 rounded-full blur-2xl pointer-events-none"></div>
                <div class="absolute -left-10 -top-10 w-36 h-36 bg-emerald-500/10 rounded-full blur-2xl pointer-events-none"></div>

                <div class="relative z-10">
                    <div class="flex items-start justify-between">
                        <h3 class="font-serif text-2xl font-bold text-white mb-3 font-outfit">Contact Info</h3>
                        <button type="button"
                                @click="open = false"
                                class="shrink-0 rounded-full p-1.5 text-slate-400 transition-colors hover:bg-white/10 hover:text-white focus:outline-none hidden md:inline-flex"
                                aria-label="Close contact dialog">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-xs sm:text-sm text-slate-300 leading-relaxed mb-8 font-outfit">Feel free to reach out to us directly through any of these communication channels.</p>
                    
                    <div class="space-y-6">
                        <!-- Mobile Numbers -->
                        <div class="flex items-start gap-4">
                            <div class="p-2.5 bg-white/10 rounded-xl text-impetus-orange shrink-0">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest font-outfit">Mobile</h4>
                                <div class="text-sm font-semibold text-slate-200 mt-2 font-outfit space-y-1.5 leading-relaxed">
                                    <p><a href="tel:+919445256977" class="hover:text-impetus-orange transition-colors">+91 -9445256977</a></p>
                                    <p><a href="tel:+919445296977" class="hover:text-impetus-orange transition-colors">+91- 9445296977</a></p>
                                    <p><a href="tel:+919019051277" class="hover:text-impetus-orange transition-colors">+919019051277</a></p>
                                </div>
                            </div>
                        </div>

                        <!-- Email ID -->
                        <div class="flex items-start gap-4">
                            <div class="p-2.5 bg-white/10 rounded-xl text-impetus-orange shrink-0">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest font-outfit">Mail ID</h4>
                                <p class="text-sm font-semibold text-slate-200 mt-2 font-outfit leading-relaxed">
                                    <a href="mailto:support@ihsnursing.com" class="hover:text-impetus-orange transition-colors font-outfit">support@ihsnursing.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-12 pt-4 border-t border-white/5 text-[10px] text-slate-400 font-outfit relative z-10 leading-normal">
                    IHS Nursing CPD & Continuing Education Portal
                </div>
            </div>
        </div>
    </div>
</div>
