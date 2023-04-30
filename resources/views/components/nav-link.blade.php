@props(['active'])

@php
$classes = ($active ?? false)
            // ? 'inline-flex items-center px-1 pt-1 border-2 border-white text-sm font-medium leading-5 text-white focus:outline-none focus:border-white-700 transition duration-150 ease-in-out bg-indigo-500'
            ? 'active-link'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
