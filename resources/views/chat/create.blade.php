<x-app-layout>
    <div class="livewire">
        <x-card-small>
            <div class="card-small-title">
                <span>CHAT</span>
                <a href="{{ route("chat.create") }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </a>
            </div>
            <div class="card-small-list">
                @foreach(auth()->user()->chats as $chat)
                    <a href="{{ route('chat') }}" class="card-small-item">
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


        </x-card-small>


        <x-card-large>
            <livewire:search-user />
        </x-card-large>
    </div>



</x-app-layout>
