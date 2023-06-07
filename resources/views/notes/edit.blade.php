<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Note
        </h2>
    </x-slot>
    <x-container>
        <div class="mx-auto py-4">
            <x-validation-errors/>
            <form action="/notes" method="post">
                @csrf
                @method('patch')
                <div class="space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-gray-200 sm:pt-5">
                        <x-label for="date">Date</x-label>   
                        <div class="mt-2 sm:col-span-3 sm:mt-0">
                            <x-input type="datetime-local" name="date" id="date" :value="$note->date"
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <x-label for="title">Title</x-label> 
                        <div class="mt-2 sm:col-span-3 sm:mt-0"> 
                            <x-input type="text" name="title" id="title" autocomplete="title" :value="$note->title" />
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                            </div>
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <x-label for="message">Message</x-label> 
                        <div class="mt-2 sm:col-span-3 sm:mt-0">
                            <textarea id="message" name="message" rows="6" :value="$note->message" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"></textarea>
                            <p class="mt-2 text-sm text-gray-500">Write your message here</p>
                        </div>
                    </div>
                </div>
                    <div class="sm:pt-5">
                        <div class="flex justify-end gap-x-3">
                            <x-button a href="/notes" class="rounded-md hover:bg-gray-50">
                                Cancel
                            </x-button>
                            <button type="submit" class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </x-container>
</x-app-layout>