<?php

namespace App\Enums;

enum PaymentMode: string
{
    case InternetBanking = 'internet_banking';
    case Ccavenue = 'ccavenue';
    case OthersNeft = 'others_neft';

    public function label(): string
    {
        return match ($this) {
            self::InternetBanking => 'Internet Banking',
            self::Ccavenue => 'Ccavenue',
            self::OthersNeft => 'Others / NEFT',
        };
    }

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
