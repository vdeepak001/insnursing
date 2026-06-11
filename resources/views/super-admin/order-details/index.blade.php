@extends('layouts.app')

@section('content')
    <div x-data="orderDetails(@js(url(App\Helpers\MenuHelper::getCurrentPrefix() . '/users-list')), @js(csrf_token()))"
         @keydown.escape.window="if (courseOpen) { closeCourse() }">

    <div class="mb-6">
        <h2 class="text-xl font-bold text-gray-800 dark:text-white/90">
            {{ $title }}
        </h2>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Module payment orders recorded for learners.
        </p>
    </div>

    <form method="GET" id="order-filters-form" class="mb-4 rounded-lg bg-white p-4 shadow-sm dark:bg-gray-800">
        <div class="flex flex-wrap items-end gap-3">
            <div class="min-w-[220px] flex-1">
                <label for="order-search" class="mb-1 block text-xs font-medium text-gray-600 dark:text-gray-300">
                    Search
                </label>
                <input id="order-search" name="search" type="text" value="{{ $filters['search'] }}"
                    placeholder="Name, UID, email, module..."
                    oninput="window.orderFiltersDebounceSubmit()"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100" />
            </div>

            <div class="min-w-[150px]">
                <label for="from-date" class="mb-1 block text-xs font-medium text-gray-600 dark:text-gray-300">
                    From
                </label>
                <input id="from-date" name="from_date" type="date" value="{{ $filters['from_date'] }}"
                    onchange="this.form.submit()"
                    onclick="this.showPicker()"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100" />
            </div>

            <div class="min-w-[150px]">
                <label for="to-date" class="mb-1 block text-xs font-medium text-gray-600 dark:text-gray-300">
                    To
                </label>
                <input id="to-date" name="to_date" type="date" value="{{ $filters['to_date'] }}"
                    onchange="this.form.submit()"
                    onclick="this.showPicker()"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100" />
            </div>

            <div class="min-w-[180px]">
                <label for="order-mode" class="mb-1 block text-xs font-medium text-gray-600 dark:text-gray-300">
                    Payment mode
                </label>
                <select id="order-mode" name="payment_mode" onchange="this.form.submit()"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100">
                    <option value="">All</option>
                    @foreach ($paymentModes as $mode)
                        <option value="{{ $mode['value'] }}" @selected($filters['payment_mode'] === $mode['value'])>
                            {{ $mode['label'] }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="min-w-[160px]">
                <label for="order-status" class="mb-1 block text-xs font-medium text-gray-600 dark:text-gray-300">
                    Status
                </label>
                <select id="order-status" name="payment_status" onchange="this.form.submit()"
                    class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100">
                    <option value="">All</option>
                    @foreach ($paymentStatuses as $status)
                        <option value="{{ $status['value'] }}" @selected($filters['payment_status'] === $status['value'])>
                            {{ $status['label'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <x-ui.button variant="secondary" size="sm" href="{{ route(request()->route()->getName()) }}">
                Clear
            </x-ui.button>
        </div>
    </form>

    <div class="bg-white shadow-md rounded-lg overflow-hidden dark:bg-gray-800">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gradient-to-r from-impetus-teal to-impetus-orange">
                    <tr>
                        <th scope="col"
                            class="px-4 py-4 text-left text-xs font-bold text-white uppercase tracking-wider font-outfit w-14">
                            S. No
                        </th>
                        <th scope="col"
                            class="px-4 py-4 text-left text-xs font-bold text-white uppercase tracking-wider font-outfit">
                            UID
                        </th>
                        <th scope="col"
                            class="px-4 py-4 text-left text-xs font-bold text-white uppercase tracking-wider font-outfit">
                            Name
                        </th>
                        {{-- <th scope="col"
                            class="px-4 py-4 text-left text-xs font-bold text-white uppercase tracking-wider font-outfit min-w-[10rem]">
                            Module
                        </th> --}}
                        <th scope="col"
                            class="px-4 py-4 text-left text-xs font-bold text-white uppercase tracking-wider font-outfit whitespace-nowrap">
                            Payment mode
                        </th>
                        <th scope="col"
                            class="px-4 py-4 text-left text-xs font-bold text-white uppercase tracking-wider font-outfit whitespace-nowrap">
                            Status
                        </th>
                        <th scope="col"
                            class="px-4 py-4 text-left text-xs font-bold text-white uppercase tracking-wider font-outfit whitespace-nowrap">
                            Date &amp; Time of Transaction
                        </th>
                        <th scope="col"
                            class="px-4 py-4 text-left text-xs font-bold text-white uppercase tracking-wider font-outfit min-w-[8rem]">
                            Remarks
                        </th>
                        <th scope="col"
                            class="px-4 py-4 text-center text-xs font-bold text-white uppercase tracking-wider font-outfit w-20">
                            View
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @forelse ($orders as $order)
                        <tr class="odd:bg-white even:bg-impetus-teal-muted/50 hover:bg-brand-50/80 transition-colors">
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ ($orders->currentPage() - 1) * $orders->perPage() + $loop->iteration }}
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                {{ $order->user?->unique_sequence_number ?? '—' }}
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                    @php
                                        $learner = $order->user;
                                        $learnerName = $learner
                                            ? ($learner->name ?: trim(($learner->first_name ?? '').' '.($learner->last_name ?? '')) ?: '—')
                                            : '—';
                                    @endphp
                                    {{ $learnerName }}
                                </div>
                            </td>
                            {{-- <td class="px-4 py-4 text-sm text-gray-900 dark:text-gray-100">
                                {{ $order->courseDetail?->couse_name ?? '—' }}
                            </td> --}}
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                {{ \App\Enums\PaymentMode::tryFrom($order->payment_mode)?->label() ?? \Illuminate\Support\Str::of($order->payment_mode)->replace('_', ' ')->title() }}
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <x-ui.payment-status-badge :status="$order->payment_status" />
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                {{ $order->created_at->displayDateTime() }}
                            </td>
                            <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400 max-w-[12rem]">
                                @if ($order->remarks)
                                    <span class="line-clamp-2" title="{{ e($order->remarks) }}">{{ $order->remarks }}</span>
                                @else
                                    —
                                @endif
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <x-ui.button type="button" variant="secondary" size="sm" class="!px-3 !py-2"
                                    @click="openCourse({{ $order->user_id }})"
                                    title="View purchased modules">
                                    View Report
                                </x-ui.button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8"
                                class="px-6 py-10 text-center text-sm text-gray-500 dark:text-gray-400">
                                No orders recorded yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if ($orders->hasPages())
        <div class="mt-4 px-2">
            {{ $orders->links() }}
        </div>
    @endif

    {{-- Purchased Modules popup --}}
    <div x-show="courseOpen" x-cloak class="fixed inset-0 z-[99999] flex items-center justify-center overflow-y-auto p-5">
        <div @click="closeCourse()" class="fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>

        <div @click.stop
            class="relative w-full max-w-4xl max-h-[90vh] overflow-hidden rounded-3xl bg-white shadow-xl dark:bg-gray-900"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95">
            
            <button type="button" @click="closeCourse()"
                class="absolute right-3 top-3 z-10 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-100 text-gray-400 transition-colors hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white sm:right-6 sm:top-6 sm:h-11 sm:w-11">
                <span class="sr-only">Close</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M6.04289 16.5413C5.65237 16.9318 5.65237 17.565 6.04289 17.9555C6.43342 18.346 7.06658 18.346 7.45711 17.9555L11.9987 13.4139L16.5408 17.956C16.9313 18.3466 17.5645 18.3466 17.955 17.956C18.3455 17.5655 18.3455 16.9323 17.955 16.5418L13.4129 11.9997L17.955 7.4576C18.3455 7.06707 18.3455 6.43391 17.955 6.04338C17.5645 5.65286 16.9313 5.65286 16.5408 6.04338L11.9987 10.5855L7.45711 6.0439C7.06658 5.65338 6.43342 5.65338 6.04289 6.0439C5.65237 6.43442 5.65237 7.06759 6.04289 7.45811L10.5845 11.9997L6.04289 16.5413Z"
                        fill="currentColor" />
                </svg>
            </button>

            <div class="p-6 sm:p-8 overflow-y-auto max-h-[90vh]">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1 pr-10">
                    Purchased Modules
                </h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
                    Modules purchased by this learner and their completion status.
                </p>

                <div x-show="courseLoading" class="text-sm text-gray-500 dark:text-gray-400">Loading module data…</div>

                <div x-show="!courseLoading">
                    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-bold uppercase text-gray-500 dark:text-gray-400">#</th>
                                    <th class="px-4 py-3 text-left text-xs font-bold uppercase text-gray-500 dark:text-gray-400">Module</th>
                                    <th class="px-4 py-3 text-left text-xs font-bold uppercase text-gray-500 dark:text-gray-400">Purchase Date</th>
                                    <th class="px-4 py-3 text-left text-xs font-bold uppercase text-gray-500 dark:text-gray-400">Expiry Date</th>
                                    <th class="px-4 py-3 text-left text-xs font-bold uppercase text-gray-500 dark:text-gray-400">Completion Date</th>
                                    <th class="px-4 py-3 text-left text-xs font-bold uppercase text-gray-500 dark:text-gray-400">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-900">
                                <template x-for="(order, index) in courseOrders" :key="order.id">
                                    <tr>
                                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300" x-text="index + 1"></td>
                                        <td class="px-4 py-3 text-sm font-semibold text-gray-900 dark:text-white" x-text="order.course_name"></td>
                                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300" x-text="order.purchase_date"></td>
                                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300" x-text="order.expiry_date"></td>
                                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300" x-text="order.completion_date"></td>
                                        <td class="px-4 py-3 text-sm">
                                            <template x-if="order.passed">
                                                <span class="inline-flex rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-bold text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400">Passed</span>
                                            </template>
                                            <template x-if="!order.passed && order.completion_date !== '-'">
                                                <span class="inline-flex rounded-full bg-rose-100 px-2.5 py-0.5 text-xs font-bold text-rose-800 dark:bg-rose-900/30 dark:text-rose-400">Failed</span>
                                            </template>
                                            <template x-if="order.completion_date === '-'">
                                                <span class="inline-flex rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-bold text-gray-800 dark:bg-gray-800 dark:text-gray-400">Not Completed</span>
                                            </template>
                                        </td>
                                    </tr>
                                </template>
                                <template x-if="courseOrders.length === 0">
                                    <tr>
                                        <td colspan="6" class="px-4 py-8 text-center text-sm text-gray-500 dark:text-gray-400">No modules purchased yet.</td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <x-ui.button type="button" variant="secondary" size="sm" @click="closeCourse()">
                        Close
                    </x-ui.button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
    <script>
        let orderFiltersDebounceTimer;

        window.orderFiltersDebounceSubmit = function () {
            clearTimeout(orderFiltersDebounceTimer);
            orderFiltersDebounceTimer = setTimeout(() => {
                document.getElementById('order-filters-form')?.submit();
            }, 500);
        };

        document.addEventListener('alpine:init', () => {
            Alpine.data('orderDetails', (usersListBaseUrl, csrfToken) => ({
                usersListBaseUrl,
                csrfToken,
                courseOpen: false,
                courseUserId: null,
                courseOrders: [],
                courseLoading: false,

                async openCourse(userId) {
                    this.courseUserId = userId;
                    this.courseOpen = true;
                    this.courseOrders = [];
                    document.body.style.overflow = 'hidden';
                    this.courseLoading = true;
                    try {
                        const res = await fetch(this.usersListBaseUrl + '/' + userId + '/purchased-courses', {
                            headers: {
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest',
                            },
                            credentials: 'same-origin',
                        });
                        const data = await res.json();
                        this.courseOrders = data.orders || [];
                    } catch (e) {
                        console.error('Failed to load courses', e);
                    } finally {
                        this.courseLoading = false;
                    }
                },
                closeCourse() {
                    this.courseOpen = false;
                    this.courseUserId = null;
                    this.courseOrders = [];
                    document.body.style.overflow = 'unset';
                }
            }));
        });
    </script>
@endpush
