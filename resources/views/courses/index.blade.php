<x-app-layout>
    <x-card-small>
        <div class="card-small-title">
            <span>Cursussen</span>
        </div>

        <div class="card-small-list">
            @foreach($subjects as $subject)
                <a href="{{ route('courses.show', $subject->id) }}" class="card-small-item">{{$subject->name}}</a>
            @endforeach
        </div>
    </x-card-small>


</x-app-layout>
