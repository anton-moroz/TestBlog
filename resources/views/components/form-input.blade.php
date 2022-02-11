@props([
    'name',
    'value',
    'type' => 'text',
    'text',
    'value' => null,
    'disabled' => false

])

<div class="mt-4">
    <x-jet-label for="{{ $name }}" :value="__( $text )" />

    <x-jet-input
             id="{{ $name }}" class="block mt-1 w-full"
             type="{{ $type }}"
             name="{{ $name }}"
             autocomplete="{{ $name }}"
             value="{{ $value }}"
             :disabled="$disabled"
    />
</div>
