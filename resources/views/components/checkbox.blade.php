@props([
    "id",
    "name",
    "valueLabel",
    "checked" => false
])

<label for="{{ $id }}" class="container-checkbox">
    <input id="{{ $id }}" type="checkbox" class="checkbox" name="{{ $name }}" @checked($checked)>
    <span class="checkmark"></span>
    <span>{{ $valueLabel }}</span>
</label>
