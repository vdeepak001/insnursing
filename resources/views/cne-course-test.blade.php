@extends('layouts.frontend.app')

@section('title', $title)

@section('content')
    @php
        $testLabel = match ($testType->value) {
            'pre' => 'Pretest',
            'mock' => 'Mock Test',
            'final' => 'Final Test',
            'practice' => 'Practice Test',
            default => 'Test',
        };
    @endphp

    <main class="overflow-hidden bg-white font-sans antialiased text-slate-800">
        <section class="border-b border-impetus-teal/10 bg-impetus-teal-muted/30 py-6 sm:py-8">
            <div class="mx-auto flex max-w-7xl flex-col gap-4 px-6 sm:flex-row sm:items-center sm:justify-between lg:px-8">
                <div>
                    <p class="text-xs font-bold uppercase tracking-widest text-impetus-teal font-outfit">{{ $testLabel }}</p>
                    <h1 class="mt-1 text-xl font-extrabold text-slate-800 sm:text-2xl font-outfit">{{ $course->couse_name }}</h1>
                </div>
                <a href="{{ $testType->value === 'practice' ? route('cne.modules.test', [$course->couse_name, 'practice']) : route('cne.modules.show', $course->couse_name) }}"
                    class="inline-flex items-center gap-2 rounded-full border border-impetus-teal/20 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-wide text-slate-600 shadow-sm transition hover:border-impetus-teal hover:text-impetus-teal">
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                    Back
                </a>
            </div>
        </section>

        <div class="pt-8 sm:pt-10">
            <livewire:frontend.course-test-taking :course-id="$course->id" :test-type="$testType->value" :key="'test-'.$course->id.'-'.$testType->value" />
        </div>
    </main>
@endsection
