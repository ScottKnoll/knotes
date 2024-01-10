<div x-data="{ open: true }" x-show="open" {{ $attributes }}>
    <div class="p-4 mt-4 rounded-md bg-green-50">
        <div class="flex">
            <div class="flex items-center flex-shrink-0">
                <button @click="open = false" type="button" class="text-green-400 hover:text-green-500 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2">
                    <x-svg.x-circle class="w-5 h-5" />
                </button>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-green-800">{{ $message }}</p>
            </div>
        </div>
    </div>
</div>
