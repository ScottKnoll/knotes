<x-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Notes
            </h2>
            <div class="inline-flex rounded-md shadow-sm isolate">
                <x-button href="/notes/create" styles="indigo">
                    Create Note
                </x-button>
            </div>
        </div>
    </x-slot>
    <x-container>
        <div class="py-4 mx-auto">
            @foreach ($notes as $note)
                <div class="mb-4 overflow-hidden bg-white shadow sm:rounded-md">
                    <ul role="list" class="divide-y divide-gray-200">
                        <li>
                            <a href="/notes/{{ $note->id }}/edit" class="block hover:bg-gray-50">
                                <div class="px-4 py-4 sm:px-6">
                                    <div class="flex-1 min-w-0 sm:flex sm:items-center sm:justify-between">
                                        <h2 class="text-lg font-semibold">{{ $note->title }}</h2>
                                        <p class="text-sm text-gray-400">{{ $note->date->diffForHumans() }}</p>
                                    </div>
                                    <div>
                                        <p class="max-w-5xl mt-2 ml-2 text-sm text-gray-600 truncate">
                                            {{ $note->message }}</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
    </x-container>
    <div class="mt-4">
        {{ $notes->links() }}
    </div>
</x-layout>
