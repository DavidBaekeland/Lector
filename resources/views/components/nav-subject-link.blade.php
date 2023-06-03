@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'nav-subject-link subject-active-link'
                : 'nav-subject-link  subject-normal-link';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
