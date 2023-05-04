<x-mail::message>
# Beste {{$userName}}

Welkom bij {{ config('app.name') }}. {{ config('app.name') }} is het online leerplatform van Erasmushogeschool.

Om uw account te activeren moet u via de link hieronder een password maken

<a href="{{ $url }}" class="primary-button" target="_blank" rel="noopener">
    Password aanmaken
</a>

Met vriendelijke groetjes,<br>
{{ config('app.name') }}
</x-mail::message>
