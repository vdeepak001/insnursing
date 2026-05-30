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

    /**
     * Send OTP SMS for Forgot Password.
     */
    public function sendOtp(string $phone, string $otp): bool
    {
        $cleanedPhone = $this->formatPhone($phone);
        if (!$cleanedPhone) {
            Log::warning("SmsService: Invalid phone number passed: {$phone}");
            return false;
        }

        $message = 'Dear User, your OTP ' . $otp . ' for FORGOT PASSWORD. Valid for 10 minutes. DO NOT SHARE. Call: +91-94452 56977 / 9445296977- IMPETUS';
        $tempId = '1707171264328240417';

        return $this->send($cleanedPhone, $message, $tempId);
    }

    /**
     * Send Purchase Confirmation SMS.
     */
    public function sendPurchaseConfirmation(string $phone, string $packageDetails): bool
    {
        $cleanedPhone = $this->formatPhone($phone);
        if (!$cleanedPhone) {
            Log::warning("SmsService: Invalid phone number passed: {$phone}");
            return false;
        }

        // Enforce safe length of package details to fit DLT template limit
        $packageDetails = substr($packageDetails, 0, 50);

        $message = 'Dear User, you have successfully purchased online test. Your package details ' . $packageDetails . '. Call: +91-94452 56977 / 9445296977-IMPETUS';
        $tempId = '1707171264328240419';

        return $this->send($cleanedPhone, $message, $tempId);
    }

    /**
     * Helper to send HTTP GET request to the SMS gateway.
     */
    protected function send(string $phone, string $message, string $tempId): bool
    {
        $url = 'https://www.smsjust.com/blank/sms/user/urlsms.php';

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

            if ($response->successful()) {
                Log::info("SmsService: SMS sent successfully to {$phone}. Response: " . $response->body());
                return true;
            }

            Log::error("SmsService: Failed to send SMS to {$phone}. Status: " . $response->status() . " Response: " . $response->body());
            return false;
        } catch (\Exception $e) {
            Log::error("SmsService: Exception sending SMS to {$phone}: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Keep only digits, ensures it's 10 digits (removing country prefix 91 if present).
     */
    protected function formatPhone(string $phone): ?string
    {
        $digits = preg_replace('/[^0-9]/', '', $phone);
        
        // Extract the last 10 digits (removes any leading country code prefix)
        if (strlen($digits) >= 10) {
            return substr($digits, -10);
        }

        return null;
    }
}
