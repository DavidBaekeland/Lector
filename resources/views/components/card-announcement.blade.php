@props([
    "announcement"
])

<div {{$attributes->merge(['class' => "card card-large card-announcement" ])}} x-data="{ open: false }" x-on:click="open = ! open">
    <div x-bind:class="open ? 'announcement-title-active' : 'announcement-title'">
        <h3 >{{ $announcement->title }}</h3>
        @if($announcement->created_at->format("d-m-Y") == now()->format("d-m-Y"))
            {{$announcement->created_at->format("H:m")}}
        @else
            {{$announcement->created_at->format("d-m-Y")}}
        @endif
    </div>
    <span x-show="open">
        <hr>
        <p class="announcement">
            {!! $announcement->announcement !!}
        </p>
    </span>
</div>
