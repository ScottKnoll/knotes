@props([
    'message' => '',
    'renderAs' => 'button',
    'size' => 'md',
    'styles' => 'default',
])

@php
    switch ($styles) {
        case 'none':
            $btnClasses = '';
            break;
        case 'indigo':
            $btnClasses = 'bg-indigo-700 border border-transparent dark:ring-offset-black focus:outline-none focus:ring-2 focus:ring-indigo-700 focus:ring-offset-2 hover:bg-indigo-800 inline-flex items-center text-gray-100';
            break;
        case 'red':
            $btnClasses = 'bg-red-500 border border-transparent dark:ring-offset-black focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 hover:bg-red-600 inline-flex items-center text-gray-100';
            break;
        case 'gray':
            $btnClasses = 'bg-gray-500 border border-transparent dark:ring-offset-black focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 hover:bg-gray-600 inline-flex items-center text-gray-100';
            break;
        default:
            $btnClasses = 'bg-white border border-gray-200 dark:bg-black dark:border-gray-800 dark:hover:bg-gray-900 dark:ring-offset-black dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 hover:bg-gray-50 inline-flex items-center text-gray-700';
            break;
    }

    switch ($size) {
        case 'xs':
            $btnClasses .= ' rounded-sm px-1.5 py-0.5 text-sm';
            break;
        case 'sm':
            $btnClasses .= ' rounded px-2 py-1 text-sm';
            break;
        case 'lg':
            $btnClasses .= ' rounded-lg px-6 py-4 text-lg';
            break;
        default:
            $btnClasses .= ' rounded-md px-3 py-2 text-sm';
            break;
    }
@endphp

@if ($attributes->has('href'))
    <a {{ $attributes->merge(['class' => $btnClasses]) }}>
        {{ $slot }}
    </a>
@elseif ($renderAs === 'input')
    <input {{ $attributes->merge(['type' => 'submit', 'value' => 'Submit', 'class' => $btnClasses]) }}>
@elseif ($renderAs === 'confirm')
    <button {{ $attributes->merge(['class' => $btnClasses]) }} x-data="{
        confirm(event) {
            if (!window.confirm('{{ $message }}')) {
                event.preventDefault();
            }
        }
    }" @click="confirm" type="{{ isset($type) ? $type : 'submit' }}">
        {{ $slot }}
    </button>
@else
    <button {{ $attributes->merge(['class' => $btnClasses]) }}>
        {{ $slot }}
    </button>
@endif
