<?php

namespace App\Helpers;

use Carbon\Carbon;
use DateTimeInterface;

class DateHelper
{
    public const DISPLAY_DATE = 'd/m/Y';

    public const DISPLAY_DATETIME = 'd/m/Y h:i A';

    public const INPUT_DATE = 'Y-m-d';

    public static function display(?DateTimeInterface $date, string $fallback = '-'): string
    {
        if ($date === null) {
            return $fallback;
        }

        return Carbon::parse($date)->format(self::DISPLAY_DATE);
    }

    public static function displayDateTime(?DateTimeInterface $date, string $fallback = '-'): string
    {
        if ($date === null) {
            return $fallback;
        }

        return Carbon::parse($date)->format(self::DISPLAY_DATETIME);
    }

    public static function displayDateString(?string $date, string $fallback = '-'): string
    {
        if (blank($date)) {
            return $fallback;
        }

        return Carbon::parse($date)->format(self::DISPLAY_DATE);
    }

    public static function displayRange(?string $from, ?string $to): string
    {
        if ($from === $to) {
            return self::displayDateString($from);
        }

        return self::displayDateString($from).' to '.self::displayDateString($to);
    }

    public static function forInput(?DateTimeInterface $date): ?string
    {
        if ($date === null) {
            return null;
        }

        return Carbon::parse($date)->format(self::INPUT_DATE);
    }
}
