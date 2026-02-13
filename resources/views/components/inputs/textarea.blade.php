@props([
    'name',
    'label' => '',
    'placeholder' => 'Enter text here...',
    'value' => '',
    'required' => false,
    'class' => '',
    'disabled' => false,
    'rows' => 3,
    'queryParam' => null,
    'refreshPage' => false,
])

<div class="mb-4">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
            @if ($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <textarea id="{{ $name }}" name="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}"
        @if ($required) required @endif @if ($disabled) disabled @endif
        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm {{ $class }}"
        {{ $attributes }}>{!! old($name, $value) !!}</textarea>
</div>

@if ($refreshPage && $queryParam)
    <script>
        document.getElementById("{{ $name }}").addEventListener("change", function() {
            const url = new URL(window.location.href);
            url.searchParams.set("{{ $queryParam }}", this.value);
            window.location.href = url.toString();
        });
    </script>
@endif
