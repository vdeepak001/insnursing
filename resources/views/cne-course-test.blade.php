@extends('layouts.frontend.app')

@section('title', $title)

@section('content')
    {{-- Reduced top padding to pull the test interface up closer to the navigation --}}
    <div class="pt-20 sm:pt-24">
        <livewire:frontend.course-test-taking :course-id="$course->id" :test-type="$testType->value" :key="'test-'.$course->id.'-'.$testType->value" />
    </div>
@endsection
