<x-layout>
    <div class="md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Notebooks</h2>
        </div>
        <div class="flex mt-4 md:ml-4 md:mt-0">
            {{-- <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-semibold text-gray-900 bg-white rounded-md shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Edit</button> --}}
            <x-button href="notebooks/create" type="button" styles="indigo">Create</x-button>
        </div>
    </div>
    <div class="flow-root mt-8">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                <a href="#" class="inline-flex ml-2 group">
                                    Notebook
                                    <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                                    <span class="flex-none invisible ml-2 text-gray-400 rounded group-hover:visible group-focus:visible">
                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </a>
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                <a href="#" class="inline-flex group">
                                    Created By
                                    <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                                    <span class="flex-none ml-2 text-gray-900 bg-gray-100 rounded group-hover:bg-gray-200">
                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </a>
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                <a href="#" class="inline-flex group">
                                    Updated
                                    <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                                    <span class="flex-none invisible ml-2 text-gray-400 rounded group-hover:visible group-focus:visible">
                                        <svg class="flex-none invisible w-5 h-5 ml-2 text-gray-400 rounded group-hover:visible group-focus:visible" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
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
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($notebooks as $notebook)
                            <tr x-data="{ open: false }">
                                <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                    <div class="flex items-center justify-between">
                                        <button @click="open = !open" class="text-gray-900 focus:text-gray-600 focus:outline-none">
                                            <x-svg.chevron-down :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform" />
                                        </button>
                                        {{ $notebook->name }}
                                    </div>
                                </td>
                                <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $notebook->user->name }}
                                </td>
                                <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $notebook->updated_at->format('M d, Y') }}
                                </td>
                                <td class="relative py-4 pl-3 pr-4 text-sm text-right whitespace-nowrap sm:pr-2">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, Lindsay Walton</span></a>
                                </td>
                            </tr>
                            <template x-if="open">
                                @foreach ($notebook->notes as $note)
                                    <tr class="bg-gray-100">
                                        <td colspan="4" class="px-6 py-2 text-sm text-gray-500 whitespace-nowrap">
                                            {{ $note->title }}
                                        </td>
                                    </tr>
                                @endforeach
                            </template>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
