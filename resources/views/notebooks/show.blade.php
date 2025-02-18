<x-layout>
    @if (session('alert_message'))
        <x-alert message="{{ session('alert_message') }}" class="mb-4"></x-alert>
    @endif
    <div class="md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                {{ $notebook->name }}</h2>
        </div>
    </div>
    <div class="flow-root mt-8">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Note</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Created
                                At
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Updated
                                At
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Number
                                of Notes
                            </th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($notes as $note)
                            <tr>
                                <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-0">
                                    <a href="/notes/{{ $note->id }}/edit"
                                        class="text-indigo-600 hover:text-indigo-700 hover:underline">{{ $note->title }}</a>
                                </td>
                                <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $note->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $note->updated_at->format('M d, Y') }}
                                </td>
                                <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $notebook->notes_count }}
                                </td>
                                <td
                                    class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-0">
                                    <a href="/notebooks/{{ $notebook->id }}/edit"
                                        class="text-indigo-600 hover:text-indigo-900">Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
