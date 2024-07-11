<template x-teleport="body">
    <div
            x-show="fabModal"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-[99] flex items-center justify-center w-screen h-screen bg-light-50 dark:bg-gradient-to-b dark:from-light-950 dark:to-light-900">
        <button @click="fabModal = false" class="absolute top-0 right-0 z-30 flex items-center justify-center px-3 py-2 mt-3 mr-3 space-x-1 text-xs font-medium uppercase border rounded-md border-neutral-200 text-light-500 dark:text-light-400">
            <x-tabler-x class="w-4 h-4" />
            <span>Close</span>
        </button>
        <div class="relative flex flex-col items-center justify-center w-full h-full px-4 lg:px-8">
            <div class="relative w-full max-w-sm mx-auto lg:mb-0">
                <!-- Modal content -->
            </div>
        </div>
    </div>
</template>
