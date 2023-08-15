<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Notes
            </h2>
            <div class="inline-flex rounded-md shadow-sm isolate">
                <x-button href="/notes/{{ $note->id }}/edit" styles="indigo" class="rounded-md hover:bg-indigo-500">
                    Edit Note
                </x-button>
            </div>
        </div>
    </x-slot>
    <x-card>
        <div class="px-6 mx-auto max-w-7xl lg:px-8">
            <div class="max-w-2xl mx-auto">
                <div class="flex flex-col items-start justify-between max-w-xl">
                    <div class="flex items-center text-xs gap-x-4">
                        <time datetime="2020-03-16"
                            class="text-gray-500">{{ $note->created_at->format('M d, Y') }}</time>
                    </div>
                    <div class="relative group">
                        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                {{ $note->title }}
                            </a>
                        </h3>
                        <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">{{ $note->message }}</p>
                    </div>
                </div>
            </div>
        </div>
    </x-card>
</x-app-layout>
