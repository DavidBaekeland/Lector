@props([
    "id",
    "name",
    "valueLabel"
])

<label for="{{ $id }}" class="container-checkbox">
    <input id="{{ $id }}" type="checkbox" class="checkbox" name="{{ $name }}">
    <span class="checkmark"></span>
    <span>{{ $valueLabel }}</span>
</label>
