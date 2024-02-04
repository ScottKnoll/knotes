<x-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Edit Notebook
        </h2>
    </x-slot>

    <x-container>
        <div class="mx-auto py-4">
            <x-validation-errors />
            <form action="/notebooks/{{ $notebook->id }}" method="post">
                @csrf
                @method('patch')
                <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-4">
                    <div>
                        <x-label for="name" class="mb-1">Name</x-label>
                        <x-input type="text" name="name" :value="old('name', $notebook->name)" />
                    </div>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                </div>
                <div class="sm:pt-5">
                    <div class="flex justify-end gap-x-3">
                        <x-button href="/notebooks/{{ $notebook->id }}" class="rounded-md hover:bg-gray-50">
                            Cancel
                        </x-button>
                        <x-button type="submit" styles="indigo">
                            Update</x-button>
                    </div>
                </div>
            </form>
    </x-container>
</x-layout>
