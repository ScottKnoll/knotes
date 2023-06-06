@props([
    'header' => null,
    'footer' => null,
])

<div {{ $attributes->class(['divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow']) }}>
    @if ($header)
        <div {{ $header->attributes->class(['px-4 py-5 sm:px-6']) }}>
            {{ $header }}
        </div>
    @endif
    <div class="px-4 py-5 sm:p-6">
        {{ $slot }}
    </div>
    @if ($footer)
        <div {{ $footer->attributes->class(['px-4 py-4 sm:px-6']) }}>
            {{ $footer }}
        </div>
    @endif
</div>
