@extends('layouts.app')

@section('content')
    <div class="relative overflow-hidden rounded-[2.5rem] border border-slate-200/70 bg-gradient-to-br from-slate-50 via-white to-slate-100/60 p-5 shadow-sm sm:p-6">
        <div class="pointer-events-none absolute -top-20 -left-20 h-56 w-56 rounded-full bg-white/70 blur-3xl"></div>
        <div class="pointer-events-none absolute -right-20 -bottom-20 h-64 w-64 rounded-full bg-impetus-orange/10 blur-3xl"></div>

        <div class="relative z-10">
            <!-- Administrative Welcome Card -->
            <div class="relative mb-10 overflow-hidden rounded-[2.5rem] border border-slate-800 bg-gradient-to-r from-impetus-navy to-[#111936] p-8 text-white shadow-xl sm:p-10">
                <!-- Decorative glows -->
                <div class="pointer-events-none absolute right-0 bottom-0 h-80 w-80 translate-x-12 translate-y-12 rounded-full bg-impetus-orange/15 blur-3xl"></div>
                <div class="pointer-events-none absolute top-0 left-1/4 h-64 w-64 -translate-y-12 rounded-full bg-sky-500/10 blur-3xl"></div>

                <div class="relative z-10 flex flex-col items-start justify-between gap-6 md:flex-row md:items-center">
                    <div>
                        <span class="mb-2 block font-outfit text-xs font-bold tracking-widest text-impetus-orange uppercase">System Administration</span>
                        <h1 class="mb-3 font-outfit text-3xl font-extrabold tracking-tight sm:text-4xl">
                            Welcome back, {{ auth()->user()->name }}!
                        </h1>
                        <p class="max-w-2xl text-sm leading-relaxed text-slate-300 sm:text-base">
                            Here is a quick overview of your IHS Nursing Continuing Education platform metrics. Manage courses, monitor learning assets, and track active users.
                        </p>
                    </div>
                    <div class="flex shrink-0 items-center gap-4 rounded-2xl border border-white/20 bg-white/10 p-4 backdrop-blur-md">
                        <span class="h-3 w-3 animate-pulse rounded-full bg-emerald-500"></span>
                        <div class="text-left">
                            <div class="font-outfit text-xs font-bold tracking-wider text-slate-300 uppercase">Platform Status</div>
                            <div class="font-outfit text-sm font-extrabold text-white">Fully Operational</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h2 class="font-outfit text-xl font-bold text-impetus-navy">Platform Metrics</h2>
                    <p class="mt-0.5 text-xs text-slate-500">Real-time statistics across all course modules and users.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2 md:gap-6 lg:grid-cols-4">
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
        </div>
    </div>
@endsection
