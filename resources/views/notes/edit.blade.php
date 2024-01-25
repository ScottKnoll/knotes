<x-layout>
    @if (session('alert_message'))
        <x-alert message="{{ session('alert_message') }}" class="mb-4"></x-alert>
    @endif
    <div class="flex items-center justify-between">
        <h2 class="leading-tight text-gray-600">
            Last edited on {{ $note->updated_at->format('M d, Y') }}
        </h2>
        <div class="flex items-center justify-between">
            @if ($notebooks->isNotEmpty())
                <form action="/assigned-notes" method="post">
                    @csrf
                    <input type="hidden" name="note_id" value="{{ $note->id }}">
                    <x-label for="notebook_id" class="mb-1">Add to Notebook:</x-label>
                    <div class="flex items-center mr-2">
                        <x-select class="h-10 border-r-0 rounded-none rounded-l-md" id="notebook_id" name="notebook_id">
                            @foreach ($notebooks as $notebook)
                                <option value="{{ $notebook->id }}">{{ $notebook->name }}</option>
                            @endforeach
                        </x-select>
                        <x-button type="submit" class="-ml-px h-10 w-[86px] justify-center rounded-r-md">
                            Save
                        </x-button>
                    </div>
                </form>
            @endif
            <div class="relative inline-block text-left" x-data="{ open: false }">
                <div>
                    <button @click="open = !open" type="button" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100" id="options-menu" aria-haspopup="true" :aria-expanded="open">
                        <x-svg.ellipsis-vertical class="w-5 h-5" />
                    </button>
                </div>
                <div x-show="open" @click.away="open = false" class="absolute right-0 w-24 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                    <div class="py-1 text-center" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        {{-- <a href="/notes/{{ $note->id }}/edit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                            Edit
                        </a> --}}
                        <a href="/notes/{{ $note->id }}/delete" class="block px-4 py-2 text-sm text-red-700 hover:bg-gray-100" role="menuitem">
                            Delete
                        </a>
                    </div>
                </div>
            </div>
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
                <textarea rows="29" name="message" id="message" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $note->message }}</textarea>
                <div class="flex justify-end mt-4 gap-x-4">
                    <x-button href="/notes">Cancel</x-button>
                    <x-button type="submit" styles="indigo">Update</x-button>
                </div>
        </form>
    </div>
</x-layout>
