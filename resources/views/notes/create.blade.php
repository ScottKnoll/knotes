<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Note
        </h2>
    </x-slot>
    <x-container>
        <div class="mx-auto py-4">
            <x-validation-errors/>
            <form action="/notes" method="post">
                @csrf
                <div class="space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-gray-200 sm:pt-5">
                        <x-label for="date">Date</x-label>   
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <x-input type="datetime-local" name="date" id="date" value="{{ old('date') ?? now()->toDateTimeString() }}" />
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <x-label for="length">Length</x-label> 
                        <div class="mt-2 sm:col-span-2 sm:mt-0 mb-4"> 
                            <x-input type="number" name="length" id="length" autocomplete="length" value="{{ old('length')}}" placeholder="minutes" />
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <x-label for="name">Name</x-label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0 mb-4">
                        <x-input type="text" name="name" id="name" autocomplete="name" value="{{ old('name')}}" placeholder="Routine/Week/Day" />
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <x-label for="venue">Venue</x-label> 
                        <div class="mt-2 sm:col-span-2 sm:mt-0 mb-4">
                        <x-input type="text" name="venue" id="venue" autocomplete="venue" value="{{ old('venue')}}" />
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <x-label for="body_weight">Body Weight</x-label> 
                        <div class="mt-2 sm:col-span-2 sm:mt-0 mb-4">
                        <x-input type="number" name="body_weight" id="body_weight" autocomplete="body_weight" value="{{ old('body_weight')}}" placeholder="lbs" />
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <x-label for="calories_burned">Calories Burned</x-label> 
                        <div class="mt-2 sm:col-span-2 sm:mt-0 mb-4">
                            <x-input type="number" name="calories_burned" id="calories_burned" autocomplete="calories_burned" value="{{ old('calories_burned')}}" />
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <x-label for="music">Music</x-label> 
                        <div class="mt-2 sm:col-span-2 sm:mt-0 mb-4">
                            <x-input type="text" name="music" id="music" autocomplete="music" value="{{ old('music')}}" />
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <x-label for="notes">Notes</x-label> 
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <textarea id="notes" name="notes" rows="3" value="{{ old('notes')}}" class="block w-full max-w-lg rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"></textarea>
                            <p class="mt-2 text-sm text-gray-500">Write a few sentences about your workout.</p>
                        </div>
                    </div>
                    <div class="sm:pt-5">
                        <div class="flex justify-end gap-x-3">
                            <x-button a href="/workouts" class="rounded-md hover:bg-gray-50">
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