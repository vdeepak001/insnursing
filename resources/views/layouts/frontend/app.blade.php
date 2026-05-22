<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('IEB_original_logo.png') }}">
    <title>@yield('title', 'Compassionate Care Nursing') | {{ config('app.name', 'IHS Nursing') }}</title>

    <!-- Premium Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    @else
        @livewireStyles
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
        <style>
            @theme {
                --font-sans: 'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif;
                --font-outfit: 'Outfit', sans-serif;
                --color-impetus-orange: #F36E21;
                --color-impetus-green: #0B8444;
                --color-impetus-navy: #1D2A57;
                --color-impetus-gray: #718096;
                --color-impetus-lightGreen: #EBF7F0;
                --color-impetus-lightOrange: #FFF3EC;
                --color-impetus-dark: #0B0F19;
                
                --animate-pulse-slow: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
                --animate-float: float 6s ease-in-out infinite;
                --animate-float-delayed: float 6s ease-in-out infinite 3.0s;
            }
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
            }
            body {
                font-family: var(--font-sans);
                background-image: radial-gradient(#F36E2110 1px, transparent 1px);
                background-size: 40px 40px;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
            h1, h2, h3, .font-serif { font-family: var(--font-outfit); }
            h2 { color: var(--color-impetus-orange); }

            .gradient-text-orange-green {
                background: linear-gradient(135deg, #F36E21 0%, #0B8444 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            .gradient-bg-hero {
                background: radial-gradient(circle at 10% 20%, rgba(243, 110, 33, 0.05) 0%, transparent 40%),
                            radial-gradient(circle at 90% 80%, rgba(11, 132, 68, 0.05) 0%, transparent 40%);
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
                box-shadow: 0 10px 30px -5px rgba(243, 110, 33, 0.3);
            }
            .glow-green:hover {
                box-shadow: 0 10px 30px -5px rgba(11, 132, 68, 0.3);
            }
        </style>
        <script>
            document.addEventListener('contextmenu', (e) => e.preventDefault());
            document.addEventListener('copy', (e) => e.preventDefault());
            document.addEventListener('keydown', (e) => {
                if (e.ctrlKey && (e.key === 'c' || e.key === 'C' || e.key === 'u' || e.key === 'U' || e.key === 's' || e.key === 'S')) e.preventDefault();
                if (e.key === 'F12') e.preventDefault();
            });
        </script>
    @endif

    {{-- Alpine is bundled with @livewireScripts (Livewire 4). Extra CDN Alpine breaks wire:click / wire:model on Livewire components. --}}
    @stack('styles')
</head>
<body class="antialiased bg-slate-50 text-slate-800">
    @include('welcome.partials.header')
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
