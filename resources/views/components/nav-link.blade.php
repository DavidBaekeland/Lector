@props(['active'])

@php
$classes = ($active ?? false)
            ? 'active-link'
            : 'normal-link';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
