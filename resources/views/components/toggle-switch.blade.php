@props(['name' => null, 'checked' => false])

<div x-data="{ on: {{ $checked ? 'true' : 'false' }} }" class="inline-block">
    <label class="relative inline-flex items-center cursor-pointer">
        <!-- Hidden input for form submission -->
        <input type="hidden" name="{{ $name }}" :value="on ? 1 : 0">

        <!-- Toggle background -->
        <div @click="on = !on" :class="on ? 'bg-blue-600' : 'bg-gray-400'"
            class="w-11 h-6 rounded-full transition-colors duration-300 relative">

            <!-- Circle -->
            <div class="absolute top-0.5 left-0.5 w-6 h-6 bg-white rounded-full shadow transform transition-transform duration-300"
                :class="on ? 'translate-x-full' : 'translate-x-0'">
            </div>
        </div>
    </label>
</div>
