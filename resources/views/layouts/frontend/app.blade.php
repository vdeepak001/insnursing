<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('Impetus-logo.png') }}">
    <title>@yield('title', 'Compassionate Care Nursing') | {{ config('app.name', 'IHS Nursing') }}</title>

    <!-- Premium Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    @else
        @livewireStyles
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
        <style>
            @theme {
                --font-sans: Inter, ui-sans-serif, system-ui, sans-serif;
                --font-outfit: Poppins, sans-serif;
                --color-impetus-orange: #FF7A00;
                --color-impetus-green: #0F766E;
                --color-impetus-teal: #0F766E;
                --color-impetus-light-teal: #ccfbf1;
                --color-impetus-teal-muted: #eef6f6;
                --color-impetus-navy: #1e3a5f;
                --color-impetus-gray: #6b7280;
                --color-impetus-lightGreen: #eef6f6;
                --color-impetus-lightOrange: #fff6e9;
                --color-impetus-dark: #0f172a;
                --color-impetus-heading: #1e3a5f;
                --color-impetus-body: #1f2937;

                --animate-pulse-slow: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
                --animate-float: float 6s ease-in-out infinite;
                --animate-float-delayed: float 6s ease-in-out infinite 3.0s;
            }

            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-10px);
                }
            }

            body {
                font-family: var(--font-sans);
                background-image: radial-gradient(#ff7a0010 1px, transparent 1px);
                background-size: 40px 40px;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            h1,
            h2,
            h3,
            .font-serif {
                font-family: var(--font-outfit);
            }

            h2 {
                color: var(--color-impetus-heading);
            }

            .gradient-text-orange-green,
            .gradient-text-orange-teal {
                background: linear-gradient(135deg, #FF7A00 0%, #0F766E 100%);
                -webkit-background-clip: text;
                background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            .gradient-bg-hero {
                background: radial-gradient(circle at 10% 20%, rgba(255, 122, 0, 0.05) 0%, transparent 40%),
                    radial-gradient(circle at 90% 80%, rgba(15, 118, 110, 0.05) 0%, transparent 40%);
            }

            .glass-card {
                background: rgba(255, 255, 255, 0.45);
                backdrop-filter: blur(12px);
                border: 1px solid rgba(255, 255, 255, 0.35);
            }

            .glass-card-dark {
                background: rgba(15, 23, 42, 0.6);
                backdrop-filter: blur(12px);
                border: 1px solid rgba(255, 255, 255, 0.08);
            }

            .custom-shadow {
                box-shadow: 0 20px 40px -15px rgba(29, 42, 87, 0.08);
            }

            .glow-orange:hover {
                box-shadow: 0 10px 30px -5px rgba(255, 122, 0, 0.3);
            }

            .glow-green:hover,
            .glow-teal:hover {
                box-shadow: 0 10px 30px -5px rgba(15, 118, 110, 0.3);
            }
        </style>
        <script>
            document.addEventListener('contextmenu', (e) => e.preventDefault());
            document.addEventListener('copy', (e) => e.preventDefault());
            document.addEventListener('keydown', (e) => {
                if (e.ctrlKey && (e.key === 'c' || e.key === 'C' || e.key === 'u' || e.key === 'U' || e.key === 's' || e
                        .key === 'S')) e.preventDefault();
                if (e.key === 'F12') e.preventDefault();
            });
        </script>
    @endif

    {{-- Alpine is bundled with @livewireScripts (Livewire 4). Extra CDN Alpine breaks wire:click / wire:model on Livewire components. --}}
    @stack('styles')
</head>

<body class="antialiased bg-slate-50 text-slate-800">
    @include('welcome.partials.header')
    @include('welcome.partials.contact-modal')
    @guest
        @if (Route::has('login'))
            @include('welcome.partials.login-modal')
            @include('welcome.partials.register-modal')
        @endif
    @endguest
    @yield('content')
    @include('welcome.partials.footer')
    <x-ui.toaster />
    @livewireScripts
    @stack('scripts')
</body>

</html>
