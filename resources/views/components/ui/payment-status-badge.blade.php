@props([
    'status',
])

@php
    use App\Enums\PaymentStatus;

    $paymentStatus = $status instanceof PaymentStatus
        ? $status
        : PaymentStatus::tryFrom((string) $status);

    $config = match ($paymentStatus) {
        PaymentStatus::Completed => [
            'label' => $paymentStatus->label(),
            'container' => 'border border-emerald-200 bg-emerald-50 text-emerald-800',
            'iconWrap' => 'bg-emerald-500 text-white',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />',
        ],
        PaymentStatus::Pending => [
            'label' => $paymentStatus->label(),
            'container' => 'border border-orange-200 bg-orange-50 text-orange-800',
            'iconWrap' => 'text-orange-600',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />',
        ],
        PaymentStatus::Failed => [
            'label' => $paymentStatus->label(),
            'container' => 'border border-rose-200 bg-rose-50 text-rose-800',
            'iconWrap' => 'bg-rose-500 text-white',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />',
        ],
        PaymentStatus::Aborted => [
            'label' => $paymentStatus->label(),
            'container' => 'border border-amber-200 bg-amber-50 text-amber-900',
            'iconWrap' => 'bg-amber-500 text-white',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />',
        ],
        default => [
            'label' => 'Unknown',
            'container' => 'border border-slate-200 bg-slate-50 text-slate-700',
            'iconWrap' => 'bg-slate-400 text-white',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
        ],
    };
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center gap-2 rounded-full px-3 py-1.5 text-sm font-semibold '.$config['container']]) }}>
    <span @class([
        'flex h-6 w-6 shrink-0 items-center justify-center rounded-full',
        $config['iconWrap'],
        'p-0.5' => $paymentStatus === PaymentStatus::Pending,
    ])>
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            {!! $config['icon'] !!}
        </svg>
    </span>
    <span>{{ $config['label'] }}</span>
</span>
