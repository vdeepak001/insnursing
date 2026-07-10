@php
    $wrongCount = max(0, $totalQuestions - $correctCount);
    $pctCorrect = $scorePercent ?? 0.0;
    $pctWrong = round(100 - $pctCorrect, 1);
    $banner = $type->resultBannerLabel();
    $user = auth()->user();
    $firstName = $user?->name ? explode(' ', trim($user->name))[0] : 'Learner';
    $heroImage = asset('images/design/test-result-hero.png');

    $feedbackMessage =
        $pctCorrect >= 70
            ? 'Excellent work! You have demonstrated strong understanding of the module content.'
            : ($pctCorrect >= 50
                ? 'Good effort! Review the topics where you missed questions to strengthen your knowledge.'
                : 'Keep practicing! Review the topics and attempt the test again to improve your score.');
    $canRetakeFinal = $type === \App\Enums\CourseTestType::Final && !($passed ?? false) && $finalAttemptCount < 2;
    $finalAttemptsExhausted =
        $type === \App\Enums\CourseTestType::Final && !($passed ?? false) && $finalAttemptCount >= 2;
    $isPreOrMock = in_array($type, [\App\Enums\CourseTestType::Pre, \App\Enums\CourseTestType::Mock], true);
    $showFeedback =
        !$isPreOrMock &&
        $type !== \App\Enums\CourseTestType::Practice &&
        !($type === \App\Enums\CourseTestType::Final && !($passed ?? false));
    $learningUrl = route('cne.modules.materials', $course->couse_name);
    $moduleUrl = route('cne.modules.show', $course->couse_name);
    $practiceUrl = route('cne.modules.test', [$course->couse_name, 'practice']);
@endphp

