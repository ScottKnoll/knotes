<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Notes
            </h2>
            <div class="isolate inline-flex rounded-md shadow-sm">
                <x-button href="/notes/create" styles="indigo" class="rounded-md hover:bg-indigo-500">
                    Create Note
                </x-button>
            </div>
        </div>
    </x-slot>
    <x-container>
        <div class="mx-auto py-4">
            @foreach ($notes as $note)
                <div class="overflow-hidden bg-white shadow sm:rounded-md">
                    <ul role="list" class="divide-y divide-gray-200">
                        <li>
                            {{-- <a href="/notes/{{ $notes->id }}" class="block hover:bg-gray-50"> --}}
                                <div class="flex items-center px-4 py-4 sm:px-6">
                                    <div class="min-w-0 flex-1 sm:flex sm:items-center sm:justify-between">
                                        <p>{{ $note->title . ' - ' . $note->date->toDayDateTimeString() }}</p>
                                    </div>
                                    <div class="ml-5 flex-shrink-0">
                                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
    </x-container>
</x-app-layout>