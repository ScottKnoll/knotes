<div x-show="sidebarOpen" x-transition:enter="transition ease-in-out duration-300 transform"
    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full" class="fixed inset-0 z-50 lg:hidden" role="dialog" aria-modal="true">
    <div class="absolute inset-0 bg-black bg-opacity-50" @click="sidebarOpen = false" x-transition.opacity></div>
    <div class="relative flex flex-col w-full h-full max-w-xs bg-gray-900">
        <div class="absolute top-0 right-0 flex justify-center w-16 pt-5">
            <button @click="sidebarOpen = false" type="button" class="-m-2.5 p-2.5">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <nav class="flex-1 px-6 pb-4 mt-8 overflow-y-auto">
            @include('components.sidebar-nav')
        </nav>
    </div>
</div>
