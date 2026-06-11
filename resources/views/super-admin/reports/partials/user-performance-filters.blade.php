<div class="h-full rounded-2xl border border-gray-100 bg-white p-4 shadow-lg dark:border-gray-700 dark:bg-gray-800">
    <form action="{{ request()->url() }}" method="GET" class="flex h-full flex-wrap items-end gap-3">
        <input type="hidden" name="state_id" value="{{ request('state_id') }}">

        <div class="min-w-[160px] flex-1">
            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Course / Module</label>
            <select name="course_id" class="block w-full rounded-lg border-gray-300 py-2 pl-3 pr-10 text-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                <option value="" {{ empty($filters['course_id']) ? 'selected' : '' }}>All Modules</option>
                @foreach ($stateCourses as $course)
                    <option value="{{ $course->id }}" {{ (string) $filters['course_id'] === (string) $course->id ? 'selected' : '' }}>
                        {{ $course->couse_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="w-full sm:w-36">
            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">From Date</label>
            <input type="date" name="from_date" value="{{ $filters['from_date'] }}"
                onclick="this.showPicker()"
                class="date-input-picker block w-full rounded-lg border-gray-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
        </div>

        <div class="w-full sm:w-36">
            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">To Date</label>
            <input type="date" name="to_date" value="{{ $filters['to_date'] }}"
                onclick="this.showPicker()"
                class="date-input-picker block w-full rounded-lg border-gray-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
        </div>

        <div class="w-full sm:w-36">
            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Exam Type</label>
            <select name="exam_type" class="block w-full rounded-lg border-gray-300 py-2 pl-3 pr-10 text-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                <option value="" {{ empty($filters['exam_type']) ? 'selected' : '' }}>All Exams</option>
                <option value="pre" {{ $filters['exam_type'] === 'pre' ? 'selected' : '' }}>Pre-Test</option>
                <option value="mock" {{ $filters['exam_type'] === 'mock' ? 'selected' : '' }}>Mock Test</option>
                <option value="final" {{ $filters['exam_type'] === 'final' ? 'selected' : '' }}>Final Test</option>
                <option value="passed" {{ $filters['exam_type'] === 'passed' ? 'selected' : '' }}>Completed (Passed)</option>
            </select>
        </div>

        <div class="flex w-full gap-2 sm:w-auto">
            <button type="submit" class="flex-1 rounded-lg bg-gradient-to-r from-impetus-orange to-orange-500 px-6 py-2 font-bold text-white shadow-md transition-all duration-200 hover:from-orange-600 hover:to-orange-500 hover:shadow-lg sm:flex-none">
                Search
            </button>
            <a href="{{ request()->url() }}?state_id={{ request('state_id') }}" class="flex-1 rounded-lg bg-gray-200 px-6 py-2 text-center font-bold text-gray-700 transition-all duration-200 hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 sm:flex-none">
                Reset
            </a>
        </div>
    </form>
</div>
