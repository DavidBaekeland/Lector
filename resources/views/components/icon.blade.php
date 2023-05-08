@props(['red'])

@php
    $classes = ($red ?? false)
                ? 'red-icon icon'
                : 'white-icon icon';
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
 {{ $slot }}
</div>
