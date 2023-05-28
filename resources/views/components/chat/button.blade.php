@props([
    "exit" => false
])

@php
    $classes = ($exit)
                    ? 'exit call-button'
                    : 'call-button';

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{$slot}}
</a>
