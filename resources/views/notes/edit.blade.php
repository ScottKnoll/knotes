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
                <form action="/notes/{{ $note->id }}assign-notebook" method="post">
                    @csrf
                    <x-label for="notebook_id" class="mb-1">Add to Notebook:</x-label>
                    <div class="flex items-center mr-4">
                        <x-select class="h-10 border-r-0 rounded-none rounded-l-md" id="notebook_id" name="notebook_id">
                            @foreach ($notebooks as $notebook)
                                <option value="{{ $notebook->id }}" @selected(old('notebook_id', $note->notebook_id) == $notebook->id)>{{ $notebook->name }}
                                </option>
                            @endforeach
                        </x-select>
                        <button type="submit"
                            class="-ml-px inline-flex h-10 w-[86px] items-center justify-center rounded-r-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:border-gray-800 dark:bg-black dark:text-gray-300 dark:ring-offset-black dark:hover:bg-gray-900">
                            Save
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
    <div class="mt-8">
        <x-validation-errors />
        <form action="/notes/{{ $note->id }}" method="post">
            @csrf
            @method('patch')
            <div class="pb-2 border-b border-gray-200">
                <x-input type="text" name="title" class="!text-xl !font-bold" :value="old('title', $note->title)" />
            </div>
            <div class="mt-2">
                <x-forms.tinymce-editor>{{ old('message', $note->message) }}</x-forms.tinymce-editor>
            </div>
            <div class="flex items-center justify-between mt-4">
                <div>
                    <form action="/notes/{{ $note->id }}/delete" method="post">
                        @csrf
                        @method('DELETE')
                        <x-button class="w-[72px] justify-center rounded-md text-red-600"
                            onclick="return confirm('Are you sure you want to delete this note: {{ $note->title }}?')">
                            Delete
                        </x-button>
                    </form>
                </div>
                <div class="space-x-2">
                    <x-button href="/notes">Cancel</x-button>
                    <x-button type="submit" styles="indigo">Update</x-button>
                </div>
            </div>
        </form>
    </div>
</x-layout>
