<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Lector') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

    </head>
    <body>
        <div class="app">
            <div class="links">
                @include('layouts.navigation')

                @include('layouts.footer')
            </div>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @livewireScripts


        <script type="module">
            @if(!request()->routeIs('chat') && !request()->routeIs('chat.create'))
            Echo.private('App.Models.User.' + {{ auth()->user()->id }})
                .notification((notification) => {
                    let htmlString = `
                        <div class="alertDiv" id="${notification.id}Div">
                            <span class="alert">
                                <div>
                                    <h1>${notification.chatName}</h1>
                                    <a id="${notification.id}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </a>
                                </div>
                                <p>${notification.message}</p>
                            </span>
                        </div>`;

                    document.getElementsByClassName('app')[0].insertAdjacentHTML('afterbegin', htmlString);

                    let alertClose = document.getElementById(`${notification.id}`);

                    setTimeout(() => {
                        document.getElementById(`${notification.id}Div`).innerHTML = "";
                    }, "5000");

                    alertClose.addEventListener('click', (e) => {
                        document.getElementById(`${notification.id}Div`).innerHTML = "";
                    })
                });
            @endif

            let audioLink = @json(asset('storage/soundEffects/call.mp3'));
            let urlChat = @json(route('call'));
            let callAudio = document.createElement('audio')
            callAudio.src = "http://127.0.0.1:8000/storage/soundEffects/call.mp3";

            @foreach(auth()->user()->chats as $chat)
                Echo.private(`chat.{{$chat->id}}`)
                    .listen('Peer', (e) => {
                        let urlChatAccept = `${urlChat}/${e.peer_id}`;
                        let urlChatDecline = `${urlChat}/${e.peer_id}/decline`;

                        console.log(urlChat)

                        let htmlString = `
                            <div class="alertDiv" id="${e.chat_id}CallDiv">
                                <span class="alert">
                                    <div>
                                        <h1>${e.chat_name}</h1>
                                    </div>
                                    <div class="callButtonDiv">
                                        <x-call-button href="${urlChatDecline}" id="${e.chat_id}CallReclineButton">Wijgeren</x-call-button>
                                        <x-call-button href="${urlChatAccept}" accept>Opnemen</x-call-button>
                                    </div>
                                </span>
                            </div>`;


                        callAudio.play()
                        callAudio.loop = true;

                        document.getElementsByClassName('app')[0].insertAdjacentHTML('afterbegin', htmlString);

                        let alertClose = document.getElementById(`${e.chat_id}CallReclineButton`);

                        alertClose.addEventListener('click', (e) => {
                            callAudio.pause()
                            document.getElementById(`${e.chat_id}CallDiv`).remove();
                        })
                        console.log(e)
                    });
            @endforeach

        </script>

    </body>
</html>
