@props(['scrollHide' => true, 'title' => 'Back'])

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
        },
        refreshPage() {
            window.location.reload();
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
        <button @click="history.back()" class="text-lg text-primary-600 dark:text-light-50 flex items-center focus:outline-none">
            <x-tabler-arrow-left class="w-6 h-6 mr-6" /> {{ $title }}
        </button>
    </div>

    <div class="flex-grow flex justify-end items-center space-x-4">
        <div class="relative flex items-center">
            <button @click="dropdownOpen = !dropdownOpen; if(dropdownOpen) adjustDropdownPosition()" x-ref="button" class="inline-flex items-center p-2 text-sm font-medium text-center text-light-900 rounded-lg hover:bg-light-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-light-50 dark:hover:bg-light-700 dark:focus:ring-light-600">
                <x-tabler-dots-vertical class="w-6 h-6" />
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
                 class="absolute right-0 z-10 w-44 bg-white rounded-md shadow dark:bg-light-700 overflow-hidden">
                <ul class="py-2 text-sm text-light-700 dark:text-light-200" aria-labelledby="dropdownMenuIconButton">
                    <li>
                        <button @click="refreshPage" class="block w-full text-left px-4 py-2 text-sm text-light-700 dark:text-light-200 hover:bg-light-100 dark:hover:bg-light-600 dark:hover:text-white">Refresh</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
