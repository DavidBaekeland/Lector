@props(['deadline'])

<div class="dashboard-deadline">
    <p class="deadline-date">{{\Carbon\Carbon::parse($deadline->deadline)->format('d/m')}}</p>
    <p class="deadline-name">{{$deadline->name}}</p>
</div>
