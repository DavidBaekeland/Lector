<div class="livewire">
    <x-card-large class="small">
        <div class="chatTitle">
            <span>CHAT</span>
            <a href="{{ route("chat.create") }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </a>
        </div>
        <div class="chat-list" id="chats">
            @foreach($authUserChats as $chat)
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
        @if(isset($chatLivewire))
        <div class="chatTitle">
            @if($chatLivewire->name)
                {{$chatLivewire->name}}
            @else
                @foreach($chatLivewire->users as $chatUser)
                    @if($chatUser->id != auth()->user()->id)
                        {{$chatUser->name}}
                    @endif
                @endforeach
            @endif

                <form method="POST" action="{{ route("call")}}">
                    @csrf

                    <x-input-hidden name="chat_id" :value="$chatLivewire->id" />
                    <a type="submit" id="videoLink" onclick="event.preventDefault()
                                        this.closest('form').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                    </a>
                </form>

        </div>
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
        @endif

    </x-card-large>

    @vite(['resources/js/chat.js'])

</div>
