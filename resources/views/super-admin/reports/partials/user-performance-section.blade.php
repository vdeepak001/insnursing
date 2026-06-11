@include('super-admin.reports.partials.user-performance-print-styles')

@include('super-admin.reports.partials.user-performance-filters', [
    'stateCourses' => $stateCourses,
    'filters' => $filters,
])

@include('super-admin.reports.partials.user-performance-table', [
    'selectedState' => $selectedState,
    'userAttempts' => $userAttempts,
    'filters' => $filters,
])
