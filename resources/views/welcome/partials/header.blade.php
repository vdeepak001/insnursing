@php
    $navDesktopClass = fn(string $routeName): string => request()->routeIs($routeName)
        ? 'whitespace-nowrap shrink-0 rounded-md px-1.5 py-1 text-xs 2xl:px-2 2xl:text-sm font-bold text-impetus-orange transition-colors font-outfit'
        : 'whitespace-nowrap shrink-0 rounded-md px-1.5 py-1 text-xs 2xl:px-2 2xl:text-sm font-semibold text-impetus-teal hover:text-impetus-orange transition-colors font-outfit';
    $navMobileClass = fn(string $routeName): string => request()->routeIs($routeName)
        ? 'block rounded-xl px-4 py-4 text-xl font-bold leading-8 text-impetus-orange bg-impetus-orange/5 border-l-4 border-impetus-orange'
        : 'block rounded-xl px-4 py-4 text-xl font-semibold leading-8 text-impetus-teal hover:bg-impetus-teal-muted hover:text-impetus-teal border-l-4 border-transparent hover:border-impetus-teal transition-all';
    $cartCount = 0;
    if (auth()->check() && auth()->user()?->role_type === 'user') {
        $cartCount = \App\Models\CartItem::query()
            ->where('user_id', auth()->id())
            ->count();
    }
@endphp

