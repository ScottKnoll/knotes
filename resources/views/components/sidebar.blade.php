<div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
    <div class="flex flex-col px-6 pb-4 overflow-y-auto bg-gray-900 grow gap-y-5">
        <div class="flex items-center h-16 shrink-0">
            <x-svg.notebook class="w-auto h-8 text-white" />
        </div>
        <nav class="flex flex-col flex-1">
            <ul role="list" class="flex flex-col flex-1 gap-y-7">
                <li>
                    <ul role="list" class="-mx-2 space-y-1">
                        <li>
                            <a href="/notes"
                                class="{{ request()->is('notes', 'notes/*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6">
                                <x-svg.document-text class="w-6 h-6 shrink-0" />
                                Notes
                            </a>
                        </li>
                        <li>
                            <a href="/notebooks"
                                class="{{ request()->is('notebooks', 'notebooks/*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6">
                                <x-svg.book-open class="w-6 h-6 shrink-0" />
                                Notebooks
                            </a>
                        </li>
                        <li>
                            <a href="/tasks"
                                class="{{ request()->is('tasks', 'tasks/*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800' }} group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6">
                                <x-svg.check-circle class="w-6 h-6 shrink-0" />
                                Tasks
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="text-xs font-semibold leading-6 text-gray-400">Notebooks</div>
                    <ul role="list" class="mt-2 -mx-2 space-y-1">
                        @foreach ($notebooks as $notebook)
                            <li>
                                <a href="/notebooks/{{ $notebook->id }}"
                                    class="flex p-2 text-sm font-semibold leading-6 text-gray-400 rounded-md group gap-x-3 hover:bg-gray-800 hover:text-white">
                                    <span
                                        class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-700 bg-gray-800 text-[0.625rem] font-medium text-gray-400 group-hover:text-white">
                                        {{ collect(explode(' ', $notebook->name))->map(fn($word) => strtoupper(substr($word, 0, 1)))->join('') }}
                                    </span>
                                    <span class="truncate">{{ $notebook->name }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
