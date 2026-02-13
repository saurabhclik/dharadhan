@props([
    'type' => 'text',
    'name' => 'text',
    'id' => null,
    'placeholder' => 'Enter Text',
    'required' => 'required',
    'value' => '',
])

@php
    $id = $id ?? $name;
@endphp

<input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" class="form-control"
    placeholder="{{ $placeholder }}" {{ $required }} value="{{ $value }}">
{{ $slot }}
