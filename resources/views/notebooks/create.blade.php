<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Create Notebook
        </h2>
    </x-slot>

    <x-container>
        <div class="py-4 mx-auto">
            <x-validation-errors />
            <form action="/notebooks" method="post">
                @csrf
                <div class="grid grid-cols-1 mt-4 gap-x-6 gap-y-4">
                    <div>
                        <x-label for="name" class="mb-1">Name</x-label>
                        <x-input type="text" name="name" :value="old('name')" />
                    </div>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                </div>
            </form>
        </div>
        <div class="sm:pt-5">
            <div class="flex justify-end gap-x-3">
                <x-button href="/notebooks" class="rounded-md hover:bg-gray-50">
                    Cancel
                </x-button>
                <x-button type="submit" styles="indigo">
                    Create</x-button>
            </div>
        </div>
    </x-container>
</x-app-layout>
