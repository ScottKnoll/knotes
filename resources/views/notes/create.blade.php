<x-layout>
    <div class="mx-auto mt-8">
        <x-validation-errors />
        <form action="/notes" method="post">
            @csrf
            <div class="border-b border-gray-200 pb-2">
                <x-input type="text" name="title" value="{{ old('title') }}" class="!text-xl !font-bold" placeholder="Title" />
            </div>
            <div class="mt-2">
                {{-- <x-textarea rows="29" name="message" id="message" placeholder="Start writing">{{ old('message') }} --}}
                <x-forms.tinymce-editor>{{ old('message') }}</x-forms.tinymce-editor>
                {{-- </x-textarea> --}}
            </div>
            <div class="mt-4 flex justify-end gap-x-4">
                <x-button href="/notes">Cancel</x-button>
                <x-button type="submit" styles="indigo">Create</x-button>
            </div>
        </form>
    </div>
</x-layout>
