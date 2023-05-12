<x-app-layout>
    <x-card-large class="small">
        @foreach(auth()->user()->chats as $chat)
            <a href="">
                {{$chat->name}}
            </a>
        @endforeach
    </x-card-large>

    <x-card-large>
        <ul id="chat-list">
            @foreach(auth()->user()->chats->first()->messages as $message)
                <x-chat.message :message="$message"></x-chat.message>
            @endforeach
        </ul>

        <form id="chat-form">
            @csrf

            <x-input-hidden id="chat_id" value="{{auth()->user()->chats->first()->id}}" />

            <p id="typing"></p>
            <x-text-input type="text" name="messageInput" id="messageInput" autocomplete="off" />

            <button type="submit" id="submit-chat">Submit</button>
        </form>
    </x-card-large>

</x-app-layout>
