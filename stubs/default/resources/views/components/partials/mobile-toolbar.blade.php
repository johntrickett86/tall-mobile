@props([
    'scrollHide' => true, // enables or disables hide on scroll
    'fab' => true, // enables or disables Floating Action Button
    'fabType' => 'modal', // can be 'modal' or 'link'
    'fabIcon' => 'plus', // fab icon name
    'href' => '#', // only used if type is link
    'modalName' => 'fab-modal' // specify the modal component name
    ])

<div x-data="{
        scrollingDown: false,
        lastScrollY: window.scrollY,
        atBottom: false,
        fabModal: false,
        scrollHide: {{ $scrollHide ? 'true' : 'false' }}
    }"
     x-init="() => {
        window.addEventListener('scroll', () => {
            if (scrollHide) {
                let bottomOffset = 50; // Adjust this value as needed
                let scrollPosition = window.scrollY + window.innerHeight;
                let documentHeight = document.documentElement.scrollHeight;

                scrollingDown = window.scrollY > lastScrollY;
                atBottom = scrollPosition >= documentHeight - bottomOffset;

                if (atBottom) {
                    scrollingDown = false;
                }

                lastScrollY = window.scrollY;
            }
        });
    }"
     x-effect="
        if(fabModal) {
            document.body.classList.add('overflow-hidden');
        } else {
            document.body.classList.remove('overflow-hidden');
        }
    "
     @keydown.escape="fabModal = false"
     :class="{
        'transform translate-y-full': scrollHide && scrollingDown && !atBottom,
        'transform translate-y-0': !scrollHide || !scrollingDown || atBottom
    }"
     class="fixed bottom-0 left-0 z-40 w-full h-16 bg-white border-t border-light-200 dark:bg-light-700 dark:border-light-600 transition-transform duration-500 ease-in-out lg:hidden">

    <div class="grid h-full w-full grid-cols-2">
        <x-elements.toolbar-button
                :href="route('home')"
                :active="request()->routeIs('home')"
                icon="home"
                label="Home"
        />
        <x-elements.toolbar-button
                :href="route('settings')"
                :active="request()->routeIs('settings')"
                icon="settings"
                label="Settings"
        />
    </div>

    @if($fab)
        @if($fabType === 'modal')
            <button @click="fabModal = true"
                    :class="{
            'transform scale-0 translate-x-4': scrollHide && scrollingDown && !atBottom,
            'transform scale-100 translate-x-0': !scrollHide || !scrollingDown || atBottom
        }"
                    class="fixed z-50 right-6 bottom-20 bg-primary-600 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg transition-transform duration-500 ease-in-out lg:hidden">
                <x-dynamic-component :component="'tabler-' . $fabIcon" class="w-6 h-6"/>
            </button>
        @else
            <a href="{{ $href }}"
               :class="{
            'transform scale-0 translate-x-4': scrollHide && scrollingDown && !atBottom,
            'transform scale-100 translate-x-0': !scrollHide || !scrollingDown || atBottom
        }"
               class="fixed z-50 right-6 bottom-20 bg-primary-600 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg transition-transform duration-500 ease-in-out lg:hidden">
                <x-dynamic-component :component="'tabler-' . $fabIcon" class="w-6 h-6"/>
            </a>
        @endif
    @endif

    @if($fab && $fabType === 'modal')
        <x-dynamic-component :component="'modals.' . $modalName"/>
    @endif

</div>
