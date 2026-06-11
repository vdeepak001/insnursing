<?php

use App\Helpers\DateHelper;
use Illuminate\Support\Carbon;

it('formats display dates as dd/mm/yyyy', function () {
    $date = Carbon::parse('2026-06-11 10:13:00');

    expect(DateHelper::display($date))->toBe('11/06/2026');
    expect(DateHelper::displayDateTime($date))->toBe('11/06/2026 10:13 AM');
    expect(DateHelper::displayDateString('2026-01-05'))->toBe('05/01/2026');
    expect(DateHelper::displayRange('2026-01-01', '2026-01-31'))->toBe('01/01/2026 to 31/01/2026');
});

it('keeps html date inputs in yyyy-mm-dd format', function () {
    $date = Carbon::parse('2026-06-11');

    expect(DateHelper::forInput($date))->toBe('2026-06-11');
});
