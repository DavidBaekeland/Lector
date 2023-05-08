<form method="POST" action="{{ route('users.store') }}">
    @csrf

    <!-- First name -->
    <div class="input-div">
        <x-text-input id="first_name" type="text" name="first_name" :value="old('first_name')" placeholder="Voornaam" required autofocus autocomplete="first_name" />
        <x-input-error :messages="$errors->get('first_name')"/>
    </div>

    <!-- Last name -->
    <div class="input-div">
        <x-text-input id="last_name" type="text" name="last_name" :value="old('last_name')" placeholder="Achternaam" required  autocomplete="last_name" />
        <x-input-error :messages="$errors->get('last_name')"/>
    </div>

    <!-- Email Address -->
    <div class="input-div">
        <x-text-input id="email" type="email" name="email" :value="old('email')" class="email-input" placeholder="Email" required autocomplete="email" />
        <x-input-error :messages="$errors->get('email')"/>
    </div>

    <!-- Role -->
    <div class="input-div">
        <select name="role" class="role-input">
            <option value="Rol">Rol</option>

            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>


        <x-input-error :messages="$errors->get('role')"/>
    </div>

    <!-- Course -->
    <div class="input-div">
        <select name="course" class="course-input">
            <option value="course">Opleiding</option>

            @foreach($courses as $course)
                <option value="{{$course->id}}">{{ $course->name}}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('course')"/>
    </div>

    <!-- Year -->
    <div class="input-div">
        <select name="year" class="year-input">
            <option value="year">Jaar</option>

            @foreach(\App\Models\User::YEARS as $year)
                <option value="{{ $year }}">{{ $year }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('year')"/>
    </div>

    <x-primary-button>
        {{ __('OPSLAAN') }}
    </x-primary-button>

    <style>
        #first_name, #last_name {
            background: url({{ asset('storage/icons/account.svg') }}) no-repeat;
            background-size: 20px;
            background-position: 10px center;
        }

        #first_name:focus, #last_name:focus {
            background: url({{ asset('storage/icons/selected/account.svg') }}) no-repeat;
            background-size: 20px;
            background-position: 10px center;
        }

        .email-input {
            background: url({{ asset('storage/icons/email.svg') }}) no-repeat;
            background-size: 20px;
            background-position: 10px center;
        }

        .email-input:focus {
            background: url({{ asset('storage/icons/selected/email.svg') }}) no-repeat;
            background-size: 20px;
            background-position: 10px center;
        }

        .role-input {
            background: url({{ asset('storage/icons/password.svg') }}) no-repeat;
            background-size: 20px;
            background-position: 10px center;
        }

        .role-input:focus {
            background: url({{ asset('storage/icons/selected/password.svg') }}) no-repeat;
            background-size: 20px;
            background-position: 10px center;
        }

        .course-input {
            background: url({{ asset('storage/icons/course.svg') }}) no-repeat;
            background-size: 20px;
            background-position: 10px center;
        }

        .course-input:focus {
            background: url({{ asset('storage/icons/selected/course.svg') }}) no-repeat;
            background-size: 20px;
            background-position: 10px center;
        }

        .year-input {
            background: url({{ asset('storage/icons/year.svg') }}) no-repeat;
            background-size: 20px;
            background-position: 10px center;
        }

        .year-input:focus {
            background: url({{ asset('storage/icons/selected/year.svg') }}) no-repeat;
            background-size: 20px;
            background-position: 10px center;
        }
    </style>
</form>
