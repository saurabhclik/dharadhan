@extends('backend.layouts.app')

@section('title')
    {{ __('Create Property') }} | {{ config('app.name') }}
@endsection

@section('admin-content')
<div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

    <div class="mt-6">
        <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Property Category -->
                <div>
                    <label for="property_category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        {{ __('Property Category') }} <span class="text-red-500">*</span>
                    </label>
                    <select name="property_category_id" id="property_category_id" class="form-select w-full" required>
                        <option value="">{{ __('Select Category') }}</option>
                        @foreach($categories as $id => $name)
                            <option value="{{ $id }}" {{ old('property_category_id') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                    @error('property_category_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Locality Dropdown -->
                <div>
                    <label for="locality" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        {{ __('Locality/Area') }}
                    </label>
                    @php
                        $localities = \App\Models\Locality::getGroupedByCategory();
                    @endphp
                    
                    <select name="locality" id="locality" class="form-select w-full">
                        <option value="">{{ __('Select Locality') }}</option>
                        
                        @if(!empty($localities['nearby_cities']))
                            <optgroup label="{{ __('Nearby Roads') }}">
                                @foreach($localities['nearby_cities'] as $locality)
                                    <option value="{{ $locality['name'] }}" {{ old('locality') == $locality['name'] ? 'selected' : '' }}>
                                        {{ $locality['name'] }}
                                    </option>
                                @endforeach
                            </optgroup>
                        @endif

                        @if(!empty($localities['popular_cities']))
                            <optgroup label="{{ __('Popular Areas') }}">
                                @foreach($localities['popular_cities'] as $locality)
                                    <option value="{{ $locality['name'] }}" {{ old('locality') == $locality['name'] ? 'selected' : '' }}>
                                        {{ $locality['name'] }}
                                    </option>
                                @endforeach
                            </optgroup>
                        @endif

                        @if(!empty($localities['other_cities']))
                            <optgroup label="{{ __('Other Areas') }}">
                                @foreach($localities['other_cities'] as $locality)
                                    <option value="{{ $locality['name'] }}" {{ old('locality') == $locality['name'] ? 'selected' : '' }}>
                                        {{ $locality['name'] }}
                                    </option>
                                @endforeach
                            </optgroup>
                        @endif
                    </select>
                    
                    <!-- Or add a searchable select with TomSelect -->
                    <p class="text-xs text-gray-500 mt-1">{{ __('Select the locality/area where property is located') }}</p>
                    @error('locality')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title -->
                <div class="md:col-span-2">
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        {{ __('Property Title') }} <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" 
                        class="form-input w-full" required>
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Location (Manual entry) -->
                <div class="md:col-span-2">
                    <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        {{ __('Full Address/Location') }} <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="location" id="location" value="{{ old('location') }}" 
                        class="form-input w-full" required>
                    @error('location')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- ... rest of your form fields ... -->
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.properties.index') }}" class="btn-secondary">
                    {{ __('Cancel') }}
                </a>
                <button type="submit" class="btn-primary">
                    {{ __('Create Property') }}
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Optional: Add TomSelect for better searchable dropdown
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof TomSelect !== 'undefined') {
            new TomSelect('#locality', {
                create: true, // Allow creating new localities
                createOnBlur: true,
                maxOptions: null,
                placeholder: '{{ __('Search or enter locality...') }}'
            });
        }
    });
</script>
@endpush
@endsection