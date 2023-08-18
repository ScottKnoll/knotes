<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="leading-tight text-gray-600">
                notebook logic here
            </h2>
        </div>
    </x-slot>
    <x-container>
        <div class="mx-auto">
            <x-validation-errors />
            <form action="/notes" method="post">
                @csrf
                <div class="pb-2 border-b border-gray-200">
                    <x-input type="text" name="title" value="{{ old('title') }}" class="!text-xl !font-bold"
                        placeholder="Title" />
                </div>
                <div class="mt-2">
                    <div id="editor" rows="29" name="comment" id="comment"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="Start writing">
                        {{ old('comment') }}
                    </div>
                    <input type="hidden" name="comment" id="hiddenArea">
                </div>
                <div class="flex justify-end mt-4 gap-x-4">
                    <x-button href="/notes">Cancel</x-button>
                    <x-button type="submit" styles="indigo">Create</x-button>
                </div>
            </form>
        </div>
    </x-container>
</x-app-layout>
