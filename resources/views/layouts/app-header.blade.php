<header class="sticky top-0 w-full bg-impetus-teal border-b border-impetus-teal-pressed z-99999">
    <!-- Desktop Header Layout (xl and up) -->
    <div class="hidden xl:flex items-center justify-between h-16 px-6">
        
        <!-- Left Side: Logo & Navigation Menu -->
        <div class="flex items-center gap-6 grow">
            <!-- Desktop Logo -->
            <a href="/" class="flex shrink-0 items-center rounded-lg bg-white px-3 py-1.5 shadow-sm transition-opacity hover:opacity-95">
                <img src="/Impetus-logo.png" alt="IHS Nursing" class="h-9 w-auto object-contain" />
            </a>

            <!-- Horizontal Navigation Menu -->
            @php
                use App\Helpers\MenuHelper;
                $menuGroups = MenuHelper::getMenuGroups();
            @endphp
            <nav class="flex items-center gap-3">
                @foreach ($menuGroups[0]['items'] as $itemIndex => $item)
                    @php
                        $isParentActive = false;
                        if (isset($item['subItems'])) {
                            foreach ($item['subItems'] as $subItem) {
                                if (MenuHelper::isActive($subItem['path'])) {
                                    $isParentActive = true;
                                    break;
                                }
                            }
                        } else {
                            $isParentActive = MenuHelper::isActive($item['path']);
                        }
                    @endphp

                    @if (isset($item['subItems']))
                        <!-- Dropdown Menu Item -->
                        <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                            <button class="group inline-flex items-center gap-1.5 px-3 py-2 rounded-xl text-sm font-medium transition-all duration-200 font-outfit"
                                :class="open || {{ $isParentActive ? 'true' : 'false' }} ? 'bg-orange-50 text-impetus-orange font-bold border border-orange-100/30' : 'text-white/90 hover:bg-white/15 hover:text-white border border-transparent'">
                                {{ $item['name'] }}
                                <svg class="w-3.5 h-3.5 transition-transform duration-200 text-white/70 group-hover:text-white" :class="{ 'rotate-180 text-impetus-orange group-hover:text-impetus-orange': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <!-- Dropdown panel -->
                            <div x-show="open"
                                x-transition:enter="transition ease-out duration-150"
                                x-transition:enter-start="opacity-0 translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-1"
                                class="absolute left-0 mt-1 w-56 rounded-2xl border border-gray-100 bg-white/95 backdrop-blur-md p-1.5 shadow-xl z-99999 dark:bg-gray-900 dark:border-gray-800"
                                style="display: none;">
                                @foreach ($item['subItems'] as $subItem)
                                    <a href="{{ $subItem['path'] }}"
                                        class="block px-3 py-2 text-sm font-medium rounded-xl transition-all duration-150 font-outfit"
                                        :class="window.location.pathname === '{{ $subItem['path'] }}' || '{{ request()->path() }}' === '{{ ltrim($subItem['path'], '/') }}' ? 'bg-impetus-orange text-white font-bold shadow-xs' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-white/5'">
                                        {{ $subItem['name'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <!-- Simple Link Item -->
                        <a href="{{ $item['path'] }}"
                            class="px-3 py-2 text-sm font-medium rounded-xl transition-all duration-200 font-outfit border border-transparent"
                            :class="{{ $isParentActive ? 'true' : 'false' }} ? 'bg-orange-50 text-impetus-orange font-bold border-orange-100/30' : 'text-white/90 hover:bg-white/15 hover:text-white'">
                            {{ $item['name'] }}
                        </a>
                    @endif
                @endforeach
            </nav>
        </div>

        <!-- Right Side: User Dropdown -->
        <div class="flex items-center shrink-0 ml-4">
            <x-header.user-dropdown light />
        </div>
    </div>

    <!-- Mobile Header Layout (below xl) -->
    <div class="xl:hidden flex items-center justify-between h-14 px-4 relative" x-data="{ isApplicationMenuOpen: false }">
        <!-- Mobile Menu Toggle Button (visible below xl) -->
        <button
            class="flex items-center justify-center w-10 h-10 text-white rounded-lg hover:bg-white/15"
            :class="{ 'bg-white/15': $store.sidebar.isMobileOpen }"
            @click="$store.sidebar.toggleMobileOpen()" aria-label="Toggle Mobile Menu">
            <svg x-show="!$store.sidebar.isMobileOpen" width="16" height="12" viewBox="0 0 16 12" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M0.583252 1C0.583252 0.585788 0.919038 0.25 1.33325 0.25H14.6666C15.0808 0.25 15.4166 0.585786 15.4166 1C15.4166 1.41421 15.0808 1.75 14.6666 1.75L1.33325 1.75C0.919038 1.75 0.583252 1.41422 0.583252 1ZM0.583252 11C0.583252 10.5858 0.919038 10.25 1.33325 10.25L14.6666 10.25C15.0808 10.25 15.4166 10.5858 15.4166 11C15.4166 11.4142 15.0808 11.75 14.6666 11.75L1.33325 11.75C0.919038 11.75 0.583252 11.4142 0.583252 11ZM1.33325 5.25C0.919038 5.25 0.583252 5.58579 0.583252 6C0.583252 6.41421 0.919038 6.75 1.33325 6.75L7.99992 6.75C8.41413 6.75 8.74992 6.41421 8.74992 6C8.74992 5.58579 8.41413 5.25 7.99992 5.25Z"
                    fill="currentColor"></path>
            </svg>
            <svg x-show="$store.sidebar.isMobileOpen" width="24" height="24" viewBox="0 0 24 24"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M6.21967 7.28131C5.92678 6.98841 5.92678 6.51354 6.21967 6.22065C6.51256 5.92775 6.98744 5.92775 7.28033 6.22065L11.999 10.9393L16.7176 6.22078C17.0105 5.92789 17.4854 5.92788 17.7782 6.22078C18.0711 6.51367 18.0711 6.98855 17.7782 7.28144L13.0597 12L17.7782 16.7186C18.0711 17.0115 18.0711 17.4863 17.7782 17.7792C17.4854 18.0721 17.0105 18.0721 16.7176 17.7792L11.999 13.0607L7.28033 17.7794C6.98744 18.0722 6.51256 18.0722 6.21967 17.7794C5.92678 17.4865 5.92678 17.0116 6.21967 16.7187L10.9384 12L6.21967 7.28131Z"
                    fill="currentColor" />
            </svg>
        </button>

        <!-- Mobile Logo -->
        <a href="/" class="flex items-center rounded-lg bg-white px-2.5 py-1 shadow-sm">
            <img src="/Impetus-logo.png" alt="Logo" class="h-8 w-auto object-contain" />
        </a>

        <!-- Mobile Profile Menu Toggle Button -->
        <button @click="isApplicationMenuOpen = !isApplicationMenuOpen"
            class="flex items-center justify-center w-10 h-10 text-white rounded-lg hover:bg-white/15">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M5.99902 10.4951C6.82745 10.4951 7.49902 11.1667 7.49902 11.9951V12.0051C7.49902 12.8335 6.82745 13.5051 5.99902 13.5051C5.1706 13.5051 4.49902 12.8335 4.49902 12.0051V11.9951C4.49902 11.1667 5.1706 10.4951 5.99902 10.4951ZM17.999 10.4951C18.8275 10.4951 19.499 11.1667 19.499 11.9951V12.0051C19.499 12.8335 18.8275 13.5051 17.999 13.5051C17.1706 13.5051 16.499 12.8335 16.499 12.0051V11.9951C16.499 11.1667 17.1706 10.4951 17.999 10.4951ZM13.499 11.9951C13.499 11.1667 12.8275 10.4951 11.999 10.4951C11.1706 10.4951 10.499 11.1667 10.499 11.9951V12.0051C10.499 12.8335 11.1706 13.5051 11.999 13.5051C12.8275 13.5051 13.499 12.8335 13.499 12.0051V11.9951Z"
                    fill="currentColor" />
            </svg>
        </button>

        <!-- Mobile User Dropdown panel -->
        <div x-show="isApplicationMenuOpen" @click.away="isApplicationMenuOpen = false"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute right-4 top-14 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl shadow-lg p-3 z-99999"
            style="display: none;">
            <x-header.user-dropdown />
        </div>
    </div>
</header>
