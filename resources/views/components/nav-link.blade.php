@props(['active'])

@php
$classes = ($active ?? false)
            // ? 'inline-flex items-center px-1 pt-1 border-2 border-white text-sm font-medium leading-5 text-white focus:outline-none focus:border-white-700 transition duration-150 ease-in-out bg-indigo-500'
            ? 'active-link'
            : ' hover:border-[1px] mx-[1px] hover:mx-0 rounded-md p-1 box-border capitalize ';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
