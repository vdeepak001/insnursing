<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Services\ResultsReportService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ResultsController extends Controller
{
    public function __construct(private ResultsReportService $reports) {}

    public function index(Request $request): View
    {
        $dateRange = $this->reports->resolveDateRange($request);
        $moduleRows = $this->reports->moduleRows($dateRange['from'], $dateRange['to']);
        $chartData = $this->reports->donutChartData($moduleRows);

        return view('super-admin.results.index', [
            'title' => 'Results',
            'moduleRows' => $moduleRows,
            'chartData' => $chartData,
            'filters' => [
                'from_date' => $dateRange['from_date'],
                'to_date' => $dateRange['to_date'],
            ],
        ]);
    }
}
