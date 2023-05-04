@props([
    'url',

])
<a href="{{ $url }}" class="primary-button" target="_blank" rel="noopener">{{ $slot }}</a>