{{-- Navigation wrapper: x-data lives here (NOT on <header>) so the mobile menu
     fixed overlay is not trapped inside the sticky header's stacking context --}}
<div x-data="{ mobileMenuOpen: false, scrolled: false }"
    @keydown.escape.window="mobileMenuOpen = false"
    @scroll.window="scrolled = (window.pageYOffset > 50)"
    class="sticky top-0 z-50 w-full">

    <header class="w-full transition-all duration-300 glass-card border-b border-slate-200/50 shadow-sm">
        <div class="w-full px-4 sm:px-6 lg:px-10 xl:px-12 2xl:px-16">
            <nav class="grid h-20 w-full grid-cols-[1fr_auto] items-center xl:grid-cols-[auto_minmax(0,1fr)_auto] xl:gap-x-6" aria-label="Global">
                <a href="{{ route('home') }}"
                    class="shrink-0 justify-self-start transition-transform hover:scale-105 xl:mr-3">
                    <img src="{{ asset('Impetus-logo.png') }}" alt="IHS Nursing Logo" class="h-16 w-auto object-contain">
                </a>

                <!-- Desktop Menu -->
                <div class="col-start-2 hidden min-w-0 items-center justify-evenly justify-self-stretch xl:flex xl:px-4 2xl:px-8">
                    <a href="{{ route('home') }}" class="{{ $navDesktopClass('home') }}"
                        @if (request()->routeIs('home')) aria-current="page" @endif>Home</a>
                    <a href="{{ route('about') }}" class="{{ $navDesktopClass('about') }}"
                        @if (request()->routeIs('about')) aria-current="page" @endif>About Us</a>
                    <a href="{{ route('cne.modules') }}" class="{{ $navDesktopClass('cne.modules') }}"
                        @if (request()->routeIs('cne.modules')) aria-current="page" @endif>CNE Modules</a>
                    <a href="{{ route('cpd.certifications') }}" class="{{ $navDesktopClass('cpd.certifications') }}"
                        @if (request()->routeIs('cpd.certifications')) aria-current="page" @endif>CNE Certification</a>
                    <a href="{{ route('learning.materials') }}" class="{{ $navDesktopClass('learning.materials') }}"
                        @if (request()->routeIs('learning.materials')) aria-current="page" @endif>Learning Resources</a>
                    <a href="{{ route('practice.test') }}" class="{{ $navDesktopClass('practice.test') }}"
                        @if (request()->routeIs('practice.test')) aria-current="page" @endif>Practice Test</a>
                    <a href="{{ route('online.examination') }}" class="{{ $navDesktopClass('online.examination') }}"
                        @if (request()->routeIs('online.examination')) aria-current="page" @endif>Online Test</a>
                    <button type="button" @click="$dispatch('open-contact-modal')"
                        class="shrink-0 whitespace-nowrap rounded-md px-1.5 py-1 text-xs 2xl:px-2 2xl:text-sm font-semibold text-slate-700 hover:text-impetus-teal transition-colors font-outfit cursor-pointer focus:outline-none">Contact Us</button>
                </div>

                <!-- Mobile Hamburger Button -->
                <div class="col-start-2 flex items-center justify-self-end xl:hidden">
                    <button type="button" @click="mobileMenuOpen = true"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-slate-700 hover:text-impetus-teal transition-colors">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>

                <!-- Desktop Actions -->
                <div class="col-start-2 hidden items-center justify-self-end gap-2 2xl:gap-3 xl:col-start-3 xl:flex xl:justify-end">
                    @if (Route::has('login'))
                        @auth
                            <div class="flex items-center gap-3">
                                @if ($cartCount > 0)
                                    <a href="{{ route('cart.index') }}"
                                        class="relative inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-300 bg-white text-slate-800 transition hover:border-impetus-teal hover:text-impetus-teal">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.5l1.5 13.5h13.5l2.25-9H6.375" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm10.5 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                        </svg>
                                        <span class="absolute -right-1 -top-1 inline-flex h-5 min-w-[1.25rem] items-center justify-center rounded-full bg-impetus-orange px-1 text-[10px] font-bold text-white shadow-md">
                                            {{ $cartCount }}
                                        </span>
                                    </a>
                                @endif

                                <div x-data="{ userMenuOpen: false }" class="relative flex-shrink-0 flex flex-col items-center gap-1.5">
                                    <button type="button" @click="userMenuOpen = !userMenuOpen" @click.outside="userMenuOpen = false"
                                        class="inline-flex w-40 items-center justify-between rounded-full border border-slate-200 bg-white/80 px-4 py-2 text-sm font-semibold text-slate-850 shadow-sm transition hover:border-impetus-teal hover:text-impetus-teal font-outfit">
                                        <span class="truncate font-outfit">Hi, {{ auth()->user()->name }}</span>
                                        <svg class="h-3.5 w-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    <div class="w-40 rounded-full bg-impetus-teal py-1 text-center text-[10px] font-bold tracking-wider text-white shadow-md font-outfit">
                                        UID: {{ auth()->user()->unique_sequence_number ?? 'N/A' }}
                                    </div>
                                    <div x-show="userMenuOpen" x-cloak x-transition
                                        class="absolute right-0 top-14 z-50 w-48 rounded-2xl border border-slate-200/60 bg-white p-2 shadow-xl">
                                        <a href="{{ route('profile') }}" @click="userMenuOpen = false"
                                            class="block rounded-xl px-3 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-impetus-teal transition-colors font-outfit">My Profile</a>
                                        <a href="{{ route('profile.change-password') }}" @click="userMenuOpen = false"
                                            class="block rounded-xl px-3 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-impetus-teal transition-colors font-outfit">Change Password</a>
                                        @if (auth()->user()?->role_type !== 'user')
                                            <a href="{{ url('/dashboard') }}" @click="userMenuOpen = false"
                                                class="block rounded-xl px-3 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-impetus-teal transition-colors font-outfit">Dashboard</a>
                                        @endif
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="block w-full rounded-xl px-3 py-2 text-left text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-impetus-teal transition-colors font-outfit">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="flex items-center gap-3">
                                <button type="button" @click="$dispatch('open-login-modal')"
                                    class="inline-flex shrink-0 items-center gap-2 whitespace-nowrap rounded-full bg-impetus-orange px-5 py-2.5 text-sm font-bold text-white shadow-lg shadow-impetus-orange/20 transition hover:bg-impetus-orange-hover font-outfit">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0" />
                                    </svg>
                                    Log in
                                </button>
                                <button type="button" @click="$dispatch('open-register-modal')"
                                    class="inline-flex shrink-0 items-center gap-2 whitespace-nowrap rounded-full border-2 border-impetus-teal bg-white px-5 py-2.5 text-sm font-bold text-impetus-teal transition hover:bg-impetus-teal-muted font-outfit">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM3 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 019.374 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0z" />
                                    </svg>
                                    Sign up
                                </button>
                            </div>
                        @endauth
                    @endif
                </div>
            </nav>
        </div>
    </header>

    {{-- ============================================================
         Mobile Menu Slideout
         IMPORTANT: This is OUTSIDE <header> so that the fixed overlay
         is NOT trapped inside the sticky header's CSS stacking context.
         Both elements share the same Alpine x-data via the parent div.
         ============================================================ --}}
    <div x-show="mobileMenuOpen" x-cloak class="xl:hidden" role="dialog" aria-modal="true">
        {{-- Backdrop --}}
        <div class="fixed inset-0 z-[100] bg-black/20 backdrop-blur-sm" @click="mobileMenuOpen = false"></div>

        {{-- Panel --}}
        <div class="fixed inset-0 z-[101] flex flex-col bg-white shadow-2xl"
            style="padding-top: env(safe-area-inset-top, 0px); padding-bottom: env(safe-area-inset-bottom, 0px);">

            {{-- Decorative blobs --}}
            <div class="pointer-events-none absolute top-0 right-0 h-64 w-64 rounded-full opacity-50 blur-3xl"
                style="background: radial-gradient(circle, #0F766E40 0%, transparent 70%);"></div>
            <div class="pointer-events-none absolute bottom-0 left-0 h-72 w-72 rounded-full opacity-50 blur-3xl"
                style="background: radial-gradient(circle, #FF7A0040 0%, transparent 70%);"></div>
            {{-- Dot pattern --}}
            <div class="pointer-events-none absolute inset-0 opacity-[0.06]"
                style="background-image: radial-gradient(#0F766E 1.5px, transparent 1.5px); background-size: 28px 28px;"></div>

            {{-- Light header bar --}}
            <div class="relative z-10 flex shrink-0 items-center justify-between px-6 py-5 border-b border-slate-200/80 bg-white">
                <a href="{{ route('home') }}" class="-m-1.5 flex items-center gap-2 p-1.5" @click="mobileMenuOpen = false">
                    <img src="{{ asset('Impetus-logo.png') }}" alt="IHS Nursing Logo"
                        class="h-14 w-auto object-contain">
                </a>
                <button type="button" @click="mobileMenuOpen = false"
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-100 text-slate-700 hover:bg-slate-200 transition-colors">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- Nav items --}}
            <nav class="relative z-10 flex min-h-0 flex-1 flex-col overflow-y-auto overscroll-y-contain px-5 py-6" aria-label="Mobile">
                <div class="space-y-2">
                    <a href="{{ route('home') }}" @click="mobileMenuOpen = false"
                        class="{{ $navMobileClass('home') }}"
                        @if (request()->routeIs('home')) aria-current="page" @endif>Home</a>
                    <a href="{{ route('about') }}" @click="mobileMenuOpen = false"
                        class="{{ $navMobileClass('about') }}"
                        @if (request()->routeIs('about')) aria-current="page" @endif>About Us</a>
                    <a href="{{ route('cne.modules') }}" @click="mobileMenuOpen = false"
                        class="{{ $navMobileClass('cne.modules') }}"
                        @if (request()->routeIs('cne.modules')) aria-current="page" @endif>CNE Modules</a>
                    <a href="{{ route('cpd.certifications') }}" @click="mobileMenuOpen = false"
                        class="{{ $navMobileClass('cpd.certifications') }}"
                        @if (request()->routeIs('cpd.certifications')) aria-current="page" @endif>CNE Certification</a>
                    <a href="{{ route('learning.materials') }}" @click="mobileMenuOpen = false"
                        class="{{ $navMobileClass('learning.materials') }}"
                        @if (request()->routeIs('learning.materials')) aria-current="page" @endif>Learning Materials</a>
                    <a href="{{ route('practice.test') }}" @click="mobileMenuOpen = false"
                        class="{{ $navMobileClass('practice.test') }}"
                        @if (request()->routeIs('practice.test')) aria-current="page" @endif>Practice Test</a>
                    <a href="{{ route('online.examination') }}" @click="mobileMenuOpen = false"
                        class="{{ $navMobileClass('online.examination') }}"
                        @if (request()->routeIs('online.examination')) aria-current="page" @endif>Online Test</a>
                    <button type="button" @click="mobileMenuOpen = false; $dispatch('open-contact-modal')"
                        class="block w-full rounded-xl px-4 py-4 text-left text-xl font-semibold leading-8 text-slate-700 hover:bg-slate-50 border-l-4 border-transparent hover:border-impetus-orange hover:text-impetus-orange transition-all font-outfit cursor-pointer focus:outline-none">Contact Us</button>
                </div>

                @if (Route::has('login'))
                    <div class="mt-8 border-t border-slate-200 pt-6">
                        @auth
                            @if (auth()->user()?->role_type === 'user')
                                <span class="block truncate rounded-xl px-4 py-4 text-xl font-bold leading-8 text-slate-900 font-outfit">
                                    Hi, {{ auth()->user()->name }}
                                </span>
                                @if ($cartCount > 0)
                                    <a href="{{ route('cart.index') }}"
                                        class="flex items-center justify-between rounded-xl px-4 py-4 text-xl font-semibold leading-8 text-slate-900 hover:bg-slate-50 font-outfit">
                                        <span>Cart</span>
                                        <span class="inline-flex h-6 min-w-[1.5rem] items-center justify-center rounded-full bg-impetus-orange px-2 text-xs font-bold text-white">
                                            {{ $cartCount }}
                                        </span>
                                    </a>
                                @endif
                            @else
                                <a href="{{ url('/dashboard') }}"
                                    class="block rounded-xl px-4 py-4 text-xl font-semibold leading-8 text-slate-900 hover:bg-slate-50 font-outfit">Dashboard</a>
                            @endif
                            <a href="{{ route('profile') }}"
                                class="block rounded-xl px-4 py-4 text-xl font-semibold leading-8 text-slate-900 hover:bg-slate-50 font-outfit">My Profile</a>
                            <a href="{{ route('profile.change-password') }}"
                                class="block rounded-xl px-4 py-4 text-xl font-semibold leading-8 text-slate-900 hover:bg-slate-50 font-outfit">Change Password</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full rounded-xl px-4 py-4 text-left text-xl font-semibold leading-8 text-slate-900 hover:bg-slate-50 font-outfit">Logout</button>
                            </form>
                        @else
                            <button type="button" @click="mobileMenuOpen = false; $dispatch('open-login-modal')"
                                class="block w-full rounded-xl px-4 py-4 text-left text-xl font-bold leading-8 text-white bg-impetus-orange hover:bg-impetus-orange-hover font-outfit mb-3">
                                Log in
                            </button>
                            <button type="button" @click="mobileMenuOpen = false; $dispatch('open-register-modal')"
                                class="block w-full rounded-xl px-4 py-4 text-left text-xl font-bold leading-8 text-impetus-teal border-2 border-impetus-teal hover:bg-impetus-teal-muted font-outfit">
                                Sign up
                            </button>
                        @endauth
                    </div>
                @endif
            </nav>
        </div>
    </div>

</div>{{-- end x-data wrapper --}}
