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
	        $btnClasses = 'bg-indigo-800 font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline inline-flex items-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-700';
	        break;
		case 'red':
	        $btnClasses = 'bg-red-800 font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline inline-flex items-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-700';
	        break;
		case 'white':
	        $btnClasses = 'bg-white font-semibold text-gray-800 hover:text-indigo-500 focus-visible:outline inline-flex items-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-700';
	        break;
	    default:
	        $btnClasses = 'bg-indigo-900 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline inline-flex items-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-700';
	        break;
	}

	switch ($size) {
	    case 'sm':
	        $btnClasses .= ' rounded px-2 py-1 text-sm';
	        break;
		case 'md':
	        $btnClasses .= ' rounded px-3 py-2 text-md';
	        break;
	    case 'lg':
	        $btnClasses .= ' rounded-lg px-6 py-4 text-lg';
	        break;
	    default:
	        $btnClasses .= ' rounded-md px-4 py-2';
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
	<button {{ $attributes->merge(['class' => $btnClasses]) }}
		x-data="{
			confirm(event) {
				if (!window.confirm('{{ $message }}')) {
					event.preventDefault();
				}
			}
		}" 
		@click="confirm" 
		type="{{ isset($type) ? $type : 'submit' }}">
		{{ $slot }}
	</button>
@else
	<button {{ $attributes->merge(['class' => $btnClasses]) }}>
		{{ $slot }}
	</button>
@endif
