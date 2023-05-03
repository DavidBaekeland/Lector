<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Lector') }}</title>

        <link rel="stylesheet" href="https://use.typekit.net/jir0vic.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="login">
            <div>
                <a href="/">
                    <x-application-logo/>
                </a>
            </div>

            <div class="card">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
