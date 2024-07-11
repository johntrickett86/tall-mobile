@props(['scrollHide' => true])

<div x-data="{
        scrollingDown: false,
        lastScrollY: window.scrollY,
        dropdownOpen: false,
        scrollHide: {{ $scrollHide ? 'true' : 'false' }},
        adjustDropdownPosition() {
            let dropdown = this.$refs.dropdown;
            let button = this.$refs.button;
            let rect = button.getBoundingClientRect();
            if (rect.top + dropdown.offsetHeight > window.innerHeight) {
                dropdown.style.top = `${rect.top - dropdown.offsetHeight}px`;
            } else {
                dropdown.style.top = `${rect.bottom}px`;
            }
        }
    }"
     x-init="() => {
        window.addEventListener('scroll', () => {
            if (scrollHide) {
                scrollingDown = window.scrollY > lastScrollY;
            }
            lastScrollY = window.scrollY;
        });
    }"
     @click.away="dropdownOpen = false"
     @dropdownOpen.window="adjustDropdownPosition"
     :class="{
        'transform -translate-y-full': scrollHide && scrollingDown,
        'transform translate-y-0': !scrollHide || !scrollingDown
    }"
     class="fixed top-0 left-0 z-50 w-full h-16 bg-white border-b border-light-200 dark:bg-light-700 dark:border-light-600 flex items-center px-4 transition-transform duration-500 ease-in-out lg:hidden">

    <div class="flex-shrink-0">
        <span class="text-xl font-bold text-primary-600 dark:text-light-50">{{ config('app.name') }}</span>
    </div>

    <div class="flex-grow flex justify-end items-center space-x-4">
        <a href="#" class="text-light-700 dark:text-light-300">
            <x-tabler-search class="w-6 h-6" style="stroke-width: 1" />
        </a>
        <div class="relative flex items-center">
            <button @click="dropdownOpen = !dropdownOpen; if(dropdownOpen) adjustDropdownPosition()" x-ref="button" class="inline-flex items-center p-2 text-sm font-medium text-center text-light-900 bg-white rounded-lg hover:bg-light-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-light-50 dark:bg-light-800 dark:hover:bg-light-700 dark:focus:ring-light-600">
                <x-tabler-dots-vertical class="w-6 h-6" style="stroke-width: 1" />
            </button>
            <div x-show="dropdownOpen"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95"
                 x-cloak
                 x-ref="dropdown"
                 class="absolute right-0 z-10 w-48 bg-white rounded-md shadow dark:bg-light-700 overflow-hidden">
                <ul class="py-2 text-sm text-light-700 dark:text-light-200" aria-labelledby="dropdownMenuIconButton">
                    @if (Route::has('login'))
                        @auth
                            <x-elements.header-menu-item href="{{ route('home') }}" label="Home" />
                            <form method="POST" action="{{ route('logout') }}" class="block px-4 py-2 text-sm text-light-700 dark:text-light-300 hover:bg-light-100 dark:hover:bg-light-700">
                                @csrf
                                <button type="submit" class="w-full text-left">Logout</button>
                            </form>
                        @else
                            <x-elements.header-menu-item href="{{ route('login') }}" label="Log in" />
                            @if (Route::has('register'))
                                <x-elements.header-menu-item href="{{ route('register') }}" label="Register" />
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>