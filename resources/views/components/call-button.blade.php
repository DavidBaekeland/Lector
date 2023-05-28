@props(['accept' => false])

@php
    $classes = ($accept)
                ? 'acceptButton button'
                : 'declineButton button';
@endphp

<a {{ $attributes->merge(['class' => $classes ]) }} >
    {{$slot}}
</a>
