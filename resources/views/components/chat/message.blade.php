@props([
    "message"
])

@php
    $classes = "";

    if (!$message->user)
    {
        $usersDeleted = \App\Models\User::onlyTrashed()->get();
        $classes = "normal-message message";
    } else
    {
      $classes = ($message->user->id == auth()->user()->id)
                    ? 'personal-message message'
                    : 'normal-message message';
    }


@endphp

<li {{ $attributes->merge(['class' => $classes]) }}>
    <span class="message-text">
        {{$message->message}}
    </span>

    <span class="time">
        {{$message->createdtime}}
    </span>
</li>
