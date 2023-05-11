@props([
    "message"
])

@php
    $classes = ($message->user->id == auth()->user()->id)
                ? 'personal-message message'
                : 'normal-message message';
@endphp

<li {{ $attributes->merge(['class' => $classes]) }}>
    <span class="message-text">
        {{$message->message}}
    </span>

    <span class="time">
        {{$message->createdtime}}
    </span>
</li>
