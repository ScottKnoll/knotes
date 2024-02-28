<x-layout>
    @if (session('alert_message'))
        <x-alert message="{{ session('alert_message') }}" class="mb-4"></x-alert>
    @endif
    <div class="md:flex md:items-center md:justify-between">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">{{ $notebook->name }}</h2>
        </div>
    </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                <a href="#" class="group ml-2 inline-flex">
                                    Note
                                    <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                                    <span class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </a>
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                <a href="#" class="group inline-flex">
                                    Created At
                                    <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                                    <span class="ml-2 flex-none rounded bg-gray-100 text-gray-900 group-hover:bg-gray-200">
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </a>
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                <a href="#" class="group inline-flex">
                                    Updated
                                    <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                                    <span class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                                        <svg class="invisible ml-2 h-5 w-5 flex-none rounded text-gray-400 group-hover:visible group-focus:visible" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </a>
                            </th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-0">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach ($notes as $note)
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-2">
                                    <a href="/notes/{{ $note->id }}/edit" class="text-indigo-600 hover:text-indigo-700 hover:underline">{{ $note->title }}</a>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $note->created_at->format('M d, Y') }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $note->updated_at->format('M d, Y') }}
                                </td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-left text-sm sm:pr-2">
                                    <div x-data="{ open: false }" class="relative flex-none">
                                        <button @click="open = !open" type="button" class="-m-2.5 block p-2.5 text-gray-500 hover:text-gray-900" id="options-menu-0-button">
                                            <x-svg.ellipsis-vertical class="h-6 w-6 dark:text-gray-300" />
                                        </button>
                                        <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none" role="menu" tabindex="-1">
                                            <a href="/notes/{{ $note->id }}/edit" class="block px-3 py-1 text-sm leading-6 text-gray-900 hover:bg-gray-50" role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                                                View
                                            </a>
                                            <form method="post" action="/notebooks/{{ $notebook->id }}/notes/{{ $note->id }}" id="remove-form-{{ $note->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900 hover:bg-gray-50" role="menuitem" tabindex="-1" id="options-menu-0-item-2" onclick="event.preventDefault(); if(confirm('Are you sure you want to remove {{ addslashes($note->title) }} from the feed?')) document.getElementById('remove-form-{{ $note->id }}').submit();">
                                                    Remove
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
