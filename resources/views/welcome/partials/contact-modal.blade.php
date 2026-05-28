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

    <div class="relative z-10 w-full max-w-lg rounded-3xl border border-slate-200/80 bg-white p-6 shadow-2xl shadow-slate-900/10 sm:p-7"
         x-transition:enter="ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="ease-in duration-150"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         @click.stop>
        <div class="mb-5 flex items-start justify-between gap-4">
            <div>
                <h2 id="contact-modal-title" class="font-serif text-xl font-semibold text-slate-900">Contact Us</h2>
                <p class="mt-1 text-sm text-slate-600">Have questions? Send us an inquiry and we'll get back to you shortly.</p>
            </div>
            <button type="button"
                    @click="open = false"
                    class="shrink-0 rounded-full p-2 text-slate-500 transition-colors hover:bg-slate-100 hover:text-slate-800"
                    aria-label="Close contact dialog">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form method="POST" action="{{ route('contact.submit') }}" class="space-y-4">
            @csrf
            <div>
                <label for="contact-name" class="mb-1.5 block text-sm font-medium text-slate-750 font-outfit">Name <span class="text-rose-500 font-bold">*</span></label>
                <input type="text"
                       id="contact-name"
                       name="name"
                       value="{{ auth()->check() ? auth()->user()->name : old('name') }}"
                       required
                       class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-impetus-orange focus:outline-none focus:ring-2 focus:ring-impetus-orange/25" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <label for="contact-email" class="mb-1.5 block text-sm font-medium text-slate-750 font-outfit">Email ID <span class="text-rose-500 font-bold">*</span></label>
                <input type="email"
                       id="contact-email"
                       name="email"
                       value="{{ auth()->check() ? auth()->user()->email : old('email') }}"
                       required
                       class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-impetus-orange focus:outline-none focus:ring-2 focus:ring-impetus-orange/25" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <label for="contact-mobile" class="mb-1.5 block text-sm font-medium text-slate-750 font-outfit">Mobile # <span class="text-rose-500 font-bold">*</span></label>
                <input type="text"
                       id="contact-mobile"
                       name="mobile"
                       value="{{ auth()->check() ? auth()->user()->phone : old('mobile') }}"
                       required
                       class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-impetus-orange focus:outline-none focus:ring-2 focus:ring-impetus-orange/25" />
                <x-input-error :messages="$errors->get('mobile')" class="mt-2" />
            </div>

            <div>
                <label for="contact-ihsid" class="mb-1.5 block text-sm font-medium text-slate-750 font-outfit">IHSID <span class="text-slate-400 text-xs font-normal">(Optional)</span></label>
                <input type="text"
                       id="contact-ihsid"
                       name="ihsid"
                       value="{{ auth()->check() ? auth()->user()->unique_sequence_number : old('ihsid') }}"
                       class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-impetus-orange focus:outline-none focus:ring-2 focus:ring-impetus-orange/25" />
                <x-input-error :messages="$errors->get('ihsid')" class="mt-2" />
            </div>

            <div>
                <label for="contact-query" class="mb-1.5 block text-sm font-medium text-slate-750 font-outfit">Query for <span class="text-rose-500 font-bold">*</span></label>
                <textarea id="contact-query"
                          name="query_for"
                          required
                          rows="4"
                          placeholder="Please enter details of your query..."
                          class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:border-impetus-orange focus:outline-none focus:ring-2 focus:ring-impetus-orange/25">{{ old('query_for') }}</textarea>
                <x-input-error :messages="$errors->get('query_for')" class="mt-2" />
            </div>

            <div class="pt-2">
                <button type="submit"
                        class="w-full rounded-full bg-impetus-orange px-4 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-impetus-orange/90 focus:outline-none focus:ring-2 focus:ring-impetus-orange focus:ring-offset-2 font-outfit">
                    Submit Query
                </button>
            </div>
        </form>
    </div>
</div>