<div class="mx-auto max-w-5xl rounded-3xl border border-slate-200 bg-white shadow-2xl ring-1 ring-slate-900/5"
    style="overflow: visible; position: relative;">

    {{-- ══════════════════════════════════════════
         Hero Banner — teal always (no red for failed)
         ══════════════════════════════════════════ --}}
    <div class="relative rounded-t-3xl rounded-b-3xl overflow-hidden"
        style="background-color: #045a5d; min-height: 380px;">

        {{-- Decorative confetti shapes --}}
        <span class="pointer-events-none absolute top-6 left-[38%] w-4 h-4 rounded-sm bg-yellow-400 opacity-80 rotate-12"
            aria-hidden="true"></span>
        <span class="pointer-events-none absolute top-12 left-[42%] w-3 h-3 rounded-full bg-green-400 opacity-70"
            aria-hidden="true"></span>
        <span class="pointer-events-none absolute top-4 left-[55%] w-3 h-5 rounded-sm bg-pink-400 opacity-75 -rotate-6"
            aria-hidden="true"></span>
        <span class="pointer-events-none absolute top-16 left-[60%] w-4 h-3 rounded-sm bg-blue-400 opacity-70 rotate-45"
            aria-hidden="true"></span>
        <span class="pointer-events-none absolute top-8 left-[65%] w-3 h-3 bg-yellow-300 opacity-80 rotate-12"
            aria-hidden="true"
            style="clip-path:polygon(50% 0%,61% 35%,98% 35%,68% 57%,79% 91%,50% 70%,21% 91%,32% 57%,2% 35%,39% 35%)"></span>
        <span
            class="pointer-events-none absolute bottom-8 left-[45%] w-3 h-4 rounded-sm bg-purple-400 opacity-65 rotate-6"
            aria-hidden="true"></span>
        <span
            class="pointer-events-none absolute bottom-4 left-[52%] w-4 h-3 rounded-sm bg-orange-400 opacity-70 -rotate-12"
            aria-hidden="true"></span>
        <span
            class="pointer-events-none absolute top-20 left-[70%] w-2 h-5 rounded-full bg-cyan-300 opacity-60 rotate-45"
            aria-hidden="true"></span>

        {{-- Subtle circle backgrounds --}}
        <div class="pointer-events-none absolute -right-16 -top-16 h-56 w-56 rounded-full bg-white/5"
            aria-hidden="true"></div>
        <div class="pointer-events-none absolute -bottom-10 left-1/4 h-40 w-40 rounded-full bg-white/5"
            aria-hidden="true"></div>

        {{-- Content row —— nurse absolutely right, text + trophy left --}}
        <div class="relative" style="min-height: 300px;">

            {{-- Left: trophy + text, with right padding so text never slides under nurse --}}
            <div class="flex items-center gap-10 sm:gap-14 pl-6 pr-6 py-8 sm:pl-20 sm:pr-10 sm:py-10"
                style="padding-right: 360px; min-height: 300px;">

                {{-- Trophy white box — large, inside banner --}}
                @if ($type === \App\Enums\CourseTestType::Final)
                    <div class="flex shrink-0 items-center justify-center rounded-[2rem] bg-white shadow-xl"
                        style="width: 125px; height: 125px; min-width: 125px;">
                        @if (!($passed ?? false))
                            <svg class="w-14 h-14 text-rose-500" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                            </svg>
                        @else
                            {{-- Badge image replacing trophy --}}
                            <img src="{{ asset('success.png') }}" alt="Success"
                                class="w-[96px] h-[96px] object-contain" />
                        @endif
                    </div>
                @endif

                {{-- Text content --}}
                <div class="min-w-0 text-white">
                    @if ($type === \App\Enums\CourseTestType::Final && ($passed ?? false))
                        <h1
                            class="font-outfit text-2xl font-extrabold tracking-tight sm:text-3xl lg:text-[2rem] leading-tight">
                            Congratulations!
                        </h1>
                        <p class="mt-1 text-lg font-semibold text-white/95">{{ $user?->name ?? 'Learner' }}</p>
                        <p class="mt-2 text-sm text-white/90 sm:text-base">You have successfully completed the final
                            test</p>
                        <p class="mt-1 text-base font-bold text-[#FFB347]">{{ $course->couse_name }}</p>
                    @elseif ($type === \App\Enums\CourseTestType::Final && !($passed ?? false) && $finalAttemptCount < 2)
                        <h1
                            class="font-outfit text-2xl font-extrabold tracking-tight sm:text-3xl lg:text-[2rem] leading-tight">
                            Sorry!
                        </h1>
                        <p class="mt-1 text-lg font-semibold text-white/95">{{ $user?->name ?? 'Learner' }}</p>
                        <p class="mt-2 text-sm text-white/90 sm:text-base">You have not successfully completed the final
                            test</p>
                        <p class="mt-1 text-base font-bold text-[#FFB347]">{{ $course->couse_name }}</p>
                        <div class="mt-5 flex flex-wrap items-center gap-3">
                            <a href="{{ $moduleUrl }}"
                                class="inline-flex items-center justify-center gap-2 rounded-xl bg-impetus-orange px-5 py-2.5 text-xs font-bold uppercase tracking-wide text-white shadow-md transition hover:bg-impetus-orange-hover">
                                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>
                                Try Again
                            </a>
                            <a href="{{ $moduleUrl }}"
                                class="inline-flex items-center justify-center gap-2 rounded-xl border border-white bg-transparent px-5 py-2.5 text-xs font-bold uppercase tracking-wide text-white transition hover:bg-white/10">
                                Back to Module
                            </a>
                        </div>
                    @elseif ($type === \App\Enums\CourseTestType::Final && !($passed ?? false))
                        <h1
                            class="font-outfit text-2xl font-extrabold tracking-tight sm:text-3xl lg:text-[2rem] leading-tight">
                            Sorry!
                        </h1>
                        <p class="mt-1 text-lg font-semibold text-white/95">{{ $user?->name ?? 'Learner' }}</p>
                        <p class="mt-2 text-sm text-white/90 sm:text-base">You have not successfully completed the Final
                            test</p>
                        <p class="mt-1 text-base font-bold text-[#FFB347]">{{ $course->couse_name }}</p>
                        <div class="mt-5 flex flex-wrap items-center gap-3">
                            <form method="POST" action="{{ route('cart.items.store', $course->couse_name) }}"
                                class="inline-flex">
                                @csrf
                                <button type="submit"
                                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-impetus-orange px-5 py-2.5 text-xs font-bold uppercase tracking-wide text-white shadow-md transition hover:bg-impetus-orange-hover">
                                    Repurchase Module
                                </button>
                            </form>
                            <a href="{{ $moduleUrl }}"
                                class="inline-flex items-center justify-center gap-2 rounded-xl border border-white bg-transparent px-5 py-2.5 text-xs font-bold uppercase tracking-wide text-white transition hover:bg-white/10">
                                Back to Module
                            </a>
                        </div>
                    @elseif ($isPreOrMock)
                        <h1
                            class="font-outfit text-2xl font-extrabold tracking-tight sm:text-3xl lg:text-[2rem] leading-tight">
                            Thank you!
                        </h1>
                        <p class="mt-1 text-lg font-semibold text-white/95">{{ $user?->name ?? 'Learner' }}</p>
                        <p class="mt-2 text-sm text-white/90 sm:text-base">You have completed the
                            {{ $type === \App\Enums\CourseTestType::Pre ? 'Pre-Test' : 'Mock Test' }}</p>
                        <p class="mt-1 text-base font-bold text-[#FFB347]">{{ $course->couse_name }}</p>
                        <div class="mt-5 flex flex-wrap items-center gap-3">
                            <a href="{{ $moduleUrl }}"
                                class="inline-flex items-center justify-center gap-2 rounded-xl bg-impetus-orange px-5 py-2.5 text-xs font-bold uppercase tracking-wide text-white shadow-md transition hover:bg-impetus-orange-hover">
                                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                </svg>
                                Start Learning
                            </a>
                            <a href="{{ $moduleUrl }}"
                                class="inline-flex items-center justify-center gap-2 rounded-xl border border-white bg-transparent px-5 py-2.5 text-xs font-bold uppercase tracking-wide text-white transition hover:bg-white/10">
                                Back to Module
                            </a>
                        </div>
                    @elseif ($type === \App\Enums\CourseTestType::Practice)
                        <h1
                            class="font-outfit text-2xl font-extrabold tracking-tight sm:text-3xl lg:text-[2rem] leading-tight">
                            Thank You!
                        </h1>
                        <p class="mt-1 text-lg font-semibold text-white/95">{{ $user?->name ?? 'Learner' }}</p>
                        <p class="mt-2 text-sm text-white/90 sm:text-base">You have completed the practice test</p>
                        <p class="mt-1 text-base font-bold text-[#FFB347]">{{ $course->couse_name }}</p>
                        <div class="mt-5 flex flex-wrap items-center gap-3">
                            <a href="{{ $practiceUrl }}"
                                class="inline-flex items-center justify-center gap-2 rounded-xl bg-impetus-orange px-5 py-2.5 text-xs font-bold uppercase tracking-wide text-white shadow-md transition hover:bg-impetus-orange-hover">
                                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                                </svg>
                                Back to Practice Sets
                            </a>
                        </div>
                    @else
                        <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-white/75">Test Completed</p>
                        <h1
                            class="mt-1 font-outfit text-2xl font-extrabold tracking-tight sm:text-3xl lg:text-[2rem] leading-tight">
                            Congratulations, {{ $firstName }}!
                        </h1>
                        <p class="mt-2 text-sm text-white/90 sm:text-base">You have completed the {{ $banner }}
                        </p>
                        <p class="mt-1 text-base font-bold text-[#FFB347]">{{ $course->couse_name }}</p>
                    @endif
                </div>

            </div>
        </div>

        {{-- Nurse: outside banner, positioned on outer card so she overflows above banner boundary --}}
        <div class="hidden sm:block pointer-events-none select-none"
            style="position: absolute; top: -90px; right: 0; width: 420px; height: calc(300px + 90px); z-index: 10;">
            <img src="{{ $heroImage }}" alt="Nurse"
                style="width: 100%; height: 100%; object-fit: contain; object-position: bottom right;" loading="lazy"
                decoding="async">
        </div>

        {{-- Stats bar — white card embedded inside teal banner at the bottom --}}
        <div class="relative z-20 mx-6 mb-5 sm:mx-8 rounded-2xl bg-white shadow-lg">
            <div class="mx-auto">
                <div class="grid grid-cols-1 divide-y sm:grid-cols-3 sm:divide-x sm:divide-y-0 divide-slate-200">
                    <div class="flex items-center justify-center gap-4 px-6 py-5">
                        <div
                            class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#0F776E]/10 text-[#0F776E]">
                            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 15a5 5 0 100-10 5 5 0 000 10z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 14.25L6 21l3.75-2.25L13.5 21l-2.25-6.75" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 14.25L18 21l-3.75-2.25L10.5 21l2.25-6.75" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-500">Score</p>
                            <p class="text-2xl font-bold text-impetus-orange font-outfit leading-tight">
                                {{ $obtainedScore }} / {{ $maxScore }}</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-4 px-6 py-5">
                        <div
                            class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#0F776E]/10 text-[#0F776E]">
                            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-500">Accuracy</p>
                            <p class="text-2xl font-bold text-[#0F776E] font-outfit leading-tight">
                                {{ $scorePercent }}%</p>
                        </div>
                    </div>
                    @if ($testType !== 'practice')
                        <div class="flex items-center justify-center gap-4 px-6 py-5">
                            <div
                                class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#0F776E]/10 text-[#0F776E]">
                                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-500">Time Taken</p>
                                <p class="text-2xl font-bold text-slate-800 font-outfit leading-tight">
                                    {{ $formattedDuration }}</p>
                            </div>
                        </div>
                    @else
                        <div class="flex items-center justify-center gap-4 px-6 py-5">
                            <div
                                class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#0F776E]/10 text-[#0F776E]">
                                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-500">Questions</p>
                                <p class="text-2xl font-bold text-slate-800 font-outfit leading-tight">
                                    {{ $totalQuestions }}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>{{-- end teal banner --}}



    {{-- ══════════════════════════════════════════
     Detail cards: Questions | Correct | Wrong | Score
     (label on top, large number below, icon on left)
     ══════════════════════════════════════════ --}}
    <div class="grid grid-cols-2 gap-4 bg-white px-6 py-6 sm:grid-cols-4 sm:px-10">

            {{-- Questions --}}
            <div class="rounded-2xl border border-[#0F776E]/15 bg-white p-5 shadow-sm">
                <div class="flex items-center gap-4">
                    <div
                        class="flex size-14 shrink-0 items-center justify-center rounded-full bg-[#0F776E] text-white">
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-[#0F776E]">Questions</p>
                        <p class="text-3xl font-bold text-slate-800 font-outfit leading-none mt-1">
                            {{ $totalQuestions }}</p>
                        <p class="text-xs text-slate-500 mt-1">Total Questions</p>
                    </div>
                </div>
            </div>

            {{-- Correct --}}
            <div class="rounded-2xl border border-green-200 bg-white p-5 shadow-sm">
                <div class="flex items-center gap-4">
                    <div
                        class="flex size-14 shrink-0 items-center justify-center rounded-full bg-green-500 text-white">
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="3" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-green-600">Correct</p>
                        <p class="text-3xl font-bold text-green-600 font-outfit leading-none mt-1">{{ $correctCount }}
                        </p>
                        <p class="text-xs text-slate-500 mt-1">Correct Answers</p>
                    </div>
                </div>
            </div>

            {{-- Wrong --}}
            <div class="rounded-2xl border border-red-200 bg-white p-5 shadow-sm">
                <div class="flex items-center gap-4">
                    <div class="flex size-14 shrink-0 items-center justify-center rounded-full bg-red-500 text-white">
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="3" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-red-600">Wrong</p>
                        <p class="text-3xl font-bold text-red-600 font-outfit leading-none mt-1">{{ $wrongCount }}
                        </p>
                        <p class="text-xs text-slate-500 mt-1">Incorrect Answers</p>
                    </div>
                </div>
            </div>

            {{-- Score --}}
            <div class="rounded-2xl border border-impetus-orange/20 bg-white p-5 shadow-sm">
                <div class="flex items-center gap-4">
                    <div
                        class="flex size-14 shrink-0 items-center justify-center rounded-full bg-impetus-orange text-white">
                        <svg class="size-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 15a5 5 0 100-10 5 5 0 000 10z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 14.25L6 21l3.75-2.25L13.5 21l-2.25-6.75" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 14.25L18 21l-3.75-2.25L10.5 21l2.25-6.75" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 7.5l.75 1.5h1.75l-1.25 1 .5 1.75-1.75-1.25-1.75 1.25.5-1.75-1.25-1h1.75z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-impetus-orange">Score</p>
                        <p class="text-3xl font-bold text-impetus-orange font-outfit leading-none mt-1">
                            {{ $obtainedScore }}/{{ $maxScore }}</p>
                        <p class="text-xs text-slate-500 mt-1">Overall Score</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ══════════════════════════════════════════
         Performance summary + rating / certificate
         ══════════════════════════════════════════ --}}
        <div
            class="grid gap-6 border-t border-slate-100 bg-white px-6 py-8 sm:px-8 @if ($showFeedback) lg:grid-cols-2 @endif">
            {{-- Performance summary --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex items-center gap-2 mb-6">
                    <svg class="size-5 text-[#0F776E]" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                    </svg>
                    <h2 class="text-lg font-bold text-slate-900 font-outfit">Performance Summary</h2>
                </div>

                <div class="space-y-5">
                    <div>
                        <div class="mb-2 flex items-center justify-between text-sm">
                            <span class="font-medium text-slate-600">Correct Answers</span>
                            <span class="font-bold text-[#0F776E]">{{ $pctCorrect }}%</span>
                        </div>
                        <div class="h-3 overflow-hidden rounded-full bg-slate-100">
                            <div class="h-full rounded-full bg-[#0F776E] transition-all duration-700"
                                style="width: {{ $pctCorrect }}%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2 flex items-center justify-between text-sm">
                            <span class="font-medium text-slate-600">Incorrect Answers</span>
                            <span class="font-bold text-red-600">{{ $pctWrong }}%</span>
                        </div>
                        <div class="h-3 overflow-hidden rounded-full bg-slate-100">
                            <div class="h-full rounded-full bg-red-500 transition-all duration-700"
                                style="width: {{ $pctWrong }}%"></div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex gap-3 rounded-xl border border-sky-100 bg-sky-50 p-4">
                    <svg class="size-5 shrink-0 text-amber-500 mt-0.5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                    </svg>
                    <p class="text-sm leading-relaxed text-slate-600">{{ $feedbackMessage }}</p>
                </div>
            </div>

            @if ($showFeedback)
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    {{-- Star rating --}}
                    <div class="flex items-start gap-3 mb-2">
                        <svg class="size-6 text-[#0F776E] mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 0 0 .95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 0 0-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 0 0-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 0 0-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 0 0 .951-.69l1.519-4.674z" />
                        </svg>
                        <div>
                            <h2 class="text-lg font-bold text-slate-900 font-outfit">Feedback</h2>
                            <p class="text-sm text-slate-500 mt-0.5">Give a 5-star rating</p>
                        </div>
                    </div>

                    <div class="mt-4" x-data="{ hoverRating: 0, currentRating: @entangle('rating').live }">
                        <div class="flex gap-1">
                            @foreach (range(1, 5) as $i)
                                <button type="button" @click="$wire.setRating({{ $i }})"
                                    @mouseenter="hoverRating = {{ $i }}" @mouseleave="hoverRating = 0"
                                    class="transition-transform hover:scale-110"
                                    aria-label="Rate {{ $i }} stars">
                                    <svg class="size-10 transition-colors sm:size-11"
                                        :class="(hoverRating || currentRating) >= {{ $i }} ?
                                            'text-impetus-orange fill-impetus-orange' :
                                            'text-slate-300 fill-transparent'"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                </button>
                            @endforeach
                        </div>
                        <p class="mt-3 text-sm font-semibold text-slate-600"
                            x-text="currentRating > 0 ? (currentRating + '.0 / 5') : 'Tap a star to rate'"></p>
                    </div>

                    @if ($type === \App\Enums\CourseTestType::Final && ($passed ?? false) && $orderId)
                        <div class="mt-8 border-t border-slate-100 pt-6">
                            <div class="flex items-start gap-3">
                                <div
                                    class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-[#0F776E]/10 text-[#0F776E]">
                                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-800">Download Certificate</p>
                                    <p class="mt-1 text-sm text-slate-500">Download your {{ $banner }}
                                        completion
                                        certificate.</p>
                                </div>
                            </div>
                            <a href="{{ route('certificates.download', $orderId) }}"
                                class="mt-4 inline-flex items-center justify-center gap-1.5 rounded-lg bg-impetus-orange px-4 py-2 text-[11px] font-bold uppercase tracking-wide text-white shadow-md transition hover:bg-impetus-orange-hover"
                                target="_blank">
                                <svg class="size-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2.5" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                </svg>
                                Download Certificate
                            </a>
                        </div>
                    @endif
                </div>
            @endif
        </div>

        {{-- ══════════════════════════════════════════
         Action buttons
         ══════════════════════════════════════════ --}}
        @if (
            !$isPreOrMock &&
                $type !== \App\Enums\CourseTestType::Practice &&
                !$canRetakeFinal &&
                !($type === \App\Enums\CourseTestType::Final && !($passed ?? false)))
            <div
                class="flex flex-col items-center gap-4 border-t border-slate-100 bg-white px-6 py-8 sm:flex-row sm:justify-center sm:px-8">
                @if ($testType === 'practice')
                    <a href="{{ $practiceUrl }}"
                        class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-impetus-orange px-8 py-3.5 text-sm font-bold uppercase tracking-wide text-white shadow-lg shadow-impetus-orange/20 transition hover:bg-impetus-orange-hover sm:w-auto">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2.5" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                        </svg>
                        Back to Practice Sets
                    </a>
                @else
                    <a href="{{ $moduleUrl }}"
                        class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-[#0F776E] px-8 py-3.5 text-sm font-bold uppercase tracking-wide text-white shadow-lg shadow-[#0F776E]/20 transition hover:bg-[#0c5e57] sm:w-auto">
                        Back to Module
                    </a>
                @endif
            </div>
        @endif
    </div>
