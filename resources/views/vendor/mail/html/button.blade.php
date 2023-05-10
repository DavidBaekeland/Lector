@props([
    'url',
])
<div class="primary-button-div">
    <a href="{{ $url }}" class="primary-button" target="_blank" rel="noopener">{{ $slot }}</a>
</div>
