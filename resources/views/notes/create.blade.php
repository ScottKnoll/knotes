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
                    <x-input type="text" name="title" value="{{ old('title') }}" class="!text-xl !font-bold" placeholder="Title" />
                </div>
                <div class="mt-2">
                    <x-textarea rows="29" name="message" id="message" placeholder="Start writing">{{ old('message') }}
                    </x-textarea>
                </div>
                <div class="flex justify-end mt-4 gap-x-4">
                    <x-button href="/notes">Cancel</x-button>
                    <x-button type="submit" styles="indigo">Create</x-button>
                </div>
            </form>
        </div>
    </x-container>
</x-app-layout>
