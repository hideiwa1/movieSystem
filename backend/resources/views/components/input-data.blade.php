@props(['value'])

<p {{ $attributes->merge(['class' => 'ps-3 mb-3']) }}>
{{ $value ?? $slot }}
</p>