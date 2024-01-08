@props(['errors'])

@if ($errors->any())
    <div x-data="{ show: true }" x-show="show" class="p-4 mb-4 rounded-md bg-red-50">
        <div class="flex">
            <div class="flex-shrink-0">
                <button type="button" x-on:click="show = false"
                    class="text-red-400 hover:text-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                    <x-svg.x-circle class="w-5 h-5 text-red-400" />
                </button>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-red-800">
                    @if ($errors->count() == 1)
                        There was 1 error with your submission
                    @else
                        There were {{ $errors->count() }} errors with your submission
                    @endif
                </h3>
                <div class="mt-2 text-sm text-red-700">
                    <ul role="list" class="pl-5 space-y-1 list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif
