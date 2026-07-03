@php
    $wrongCount = max(0, $totalQuestions - $correctCount);
    $pctCorrect = $scorePercent ?? 0.0;
    $pctWrong = round(100 - $pctCorrect, 1);
    $banner = $type->resultBannerLabel();
    $user = auth()->user();
    $firstName = $user?->name ? explode(' ', trim($user->name))[0] : 'Learner';
    $heroImage = $course->attachmentImageUrl() ?? asset('research_development.jpeg');
    $feedbackMessage = $pctCorrect >= 70
        ? 'Excellent work! You have demonstrated strong understanding of the module content.'
        : ($pctCorrect >= 50
            ? 'Good effort! Review the topics where you missed questions to strengthen your knowledge.'
            : 'Keep practicing! Review the topics and attempt the test again to improve your score.');
    $canRetakeFinal = $type === \App\Enums\CourseTestType::Final && ! ($passed ?? false) && $finalAttemptCount < 2;
    $learningUrl = route('cne.modules.materials', $course->couse_name);
    $moduleUrl = route('cne.modules.show', $course->couse_name);
    $practiceUrl = route('cne.modules.test', [$course->couse_name, 'practice']);
@endphp

<div class="mx-auto max-w-6xl overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-2xl ring-1 ring-slate-900/5">
    {{-- Hero banner --}}
    <div class="relative overflow-hidden @if ($type === \App\Enums\CourseTestType::Final && ! ($passed ?? false)) bg-gradient-to-r from-[#991B1B] via-[#8F1A24] to-[#7F1D1D] @else bg-gradient-to-r from-[#0F776E] via-[#0D6B64] to-[#115E59] @endif px-6 py-10 sm:px-10 sm:py-12">
        <div class="pointer-events-none absolute -right-10 -top-10 h-40 w-40 rounded-full bg-white/10" aria-hidden="true"></div>
        <div class="pointer-events-none absolute -bottom-16 left-1/3 h-48 w-48 rounded-full bg-white/5" aria-hidden="true"></div>

        <div class="relative flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">
            <div class="flex min-w-0 flex-1 items-start gap-5 sm:gap-6">
                <div class="flex size-20 shrink-0 items-center justify-center rounded-2xl bg-white/15 ring-1 ring-white/20 sm:size-24">
                    @if ($type === \App\Enums\CourseTestType::Final && ! ($passed ?? false))
                        {{-- Warning/exclamation icon for failed final test --}}
                        <svg class="size-10 text-rose-300 sm:size-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                        </svg>
                    @else
                        {{-- Star icon for passed final or other completed tests --}}
                        <svg class="size-10 text-amber-300 sm:size-12" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M12 2l2.09 6.26L20.5 9.27l-5 3.64L16.82 20 12 16.77 7.18 20l1.32-7.09-5-3.64 6.41-1.01L12 2z" />
                        </svg>
                    @endif
                </div>
                <div class="min-w-0 text-white">
                    <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-white/75">Test Completed</p>
                    <h1 class="mt-2 font-outfit text-2xl font-bold tracking-tight sm:text-3xl lg:text-4xl">
                        @if ($type === \App\Enums\CourseTestType::Final && ! ($passed ?? false))
                            Better Luck Next Time, {{ $firstName }}!
                        @else
                            Congratulations, {{ $firstName }}!
                        @endif
                    </h1>
                    <p class="mt-2 text-sm text-white/90 sm:text-base">
                        You have completed the {{ $banner }}.
                    </p>
                    <p class="mt-1 text-lg font-bold text-impetus-orange sm:text-xl">
                        {{ $course->couse_name }}
                    </p>
                </div>
            </div>
            <div class="hidden shrink-0 lg:block lg:w-56 xl:w-64">
                <div class="overflow-hidden rounded-2xl border-4 border-white/20 shadow-xl">
                    <img src="{{ $heroImage }}" alt="{{ $course->couse_name }}" class="aspect-[4/5] w-full object-cover" loading="lazy" decoding="async">
                </div>
            </div>
        </div>
    </div>

    {{-- Quick stats bar --}}
    <div class="grid grid-cols-1 divide-y border-b border-slate-200 bg-white sm:grid-cols-3 sm:divide-x sm:divide-y-0">
        <div class="flex items-center gap-4 px-6 py-5">
            <div class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-[#0F776E]/10 text-[#0F776E]">
                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Score</p>
                <p class="mt-0.5 text-xl font-bold text-impetus-orange font-outfit">{{ $obtainedScore }} / {{ $maxScore }}</p>
            </div>
        </div>
        <div class="flex items-center gap-4 px-6 py-5">
            <div class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-[#0F776E]/10 text-[#0F776E]">
                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Accuracy</p>
                <p class="mt-0.5 text-xl font-bold text-[#0F776E] font-outfit">{{ $scorePercent }}%</p>
            </div>
        </div>
        @if ($testType !== 'practice')
            <div class="flex items-center gap-4 px-6 py-5">
                <div class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-[#0F776E]/10 text-[#0F776E]">
                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Time Taken</p>
                    <p class="mt-0.5 text-xl font-bold text-slate-800 font-outfit">{{ $formattedDuration }}</p>
                </div>
            </div>
        @else
            <div class="flex items-center gap-4 px-6 py-5">
                <div class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-[#0F776E]/10 text-[#0F776E]">
                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2" />
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Questions</p>
                    <p class="mt-0.5 text-xl font-bold text-slate-800 font-outfit">{{ $totalQuestions }}</p>
                </div>
            </div>
        @endif
    </div>

    {{-- Detail cards --}}
    <div class="grid grid-cols-2 gap-4 bg-slate-50/60 px-6 py-6 sm:grid-cols-4 sm:px-8">
        <div class="rounded-2xl border border-[#0F776E]/15 bg-white p-4 text-center shadow-sm">
            <div class="mx-auto mb-2 flex size-10 items-center justify-center rounded-full bg-[#0F776E]/10 text-[#0F776E]">
                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2" />
                </svg>
            </div>
            <p class="text-2xl font-bold text-[#0F776E] font-outfit">{{ $totalQuestions }}</p>
            <p class="mt-1 text-xs font-medium text-slate-500">Total Questions</p>
        </div>
        <div class="rounded-2xl border border-green-200 bg-white p-4 text-center shadow-sm">
            <div class="mx-auto mb-2 flex size-10 items-center justify-center rounded-full bg-green-100 text-green-600">
                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
            </div>
            <p class="text-2xl font-bold text-green-600 font-outfit">{{ $correctCount }}</p>
            <p class="mt-1 text-xs font-medium text-slate-500">Correct Answers</p>
        </div>
        <div class="rounded-2xl border border-red-200 bg-white p-4 text-center shadow-sm">
            <div class="mx-auto mb-2 flex size-10 items-center justify-center rounded-full bg-red-100 text-red-600">
                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </div>
            <p class="text-2xl font-bold text-red-600 font-outfit">{{ $wrongCount }}</p>
            <p class="mt-1 text-xs font-medium text-slate-500">Incorrect Answers</p>
        </div>
        <div class="rounded-2xl border border-impetus-orange/20 bg-white p-4 text-center shadow-sm">
            <div class="mx-auto mb-2 flex size-10 items-center justify-center rounded-full bg-impetus-orange/10 text-impetus-orange">
                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 0 0 .95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 0 0-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 0 0-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 0 0-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 0 0 .951-.69l1.519-4.674z" />
                </svg>
            </div>
            <p class="text-2xl font-bold text-impetus-orange font-outfit">{{ $obtainedScore }}/{{ $maxScore }}</p>
            <p class="mt-1 text-xs font-medium text-slate-500">Overall Score</p>
        </div>
    </div>

    {{-- Performance summary + rating --}}
    <div class="grid gap-6 border-t border-slate-100 px-6 py-8 sm:px-8 lg:grid-cols-2">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex items-center gap-2">
                <svg class="size-5 text-[#0F776E]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                </svg>
                <h2 class="text-lg font-bold text-slate-900 font-outfit">Performance Summary</h2>
            </div>

            <div class="mt-6 space-y-5">
                <div>
                    <div class="mb-2 flex items-center justify-between text-sm">
                        <span class="font-medium text-slate-600">Correct Answers</span>
                        <span class="font-bold text-[#0F776E]">{{ $pctCorrect }}%</span>
                    </div>
                    <div class="h-2.5 overflow-hidden rounded-full bg-slate-100">
                        <div class="h-full rounded-full bg-[#0F776E] transition-all duration-700" style="width: {{ $pctCorrect }}%"></div>
                    </div>
                </div>
                <div>
                    <div class="mb-2 flex items-center justify-between text-sm">
                        <span class="font-medium text-slate-600">Incorrect Answers</span>
                        <span class="font-bold text-red-600">{{ $pctWrong }}%</span>
                    </div>
                    <div class="h-2.5 overflow-hidden rounded-full bg-slate-100">
                        <div class="h-full rounded-full bg-red-500 transition-all duration-700" style="width: {{ $pctWrong }}%"></div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex gap-3 rounded-xl border border-sky-100 bg-sky-50 p-4">
                <svg class="size-5 shrink-0 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                </svg>
                <p class="text-sm leading-relaxed text-slate-600">{{ $feedbackMessage }}</p>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-lg font-bold text-slate-900 font-outfit">Rate Your Performance</h2>

            <div class="mt-5" x-data="{ hoverRating: 0, currentRating: @entangle('rating').live }">
                <div class="flex gap-1">
                    @foreach (range(1, 5) as $i)
                        <button
                            type="button"
                            @click="$wire.setRating({{ $i }})"
                            @mouseenter="hoverRating = {{ $i }}"
                            @mouseleave="hoverRating = 0"
                            class="transition-transform hover:scale-110"
                            aria-label="Rate {{ $i }} stars"
                        >
                            <svg
                                class="size-9 transition-colors sm:size-10"
                                :class="(hoverRating || currentRating) >= {{ $i }} ? 'text-impetus-orange fill-impetus-orange' : 'text-slate-300 fill-transparent'"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                            >
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                        </button>
                    @endforeach
                </div>
                <p class="mt-3 text-sm font-semibold text-slate-600" x-text="currentRating > 0 ? (currentRating + '.0 / 5') : 'Tap a star to rate'"></p>
            </div>

            @if ($type === \App\Enums\CourseTestType::Final && ($passed ?? false) && $orderId)
                <div class="mt-8 border-t border-slate-100 pt-6">
                    <div class="flex items-start gap-3">
                        <div class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-[#0F776E]/10 text-[#0F776E]">
                            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-slate-800">Download Certificate</p>
                            <p class="mt-1 text-sm text-slate-500">Download your {{ $banner }} completion certificate.</p>
                        </div>
                    </div>
                    <a
                        href="{{ route('certificates.download', $orderId) }}"
                        class="mt-4 flex w-full items-center justify-center gap-2 rounded-xl bg-[#0F776E] px-6 py-3.5 text-sm font-bold uppercase tracking-wide text-white shadow-lg shadow-[#0F776E]/20 transition hover:bg-[#115E59]"
                        target="_blank"
                    >
                        Download Certificate
                    </a>
                </div>
            @endif

            @if ($type === \App\Enums\CourseTestType::Final && ! ($passed ?? false))
                <div class="mt-8 rounded-xl border border-impetus-orange/20 bg-impetus-lightOrange p-4">
                    <h3 class="font-bold text-impetus-orange">Exam Not Passed</h3>
                    <p class="mt-1 text-sm text-slate-600">
                        @if ($finalAttemptCount < 2)
                            You can make one more attempt to pass the final test.
                        @else
                            You have used all attempts. Please purchase the module again to retake the exam.
                        @endif
                    </p>
                </div>
            @endif
        </div>
    </div>

    {{-- Action buttons --}}
    <div class="flex flex-col items-center gap-4 border-t border-slate-100 bg-slate-50/50 px-6 py-8 sm:flex-row sm:justify-center sm:px-8">
        @if ($testType === 'practice')
            <a
                href="{{ $practiceUrl }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-impetus-orange px-8 py-3.5 text-sm font-bold uppercase tracking-wide text-white shadow-lg shadow-impetus-orange/20 transition hover:bg-impetus-orange-hover sm:w-auto"
            >
                Back to Practice Sets
            </a>
        @elseif ($type === \App\Enums\CourseTestType::Pre)
            <a
                href="{{ $learningUrl }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-impetus-orange px-8 py-3.5 text-sm font-bold uppercase tracking-wide text-white shadow-lg shadow-impetus-orange/20 transition hover:bg-impetus-orange-hover sm:w-auto"
            >
                Start Learning Module
            </a>
            <a
                href="{{ $moduleUrl }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl border-2 border-[#0F776E] bg-white px-8 py-3.5 text-sm font-bold uppercase tracking-wide text-[#0F776E] transition hover:bg-[#0F776E]/5 sm:w-auto"
            >
                Back to Module
            </a>
        @else
            <a
                href="{{ $moduleUrl }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-impetus-orange px-8 py-3.5 text-sm font-bold uppercase tracking-wide text-white shadow-lg shadow-impetus-orange/20 transition hover:bg-impetus-orange-hover sm:w-auto"
            >
                Back to Module
            </a>
            @if ($canRetakeFinal)
                <a
                    href="{{ route('cne.modules.test', [$course->couse_name, 'final']) }}"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl border-2 border-[#0F776E] bg-white px-8 py-3.5 text-sm font-bold uppercase tracking-wide text-[#0F776E] transition hover:bg-[#0F776E]/5 sm:w-auto"
                >
                    Retake Test
                </a>
            @endif
        @endif
    </div>
</div>
