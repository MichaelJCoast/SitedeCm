@props(['active'])

@php
$classes = ($active ?? false)
            ? 'group relative border bg-gray-900 dark:bg-white py-3 px-4 flex items-center justify-center text-black text-sm font-semibold uppercase focus:outline-none sm:flex-1 shadow-sm cursor-pointer transition duration-150 ease-in-out'
            : 'group relative border bg-gray-900 dark:bg-white py-3 px-4 flex items-center justify-center text-gray-300 text-sm font-semibold uppercase focus:outline-none sm:flex-1 shadow-sm cursor-pointer duration-150 ease-in-out';
@endphp

<label {{ $attributes->merge(['class' => $classes]) }}>
    <input type="radio" name="size" value="{{ $slot }}" class="sr-only">
      <span> {{ $slot }} </span>
        <span class="absolute -inset-px pointer-events-none" aria-hidden="true"></span>
</label>
