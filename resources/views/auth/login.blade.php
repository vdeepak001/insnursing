@extends('layouts.fullscreen-layout')

@section('content')
    <div class="relative z-1 bg-white sm:p-0 dark:bg-gray-900">
        <div class="relative flex h-screen w-full flex-col justify-center sm:p-0 lg:flex-row dark:bg-gray-900">
            <!-- Left Side: Login Form -->
            <div class="flex w-full flex-1 flex-col lg:w-1/2 bg-gradient-to-br from-slate-50 via-white to-slate-100/50 dark:from-slate-900 dark:via-slate-950 dark:to-slate-900">
                <div class="mx-auto flex w-full max-w-md flex-1 flex-col justify-center px-6 py-12 lg:px-8">
                    <div class="w-full bg-white/60 dark:bg-slate-900/40 backdrop-blur-xl p-8 sm:p-10 rounded-3xl border border-slate-200/50 dark:border-slate-800 shadow-xl shadow-slate-100/40 dark:shadow-none">
                        <div class="mb-8">
                            <span class="text-xs font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-2 block">Welcome Back</span>
                            <h1 class="text-3xl font-extrabold text-impetus-navy tracking-tight font-outfit mb-2 dark:text-white">
                                Sign In
                            </h1>
                            <p class="text-sm text-slate-500 dark:text-slate-400">
                                Enter your credentials to access your student portal.
                            </p>
                        </div>
                        <div>
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="space-y-6">
                                    <div>
                                        <label class="mb-1.5 block text-sm font-semibold text-slate-700 dark:text-slate-300 font-outfit">
                                            Email Address<span class="text-red-500">*</span>
                                        </label>
                                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                                            required autofocus placeholder="Enter your email address"
                                            class="dark:bg-dark-900 focus:border-impetus-orange focus:ring-impetus-orange/10 shadow-sm h-11 w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-800 placeholder:text-slate-400 focus:ring-4 focus:outline-none dark:border-slate-700 dark:bg-slate-900 dark:text-white dark:placeholder:text-slate-500 transition-all duration-200" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div>
                                        <label class="mb-1.5 block text-sm font-semibold text-slate-700 dark:text-slate-300 font-outfit">
                                            Password<span class="text-red-500">*</span>
                                        </label>
                                        <div x-data="{ showPassword: false }" class="relative">
                                            <input :type="showPassword ? 'text' : 'password'" id="password" name="password"
                                                required placeholder="Enter your password"
                                                class="dark:bg-dark-900 focus:border-impetus-orange focus:ring-impetus-orange/10 shadow-sm h-11 w-full rounded-xl border border-slate-300 bg-white py-2.5 pr-11 pl-4 text-sm text-slate-800 placeholder:text-slate-400 focus:ring-4 focus:outline-none dark:border-slate-700 dark:bg-slate-900 dark:text-white dark:placeholder:text-slate-500 transition-all duration-200" />
                                            <span @click="showPassword = !showPassword"
                                                class="absolute top-1/2 right-4 z-30 -translate-y-1/2 cursor-pointer text-slate-400 hover:text-impetus-orange transition-colors">
                                                <svg x-show="!showPassword" class="fill-current" width="20"
                                                    height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.0002 13.8619C7.23361 13.8619 4.86803 12.1372 3.92328 9.70241C4.86804 7.26761 7.23361 5.54297 10.0002 5.54297C12.7667 5.54297 15.1323 7.26762 16.0771 9.70243C15.1323 12.1372 12.7667 13.8619 10.0002 13.8619ZM10.0002 4.04297C6.48191 4.04297 3.49489 6.30917 2.4155 9.4593C2.3615 9.61687 2.3615 9.78794 2.41549 9.94552C3.49488 13.0957 6.48191 15.3619 10.0002 15.3619C13.5184 15.3619 16.5055 13.0957 17.5849 9.94555C17.6389 9.78797 17.6389 9.6169 17.5849 9.45932C16.5055 6.30919 13.5184 4.04297 10.0002 4.04297ZM9.99151 7.84413C8.96527 7.84413 8.13333 8.67606 8.13333 9.70231C8.13333 10.7286 8.96527 11.5605H10.0064C11.0326 11.5605 11.8646 10.7286 11.8646 9.70231C11.8646 8.67606 11.0326 7.84413 10.0064 7.84413H9.99151Z"
                                                        fill="currentColor" />
                                                </svg>
                                                <svg x-show="showPassword" class="fill-current" width="20"
                                                    height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M4.63803 3.57709C4.34513 3.2842 3.87026 3.2842 3.57737 3.57709C3.28447 3.86999 3.28447 4.34486 3.57737 4.63775L4.85323 5.91362C3.74609 6.84199 2.89363 8.06395 2.4155 9.45936C2.3615 9.61694 2.3615 9.78801 2.41549 9.94558C3.49488 13.0957 6.48191 15.3619 10.0002 15.3619C11.255 15.3619 12.4422 15.0737 13.4994 14.5598L15.3625 16.4229C15.6554 16.7158 16.1302 16.7158 16.4231 16.4229C16.716 16.13 16.716 15.6551 16.4231 15.3622L4.63803 3.57709ZM12.3608 13.4212L10.4475 11.5079C10.3061 11.5423 10.1584 11.5606 10.0064 11.5606H9.99151C8.96527 11.5606 8.13333 10.7286 8.13333 9.70237C8.13333 9.5461 8.15262 9.39434 8.18895 9.24933L5.91885 6.97923C5.03505 7.69015 4.34057 8.62704 3.92328 9.70247C4.86803 12.1373 7.23361 13.8619 10.0002 13.8619C10.8326 13.8619 11.6287 13.7058 12.3608 13.4212ZM16.0771 9.70249C15.7843 10.4569 15.3552 11.1432 14.8199 11.7311L15.8813 12.7925C16.6329 11.9813 17.2187 11.0143 17.5849 9.94561C17.6389 9.78803 17.6389 9.61696 17.5849 9.45938C16.5055 6.30925 13.5184 4.04303 10.0002 4.04303C9.13525 4.04303 8.30244 4.17999 7.52218 4.43338L8.75139 5.66259C9.1556 5.58413 9.57311 5.54303 10.0002 5.54303C12.7667 5.54303 15.1323 7.26768 16.0771 9.70249Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                        </div>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div x-data="{ checkboxToggle: {{ old('remember') ? 'true' : 'false' }} }">
                                            <label for="remember"
                                                class="flex cursor-pointer items-center text-sm font-medium text-slate-600 select-none dark:text-slate-400">
                                                <div class="relative">
                                                    <input type="checkbox" id="remember" name="remember" class="sr-only"
                                                        @change="checkboxToggle = !checkboxToggle" />
                                                    <div :class="checkboxToggle ? 'border-impetus-orange bg-impetus-orange' :
                                                        'bg-white border-slate-300 dark:border-slate-700'"
                                                        class="mr-3 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px] transition-all duration-200">
                                                        <span :class="checkboxToggle ? 'scale-100' : 'scale-0'" class="transition-transform duration-200">
                                                            <svg width="12" height="12" viewBox="0 0 14 14"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11.6666 3.5L5.24992 9.91667L2.33325 7"
                                                                    stroke="white" stroke-width="2.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                Keep me logged in
                                            </label>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}"
                                                class="text-sm font-semibold text-impetus-orange hover:text-impetus-navy dark:text-orange-400 dark:hover:text-orange-300 transition-colors">
                                                Forgot password?
                                            </a>
                                        @endif
                                    </div>
                                    <div>
                                        <button type="submit"
                                            class="w-full inline-flex items-center justify-center px-6 py-3.5 rounded-xl bg-gradient-to-r from-impetus-orange to-orange-500 text-white font-bold hover:from-orange-600 hover:to-impetus-orange active:scale-[0.98] transition-all duration-300 shadow-lg shadow-orange-500/20 font-outfit text-sm tracking-wide">
                                            Sign In
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="mt-6">
                                <p class="text-center text-sm font-medium text-slate-600 dark:text-slate-400">
                                    Don't have an account?
                                    <a href="{{ route('register') }}"
                                        class="font-bold text-impetus-orange hover:text-impetus-navy dark:text-orange-400 dark:hover:text-orange-300 transition-colors font-outfit">Sign Up</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Graphic Panel -->
            <div class="bg-impetus-teal bg-gradient-to-br from-[#115e59] via-[#0f766e] to-[#14b8a6] relative hidden h-full w-full items-center justify-center lg:flex lg:w-1/2 overflow-hidden select-none">
                <!-- Glowing Blurs -->
                <div class="absolute -top-1/4 -right-1/4 w-96 h-96 bg-teal-300/20 rounded-full blur-[120px] pointer-events-none"></div>
                <div class="absolute -bottom-1/4 -left-1/4 w-96 h-96 bg-cyan-600/20 rounded-full blur-[120px] pointer-events-none"></div>

                <div class="relative z-10 w-full max-w-sm p-10 bg-white/10 backdrop-blur-xl border border-white/20 rounded-[2.5rem] shadow-2xl flex flex-col items-center text-center">
                    <!-- Soft glow behind the logo -->
                    <div class="absolute inset-0 bg-radial-gradient from-white/10 to-transparent blur-3xl -z-10"></div>
                    
                    <!-- Elegant Logo backdrop -->
                    <div class="mb-8 p-6 bg-white/95 rounded-3xl shadow-xl shadow-teal-950/20 inline-flex items-center justify-center hover:scale-105 transition-transform duration-300">
                        <img src="{{ asset('Impetus-logo.png') }}" alt="Logo" class="h-10 w-auto object-contain" />
                    </div>
                    
                    <h2 class="text-2xl font-extrabold !text-white tracking-tight font-outfit mb-3">
                        IHS Clinical Learning
                    </h2>
                    <p class="text-sm text-teal-50 leading-relaxed max-w-[280px] font-outfit">
                        Empowering healthcare professionals through state-of-the-art CNE modules and interactive training.
                    </p>
                    
                    <div class="mt-8 flex gap-2 items-center justify-center text-white/90 text-[11px] uppercase tracking-widest font-outfit">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span>Secure Learning Gateway</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
