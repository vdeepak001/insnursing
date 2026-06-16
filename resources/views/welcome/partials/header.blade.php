@php
    $navDesktopClass = fn(string $routeName): string => request()->routeIs($routeName)
        ? 'text-xs xl:text-sm font-bold text-impetus-orange transition-colors font-outfit'
        : 'text-xs xl:text-sm font-semibold text-impetus-teal hover:text-impetus-orange transition-colors font-outfit';
    $navMobileClass = fn(string $routeName): string => request()->routeIs($routeName)
        ? '-mx-3 block rounded-lg px-3 py-2 text-base font-bold leading-7 text-impetus-orange'
        : '-mx-3 block rounded-lg px-3 py-2 text-base font-medium leading-7 text-impetus-teal hover:bg-impetus-teal-muted';
    $cartCount = 0;
    if (auth()->check() && auth()->user()?->role_type === 'user') {
        $cartCount = \App\Models\CartItem::query()
            ->where('user_id', auth()->id())
            ->count();
    }
@endphp
<!-- Navigation -->
<header x-data="{ mobileMenuOpen: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 50)"
    @keydown.escape.window="mobileMenuOpen = false"
    class="sticky top-0 z-50 w-full transition-all duration-300 glass-card border-b border-slate-200/50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center justify-between h-20 w-full" aria-label="Global">
            <a href="{{ route('home') }}"
                class="-m-1.5 p-1.5 flex items-center gap-2 group transition-transform hover:scale-105">
                <img src="{{ asset('Impetus-logo.png') }}" alt="IHS Nursing Logo" class="h-16 w-auto object-contain">
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex lg:items-center lg:justify-center gap-2 xl:gap-5">
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
                    class="text-xs xl:text-sm font-semibold text-slate-700 hover:text-impetus-teal transition-colors font-outfit cursor-pointer focus:outline-none">Contact Us</button>
            </div>

            <!-- Mobile Menu Button Toggle -->
            <div class="flex lg:hidden">
                <button type="button" @click="mobileMenuOpen = true"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-slate-700 hover:text-impetus-teal transition-colors">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>

            <!-- Actions Desktop -->
            <div class="hidden lg:flex items-center gap-4">
                @if (Route::has('login'))
                    @auth
                        <div class="flex items-center gap-3">
                            @if ($cartCount > 0)
                                <a href="{{ route('cart.index') }}"
                                    class="relative inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-300 bg-white text-slate-800 transition hover:border-impetus-teal hover:text-impetus-teal">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 3h1.5l1.5 13.5h13.5l2.25-9H6.375" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm10.5 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                    <span
                                        class="absolute -right-1 -top-1 inline-flex h-5 min-w-[1.25rem] items-center justify-center rounded-full bg-impetus-orange px-1 text-[10px] font-bold text-white shadow-md">
                                        {{ $cartCount }}
                                    </span>
                                </a>
                            @endif

                            <div x-data="{ userMenuOpen: false }" class="relative flex-shrink-0 flex flex-col items-center gap-1.5">
                                <button type="button" @click="userMenuOpen = !userMenuOpen"
                                    @click.outside="userMenuOpen = false"
                                    class="inline-flex w-40 items-center justify-between rounded-full border border-slate-200 bg-white/80 px-4 py-2 text-sm font-semibold text-slate-850 shadow-sm transition hover:border-impetus-teal hover:text-impetus-teal font-outfit">
                                    <span class="truncate font-outfit">Hi, {{ auth()->user()->name }}</span>
                                    <svg class="h-3.5 w-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                                <div
                                    class="w-40 rounded-full bg-impetus-teal py-1 text-center text-[10px] font-bold tracking-wider text-white shadow-md font-outfit">
                                    UID: {{ auth()->user()->unique_sequence_number ?? 'N/A' }}
                                </div>

                                <div x-show="userMenuOpen" x-cloak x-transition
                                    class="absolute right-0 top-14 z-50 w-48 rounded-2xl border border-slate-200/60 bg-white p-2 shadow-xl">
                                    <a href="{{ route('profile') }}" @click="userMenuOpen = false"
                                        class="block rounded-xl px-3 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-impetus-teal transition-colors font-outfit">
                                        My Profile
                                    </a>
                                    <a href="{{ route('profile.change-password') }}" @click="userMenuOpen = false"
                                        class="block rounded-xl px-3 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-impetus-teal transition-colors font-outfit">
                                        Change Password
                                    </a>
                                    @if (auth()->user()?->role_type !== 'user')
                                        <a href="{{ url('/dashboard') }}" @click="userMenuOpen = false"
                                            class="block rounded-xl px-3 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-impetus-teal transition-colors font-outfit">
                                            Dashboard
                                        </a>
                                    @endif
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full rounded-xl px-3 py-2 text-left text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-impetus-teal transition-colors font-outfit">
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="flex items-center gap-3">
                            <button type="button" @click="$dispatch('open-login-modal')"
                                class="inline-flex items-center gap-2 rounded-full bg-impetus-orange px-5 py-2.5 text-sm font-bold text-white shadow-lg shadow-impetus-orange/20 transition hover:bg-impetus-orange-hover font-outfit">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0" />
                                </svg>
                                Log in
                            </button>
                            <button type="button" @click="$dispatch('open-register-modal')"
                                class="inline-flex items-center gap-2 rounded-full border-2 border-impetus-teal bg-white px-5 py-2.5 text-sm font-bold text-impetus-teal transition hover:bg-impetus-teal-muted font-outfit">
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

    <!-- Mobile Menu Slideout -->
    <div x-show="mobileMenuOpen" x-cloak class="lg:hidden" role="dialog" aria-modal="true">
        <div class="fixed inset-0 z-[100] bg-black/20 backdrop-blur-sm" @click="mobileMenuOpen = false"></div>
        <div class="fixed inset-y-0 right-0 z-[101] flex w-full max-w-sm flex-col bg-white shadow-2xl ring-1 ring-slate-900/10"
            style="max-height: 100dvh; padding-top: env(safe-area-inset-top, 0px); padding-bottom: env(safe-area-inset-bottom, 0px);">
            <div class="flex shrink-0 items-center justify-between border-b border-slate-100 px-6 py-5">
                <a href="{{ route('home') }}" class="-m-1.5 flex items-center gap-2 p-1.5"
                    @click="mobileMenuOpen = false">
                    <img src="{{ asset('Impetus-logo.png') }}" alt="IHS Nursing Logo"
                        class="h-10 w-auto object-contain">
                </a>
                <button type="button" @click="mobileMenuOpen = false"
                    class="-m-2.5 rounded-md p-2.5 text-slate-700 hover:bg-slate-100">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <nav class="flex min-h-0 flex-1 flex-col overflow-y-auto overscroll-y-contain px-6 py-6"
                aria-label="Mobile">
                <div class="space-y-1">
                    <a href="{{ route('home') }}" @click="mobileMenuOpen = false"
                        class="{{ $navMobileClass('home') }}"
                        @if (request()->routeIs('home')) aria-current="page" @endif>Home</a>
                    <a href="{{ route('about') }}" @click="mobileMenuOpen = false"
                        class="{{ $navMobileClass('about') }}"
                        @if (request()->routeIs('about')) aria-current="page" @endif>About Us</a>
                    <a href="{{ route('cne.modules') }}" @click="mobileMenuOpen = false"
                        class="{{ $navMobileClass('cne.modules') }}"
                        @if (request()->routeIs('cne.modules')) aria-current="page" @endif>CPD Modules</a>
                    <a href="{{ route('cpd.certifications') }}" @click="mobileMenuOpen = false"
                        class="{{ $navMobileClass('cpd.certifications') }}"
                        @if (request()->routeIs('cpd.certifications')) aria-current="page" @endif>CPD Certification</a>
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
                        class="-mx-3 block w-full rounded-lg px-3 py-2 text-left text-base font-medium leading-7 text-slate-900 hover:bg-slate-50 font-outfit cursor-pointer focus:outline-none">Contact Us</button>
                </div>
                @if (Route::has('login'))
                    <div class="mt-8 border-t border-slate-200 pt-6">
                        @auth
                            @if (auth()->user()?->role_type === 'user')
                                <span
                                    class="-mx-3 block truncate rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-slate-900 font-outfit">
                                    Hi, {{ auth()->user()->name }}
                                </span>
                                @if ($cartCount > 0)
                                    <a href="{{ route('cart.index') }}"
                                        class="-mx-3 flex items-center justify-between rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-slate-900 hover:bg-slate-50 font-outfit font-semibold">
                                        <span>Cart</span>
                                        <span
                                            class="inline-flex h-6 min-w-[1.5rem] items-center justify-center rounded-full bg-impetus-orange px-2 text-xs font-bold text-white">
                                            {{ $cartCount }}
                                        </span>
                                    </a>
                                @endif
                            @else
                                <a href="{{ url('/dashboard') }}"
                                    class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-slate-900 hover:bg-slate-50 font-outfit">Dashboard</a>
                            @endif
                            <a href="{{ route('profile') }}"
                                class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-slate-900 hover:bg-slate-50 font-outfit">
                                My Profile
                            </a>
                            <a href="{{ route('profile.change-password') }}"
                                class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-slate-900 hover:bg-slate-50 font-outfit">
                                Change Password
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="-mx-3 block w-full rounded-lg px-3 py-2.5 text-left text-base font-semibold leading-7 text-slate-900 hover:bg-slate-50 font-outfit">
                                    Logout
                                </button>
                            </form>
                        @else
                            <button type="button" @click="mobileMenuOpen = false; $dispatch('open-login-modal')"
                                class="-mx-3 block w-full rounded-lg px-3 py-2.5 text-left text-base font-bold leading-7 text-slate-900 hover:bg-slate-50 font-outfit">
                                Log in
                            </button>
                            <button type="button" @click="mobileMenuOpen = false; $dispatch('open-register-modal')"
                                class="-mx-3 block w-full rounded-lg px-3 py-2.5 text-left text-base font-bold leading-7 text-slate-900 hover:bg-slate-50 font-outfit font-semibold">
                                Sign up
                            </button>
                        @endauth
                    </div>
                @endif
            </nav>
        </div>
    </div>
</header>
