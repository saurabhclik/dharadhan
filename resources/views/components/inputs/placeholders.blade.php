@props([
    'name' => 'placeholders',
    'values' => [],
])

<div class="mb-3">
    <label class="form-label">Placeholders</label>
    <div id="{{ $name }}-wrapper">
        @forelse($values as $value)
            <input type="text" name="{{ $name }}[]" value="{{ $value }}" class="form-control mb-2"
                placeholder="Enter placeholder (e.g. name, order_id)">
        @empty
            <input type="text" name="{{ $name }}[]" class="form-control mb-2"
                placeholder="Enter placeholder (e.g. name, order_id)">
        @endforelse
    </div>

    <button type="button" id="add-{{ $name }}" class="btn btn-sm btn-primary mt-2">
        + Add Placeholder
    </button>
</div>

<script>
    document.getElementById('add-{{ $name }}').addEventListener('click', function() {
        const wrapper = document.getElementById('{{ $name }}-wrapper');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = '{{ $name }}[]';
        input.classList.add('form-control', 'mb-2');
        input.placeholder = "Enter placeholder (e.g. user_id)";
        wrapper.appendChild(input);
    });
</script>
