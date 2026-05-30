<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SmsService
{
    protected string $username = 'healthcareskill';

    protected string $pass = 'Raja_uday@2025';

    protected string $senderid = 'INURSE';

    protected string $dltEntityId = '1701158072845020034';

    public function sendOtp(string $phone, string $otp): bool
    {
        $cleanedPhone = $this->formatPhone($phone);
        if (! $cleanedPhone) {
            Log::warning("SmsService: Invalid phone number: {$phone}");

            return false;
        }

        // ✅ Make sure this matches your DLT template EXACTLY character by character
        $message = 'Dear User, your OTP '.$otp.' for FORGOT PASSWORD. Valid for 10 minutes. DO NOT SHARE. Call: +91-94452 56977 / 9445296977- IMPETUS';
        $tempId = '1707171264328240417';

        return $this->send($cleanedPhone, $message, $tempId);
    }

    public function sendPurchaseConfirmation(string $phone, string $packageDetails): bool
    {
        $cleanedPhone = $this->formatPhone($phone);
        if (! $cleanedPhone) {
            Log::warning("SmsService: Invalid phone number: {$phone}");

            return false;
        }

        $packageDetails = substr(trim($packageDetails), 0, 50);

        // ✅ Make sure this matches your DLT template EXACTLY
        $message = 'Dear User, you have successfully purchased online test. Your package details '.$packageDetails.'. Call: +91-94452 56977 / 9445296977-IMPETUS';
        $tempId = '1707171264328240419';

        return $this->send($cleanedPhone, $message, $tempId);
    }

    protected function send(string $phone, string $message, string $tempId): bool
    {
        $url = 'https://www.smsjust.com/blank/sms/user/urlsms.php';

        // ✅ Log exactly what is being sent BEFORE the API call
        Log::info('SmsService: Sending SMS', [
            'phone' => $phone,
            'tempId' => $tempId,
            'entityId' => $this->dltEntityId,
            'messageLen' => strlen($message),
            'message' => $message,
        ]);

        try {
            $response = Http::get($url, [
                'username' => $this->username,
                'pass' => $this->pass,
                'senderid' => $this->senderid,
                'dest_mobileno' => $phone,
                'message' => $message,
                'dltentityid' => $this->dltEntityId,
                'dlttempid' => $tempId,
                'response' => 'Y',
            ]);

            Log::info('SmsService: API Response', [
                'phone' => $phone,
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            if ($response->successful()) {
                return true;
            }

            Log::error("SmsService: Failed to send SMS to {$phone}", [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return false;

        } catch (\Exception $e) {
            Log::error("SmsService: Exception sending SMS to {$phone}: ".$e->getMessage());

            return false;
        }
    }

    protected function formatPhone(string $phone): ?string
    {
        $digits = preg_replace('/[^0-9]/', '', $phone);

        if (strlen($digits) >= 10) {
            // ✅ Add country code 91 prefix
            return '91'.substr($digits, -10);
        }

        return null;
    }
}
