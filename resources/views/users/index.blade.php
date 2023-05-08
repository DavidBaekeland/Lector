<x-app-layout>
    <x-modal :name="'click'" :show="$show">
            <x-card>
                <x-auth.register :courses="$courses" :users="$users" :roles="$roles"></x-auth.register>
            </x-card>
    </x-modal>
    <x-card-large>
        <form action="{{ route('users.multiple.delete') }}" method="post" id="delete-user-form">
            @csrf

            <div class="user-links">
                <x-text-input id="search-users" type="email" name="search-users" />

                <div class="change-user-links">
                    <a href="{{ route('users.create') }}" class="link">
                        <x-icon>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                            </svg>
                        </x-icon>
                    </a>

                    <x-delete-button />
                </div>
            </div>

           <x-error/>

            <div class="table-users">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Voornaam</th>
                            <th>Achternaam</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Opleiding</th>
                            <th>Jaar</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><input type="checkbox" name="users[]" id="" class="checkbox" value="{{ $user->id }}"></td>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role->name}}</td>
                                @if($user->course)
                                    <td>{{$user->course->name}}</td>
                                @else
                                    <td>N/A</td>
                                @endif

                                @if($user->year)
                                    <td>{{$user->year}}</td>
                                @else
                                    <td>N/A</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </x-card-large>

    <style>
        #search-users {
            background: url({{ asset('storage/icons/search.svg') }}) no-repeat;
            background-size: 20px;
            background-position: 10px center;
            font-weight: normal;
        }

        #search-users:focus {
            background: url({{ asset('storage/icons/selected/search.svg') }}) no-repeat;
            background-size: 20px;
            background-position: 10px center;
            color: red;

        }
    </style>

</x-app-layout>
