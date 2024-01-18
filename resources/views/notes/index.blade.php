<x-layout>
    <div class="md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Notes</h2>
        </div>
        <div class="flex mt-4 md:ml-4 md:mt-0">
            {{-- <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-semibold text-gray-900 bg-white rounded-md shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Edit</button> --}}
            <x-button href="notes/create" type="button" styles="indigo">Create</x-button>
        </div>
    </div>
    <div class="flow-root mt-8">
        <ul role="list" class="divide-y divide-gray-100">
            @foreach ($notes as $note)
                <li class="relative flex justify-between px-4 py-5 gap-x-6 hover:bg-gray-50">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="flex-auto min-w-0">
                            <p class="text-sm font-semibold leading-6 text-gray-900">
                                <a href="/notes/{{ $note->id }}/edit">
                                    <span class="absolute inset-x-0 bottom-0 -top-px"></span>
                                    {{ $note->title }}
                                </a>
                            </p>
                            <p class="flex mt-1 text-xs leading-5 text-gray-500">
                                {{ $note->message }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center shrink-0 gap-x-4">
                        <div class="hidden sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm leading-6 text-gray-900">Notebook</p>
                            <p class="mt-1 text-xs leading-5 text-gray-500">{{ $note->date->diffForHumans() }}</p>
                        </div>
                        <svg class="flex-none w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </li>
            @endforeach
        </ul>
        {{-- <div class="mt-4">
        {{ $notes->links() }}
    </div> --}}
    </div>
</x-layout>
