@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-link active-link'
            : 'nav-link normal-link';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
