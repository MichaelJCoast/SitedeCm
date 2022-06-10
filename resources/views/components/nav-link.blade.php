@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex cursor-pointer text-lg items-center px-1 pt-1 border-b-2 border-red-600 font-semibold leading-5 text-white hover:text-red-600 focus:outline-none transition duration-150 ease-in-out'
            : 'inline-flex cursor-pointer text-lg items-center px-1 pt-1 font-semibold leading-5 text-white hover:text-red-600 focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
