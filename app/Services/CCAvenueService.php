<?php

namespace App\Services;

use App\Models\User;

class CCAvenueService
{
    /**
     * Billing fields sent with a CCAvenue checkout.
     *
     * Registration stores a state and does not collect a city or pin. Goa is the
     * only Indian state name shorter than four letters, and the shared pin
     * fallback 400001 belongs to Mumbai. CCAvenue declines that combination and
     * returns a failed payment with an empty reason. Goa checkouts therefore
     * send Panaji and a 403 pin unless the learner already has a usable Goa
     * city and pin.
     *
     * @return array{
     *     billing_address: string,
     *     billing_city: string,
     *     billing_state: string,
     *     billing_zip: string,
     *     billing_tel: string,
     *     billing_country: string
     * }
     */
    public function billingDetails(User $user): array
    {
        $state = trim((string) ($user->state ?? ''));
        $isGoa = strcasecmp($state, 'Goa') === 0;

        $billingAddress = trim(($user->address_line_1 ?? '').' '.($user->address_line_2 ?? ''));
        if ($billingAddress === '') {
            $billingAddress = 'Address Not Provided';
        } elseif (strlen($billingAddress) < 10) {
            $billingAddress = str_pad($billingAddress, 10, ' ');
        }

        $billingCity = trim((string) ($user->city ?? ''));
        if ($isGoa && ($billingCity === '' || strlen($billingCity) < 4 || strcasecmp($billingCity, 'Goa') === 0)) {
            $billingCity = 'Panaji';
        } elseif ($billingCity === '') {
            $billingCity = $state !== '' ? $state : 'Mumbai';
        }

        if ($isGoa) {
            $billingZip = preg_replace('/\D/', '', (string) ($user->zip_code ?? '')) ?? '';
            if (! preg_match('/^403\d{3}$/', $billingZip)) {
                $billingZip = '403001';
            }
        } else {
            $billingZip = trim((string) ($user->zip_code ?? ''));
            if ($billingZip === '' || ! preg_match('/^[a-zA-Z0-9]{3,12}$/', $billingZip)) {
                $billingZip = '400001';
            }
        }

        $billingTel = preg_replace('/[^0-9]/', '', (string) ($user->phone ?? '')) ?? '';
        if (strlen($billingTel) < 10 || strlen($billingTel) > 15) {
            $billingTel = '9999999999';
        }

        return [
            'billing_address' => $billingAddress,
            'billing_city' => $billingCity,
            'billing_state' => $isGoa ? 'Goa' : (string) ($user->state ?? ''),
            'billing_zip' => $billingZip,
            'billing_tel' => $billingTel,
            'billing_country' => $user->country ?? 'India',
        ];
    }

    /**
     * Encrypt plain text using CCAvenue AES working key.
     */
    public function encrypt(string $plainText, string $key): string
    {
        $secretKey = $this->hextobin(md5($key));
        $initVector = pack('C*', 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0A, 0x0B, 0x0C, 0x0D, 0x0E, 0x0F);
        $encrypted = openssl_encrypt($plainText, 'AES-128-CBC', $secretKey, OPENSSL_RAW_DATA, $initVector);

        return bin2hex($encrypted);
    }

    /**
     * Decrypt encrypted text using CCAvenue AES working key.
     */
    public function decrypt(string $encryptedText, string $key): string
    {
        $secretKey = $this->hextobin(md5($key));
        $initVector = pack('C*', 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0A, 0x0B, 0x0C, 0x0D, 0x0E, 0x0F);
        $encryptedBin = $this->hextobin($encryptedText);
        $decrypted = openssl_decrypt($encryptedBin, 'AES-128-CBC', $secretKey, OPENSSL_RAW_DATA, $initVector);

        return (string) $decrypted;
    }

    /**
     * Convert hex string to binary.
     */
    private function hextobin(string $hexString): string
    {
        $length = strlen($hexString);
        $binString = '';
        $count = 0;
        while ($count < $length) {
            $subString = substr($hexString, $count, 2);
            $packedString = pack('H*', $subString);
            if ($count == 0) {
                $binString = $packedString;
            } else {
                $binString .= $packedString;
            }
            $count += 2;
        }

        return $binString;
    }

    /**
     * Retrieve the gateway URL depending on sandbox setting.
     */
    public function getGatewayUrl(): string
    {
        $isSandbox = config('services.ccavenue.sandbox', true);

        return $isSandbox
            ? 'https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction'
            : 'https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction';
    }
}
