<div class="livewire">
    <x-card-large class="small">
        @foreach(auth()->user()->chats as $chat)
            <a wire:click="chat({{ $chat->id}})" @class([
                "chatItemSelected" => $chatLivewire->id == $chat->id
            ])>
                {{$chat->name}}
            </a>
        @endforeach
    </x-card-large>

    <x-card-large>
        <ul id="chat-list">
            @if($chatLivewire)
                @foreach($chatLivewire->messages as $message)
                    <x-chat.message :message="$message"></x-chat.message>
                @endforeach
            @endif
        </ul>

        <form id="chat-form">
            @csrf

            @if($chatLivewire)
                <x-input-hidden id="chat_id" value="{{$chatLivewire->id}}" />
            @endif

            <p id="typing"></p>

            <div id="chat-input-div">
                <x-text-input type="text" name="messageInput" id="messageInput" autocomplete="off" />

                <button type="submit" id="submit-chat">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                    </svg>
                </button>
            </div>

        </form>
    </x-card-large>

    @if($chatLivewire)
        <script>
            Echo.private(`chat.{{$chatLivewire->id}}`)
                .listenForWhisper('typing', (e) => {
                    if(e.name !== "") {
                        document.getElementById('typing').innerHTML = `${e.name} is aan het typen ...`
                    } else {
                        document.getElementById('typing').innerHTML = ""
                    }

                    chatList.scrollTop = chatList.scrollHeight - chatList.clientHeight;
                });


            document.getElementById('messageInput').addEventListener('keyup', function (e) {
                if (document.getElementById('messageInput').value !== "")  {
                    Echo.private(`chat.${chat}`)
                        .whisper('typing', {
                            name: userName
                        });
                } else {
                    Echo.private(`chat.${chat}`)
                        .whisper('typing', {
                            name: ""
                        });
                }
            })


            let chatForm = document.getElementById('chat-form');

            let chatList = document.getElementById('chat-list');

            window.addEventListener('newMessage', (e) => {
                console.log("sqdfqsdf");
                chatList.scrollTop = chatList.scrollHeight - chatList.clientHeight;
            });


            chatList.scrollTop = chatList.scrollHeight - chatList.clientHeight;


            chatForm.addEventListener("submit", function (e) {
                e.preventDefault();

                console.log("dsfq")
                let messageInput = document.getElementById('messageInput').value;
                let chat_id = document.getElementById('chat_id').value;

                if (messageInput !== "") {
                    let formdata = new FormData();
                    formdata.append("message", messageInput);
                    formdata.append("chat_id", chat_id);


                    let requestOptions = {
                        method: 'POST',
                        credentials: "same-origin",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-Token": document.querySelector('meta[name=\"csrf-token\"]').content,
                        },
                        body: formdata,
                        redirect: 'follow'
                    };

                    fetch(urlChat, requestOptions)
                        .then(response => response.json())
                        .then(result => {
                            chatForm.reset()
                            Echo.private(`chat.${chat_id}`)
                                .whisper('typing', {
                                    name: ""
                                });
                        })
                        .catch(error => console.log('error', error));
                }
            })
        </script>
    @endif
</div>
