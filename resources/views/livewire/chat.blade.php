<div class="livewire">
    <x-card-large class="small">
        <div id="chatCreate">
            <span>CHAT</span>
            <a href="{{ route("chat.create") }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </a>
        </div>
        <div class="chat-list">
            @foreach(auth()->user()->chats as $chat)
                <a wire:click="chat({{ $chat->id}})" @class([
                "chatItem",
                "chatItemSelected" => $chatLivewire->id == $chat->id
            ])>
                    @if($chat->name)
                        {{$chat->name}}
                    @else
                        @foreach($chat->users as $chatUser)
                            @if($chatUser->id != auth()->user()->id)
                                {{$chatUser->name}}
                            @endif
                        @endforeach
                    @endif
                </a>
            @endforeach
        </div>


    </x-card-large>


    <x-card-large class="space-between">
        <ul id="chat-list" class="chat-list">
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
                <x-text-input type="text" name="messageInput" class="inputNoIcon" id="messageInput" autocomplete="off" />

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
