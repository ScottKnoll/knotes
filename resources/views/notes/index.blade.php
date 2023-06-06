<x-layout>
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
</x-layout>