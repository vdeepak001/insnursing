<?php

namespace App\Http\Controllers;

use App\Services\AdminDashboardService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct(private AdminDashboardService $dashboard) {}

    public function index(): View|RedirectResponse
    {
        if (auth()->user()?->role_type === 'user') {
            return redirect()->route('profile');
        }

        $attemptsMonth = request()->string('attempts_month')->toString();
        $data = $this->dashboard->build($attemptsMonth !== '' ? $attemptsMonth : null);

        return view('pages.dashboard.ecommerce', [
            'title' => 'Dashboard Overview',
            'stats' => $data['stats'],
            'charts' => $data['charts'],
            'recentAttempts' => $data['recent_attempts'],
            'topPerforming' => $data['top_performing'],
        ]);
    }
}
