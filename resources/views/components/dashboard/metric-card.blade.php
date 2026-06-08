@props(['title', 'value', 'icon', 'color' => 'brand'])

@php
    $colorClasses = [
        'brand' => 'bg-gradient-to-tr from-orange-500 to-amber-500 text-white shadow-lg shadow-orange-500/25',
        'success' => 'bg-gradient-to-tr from-emerald-500 to-teal-600 text-white shadow-lg shadow-emerald-500/25',
        'error' => 'bg-gradient-to-tr from-red-500 to-rose-500 text-white shadow-lg shadow-red-500/25',
        'indigo' => 'bg-gradient-to-tr from-brand-600 to-brand-500 text-white shadow-lg shadow-brand-500/25',
        'blue' => 'bg-gradient-to-tr from-brand-700 to-brand-500 text-white shadow-lg shadow-brand-500/25',
        'orange' => 'bg-gradient-to-tr from-amber-500 to-orange-500 text-white shadow-lg shadow-orange-500/25',
        'purple' => 'bg-gradient-to-tr from-orange-400 to-orange-600 text-white shadow-lg shadow-orange-500/25',
    ][$color] ?? 'bg-gradient-to-tr from-brand-600 to-brand-500 text-white shadow-lg shadow-brand-500/25';

    $iconPaths = [
        'users' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
        'check-circle' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
        'x-circle' => 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z',
        'shield-check' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-7.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
        'user-group' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
        'academic-cap' => 'M12 14l9-5-9-5-9 5 9 5z M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z',
        'headset' => 'M18 10a6 6 0 10-12 0v8a4 4 0 014 4H14a4 4 0 014-4v-8z M14 4h.01M16 8h.01',
        'book-open' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
        'tag' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z',
        'document-duplicate' => 'M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2',
        'question-mark-circle' => 'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
        'clipboard-list' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01',
        'lightning-bolt' => 'M13 10V3L4 14h7v7l9-11h-7z',
        'badge-check' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z',
        'chart-bar' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
    ];

    $subtitles = [
        'Total Courses' => 'CNE Curriculum Catalog',
        'Active Courses' => 'Active & Available Modules',
        'Learning Materials' => 'Documents, PDFs & Multimedia',
        'Total Questions' => 'Assessment Question Pool',
        'Total Users' => 'Registered Portal Members',
        'Active Users' => 'Actively Learning/Certifying',
        'Pretest' => 'Pre-assessment attempts',
        'Mock Test' => 'Mock examination attempts',
        'Final Test' => 'Final certification attempts',
        'Total Attempts' => 'Pre, mock & final combined',
    ][$title] ?? 'System Metric';
@endphp

<div class="rounded-2xl border border-slate-200 bg-white p-3 sm:p-4 shadow-sm hover:shadow-md transition-all duration-200 flex items-center gap-2.5 sm:gap-3 relative overflow-hidden group">
    <!-- Hover graphic background decoration -->
    <div class="absolute -right-8 -bottom-8 w-24 h-24 bg-gradient-to-br from-slate-50 to-transparent rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>

    <div class="flex-shrink-0 flex items-center justify-center w-12 h-12 rounded-xl {{ $colorClasses }} transition-transform duration-300 group-hover:scale-105 relative z-10">
        <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="{{ $iconPaths[$icon] ?? '' }}"></path>
        </svg>
    </div>

    <div class="min-w-0 relative z-10">
        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider font-outfit block truncate">{{ $title }}</span>
        <h4 class="mt-0.5 font-extrabold text-slate-800 text-lg sm:text-xl tracking-tight font-outfit leading-none">
            {{ number_format($value) }}
        </h4>
        <span class="text-[10px] text-slate-500 font-medium block mt-0.5 font-outfit truncate" title="{{ $subtitles }}">{{ $subtitles }}</span>
    </div>
</div>
