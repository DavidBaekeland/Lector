<button {{ $attributes->merge(['type' => 'submit', 'class' => 'secondary-button']) }}>
    {{ $slot }}
</button>
