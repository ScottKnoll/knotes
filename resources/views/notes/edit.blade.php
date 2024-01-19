<x-layout>
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
    <div class="mt-8">
        <x-validation-errors />
        <form action="/notes/{{ $note->id }}" method="post">
            @csrf
            @method('patch')
            <div class="pb-2 border-b border-gray-200">
                <x-input type="text" name="title" value="{{ $note->title }}" class="!text-xl !font-bold" />
            </div>
            <div class="mt-2">
                <textarea rows="29" name="comment" id="comment" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $note->message }}</textarea>
                <div class="flex justify-end mt-4 gap-x-4">
                    <x-button href="/notes">Cancel</x-button>
                    <x-button type="submit" styles="indigo">Update</x-button>
                </div>
        </form>
    </div>
</x-layout>
