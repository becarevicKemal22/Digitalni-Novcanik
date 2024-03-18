@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-normal text-opacity-75']) }}>
    {{ $value ?? $slot }}
</label>
