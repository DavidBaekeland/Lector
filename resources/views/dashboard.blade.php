<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    {{\Illuminate\Support\Facades\Auth::user()->role->name}}
                </div>
            </div>
        </div>
    </div>

    <script type="module">
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
</x-app-layout>
