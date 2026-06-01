@extends('layouts.app')

@section('content')
    <!-- Administrative Welcome Card -->
    <div class="relative overflow-hidden rounded-[2.5rem] bg-gradient-to-r from-impetus-navy to-[#111936] p-8 sm:p-10 text-white shadow-xl mb-10 border border-slate-800">
        <!-- Decorative glows -->
        <div class="absolute right-0 bottom-0 translate-x-12 translate-y-12 w-80 h-80 bg-impetus-orange/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute top-0 left-1/4 -translate-y-12 w-64 h-64 bg-sky-500/10 rounded-full blur-3xl pointer-events-none"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div>
                <span class="text-xs font-bold text-impetus-orange uppercase tracking-widest font-outfit mb-2 block">System Administration</span>
                <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight font-outfit mb-3">
                    Welcome back, {{ auth()->user()->name }}!
                </h1>
                <p class="text-sm sm:text-base text-slate-300 max-w-2xl leading-relaxed">
                    Here is a quick overview of your IHS Nursing Continuing Education platform metrics. Manage courses, monitor learning assets, and track active users.
                </p>
            </div>
            <div class="shrink-0 bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 flex gap-4 items-center">
                <span class="w-3 h-3 rounded-full bg-emerald-500 animate-pulse"></span>
                <div class="text-left">
                    <div class="text-xs font-bold uppercase tracking-wider text-slate-300 font-outfit">Platform Status</div>
                    <div class="text-sm font-extrabold text-white font-outfit">Fully Operational</div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-xl font-bold text-impetus-navy font-outfit">Platform Metrics</h2>
            <p class="text-xs text-slate-500 mt-0.5">Real-time statistics across all course modules and users.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 md:gap-6">
        @if(auth()->user()->role_type !== 'support')
        <!-- Total Courses -->
        <x-dashboard.metric-card 
            title="Total Courses" 
            value="{{ $stats['total_courses'] }}" 
            icon="book-open"
            color="brand"
        />

        <!-- Active Courses -->
        <x-dashboard.metric-card 
            title="Active Courses" 
            value="{{ $stats['active_courses'] }}" 
            icon="tag"
            color="indigo"
        />

        <!-- Title Materials -->
        <x-dashboard.metric-card 
            title="Learning Materials" 
            value="{{ $stats['total_materials'] }}" 
            icon="document-duplicate"
            color="blue"
        />

        <!-- Course Questions -->
        <x-dashboard.metric-card 
            title="Total Questions" 
            value="{{ $stats['total_questions'] }}" 
            icon="question-mark-circle"
            color="orange"
        />
        @endif

        <!-- Total Users -->
        <x-dashboard.metric-card 
            title="Total Users" 
            value="{{ $stats['total_users'] }}" 
            icon="users"
            color="purple"
        />

        <!-- Active Users -->
        <x-dashboard.metric-card 
            title="Active Users" 
            value="{{ $stats['active_users'] }}" 
            icon="check-circle"
            color="success"
        />
    </div>
@endsection
