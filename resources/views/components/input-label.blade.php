@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold font-sise-2xl text-sm text-gray-700 text-slate-400']) }}>
    {{ $value ?? $slot }}
</label>
