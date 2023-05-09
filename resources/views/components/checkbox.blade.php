@props([
    "id",
    "name"
])

<label for="{{ $id }}" class="container-checkbox">
    <input id="remember_me" type="checkbox" class="checkbox" name="{{ $name }}">
    <span class="checkmark"></span>
    <span>{{ __('Onthoud mij') }}</span>
</label>
