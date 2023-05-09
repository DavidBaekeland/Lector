<x-mail::message>
# Beste {{$userFirstName}}

Welkom bij {{ config('app.name') }}, het online leerplatform van Erasmushogeschool.

Om uw account te activeren moet u via de link hieronder een password aanmaken

<a href="{{ $url }}" class="primary-button" target="_blank" rel="noopener">
    Wachtwoord aanmaken
</a>

<span>
Met vriendelijke groetjes,<br>
{{ config('app.name') }}
</span>

</x-mail::message>
