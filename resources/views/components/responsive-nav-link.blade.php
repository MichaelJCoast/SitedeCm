@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 text-base font-semibold text-red-600 focus:outline-none transition duration-150 ease-in-out'
            : 'block pl-3 pr-4 py-2 text-base font-semibold text-gray-900 dark:text-white hover:text-red-600 dark:hover:text-red-600 focus:outline-none focus:text-red-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
