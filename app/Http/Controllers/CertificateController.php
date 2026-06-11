<?php

namespace App\Http\Controllers;

use App\Enums\CourseTestType;
use App\Enums\PaymentStatus;
use App\Models\CourseTestAttempt;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CertificateController extends Controller
{
    public function download(Request $request, int $orderId): Response
    {
        ini_set('memory_limit', '256M');
        $order = Order::with(['courseDetail', 'user', 'stateCouncil'])->findOrFail($orderId);

        // Ensure the order belongs to the authenticated user OR user is an admin/staff
        $authUser = Auth::user();
        if ($authUser->role_type === 'user' && $order->user_id !== $authUser->id) {
            abort(403);
        }

        $completion = $this->passedFinalAttemptForOrder($order);

        if (! $completion) {
            abort(404, 'Certificate is not available for this module purchase.');
        }

        $points = 0;
        if ($order->state_council_id) {
            $pivot = DB::table('course_detail_state_council')
                ->where('course_detail_id', $order->course_detail_id)
                ->where('state_council_id', $order->state_council_id)
                ->first();
            if ($pivot) {
                $p = json_decode($pivot->points, true);
                $points = is_array($p) ? ($p[0] ?? 0) : ($p ?? 0);
            }
        }

        $data = [
            'order' => $order,
            'completion' => $completion,
            'user' => $order->user,
            'course' => $order->courseDetail,
            'date' => $completion->completed_at->displayDate(),
            'points' => (int) $points,
        ];

        $pdf = app('dompdf.wrapper')->loadView('certificates.standard', $data);
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('Certificate-'.($order->courseDetail->course_code ?? 'CNE').'.pdf');
    }

    private function passedFinalAttemptForOrder(Order $order): ?CourseTestAttempt
    {
        $nextOrder = Order::query()
            ->where('user_id', $order->user_id)
            ->where('course_detail_id', $order->course_detail_id)
            ->where('payment_status', PaymentStatus::Completed)
            ->where('id', '>', $order->id)
            ->oldest('id')
            ->first();

        $query = CourseTestAttempt::query()
            ->where('user_id', $order->user_id)
            ->where('course_detail_id', $order->course_detail_id)
            ->where('test_type', CourseTestType::Final)
            ->where('status', CourseTestAttempt::STATUS_COMPLETED)
            ->where('passed', true)
            ->where('started_at', '>=', $order->created_at);

        if ($nextOrder) {
            $query->where('started_at', '<', $nextOrder->created_at);
        }

        return $query->latest('completed_at')->first();
    }
}
