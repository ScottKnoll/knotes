<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="leading-tight text-gray-600">
                Last edited on {{ $note->updated_at->format('M d, Y') }}
            </h2>
            <div class="inline-flex rounded-md shadow-sm isolate">
                <x-button href="/notes/{{ $note->id }}" styles="indigo" class="rounded-md hover:bg-indigo-500">
                    View Note
                </x-button>
            </div>
        </div>
    </x-slot>
    <x-container>
        <div class="mx-auto">
            <x-validation-errors />
            <form action="/notes/{{ $note->id }}" method="post">
                @csrf
                @method('patch')
                <div class="pb-2 border-b border-gray-200">
                    <x-input type="text" name="title" value="{{ $note->title }}" class="!text-xl !font-bold" />
                </div>
                <div class="mt-2">
                    <div id="editor" style="height: 400px;">
                        {!! $note->message !!}
                    </div>
                    <input type="hidden" name="message" id="hiddenArea">
                </div>
                <div class="flex justify-end mt-4 gap-x-4">
                    <x-button href="/notes">Cancel</x-button>
                    <x-button type="submit" styles="indigo">Update</x-button>
                </div>
            </form>
        </div>
    </x-container>
</x-app-layout>
