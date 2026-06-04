<div class="pb-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        @if ($fatalError)
            <div class="rounded-2xl border border-amber-200 bg-amber-50 px-6 py-8 text-amber-900 shadow-sm">
                <p class="text-lg font-semibold">This test cannot be loaded</p>
                <p class="mt-2 whitespace-pre-line text-sm text-amber-800/90">{{ $fatalError }}</p>
                <a
                    href="{{ $testType === 'practice' ? route('cne.modules.test', [$course->couse_name, 'practice']) : route('cne.modules.show', $course->couse_name) }}"
                    class="mt-6 inline-flex items-center gap-2 rounded-xl border border-amber-300 bg-white px-5 py-2.5 text-sm font-semibold text-amber-900 shadow-sm transition hover:bg-amber-100"
                >
                    Back to {{ $testType === 'practice' ? 'practice sets' : 'module' }}
                </a>
            </div>
        @elseif ($submitted)
            @php
                $wrongCount = max(0, $totalQuestions - $correctCount);
                $pctCorrect = $scorePercent ?? 0.0;
                $pctWrong = round(100 - $pctCorrect, 1);
                $banner = $type->resultBannerLabel();
            @endphp
            <div class="mx-auto max-w-5xl overflow-hidden rounded-[2.5rem] border border-slate-200 bg-white shadow-2xl ring-1 ring-slate-900/5">
                <div class="relative overflow-hidden">
                    {{-- Decorative backgrounds --}}
                    <div class="pointer-events-none absolute -left-20 -top-16 h-72 w-72 rounded-full bg-[#0F766E]/10 blur-3xl" aria-hidden="true"></div>
                    <div class="pointer-events-none absolute -bottom-24 -right-16 h-80 w-80 rounded-full bg-logo-light-green/[0.12] blur-3xl" aria-hidden="true"></div>

                    {{-- Header Section --}}
                    <div class="border-b border-slate-200/80 bg-gradient-to-br from-slate-50/95 via-white to-brand-50/30 px-6 py-8 sm:px-10">
                        <div class="flex flex-col gap-5 lg:flex-row lg:items-start lg:justify-between">
                            <div class="min-w-0">
                                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#0F766E]">Test completed</p>
                                <h1 class="mt-2 font-serif text-xl font-bold tracking-tight text-[#1F2937] sm:text-[26px]">
                                    Result: {{ $banner }}
                                </h1>
                                <p class="mt-1.5 text-lg font-bold text-[#FF7A00]">
                                    {{ $course->couse_name }}
                                </p>

                            </div>
                            <div class="hidden shrink-0 lg:block">
                                <span class="inline-flex rounded-full border border-[#99F6E4] bg-[#CCFBF1] px-4 py-1.5 text-sm font-bold text-[#0F766E]">{{ $banner }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Content Section --}}
                    <div class="bg-gradient-to-b from-white via-slate-50/30 to-white px-6 py-10 sm:px-10">
                        {{-- Quick Stats Grid --}}
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-1.5 md:gap-3">
                            {{-- Total Questions --}}
                            <div class="flex flex-col items-center justify-center rounded-xl border border-transparent bg-gradient-to-br from-[#0F766E] to-[#0D9488] p-2 text-center text-white shadow-sm transition hover:shadow-md md:p-4">
                                <p class="whitespace-nowrap text-center text-[8px] font-bold uppercase tracking-wider text-white/80 md:text-[11px]">Questions</p>
                                <p class="mt-1 text-xl font-black md:mt-2 md:text-2xl font-outfit">{{ $totalQuestions }}</p>
                            </div>

                            {{-- Correct Answers --}}
                            <div class="flex flex-col items-center justify-center rounded-xl border border-emerald-500/20 bg-gradient-to-br from-emerald-500 to-teal-600 p-2 text-center text-white shadow-sm transition hover:shadow-md md:p-4">
                                <p class="whitespace-nowrap text-center text-[8px] font-bold uppercase tracking-widest text-emerald-100 md:text-[11px]">Correct</p>
                                <p class="mt-1 text-xl font-black md:mt-2 md:text-2xl font-outfit">{{ $correctCount }}</p>
                            </div>

                            {{-- Incorrect Answers --}}
                            <div class="flex flex-col items-center justify-center rounded-xl border border-rose-500/20 bg-gradient-to-br from-rose-500 to-red-600 p-2 text-center text-white shadow-sm transition hover:shadow-md md:p-4">
                                <p class="whitespace-nowrap text-center text-[8px] font-bold uppercase tracking-widest text-rose-100 md:text-[11px]">Wrong</p>
                                <p class="mt-1 text-xl font-black md:mt-2 md:text-2xl font-outfit">{{ $wrongCount }}</p>
                            </div>

                            {{-- Obtained Score --}}
                            <div class="flex flex-col items-center justify-center rounded-xl border border-orange-500/20 bg-gradient-to-br from-orange-500 to-amber-500 p-2 text-center text-white shadow-sm transition hover:shadow-md md:p-4">
                                <p class="whitespace-nowrap text-center text-[8px] font-bold uppercase tracking-widest text-orange-100 md:text-[11px]">Score</p>
                                <p class="mt-1 text-xl font-black md:mt-2 md:text-2xl font-outfit">{{ $obtainedScore }}/{{ $maxScore }}</p>
                            </div>

                            @if($testType !== 'practice')
                            {{-- Time Taken --}}
                            <div class="flex flex-col items-center justify-center rounded-xl border border-slate-200 bg-slate-50/80 p-2 text-center text-slate-800 shadow-sm transition hover:shadow-md md:p-4">
                                <p class="whitespace-nowrap text-center text-[8px] font-bold uppercase tracking-widest text-slate-500 md:text-[11px]">Time Taken</p>
                                <p class="mt-1 text-xl font-black md:mt-2 md:text-2xl font-outfit">{{ $formattedDuration }}</p>
                            </div>
                            @endif
                        </div>
                        {{-- Score Chart & Visuals --}}
                        <div class="mt-10 overflow-hidden rounded-[2.5rem] border border-slate-200 bg-white p-6 shadow-xl sm:p-8">
                            <div class="flex flex-col gap-2 border-b border-slate-100 pb-5">
                                <h2 class="font-serif text-xl font-bold text-slate-900 sm:text-2xl">
                                    Score: <span class="text-impetus-orange font-outfit font-black">{{ $obtainedScore }}/{{ $maxScore }}</span>
                                </h2>
                            </div>


                            @php
                                $correctAngle = ($pctCorrect / 2) * 3.6;
                                $wrongAngle = ($pctCorrect + ($pctWrong / 2)) * 3.6;
                                $dist = 25;
                                $tx_c = 50 + $dist * cos(deg2rad($correctAngle - 90));
                                $ty_c = 50 + $dist * sin(deg2rad($correctAngle - 90));
                                $tx_w = 50 + $dist * cos(deg2rad($wrongAngle - 90));
                                $ty_w = 50 + $dist * sin(deg2rad($wrongAngle - 90));
                            @endphp
                            <div class="mt-10 flex flex-col items-center justify-center">
                                <div class="relative size-64 shrink-0 sm:size-80">
                                    <svg class="size-full transform" viewBox="0 0 100 100">
                                        <defs>
                                            <linearGradient id="correctGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" stop-color="#10b981" />
                                                <stop offset="100%" stop-color="#0F766E" />
                                            </linearGradient>
                                            <linearGradient id="wrongGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" stop-color="#f43f5e" />
                                                <stop offset="100%" stop-color="#dc2626" />
                                            </linearGradient>
                                        </defs>
                                        {{-- Wrong Percentage (Crimson/Rose) --}}
                                        <circle
                                            cx="50" cy="50" r="25"
                                            fill="transparent"
                                            stroke="url(#wrongGrad)"
                                            stroke-width="50"
                                            stroke-dasharray="157.08"
                                            stroke-dashoffset="0"
                                            transform="rotate(-90, 50, 50)"
                                        />
                                        {{-- Correct Percentage (Emerald) --}}
                                        <circle
                                            cx="50" cy="50" r="25"
                                            fill="transparent"
                                            stroke="url(#correctGrad)"
                                            stroke-width="50"
                                            stroke-dasharray="157.08"
                                            stroke-dashoffset="{{ 157.08 * (1 - $pctCorrect / 100) }}"
                                            transform="rotate(-90, 50, 50)"
                                            class="transition-all duration-1000 ease-out"
                                        />

                                        {{-- Percentages inside --}}
                                        @if($pctCorrect > 5)
                                            <text x="{{ $tx_c }}" y="{{ $ty_c }}" fill="white" font-size="8" font-weight="bold" text-anchor="middle" dominant-baseline="middle">
                                                {{ round($pctCorrect) }}%
                                            </text>
                                        @endif
                                        @if($pctWrong > 5)
                                            <text x="{{ $tx_w }}" y="{{ $ty_w }}" fill="white" font-size="8" font-weight="bold" text-anchor="middle" dominant-baseline="middle">
                                                {{ round($pctWrong) }}%
                                            </text>
                                        @endif
                                    </svg>
                                </div>

                                <div class="mt-8 flex flex-wrap justify-center gap-8">
                                    <div class="flex items-center gap-3">
                                        <span class="size-4 shrink-0 bg-gradient-to-r from-emerald-500 to-teal-600 shadow-sm rounded-full"></span>
                                        <span class="text-base font-bold text-emerald-600">Correct Answer</span>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span class="size-4 shrink-0 bg-gradient-to-r from-rose-500 to-red-600 shadow-sm rounded-full"></span>
                                        <span class="text-base font-bold text-rose-600">Incorrect Answer</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Pass/Fail Outcome Section --}}
                        @if ($type === \App\Enums\CourseTestType::Final && $passThresholdPercent !== null)
                            <div class="mt-10 flex flex-col items-center justify-center text-center">
                                @if ($passed)
                                    <div class="space-y-4">
                                        <h3 class="text-2xl font-black tracking-widest text-emerald-600 sm:text-3xl">CONGRATULATIONS!</h3>
                                        <p class="text-lg font-bold text-slate-800">You have Successfully Completed the Exam</p>

                                        <div class="flex flex-col items-center gap-3 py-6" x-data="{ hoverRating: 0, currentRating: @entangle('rating').live }">
                                            <p class="text-sm font-bold text-slate-600">Feedback (Give a Star Rating)</p>
                                            <div class="flex gap-1">
                                                @foreach(range(1, 5) as $i)
                                                    <button
                                                        type="button"
                                                        @click="$wire.setRating({{ $i }})"
                                                        @mouseenter="hoverRating = {{ $i }}"
                                                        @mouseleave="hoverRating = 0"
                                                        class="transition-transform hover:scale-110"
                                                    >
                                                        <svg
                                                            class="size-10 transition-colors"
                                                            :class="(hoverRating || currentRating) >= {{ $i }} ? 'text-amber-400 fill-amber-400' : 'text-slate-300 fill-transparent'"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                        >
                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                        </svg>
                                                    </button>
                                                @endforeach
                                            </div>
                                            <template x-if="currentRating > 0">
                                                <p class="text-xs font-semibold text-emerald-600">Thank you for your feedback!</p>
                                            </template>
                                        </div>

                                        @if ($orderId)
                                            @php
                                                $qrData = "Unique ID: " . $orderId . "\nModule: " . $course->couse_name . "\nDate: " . now()->format('d M, Y');
                                                $qrUrl = "https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=" . urlencode($qrData);
                                            @endphp
                                            <div class="mt-6 flex flex-col items-center gap-4">
                                                <div class="rounded-2xl border border-slate-200 bg-white p-3 shadow-sm ring-1 ring-slate-900/5">
                                                    <img src="{{ $qrUrl }}" alt="Verification QR Code" class="size-24">
                                                    <p class="mt-2 text-[10px] font-bold uppercase tracking-wider text-slate-400">Scan to verify</p>
                                                </div>
                                                <a
                                                    href="{{ route('certificates.download', $orderId) }}"
                                                    class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-impetus-orange to-amber-500 px-8 py-3.5 text-sm font-bold uppercase tracking-wider text-white shadow-lg shadow-orange-500/20 transition hover:from-orange-600 hover:to-amber-600"
                                                    target="_blank"
                                                >
                                                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M7.5 7.5L12 3m0 0l4.5 4.5M12 3v13.5" /></svg>
                                                    Download Certificate
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <div class="space-y-4">
                                        <h3 class="text-2xl font-black tracking-widest text-rose-600 sm:text-3xl">SORRY!</h3>
                                        <p class="text-lg font-bold text-slate-800">You have not Successfully Completed the Exam</p>

                                        @if($finalAttemptCount < 2)
                                            <p class="text-sm font-semibold text-slate-500">You can make ONE more attempt</p>
                                            <div class="mt-8">
                                                <a
                                                    href="{{ route('cne.modules.test', [$course->couse_name, 'final']) }}"
                                                    class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-rose-500 to-red-600 px-10 py-3 text-sm font-bold uppercase tracking-wider text-white shadow-lg shadow-rose-500/20 transition hover:from-rose-600 hover:to-red-700"
                                                >
                                                    TRY AGAIN!
                                                </a>
                                            </div>
                                        @else
                                            <p class="text-sm font-semibold text-rose-600">Kindly Purchase the Module Again</p>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        @endif

                        {{-- Action Buttons --}}
                        <div class="mt-10 flex flex-col items-center gap-4 border-t border-slate-100 pt-8">
                            <a
                                href="{{ $testType === 'practice' ? route('cne.modules.test', [$course->couse_name, 'practice']) : route('cne.modules.show', $course->couse_name) }}"
                                @class([
                                    'inline-flex items-center justify-center gap-2 rounded-2xl px-10 py-3.5 text-sm font-bold uppercase tracking-wide text-white shadow-xl transition focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2',
                                    'bg-[#FF7A00] shadow-orange-500/20 hover:bg-[#EA580C] focus-visible:ring-[#FF7A00]' => $testType === 'practice',
                                    'bg-[#0F766E] shadow-teal-900/20 hover:bg-[#0D9488] focus-visible:ring-[#0F766E]' => $testType !== 'practice'
                                ])
                            >
                                Back to {{ $testType === 'practice' ? 'practice sets' : 'module' }}
                                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            {{-- Questions View — teal header + orange actions (design spec) --}}
            @php
                $timerLow = $examDeadlineTs && $testType !== 'practice' && ! $examTimeExpired && $examSecondsRemaining > 0 && $examSecondsRemaining <= 300;
            @endphp
            <div class="exam-shell">
                <div class="exam-header">
                    <div class="flex min-w-0 flex-1 items-center gap-3">
                        <a
                            href="{{ $testType === 'practice' ? route('cne.modules.test', [$course->couse_name, 'practice']) : route('cne.modules.show', $course->couse_name) }}"
                            class="inline-flex size-10 shrink-0 items-center justify-center rounded-lg border border-white/25 bg-white/10 text-white transition hover:bg-white/20"
                            title="{{ $testType === 'practice' ? 'Back to practice sets' : 'Back to module' }}"
                        >
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
                        </a>
                        <div class="min-w-0">
                            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-white/75">{{ $type->label() }}</p>
                            <h1 class="truncate font-outfit text-base font-bold sm:text-lg">{{ $course->couse_name }}</h1>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center gap-2 sm:justify-end">
                        <span class="rounded-lg bg-white/10 px-3 py-1.5 font-outfit text-sm font-bold tabular-nums">
                            Question {{ $currentIndex + 1 }} / {{ $totalQuestions }}
                        </span>
                        @if ($examDeadlineTs && $testType !== 'practice')
                            <div
                                wire:poll.1s="refreshExamTimer"
                                role="timer"
                                aria-label="Exam time remaining"
                                @class([
                                    'flex items-center gap-2 rounded-lg px-3 py-1.5 font-mono text-sm font-bold tabular-nums sm:text-base',
                                    'bg-rose-500/90' => $examTimeExpired,
                                    'bg-[#FF7A00]/90' => $timerLow && ! $examTimeExpired,
                                    'bg-white/15' => ! $examTimeExpired && ! $timerLow,
                                ])
                            >
                                <svg class="size-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $examTimerDisplay }}
                            </div>
                        @endif
                        @if ($testType !== 'practice')
                            <button
                                type="button"
                                wire:click="submitTest"
                                wire:loading.attr="disabled"
                                class="exam-btn-submit"
                            >
                                <span wire:loading.remove wire:target="submitTest">Submit</span>
                                <span wire:loading wire:target="submitTest">…</span>
                            </button>
                        @endif
                    </div>
                </div>

                <div class="exam-body">
                    @if ($testType === 'practice' && $practiceLevel !== null)
                        <div class="mb-4 flex flex-wrap gap-3 text-xs font-bold uppercase tracking-wider text-[#6B7280]">
                            <span class="rounded-full bg-[#CCFBF1] px-3 py-1 text-[#0F766E]">Level: {{ $practiceLevel == -1 ? 'Other' : $practiceLevel }}</span>
                            <span class="rounded-full bg-[#CCFBF1] px-3 py-1 text-[#0F766E]">Set: {{ $practiceSet }}</span>
                            <span class="rounded-full bg-[#FFF6E9] px-3 py-1 text-[#FF7A00]">Attempt: {{ $currentAttemptNumber }} / 2</span>
                        </div>
                    @endif

            <div class="grid gap-6 lg:grid-cols-[minmax(0,14rem)_minmax(0,1fr)]">
                <aside class="lg:block">
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                        <div class="grid grid-cols-4 gap-2 sm:gap-2.5 justify-items-center">
                            @foreach ($questions as $idx => $question_row)
                                @php
                                    $qid = $question_row['id'];
                                    $answered = filled($responses[$qid] ?? null);
                                    $isPractice = $type === \App\Enums\CourseTestType::Practice;
                                    $isCurrent = $idx === $currentIndex;

                                    $result = $isPractice ? ($practiceResults[$qid] ?? null) : null;
                                    $isCorrect = ($result === 'correct');
                                    $isWrong = ($result === 'wrong_second');
                                    $isFirstWrong = ($result === 'wrong_first');

                                    $btnClasses = '';
                                    if ($isCurrent) {
                                        $btnClasses = 'exam-q-current';
                                    } elseif ($isPractice) {
                                        if ($isCorrect) {
                                            $btnClasses = 'flex h-10 w-10 items-center justify-center rounded-full border border-[#10B981] bg-[#10B981] text-sm font-bold text-white';
                                        } elseif ($isWrong) {
                                            $btnClasses = 'flex h-10 w-10 items-center justify-center rounded-full border border-[#EF4444] bg-[#EF4444] text-sm font-bold text-white';
                                        } elseif ($isFirstWrong) {
                                            $btnClasses = 'flex h-10 w-10 items-center justify-center rounded-full border border-[#FF7A00] bg-[#FFF6E9] text-sm font-bold text-[#EA580C]';
                                        } elseif ($answered) {
                                            $btnClasses = 'exam-q-answered';
                                        } else {
                                            $btnClasses = 'exam-q-default';
                                        }
                                    } else {
                                        if ($answered) {
                                            $btnClasses = 'exam-q-answered';
                                        } else {
                                            $btnClasses = 'exam-q-default';
                                        }
                                    }
                                @endphp
                                <button
                                    type="button"
                                    wire:click="gotoQuestion({{ $idx }})"
                                    class="{{ $btnClasses }}"
                                >
                                    {{ $question_row['num'] }}
                                </button>
                            @endforeach
                        </div>
                        <div class="mt-5 border-t border-slate-100 pt-5">
                            <p class="text-xs font-bold uppercase tracking-wider text-[#0F766E]">Questions</p>
                            <p class="mt-1 text-xs text-[#6B7280]">
                                @if ($type === \App\Enums\CourseTestType::Practice)
                                    Full set of questions ordered by level. Click a number to jump.
                                @else
                                    Use the grid to navigate. Your answers are saved in this session until you submit.
                                @endif
                            </p>
                            <ul class="mt-4 space-y-2 text-[11px] font-semibold text-[#6B7280]">
                                <li class="flex items-center gap-2"><span class="exam-q-current size-4 min-h-0 min-w-4 text-[10px]">1</span> Current</li>
                                <li class="flex items-center gap-2"><span class="exam-q-answered size-4 min-h-0 min-w-4 text-[10px]">2</span> Answered</li>
                                <li class="flex items-center gap-2"><span class="exam-q-default size-4 min-h-0 min-w-4 text-[10px]">3</span> Not visited</li>
                            </ul>
                        </div>
                    </div>
                </aside>

                <section class="min-w-0 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                    @if ($questions === [])
                        <p class="text-slate-600">No questions to display.</p>
                    @else
                        @php
                            $q = $questions[$currentIndex] ?? null;
                        @endphp
                        @if ($q)
                            <h2 class="mt-2 text-base font-medium leading-relaxed text-[#1F2937] font-outfit sm:text-lg">
                                {{ $currentIndex + 1 }}. {!! $q['text'] !!}
                            </h2>

                            <div class="mt-8 space-y-4" wire:key="q-{{ $q['id'] }}">
                                @php
                                    $choiceLabels = ['a' => 'A', 'b' => 'B', 'c' => 'C', 'd' => 'D'];
                                @endphp
                                @foreach ($choiceLabels as $letter => $label)
                                        @php
                                            $choice = $q['choices'][$letter] ?? null;
                                            $qid = $q['id'];
                                            $isPractice = $type === \App\Enums\CourseTestType::Practice;
                                            $showFeedback = $isPractice && ($practiceShowReasoning[$qid] ?? false);
                                            $correctLetter = $practiceCorrectAnswers[$qid] ?? null;
                                            $isSelected = ($responses[$qid] ?? null) === $letter;

                                            // New logic for disabling first wrong choice on 2nd attempt
                                            $isFirstWrongChoice = $isPractice && ($practiceFirstWrongAnswer[$qid] ?? null) === $letter && ($practiceResults[$qid] ?? null) === 'wrong_first';

                                            $labelClasses = 'exam-choice ';
                                            if ($showFeedback) {
                                                $labelClasses .= 'cursor-default ';
                                                if ($letter === $correctLetter) {
                                                    $labelClasses .= '!border-[#10B981] !bg-emerald-50 ring-1 ring-[#10B981]';
                                                } elseif ($isSelected && $letter !== $correctLetter) {
                                                    $labelClasses .= '!border-[#EF4444] !bg-rose-50 ring-1 ring-[#EF4444]';
                                                } else {
                                                    $labelClasses .= '!border-slate-200 opacity-60';
                                                }
                                            } elseif ($isFirstWrongChoice) {
                                                $labelClasses .= 'cursor-not-allowed border-slate-200 bg-slate-50 opacity-40 grayscale';
                                            }
                                        @endphp
                                        @if (filled($choice))
                                            <label class="{{ $labelClasses }}">
                                                <input
                                                    type="radio"
                                                    class="mt-1 h-4 w-4 border-slate-300 text-[#0F766E] focus:ring-[#0F766E]"
                                                    wire:model.live="responses.{{ $q['id'] }}"
                                                    value="{{ $letter }}"
                                                    @disabled($showFeedback || $isFirstWrongChoice)
                                                />
                                            <span class="text-base leading-relaxed text-slate-800 sm:text-[17px] font-medium font-outfit">
                                                <span class="font-bold text-slate-900 font-outfit">{{ $label }}.</span>
                                                {{ $choice }}
                                                @if ($showFeedback && $letter === $correctLetter)
                                                    <span class="ml-2 inline-flex items-center gap-1 font-bold text-emerald-600">
                                                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                                                        Correct Answer
                                                    </span>
                                                @endif
                                            </span>
                                        </label>
                                    @endif
                                @endforeach
                            </div>

                            {{-- Practice Feedback and Reasoning --}}
                            @if ($type === \App\Enums\CourseTestType::Practice)
                                @php
                                    $qid = $q['id'];
                                    $result = $practiceResults[$qid] ?? null;
                                    $showReasoning = $practiceShowReasoning[$qid] ?? false;
                                    $attempts = $practiceAttempts[$qid] ?? 0;
                                @endphp

                                @if ($result === 'wrong_first')
                                    <div class="mt-6 rounded-xl border border-amber-200 bg-amber-50 p-4 shadow-sm">
                                        <div class="flex items-center gap-3 text-amber-800">
                                            <svg class="size-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" /></svg>
                                            <p class="text-sm font-bold">Incorrect! Please try again. (Attempt 1/2)</p>
                                        </div>
                                    </div>
                                @elseif ($result === 'wrong_second')
                                    <div class="mt-6 rounded-xl border border-rose-200 bg-rose-50 p-4 shadow-sm">
                                        <div class="flex items-center gap-3 text-rose-800">
                                            <svg class="size-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                            <p class="text-sm font-bold">Incorrect! Here is the correct answer and rationale.</p>
                                        </div>
                                    </div>
                                @elseif ($result === 'correct')
                                    <div class="mt-6 rounded-xl border border-emerald-200 bg-emerald-50 p-4 shadow-sm">
                                        <div class="flex items-center gap-3 text-emerald-800">
                                            <svg class="size-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                            <p class="text-sm font-bold">Correct!</p>
                                        </div>
                                    </div>
                                @endif

                                @if ($showReasoning && filled($practiceReasoning[$qid] ?? null))
                                    <div class="mt-4 rounded-2xl border border-emerald-200/80 bg-emerald-50/40 p-5 shadow-sm">
                                        <h4 class="text-xs font-bold uppercase tracking-wider text-emerald-700">Rationale</h4>
                                        <p class="mt-2 text-justify text-base leading-relaxed text-slate-700 font-outfit">
                                            {{ $practiceReasoning[$qid] }}
                                        </p>
                                    </div>
                                @endif
                            @endif

                            @if ($submitError)
                                <div class="mt-6 rounded-xl border border-rose-200 bg-rose-50 p-4 shadow-sm">
                                    <div class="flex items-center gap-3">
                                        <div class="flex size-6 shrink-0 items-center justify-center rounded-full bg-rose-600 text-white">
                                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                            </svg>
                                        </div>
                                        <p class="text-sm font-bold text-rose-600">{{ $submitError }}</p>
                                    </div>
                                </div>
                            @endif

                            <div class="mt-10 flex flex-wrap items-center justify-between gap-3">
                                <button
                                    type="button"
                                    wire:click="prevQuestion"
                                    @disabled($currentIndex === 0)
                                    class="exam-btn-prev"
                                >
                                    Previous
                                </button>
                                <div class="flex flex-wrap gap-3">
                                    @if ($type === \App\Enums\CourseTestType::Practice)
                                        @php
                                            $qid = $q['id'];
                                        @endphp
                                        @if (!($practiceShowReasoning[$qid] ?? false))
                                            <button
                                                type="button"
                                                wire:click="submitPracticeAnswer({{ $qid }})"
                                                class="btn-mock-test"
                                            >
                                                Submit Answer
                                            </button>
                                        @endif
                                    @endif

                                    @if ($currentIndex < $totalQuestions - 1)
                                        <button
                                            type="button"
                                            wire:click="nextQuestion"
                                            class="exam-btn-next"
                                        >
                                            Next Question
                                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" /></svg>
                                        </button>
                                    @else
                                        <button
                                            type="button"
                                            wire:click="submitTest"
                                            wire:loading.attr="disabled"
                                            class="exam-btn-next"
                                        >
                                            <span wire:loading.remove wire:target="submitTest">Submit test</span>
                                            <span wire:loading wire:target="submitTest">Submitting…</span>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endif
                </section>
            </div>
                </div>
            </div>
        @endif
    </div>
</div>
