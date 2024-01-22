<x-layout>
    <div class="flex items-center justify-between">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            View Note
        </h2>
        <div class="relative inline-block text-left" x-data="{ open: false }">
            <div>
                <button @click="open = !open" type="button" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100" id="options-menu" aria-haspopup="true" :aria-expanded="open">
                    <x-svg.ellipsis-vertical class="w-5 h-5" />
                </button>
            </div>
            <div x-show="open" @click.away="open = false" class="absolute right-0 w-24 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                <div class="py-1 text-center" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                    <a href="/notes/{{ $note->id }}/edit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                        Edit
                    </a>
                    <a href="/notes/{{ $note->id }}/delete" class="block px-4 py-2 text-sm text-red-700 hover:bg-gray-100" role="menuitem">
                        Delete
                    </a>
                </div>
            </div>
        </div>
    </div>
    @if (session('alert_message'))
        <x-alert message="{{ session('alert_message') }}"></x-alert>
    @endif
    <div class="mt-8">
        @if ($notebooks->isNotEmpty())
            <div class="max-w-md mb-4">
                <form action="/assigned-notes" method="post">
                    @csrf
                    <input type="hidden" name="note_id" value="{{ $note->id }}">
                    <div>
                        <x-label for="notebook_id">Add to Notebook:</x-label>
                        <div class="flex items-center justify-between mt-1 gap-x-2">
                            <x-select id="notebook_id" name="notebook_id">
                                @foreach ($notebooks as $notebook)
                                    <option value="{{ $notebook->id }}">{{ $notebook->name }}</option>
                                @endforeach
                            </x-select>
                            <x-button type="submit">Add</x-button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
        <div class="flex flex-col items-start justify-between">
            <div class="flex items-center text-xs gap-x-4">
                <time datetime="2020-03-16" class="text-gray-500">{{ $note->created_at->format('M d, Y') }}</time>
            </div>
            <div class="relative group">
                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900">
                    <span class="absolute inset-0"></span>
                    {{ $note->title }}
                </h3>
                <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">{{ $note->message }}</p>
            </div>
        </div>
    </div>
</x-layout>
