<div class="pb-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        @if ($fatalError)
            <div class="rounded-2xl border border-impetus-orange/20 bg-impetus-lightOrange px-6 py-8 text-slate-800 shadow-sm">
                <p class="text-lg font-semibold">This test cannot be loaded</p>
                <p class="mt-2 whitespace-pre-line text-sm text-slate-600">{{ $fatalError }}</p>
                <a
                    href="{{ $testType === 'practice' ? route('cne.modules.test', [$course->couse_name, 'practice']) : route('cne.modules.show', $course->couse_name) }}"
                    class="mt-6 inline-flex items-center gap-2 rounded-xl border border-impetus-teal/20 bg-white px-5 py-2.5 text-sm font-semibold text-impetus-teal shadow-sm transition hover:bg-impetus-teal-muted"
                >
                    Back to {{ $testType === 'practice' ? 'practice sets' : 'module' }}
                </a>
            </div>
        @elseif ($submitted)
            @include('livewire.frontend.partials.course-test-result')
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
                                    'bg-impetus-orange/90' => $examTimeExpired,
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
                            <span class="rounded-full bg-[#CCFBF1] px-3 py-1 text-[#045A5D]">Level: {{ $practiceLevel == -1 ? 'Other' : $practiceLevel }}</span>
                            <span class="rounded-full bg-[#CCFBF1] px-3 py-1 text-[#045A5D]">Set: {{ $practiceSet }}</span>
                            <span class="rounded-full bg-[#FFF6E9] px-3 py-1 text-[#FF7A00]">Attempt: {{ $currentAttemptNumber }} / 2</span>
                        </div>
                    @endif

            <div class="grid gap-4 lg:grid-cols-[minmax(0,13.5rem)_minmax(0,1fr)] lg:items-start lg:gap-6">
                <aside class="lg:sticky lg:top-4 lg:self-start">
                    <div class="exam-sidebar-card">
                        <div class="exam-sidebar-accent" aria-hidden="true"></div>
                        <div class="exam-sidebar-intro">
                            <p class="text-xs font-bold uppercase tracking-wider text-[#045A5D]">Questions</p>
                            <p class="mt-0.5 text-[11px] leading-snug text-[#6B7280]">
                                @if ($type === \App\Enums\CourseTestType::Practice)
                                    Full set of questions ordered by level. Click a number to jump.
                                @else
                                    Use the grid to navigate. Your answers are saved in this session until you submit.
                                @endif
                            </p>
                        </div>
                        <div class="exam-sidebar-grid">
                        <div class="grid grid-cols-5 gap-2 justify-items-center sm:grid-cols-6 lg:grid-cols-4">
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
                                    $isAnswerVerified = $isPractice
                                        ? (($practiceShowReasoning[$qid] ?? false) || in_array($result, ['correct', 'wrong_second'], true))
                                        : $answered;

                                    $btnClasses = '';
                                    if ($isCurrent && ! $isAnswerVerified) {
                                        $btnClasses = 'exam-q-current';
                                    } elseif ($isPractice) {
                                        if ($isCorrect) {
                                            $btnClasses = 'flex h-10 w-10 items-center justify-center rounded-full border border-[#10B981] bg-[#10B981] text-sm font-bold text-white';
                                        } elseif ($isWrong) {
                                            $btnClasses = 'flex h-10 w-10 items-center justify-center rounded-full border border-[#EF4444] bg-[#EF4444] text-sm font-bold text-white';
                                        } elseif ($isFirstWrong) {
                                            $btnClasses = 'flex h-10 w-10 items-center justify-center rounded-full border border-[#FF7A00] bg-[#FFF6E9] text-sm font-bold text-[#EA580C]';
                                        } elseif ($isAnswerVerified || $answered) {
                                            $btnClasses = 'exam-q-answered';
                                        } else {
                                            $btnClasses = 'exam-q-default';
                                        }
                                    } elseif ($isAnswerVerified) {
                                        $btnClasses = 'exam-q-answered';
                                    } else {
                                        $btnClasses = 'exam-q-default';
                                    }
                                @endphp
                                <button
                                    type="button"
                                    wire:click="gotoQuestion({{ $idx }})"
                                    class="{{ $btnClasses }}"
                                    aria-label="Question {{ $question_row['num'] }}"
                                    @if ($isCurrent) aria-current="true" @endif
                                >
                                    {{ $question_row['num'] }}
                                </button>
                            @endforeach
                        </div>
                        </div>
                    </div>
                </aside>

                <div class="flex min-h-full min-w-0 flex-col gap-4">
                <section class="min-w-0 flex-1 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                    @if ($questions === [])
                        <p class="text-slate-600">No questions to display.</p>
                    @else
                        @php
                            $q = $questions[$currentIndex] ?? null;
                        @endphp
                        @if ($q)
                            <h2 class="mt-2 text-base font-medium leading-relaxed text-[#1F2937] font-outfit sm:text-lg">
                                <style>
                                    .question-text-inline p, .question-text-inline div {
                                        display: inline !important;
                                        margin: 0 !important;
                                    }
                                </style>
                                <span class="question-text-inline">
                                    {{ $currentIndex + 1 }}. {!! $q['text'] !!}
                                </span>
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
                                                    $labelClasses .= '!border-impetus-teal !bg-impetus-teal-muted ring-1 ring-impetus-teal';
                                                } elseif ($isSelected && $letter !== $correctLetter) {
                                                    $labelClasses .= '!border-impetus-orange !bg-impetus-lightOrange ring-1 ring-impetus-orange';
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
                                                    class="mt-1 h-4 w-4 border-slate-300 text-[#045A5D] focus:ring-[#045A5D]"
                                                    wire:model.live="responses.{{ $q['id'] }}"
                                                    value="{{ $letter }}"
                                                    @disabled($showFeedback || $isFirstWrongChoice)
                                                />
                                            <span class="text-base leading-relaxed text-slate-800 sm:text-[17px] font-medium font-outfit">
                                                <span class="font-bold text-slate-900 font-outfit">{{ $label }}.</span>
                                                {{ $choice }}
                                                @if ($showFeedback && $letter === $correctLetter)
                                                    <span class="ml-2 inline-flex items-center gap-1 font-bold text-impetus-teal">
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
                                    <div class="mt-6 rounded-xl border border-impetus-orange/20 bg-impetus-lightOrange p-4 shadow-sm">
                                        <div class="flex items-center gap-3 text-slate-700">
                                            <svg class="size-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" /></svg>
                                            <p class="text-sm font-bold">Incorrect! Please try again. (Attempt 1/2)</p>
                                        </div>
                                    </div>
                                @elseif ($result === 'wrong_second')
                                    <div class="mt-6 rounded-xl border border-impetus-orange/20 bg-impetus-lightOrange p-4 shadow-sm">
                                        <div class="flex items-center gap-3 text-slate-700">
                                            <svg class="size-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                            <p class="text-sm font-bold">Incorrect! Here is the correct answer and rationale.</p>
                                        </div>
                                    </div>
                                @elseif ($result === 'correct')
                                    <div class="mt-6 rounded-xl border border-impetus-teal/20 bg-impetus-teal-muted/50 p-4 shadow-sm">
                                        <div class="flex items-center gap-3 text-impetus-teal">
                                            <svg class="size-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                            <p class="text-sm font-bold">Correct!</p>
                                        </div>
                                    </div>
                                @endif

                                @if ($showReasoning && filled($practiceReasoning[$qid] ?? null))
                                    <div class="mt-4 rounded-2xl border border-impetus-teal/20 bg-impetus-teal-muted/40 p-5 shadow-sm">
                                        <h4 class="text-xs font-bold uppercase tracking-wider text-impetus-teal">Rationale</h4>
                                        <p class="mt-2 text-justify text-base leading-relaxed text-slate-700 font-outfit">
                                            {{ $practiceReasoning[$qid] }}
                                        </p>
                                    </div>
                                @endif
                            @endif

                            @if ($submitError)
                                <div class="mt-6 rounded-xl border border-impetus-orange/20 bg-impetus-lightOrange p-4 shadow-sm">
                                    <div class="flex items-center gap-3">
                                        <div class="flex size-6 shrink-0 items-center justify-center rounded-full bg-impetus-orange text-white">
                                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                            </svg>
                                        </div>
                                        <p class="text-sm font-bold text-impetus-orange">{{ $submitError }}</p>
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
                                            class="exam-btn-submit-large"
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

                {{--
                <div class="exam-bottom-legend">
                    <ul class="exam-legend-row" role="list">
                        <li class="exam-legend-item">
                            <span class="exam-legend-label">Current (not verified)</span>
                            <span class="exam-legend-dot exam-q-current" aria-hidden="true">1</span>
                        </li>
                        <li class="exam-legend-item">
                            <span class="exam-legend-label">Answered</span>
                            <span class="exam-legend-dot exam-q-answered" aria-hidden="true">2</span>
                        </li>
                        <li class="exam-legend-item">
                            <span class="exam-legend-label">Not visited</span>
                            <span class="exam-legend-dot exam-q-default" aria-hidden="true">3</span>
                        </li>
                    </ul>
                </div>
                --}}
                </div>
            </div>
                </div>
            </div>
        @endif
    </div>
</div>
