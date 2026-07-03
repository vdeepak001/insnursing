@extends('layouts.frontend.app')

@section('title', $course->couse_name ?? 'Module')

@section('content')
    @php
        $title = $course->couse_name ?? 'Module';
        $imgUrl = $course->attachmentPublicUrl();
        $isImage = $course->attachmentIsImage();
        $buyUrl = $course->course_url
            ? (\Illuminate\Support\Str::isUrl($course->course_url)
                ? $course->course_url
                : url($course->course_url))
            : null;
        $isPurchased = $isPurchased ?? false;
        $hasCourseMaterials = $hasCourseMaterials ?? false;

        $tp = $courseTestProgress ?? [];
        $preDone = $tp['pre_done'] ?? false;
        $mockDone = $tp['mock_done'] ?? false;
        $finalDone = $tp['final_done'] ?? false;

        $canViewLearningMaterials =
            auth()->check() && auth()->user()?->role_type === 'user' && $isPurchased && $preDone;

        $creditPoints = 'N/A';
        if (isset($course->stateCouncils) && $course->stateCouncils->count() > 0) {
            $rawPoints = $course->stateCouncils->first()->pivot->points;
            if (is_array($rawPoints)) {
                $creditPoints = array_sum($rawPoints);
            } else {
                $creditPoints = $rawPoints;
            }
            $creditPoints = !empty($creditPoints) ? $creditPoints : 'N/A';
        }
    @endphp

    <main class="pb-16" x-data="{
        practiceGateOpen: false,
        scoreCardOpen: false,
        scoreCardData: {
            title: '',
            score: 0,
            correct: 0,
            wrong: 0,
            total: 0,
            duration: '—',
            l1: '0/0',
            l2: '0/0',
            l3: '0/0',
            obtained: 0,
            max: 0
        },
        init() {
            this.$watch('practiceGateOpen', value => {
                document.body.style.overflow = value ? 'hidden' : '';
            });
            this.$watch('scoreCardOpen', value => {
                document.body.style.overflow = value ? 'hidden' : '';
            });
        },
    }" @keydown.escape.window="practiceGateOpen = false; scoreCardOpen = false">

        {{-- Hero + overview (aligned with Practice Test / site theme) --}}
        <section class="relative overflow-hidden border-b border-impetus-teal/10 bg-impetus-teal-muted/30 py-14 sm:py-16">
            <div class="pointer-events-none absolute -right-24 -top-24 h-72 w-72 rounded-full bg-impetus-teal/10 blur-3xl">
            </div>
            <div
                class="pointer-events-none absolute -bottom-16 -left-16 h-56 w-56 rounded-full bg-impetus-orange/10 blur-3xl">
            </div>
            <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
                <div class="flex flex-col gap-8 lg:flex-row lg:items-start lg:justify-between">
                    <div class="min-w-0 flex-1">
                        <a href="{{ route('cne.modules') }}"
                            class="inline-flex items-center gap-2 rounded-full border border-impetus-teal/20 bg-white px-3 py-1.5 text-xs font-semibold uppercase tracking-wide text-slate-600 shadow-sm transition hover:border-impetus-teal hover:text-impetus-teal focus:outline-none focus-visible:ring-2 focus-visible:ring-impetus-teal focus-visible:ring-offset-2">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                            Back to List
                        </a>

                        <h1 class="mt-5 text-3xl font-extrabold tracking-tight text-impetus-teal sm:text-4xl font-outfit">
                            {{ $title }}
                        </h1>

                    </div>
                    @php
                        $buyButtonClass =
                            'inline-flex shrink-0 items-center justify-center rounded-xl bg-impetus-orange px-8 py-3.5 text-sm font-bold uppercase tracking-wide text-white shadow-lg shadow-impetus-orange/25 transition hover:bg-impetus-orange-hover focus:outline-none focus-visible:ring-2 focus-visible:ring-impetus-orange focus-visible:ring-offset-2';
                        $purchasedButtonClass =
                            'inline-flex shrink-0 items-center justify-center rounded-xl bg-impetus-teal px-8 py-3.5 text-sm font-bold uppercase tracking-wide text-white shadow-lg shadow-impetus-teal/25 ring-2 ring-impetus-teal/40 focus:outline-none focus-visible:ring-2 focus-visible:ring-impetus-teal focus-visible:ring-offset-2';
                    @endphp
                    <div class="shrink-0">
                        @if (Auth::check())
                            @if (auth()->user()?->role_type === 'user')
                                @if ($isPurchased)
                                    <div class="flex flex-wrap items-center justify-end gap-3">
                                        @php
                                            $canPre = (bool) $tp;
                                            $canMock = $tp && $preDone;
                                            $canFinal = $tp && $mockDone;

                                            $nextTest = null;
                                            if ($tp) {
                                                if (!$preDone) {
                                                    $nextTest = 'pre';
                                                } elseif (!$mockDone) {
                                                    $nextTest = 'mock';
                                                } elseif (!$finalDone) {
                                                    $nextTest = 'final';
                                                }
                                            }

                                            $btnActive =
                                                'ring-2 ring-offset-2 ring-[#0F776E] ring-offset-white shadow-md';

                                            $preClass = 'btn-pretest' . ($nextTest === 'pre' ? ' ' . $btnActive : '');
                                            $mockClass =
                                                'btn-mock-test' .
                                                ($nextTest === 'mock'
                                                    ? ' ring-2 ring-offset-2 ring-[#0F766E] ring-offset-white shadow-md'
                                                    : '');
                                            $finalClass =
                                                'btn-final-test' .
                                                ($nextTest === 'final'
                                                    ? ' ring-2 ring-offset-2 ring-[#F97316] ring-offset-white shadow-md'
                                                    : '');

                                            $preDoneClass = 'btn-test-completed';
                                            $mockDoneClass = 'btn-mock-test';
                                            $finalDoneClass = 'btn-final-test';

                                            $preLockedClass = 'btn-pretest-locked';
                                            $mockLockedClass = 'btn-mock-test-locked';
                                            $finalLockedClass = 'btn-final-test-locked';
                                        @endphp

                                        {{-- Pre Test --}}
                                        @if ($preDone)
                                            <button type="button"
                                                @click="scoreCardOpen = true; scoreCardData = {
                                                    title: 'Pretest Result',
                                                    score: '{{ number_format((float) $tp['pre_score'], 1) }}',
                                                    correct: '{{ $tp['pre_correct'] }}',
                                                    wrong: '{{ $tp['pre_wrong'] }}',
                                                    total: '{{ $tp['pre_total'] }}',
                                                    duration: '{{ $tp['pre_duration'] }}',
                                                    l1: '{{ $tp['pre_l1'] }}',
                                                    l2: '{{ $tp['pre_l2'] }}',
                                                    l3: '{{ $tp['pre_l3'] }}',
                                                    obtained: '{{ $tp['pre_obtained'] }}',
                                                    max: '{{ $tp['pre_max'] }}'
                                                }"
                                                class="{{ $preDoneClass }}">
                                                Pretest
                                                <svg class="h-5 w-5 shrink-0 text-[#0F776E]" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="3" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M4.5 12.75l6 6 9-13.5" />
                                                </svg>
                                            </button>
                                        @elseif ($canPre)
                                            <livewire:cne.pretest-otp-button :course="$course" :btn-class="$preClass" />
                                        @else
                                            <span class="{{ $preLockedClass }}"
                                                title="Tests are unavailable">Pretest</span>
                                        @endif

                                        {{-- Mock Test --}}
                                        @if ($mockDone)
                                            <button type="button"
                                                @click="scoreCardOpen = true; scoreCardData = {
                                                    title: 'Mock Test Result',
                                                    score: '{{ number_format((float) $tp['mock_score'], 1) }}',
                                                    correct: '{{ $tp['mock_correct'] }}',
                                                    wrong: '{{ $tp['mock_wrong'] }}',
                                                    total: '{{ $tp['mock_total'] }}',
                                                    duration: '{{ $tp['mock_duration'] }}',
                                                    l1: '{{ $tp['mock_l1'] }}',
                                                    l2: '{{ $tp['mock_l2'] }}',
                                                    l3: '{{ $tp['mock_l3'] }}',
                                                    obtained: '{{ $tp['mock_obtained'] }}',
                                                    max: '{{ $tp['mock_max'] }}'
                                                }"
                                                class="{{ $mockDoneClass }}">
                                                Mock Test
                                                <svg class="h-5 w-5 shrink-0 text-white" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="3" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M4.5 12.75l6 6 9-13.5" />
                                                </svg>
                                            </button>
                                        @elseif ($canMock)
                                            <livewire:cne.pretest-otp-button :course="$course" :btn-class="$mockClass"
                                                :test-type="'mock'" :btn-label="'Mock Test'" />
                                        @else
                                            <span class="{{ $mockLockedClass }}" title="Complete the pre test first">Mock
                                                Test</span>
                                        @endif

                                        {{-- Final Test --}}
                                        @if ($finalDone && (($tp['final_passed'] ?? false) || ($tp['final_attempt_count'] ?? 0) >= 2))
                                            <button type="button"
                                                @click="scoreCardOpen = true; scoreCardData = {
                                                    title: 'Final Test Result',
                                                    score: '{{ number_format((float) $tp['final_score'], 1) }}',
                                                    correct: '{{ $tp['final_correct'] }}',
                                                    wrong: '{{ $tp['final_wrong'] }}',
                                                    total: '{{ $tp['final_total'] }}',
                                                    duration: '{{ $tp['final_duration'] }}',
                                                    l1: '{{ $tp['final_l1'] }}',
                                                    l2: '{{ $tp['final_l2'] }}',
                                                    l3: '{{ $tp['final_l3'] }}',
                                                    obtained: '{{ $tp['final_obtained'] }}',
                                                    max: '{{ $tp['final_max'] }}'
                                                }"
                                                class="{{ $finalDoneClass }}">
                                                Final Test
                                                @if (! ($tp['final_passed'] ?? false))
                                                    <span class="text-[10px] font-bold uppercase">(Failed)</span>
                                                @endif
                                                <svg class="h-5 w-5 shrink-0 text-white" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="3" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M4.5 12.75l6 6 9-13.5" />
                                                </svg>
                                            </button>
                                        @elseif ($canFinal)
                                            <livewire:cne.pretest-otp-button :course="$course" :btn-class="$finalClass"
                                                :test-type="'final'" :btn-label="$finalDone
                                                    ? 'Retake Final Test (' .
                                                        number_format((float) $tp['final_score'], 1) .
                                                        '%)'
                                                    : 'Final Test'" />
                                        @else
                                            <span class="{{ $finalLockedClass }}"
                                                title="Complete the mock test first">Final Test</span>
                                        @endif
                                    </div>
                                @else
                                    <form method="POST" action="{{ route('cart.items.store', $course->couse_name) }}">
                                        @csrf
                                        <button type="submit" class="{{ $buyButtonClass }}">
                                            Buy now
                                        </button>
                                    </form>
                                @endif
                            @elseif ($buyUrl)
                                <a href="{{ $buyUrl }}" target="_blank" rel="noopener noreferrer"
                                    class="{{ $buyButtonClass }}">
                                    Buy now
                                </a>
                            @else
                                <button type="button" disabled class="{{ $buyButtonClass }} cursor-not-allowed opacity-90"
                                    title="Purchase link is not set for this module in the admin yet.">
                                    Buy now
                                </button>
                            @endif
                        @else
                            @if (Route::has('login'))
                                <button type="button" @click="$dispatch('open-login-modal')"
                                    class="{{ $buyButtonClass }}">
                                    Buy now
                                </button>
                            @elseif ($buyUrl)
                                <a href="{{ $buyUrl }}" target="_blank" rel="noopener noreferrer"
                                    class="{{ $buyButtonClass }}">
                                    Buy now
                                </a>
                            @else
                                <button type="button" disabled class="{{ $buyButtonClass }} cursor-not-allowed opacity-90"
                                    title="Purchase link is not set for this module.">
                                    Buy now
                                </button>
                            @endif
                        @endif
                        @auth
                            @if (auth()->user()?->role_type === 'user')
                                <div class="mt-4 flex justify-end">
                                    <div class="text-sm font-bold uppercase tracking-wider text-impetus-orange">
                                        CREDIT POINTS: {{ $creditPoints }}
                                    </div>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>

                <div class="mt-4 grid items-start gap-10 lg:grid-cols-2 lg:gap-12 xl:gap-16">
                    <div class="order-2 min-w-0 lg:order-1">
                        <h2 class="text-2xl font-extrabold tracking-tight text-impetus-teal font-outfit sm:text-3xl">
                            What you will learn in {{ $title }}?
                        </h2>
                        @if (filled($course->description))
                            <div class="mt-6 text-lg leading-8 text-slate-600 text-justify">
                                {!! nl2br(e($course->description)) !!}
                            </div>
                        @else
                            <p class="mt-6 text-lg leading-8 text-slate-500 text-justify">Details for this module will be
                                available soon.</p>
                        @endif
                    </div>
                    <div class="relative order-1 w-full min-w-0 lg:order-2">
                        <div class="relative">
                            <div
                                class="pointer-events-none absolute -inset-3 rounded-[2rem] bg-gradient-to-tr from-impetus-teal/15 via-transparent to-impetus-orange/15 blur-2xl">
                            </div>
                            <div
                                class="relative overflow-hidden rounded-3xl border border-slate-200/70 bg-white shadow-xl shadow-slate-300/30 ring-1 ring-slate-200/40">
                                @if ($imgUrl && $isImage)
                                    <img src="{{ $imgUrl }}" alt="{{ $title }}"
                                        class="aspect-[4/3] w-full object-cover sm:aspect-[5/4] lg:min-h-[280px]"
                                        loading="eager">
                                @elseif ($imgUrl)
                                    <div
                                        class="flex flex-col items-center justify-center gap-4 bg-slate-50 px-8 py-16 text-center">
                                        <span
                                            class="rounded-full bg-white px-4 py-2 text-sm font-semibold text-impetus-teal shadow-sm ring-1 ring-impetus-teal/20">Document</span>
                                        <a href="{{ $imgUrl }}"
                                            class="font-medium text-impetus-teal underline decoration-impetus-teal/30 underline-offset-2 hover:text-impetus-orange"
                                            target="_blank" rel="noopener noreferrer">
                                            Open attachment
                                        </a>
                                    </div>
                                @else
                                    <div
                                        class="flex aspect-[4/3] flex-col items-center justify-center bg-impetus-teal-muted/40 text-slate-400">
                                        <svg class="mb-3 h-12 w-12 text-impetus-teal/40" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3A1.5 1.5 0 001.5 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008H12V8.25z" />
                                        </svg>
                                        <span class="text-sm font-medium">No image uploaded</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Learning resources + learning materials link --}}
        @if (filled($course->qa_content) || $hasCourseMaterials)
            <section class="relative z-10 -mt-px border-t border-impetus-teal/10 bg-impetus-teal-muted/20 py-16 sm:py-16">
                <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="grid gap-10 lg:grid-cols-[3fr_2fr] lg:items-stretch lg:gap-12 xl:gap-16">
                        {{-- Left Column: Content (60%) --}}
                        <div class="flex min-w-0 flex-col">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                                <h2
                                    class="shrink-0 text-2xl font-extrabold tracking-tight text-impetus-teal font-outfit sm:text-3xl lg:whitespace-nowrap">
                                    Learning Resources
                                </h2>
                                @if ($isPurchased)
                                    @if ($preDone)
                                        <a href="{{ route('cne.modules.materials', $course->couse_name) }}"
                                            class="group relative inline-flex overflow-hidden rounded-xl bg-impetus-orange px-8 py-3.5 text-center text-white shadow-lg shadow-impetus-orange/20 transition hover:bg-impetus-orange-hover focus:outline-none focus-visible:ring-2 focus-visible:ring-impetus-orange active:translate-y-0">
                                            <div class="relative flex items-center gap-4">
                                                <span
                                                    class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-white/30 bg-white/10 shadow-inner">
                                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                                    </svg>
                                                </span>
                                                <span class="text-sm font-bold uppercase tracking-wider">Learning
                                                    Resources</span>
                                                <svg class="h-4 w-4 transition group-hover:translate-x-1" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                                </svg>
                                            </div>
                                        </a>
                                    @else
                                        <div class="flex flex-col items-end gap-1.5">
                                            <span
                                                class="group relative inline-flex overflow-hidden rounded-xl border border-slate-200 bg-slate-100 px-8 py-3.5 text-center text-slate-400 cursor-not-allowed opacity-75">
                                                <div class="relative flex items-center gap-4">
                                                    <span
                                                        class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-slate-300 bg-slate-200 shadow-inner">
                                                        <svg class="h-5 w-5 text-slate-400" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                                        </svg>
                                                    </span>
                                                    <span class="text-sm font-bold uppercase tracking-wider">Learning
                                                        Resources (Locked)</span>
                                                </div>
                                            </span>
                                            <span
                                                class="text-xs font-semibold tracking-wide text-impetus-orange bg-impetus-lightOrange border border-impetus-orange/20 rounded-lg px-2.5 py-1">⚠️
                                                Complete the Pre-test first to unlock your Learning Resources.</span>
                                        </div>
                                    @endif
                                @endif
                            </div>

                            @if (filled($course->qa_content))
                                <div class="mt-4 text-lg leading-8 text-slate-600 text-justify">
                                    {!! nl2br(e($course->qa_content)) !!}
                                </div>
                            @endif

                        </div>

                        {{-- Right Column: Visual (40%) --}}
                        <div class="relative flex w-full min-w-0">
                            <div class="relative flex flex-1 flex-col">
                                <div
                                    class="pointer-events-none absolute -inset-3 rounded-[2rem] bg-gradient-to-tr from-impetus-teal/15 via-transparent to-impetus-orange/15 blur-2xl">
                                </div>
                                <div
                                    class="relative flex flex-1 overflow-hidden rounded-3xl border border-slate-200/70 bg-white shadow-xl shadow-slate-300/30 ring-1 ring-slate-200/40">
                                    <img src="{{ asset('research_development.jpeg') }}" alt="Learning Illustration"
                                        class="h-full min-h-[240px] w-full object-cover sm:min-h-[280px] lg:min-h-0"
                                        loading="lazy">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        {{-- Practice test --}}
        @if (filled($course->practice_content))
            <section class="border-t border-impetus-teal/10 bg-white py-16 sm:py-16">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="grid gap-10 lg:grid-cols-[2fr_3fr] lg:items-stretch lg:gap-12 xl:gap-16">
                        {{-- Left Column: Visual (40%) --}}
                        <div class="relative flex w-full min-w-0">
                            <div class="relative flex flex-1 flex-col">
                                <div
                                    class="pointer-events-none absolute -inset-3 rounded-[2rem] bg-gradient-to-br from-impetus-teal/15 via-transparent to-impetus-orange/15 blur-2xl">
                                </div>
                                <div
                                    class="relative flex flex-1 overflow-hidden rounded-3xl border border-slate-200/70 bg-slate-100 shadow-xl shadow-slate-300/35 ring-1 ring-slate-200/50">
                                    <img src="{{ asset('Practice_test_banner.png') }}"
                                        alt="Practice assessment and multiple-choice review"
                                        class="h-full min-h-[240px] w-full object-cover sm:min-h-[280px] lg:min-h-0"
                                        width="1400" height="933" loading="lazy" decoding="async">
                                </div>
                            </div>
                        </div>

                        {{-- Right Column: Content (60%) --}}
                        <div class="flex min-w-0 flex-col">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                                <h2 class="shrink-0 text-2xl font-extrabold tracking-tight text-impetus-teal sm:text-3xl font-outfit">
                                    Practice Test
                                </h2>
                                @auth
                                    @if (auth()->user()?->role_type === 'user' && ($isPurchased ?? false) && $preDone)
                                        <a href="{{ route('cne.modules.test', [$course->couse_name, 'practice']) }}"
                                            class="group relative inline-flex overflow-hidden rounded-xl bg-impetus-orange px-8 py-3.5 text-center text-white shadow-lg shadow-impetus-orange/20 transition hover:bg-impetus-orange-hover focus:outline-none focus-visible:ring-2 focus-visible:ring-impetus-orange focus-visible:ring-offset-2">
                                            <div class="relative flex items-center gap-4">
                                                <span
                                                    class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-white/30 bg-white/10 shadow-inner">
                                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125" />
                                                    </svg>
                                                </span>
                                                <span class="text-sm font-bold uppercase tracking-wider">Take Practice Test</span>
                                                <svg class="h-4 w-4 transition group-hover:translate-x-1" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                                </svg>
                                            </div>
                                        </a>
                                    @endif
                                @endauth
                            </div>
                            <div class="mt-4 space-y-4 text-lg leading-8 text-slate-600 text-justify">
                                {!! nl2br(e($course->practice_content)) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        {{-- Score Card Modal --}}
        <div x-show="scoreCardOpen" x-cloak x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-[100] flex items-center justify-center p-4"
            role="dialog" aria-modal="true">
            <div class="absolute inset-0 bg-slate-900/60 transition-opacity" @click="scoreCardOpen = false"></div>

            <div
                class="relative w-full max-w-sm overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-2xl ring-1 ring-slate-900/10">
                <div class="flex items-center justify-between px-4 pt-4 pb-2">
                    <div class="flex items-center gap-2">
                        <div class="flex size-8 items-center justify-center rounded-full bg-[#0F776E] text-white">
                            <svg class="size-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M12 2l2.4 4.86L20 7.64l-4 3.9.94 5.5L12 14.77 7.06 17.04 8 11.54l-4-3.9 5.6-.78L12 2z" />
                            </svg>
                        </div>
                        <h2 class="text-base font-bold text-slate-800 font-outfit">Score Card</h2>
                    </div>
                    <button type="button" @click="scoreCardOpen = false"
                        class="rounded-lg p-1.5 text-slate-400 transition hover:bg-slate-100 hover:text-slate-700"
                        aria-label="Close score card">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="px-4 pb-4">
                    <div class="text-center">
                        <p class="text-sm font-bold text-slate-800 font-outfit">{{ $course->couse_name }}</p>
                        <p class="mt-0.5 text-[10px] font-bold uppercase tracking-[0.14em] text-[#0F776E]"
                            x-text="scoreCardData.title"></p>
                    </div>

                    <div class="my-3 flex items-center gap-2" aria-hidden="true">
                        <div class="h-px flex-1 bg-slate-200"></div>
                        <div class="size-1 rounded-full bg-slate-300"></div>
                        <div class="h-px flex-1 bg-slate-200"></div>
                    </div>

                    <div class="grid grid-cols-2 gap-2">
                        <div class="flex items-center gap-2 rounded-xl bg-[#0F776E] px-2.5 py-2 text-white shadow-sm">
                            <div class="flex size-7 shrink-0 items-center justify-center rounded-lg bg-white/15">
                                <svg class="size-3.5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path d="M7 4V2h10v2h3a1 1 0 0 1 1 1v2a5 5 0 0 1-4.1 4.9A5.5 5.5 0 0 1 13 16.9V19h3v2H8v-2h3v-2.1A5.5 5.5 0 0 1 7.1 11.9 5 5 0 0 1 3 7V5a1 1 0 0 1 1-1h3zm0 2H5v1a3 3 0 0 0 3 3V6H7zm10 0h-2v4a3 3 0 0 0 3-3V6h-1z" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-[9px] font-bold uppercase tracking-wider text-white/80">Score</p>
                                <p class="truncate text-sm font-bold font-outfit leading-tight"
                                    x-text="scoreCardData.obtained + '/' + scoreCardData.max"></p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2 rounded-xl bg-impetus-orange px-2.5 py-2 text-white shadow-sm">
                            <div class="flex size-7 shrink-0 items-center justify-center rounded-lg bg-white/15">
                                <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-[9px] font-bold uppercase tracking-wider text-white/80">Percentage</p>
                                <p class="truncate text-sm font-bold font-outfit leading-tight"
                                    x-text="scoreCardData.max > 0 ? Math.round((scoreCardData.obtained / scoreCardData.max) * 100) + '%' : '0%'"></p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-2.5 py-2 shadow-sm">
                            <div class="flex size-7 shrink-0 items-center justify-center rounded-lg bg-[#0F776E]/10 text-[#0F776E]">
                                <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-[9px] font-bold uppercase tracking-wider text-slate-500">Questions</p>
                                <p class="truncate text-sm font-bold font-outfit leading-tight text-slate-800" x-text="scoreCardData.total"></p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-2.5 py-2 shadow-sm">
                            <div class="flex size-7 shrink-0 items-center justify-center rounded-lg bg-[#0F776E]/10 text-[#0F776E]">
                                <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-[9px] font-bold uppercase tracking-wider text-slate-500">Time Taken</p>
                                <p class="truncate text-sm font-bold font-outfit leading-tight text-slate-800" x-text="scoreCardData.duration"></p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2 rounded-xl border border-green-200 bg-[#F0FDF4] px-2.5 py-2 shadow-sm">
                            <div class="flex size-7 shrink-0 items-center justify-center rounded-full bg-green-500 text-white">
                                <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-[9px] font-bold uppercase tracking-wider text-green-600">Correct Answer</p>
                                <p class="truncate text-sm font-bold font-outfit leading-tight text-green-700" x-text="scoreCardData.correct"></p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2 rounded-xl border border-red-200 bg-[#FEF2F2] px-2.5 py-2 shadow-sm">
                            <div class="flex size-7 shrink-0 items-center justify-center rounded-full bg-red-500 text-white">
                                <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-[9px] font-bold uppercase tracking-wider text-red-600">Incorrect Answer</p>
                                <p class="truncate text-sm font-bold font-outfit leading-tight text-red-700" x-text="scoreCardData.wrong"></p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="button" @click="scoreCardOpen = false"
                            class="flex w-full items-center justify-center gap-1.5 rounded-xl bg-[#0F776E] py-2.5 text-xs font-bold uppercase tracking-wide text-white shadow-md shadow-[#0F776E]/20 transition hover:bg-[#115E59]">
                            <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Gate: practice questions require completed mock test --}}
        <div x-show="practiceGateOpen" x-cloak x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-[70] flex items-center justify-center p-4 sm:p-6"
            role="dialog" aria-modal="true" aria-labelledby="practice-gate-title">
            <div class="absolute inset-0 bg-slate-900/55" @click="practiceGateOpen = false" aria-hidden="true"></div>
            <div class="relative z-10 w-full max-w-md overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-2xl shadow-slate-900/20 ring-1 ring-slate-200/60"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-95 translate-y-2" @click.stop>
                <div class="border-b border-impetus-orange/20 bg-impetus-lightOrange px-6 py-4">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex min-w-0 items-center gap-3">
                            <span
                                class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-impetus-orange/15 text-impetus-orange ring-1 ring-impetus-orange/20">
                                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                            </span>
                            <h3 id="practice-gate-title" class="font-serif text-lg font-bold leading-snug text-slate-900">
                                Complete the mock test first
                            </h3>
                        </div>
                        <button type="button"
                            class="rounded-lg p-1.5 text-slate-400 transition hover:bg-slate-100 hover:text-slate-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-impetus-teal"
                            @click="practiceGateOpen = false" aria-label="Close dialog">
                            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="px-6 py-5">
                    <p class="text-sm leading-relaxed text-slate-600">
                        To open practice questions, you need to <span class="font-semibold text-slate-800">complete the
                            mock test</span> for this module first. After that, you can return here and proceed to practice.
                    </p>
                    <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:justify-end">
                        <button type="button"
                            class="inline-flex w-full items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-slate-400 focus-visible:ring-offset-2 sm:w-auto"
                            @click="practiceGateOpen = false">
                            Close
                        </button>
                        <a href="{{ route('cne.modules.test', [$course->couse_name, 'mock']) }}"
                            class="inline-flex w-full items-center justify-center rounded-xl bg-impetus-orange px-5 py-2.5 text-sm font-bold uppercase tracking-wide text-white shadow-lg shadow-impetus-orange/25 transition hover:bg-impetus-orange-hover focus:outline-none focus-visible:ring-2 focus-visible:ring-impetus-orange focus-visible:ring-offset-2 sm:w-auto"
                            @click="practiceGateOpen = false">
                            Go to mock test
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
    </main>
@endsection
