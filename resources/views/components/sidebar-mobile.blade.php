<div x-data="{ sidebarOpen: false }" x-show="sidebarOpen" @open-sidebar.window="sidebarOpen = true" @close-sidebar.window="sidebarOpen = false" class="fixed inset-0 z-40 lg:hidden" x-transition:enter="transition ease-in-out duration-300" x-transition:enter-start="opacity-0 transform -translate-x-full" x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in-out duration-300" x-transition:leave-start="opacity-100 transform translate-x-0" x-transition:leave-end="opacity-0 transform -translate-x-full">
    {{-- <div @click="sidebarOpen = false" x-show="sidebarOpen" class="fixed inset-0 bg-gray-900 bg-opacity-75" aria-hidden="true"></div> --}}

    <div class="fixed inset-0 flex">
        <!--
    Off-canvas menu, show/hide based on off-canvas menu state.

    Entering: "transition ease-in-out duration-300 transform"
     From: "-translate-x-full"
     To: "translate-x-0"
    Leaving: "transition ease-in-out duration-300 transform"
     From: "translate-x-0"
     To: "-translate-x-full"
   -->
        <div class="relative flex flex-col flex-1 w-full max-w-xs bg-gray-50" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full">
            <!--
     Close button, show/hide based on off-canvas menu state.

     Entering: "ease-in-out duration-300"
      From: "opacity-0"
      To: "opacity-100"
     Leaving: "ease-in-out duration-300"
      From: "opacity-100"
      To: "opacity-0"
    -->
            <div class="absolute top-0 flex justify-center w-16 pt-5 left-full">
                <button @click="$dispatch('close-sidebar')" type="button" class="text-gray-600 hover:text-gray-800">
                    <span class="sr-only">Close sidebar</span>
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex flex-col px-6 pb-4 overflow-y-auto bg-gray-900 grow gap-y-5 ring-1 ring-white/10">
                <div class="flex items-center h-16 shrink-0">
                    <img class="w-auto h-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                </div>
                <nav class="flex flex-col flex-1">
                    <ul role="list" class="flex flex-col flex-1 gap-y-7">
                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                <li>
                                    <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                                    <a href="#" class="flex p-2 text-sm font-semibold leading-6 text-white bg-gray-800 rounded-md group gap-x-3">
                                        <x-svg.home class="w-6 h-6 shrink-0" />
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="/notes" class="flex p-2 text-sm font-semibold leading-6 text-gray-400 rounded-md group gap-x-3 hover:bg-gray-800 hover:text-white">
                                        <x-svg.document-text class="w-6 h-6 shrink-0" />
                                        Notes
                                    </a>
                                </li>
                                <li>
                                    <a href="/notebooks" class="flex p-2 text-sm font-semibold leading-6 text-gray-400 rounded-md group gap-x-3 hover:bg-gray-800 hover:text-white">
                                        <x-svg.book-open class="w-6 h-6 shrink-0" />
                                        Notebooks
                                    </a>
                                </li>
                                <li>
                                    <a href="/tasks" class="flex p-2 text-sm font-semibold leading-6 text-gray-400 rounded-md group gap-x-3 hover:bg-gray-800 hover:text-white">
                                        <x-svg.check-circle class="w-6 h-6 shrink-0" />
                                        Tasks
                                    </a>
                                </li>
                                {{-- <li>
                                    <a href="#" class="flex p-2 text-sm font-semibold leading-6 text-gray-400 rounded-md group gap-x-3 hover:bg-gray-800 hover:text-white">
                                        <svg class="w-6 h-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75" />
                                        </svg>
                                        Documents
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex p-2 text-sm font-semibold leading-6 text-gray-400 rounded-md group gap-x-3 hover:bg-gray-800 hover:text-white">
                                        <svg class="w-6 h-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                                        </svg>
                                        Reports
                                    </a>
                                </li> --}}
                            </ul>
                        </li>
                        <li>
                            <div class="text-xs font-semibold leading-6 text-gray-400">Notebooks</div>
                            <ul role="list" class="mt-2 -mx-2 space-y-1">
                                @foreach ($notebooks as $notebook)
                                    <li>
                                        <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                                        <a href="#" class="flex p-2 text-sm font-semibold leading-6 text-gray-400 rounded-md group gap-x-3 hover:bg-gray-800 hover:text-white">
                                            <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-700 bg-gray-800 text-[0.625rem] font-medium text-gray-400 group-hover:text-white"> {{ collect(explode(' ', $notebook->name))->map(function ($word) {return strtoupper(substr($word, 0, 1));})->join('') }}
                                            </span>
                                            <span class="truncate">{{ $notebook->name }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        {{-- <li class="mt-auto">
                            <a href="#" class="flex p-2 -mx-2 text-sm font-semibold leading-6 text-gray-400 rounded-md group gap-x-3 hover:bg-gray-800 hover:text-white">
                                <svg class="w-6 h-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Settings
                            </a>
                        </li> --}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Rest of your mobile sidebar HTML -->
</div>
