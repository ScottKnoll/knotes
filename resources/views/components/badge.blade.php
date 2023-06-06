@props([
	'size' => 'md',
    'styles' => 'default',
])

@php
	switch ($styles) {
	    case 'red':
	        $btnClasses = 'inline-flex rounded-full bg-red-100 text-red-800';
	        break;
	    case 'green':
	        $btnClasses = 'inline-flex rounded-full bg-green-100 text-green-800';
	        break;
	    default:
	        $btnClasses = 'inline-flex rounded-full bg-gray-100 text-gray-800';
	        break;
	}

	switch ($size) {
	    case 'lg':
	        $btnClasses .= ' px-3 py-0.5 text-sm font-medium';
	        break;
	    default:
	        $btnClasses .= ' px-3 py-0.5 text-xs font-medium';
	        break;
	}
@endphp

<span {{ $attributes->merge(['class' => $btnClasses]) }}>{{ $slot }}</span>
