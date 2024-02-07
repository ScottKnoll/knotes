<x-layout>
    <div class="md:flex md:items-center md:justify-between">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Notes</h2>
        </div>
        <div class="mt-4 flex md:ml-4 md:mt-0">
            {{-- <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-semibold text-gray-900 bg-white rounded-md shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Edit</button> --}}
            <x-button href="notes/create" type="button" styles="indigo">Create</x-button>
        </div>
    </div>
    <div class="mt-8">
        <ul role="list" class="divide-y divide-gray-100">
            @foreach ($notes as $note)
                <li class="relative flex justify-between gap-x-6 px-4 py-5 hover:bg-gray-50">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900">
                                <a href="/notes/{{ $note->id }}/edit">
                                    <span class="absolute inset-x-0 -top-px bottom-0"></span>
                                    {{ $note->title }}
                                </a>
                            </p>
                            <div class="note-content mt-1 text-xs leading-5 text-gray-500">
                                {!! $note->message !!}
                            </div>
                        </div>
                    </div>
                    <div class="flex shrink-0 items-center gap-x-4">
                        <div class="hidden sm:flex sm:flex-col sm:items-end">
                            {{-- <p class="text-sm leading-6 text-gray-900">Notebook</p> --}}
                            <p class="text-xs leading-5 text-gray-500">{{ $note->date->diffForHumans() }}</p>
                        </div>
                        <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
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
