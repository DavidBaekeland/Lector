<x-mail::message>
# Beste {{$userName}}

Welkom bij {{ config('app.name') }}, het online leerplatform van Erasmushogeschool.

Om uw account te activeren moet u via de link hieronder een password maken

<a href="{{ $url }}" class="primary-button" target="_blank" rel="noopener">
    Wachtwoord aanmaken
</a>

<span>
Met vriendelijke groetjes,<br>
{{ config('app.name') }}
</span>

</x-mail::message>
