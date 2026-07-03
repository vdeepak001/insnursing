<?php

namespace Tests\Support;

use App\Enums\CourseTestType;
use App\Models\CourseDetail;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CourseTestResultPreview extends Component
{
    public CourseTestType $type = CourseTestType::Final;

    public bool $passed = true;

    public int $finalAttemptCount = 1;

    public string $testType = 'final';

    public int $totalQuestions = 10;

    public int $correctCount = 8;

    public float $scorePercent = 80.0;

    public int $obtainedScore = 80;

    public int $maxScore = 100;

    public ?string $formattedDuration = '12:34';

    public int $courseId;

    public ?int $orderId = null;

    public ?int $rating = null;

    public function mount(int $courseId): void
    {
        $this->courseId = $courseId;
    }

    public function render(): View
    {
        $course = CourseDetail::query()->findOrFail($this->courseId);

        return view('livewire.frontend.partials.course-test-result', [
            'type' => $this->type,
            'passed' => $this->passed,
            'finalAttemptCount' => $this->finalAttemptCount,
            'testType' => $this->testType,
            'totalQuestions' => $this->totalQuestions,
            'correctCount' => $this->correctCount,
            'scorePercent' => $this->scorePercent,
            'obtainedScore' => $this->obtainedScore,
            'maxScore' => $this->maxScore,
            'formattedDuration' => $this->formattedDuration,
            'course' => $course,
            'orderId' => $this->orderId,
            'rating' => $this->rating,
        ]);
    }
}
