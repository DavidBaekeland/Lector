@props([
    'id',
    'show' => false,
])

<div class="fixed none" id="{{ $id }}">
    <div x-show="show" class="content-modal">
        {{ $slot }}
    </div>
</div>
