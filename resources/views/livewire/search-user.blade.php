<form wire:submit.prevent="submit" class="space-between">
    @csrf

    <div>
        <div class="selectedUsers">
            <span>
                @if($selectedUsers)
                    @foreach($selectedUsers as $selectedUser)
                        <a class="card-small-item card-small-item-selected">{{\App\Models\User::find($selectedUser)->name}}</a>
                    @endforeach
                @endif
            </span>


            <input type="text" wire:model="user" class="inputNoIcon" name="userInput" autofocus autocomplete="off">
        </div>


        <div id="showUsersDiv">
            @if($choiceUsers)
                @foreach($choiceUsers as $user)
                    <a wire:click="selectUser({{ $user->id}})">
                        {{$user->name}}
                    </a>
                @endforeach
            @endif
        </div>
    </div>

    <div id="chat-input-div">
        <x-text-input type="text" wire:model="messageInput" name="messageInput" class="inputNoIcon" id="messageInput" autocomplete="off"/>

        <button type="submit" id="submit-chat">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
            </svg>
        </button>
    </div>
</form>
