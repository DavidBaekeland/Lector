<div class="livewire">
    <x-card-large class="small">
        @foreach(auth()->user()->chats as $chat)
            <a wire:click="chat({{ $chat->id}})" @class([
                "chatItem",
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

    @vite(['resources/js/chat.js'])

</div>
