<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @method($method ?? 'POST')
    @csrf
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Main Content Area -->
        <div class="lg:col-span-3 space-y-6">
            <div class="rounded-md border bg-white dark:border-gray-800 dark:bg-gray-900 p-5 space-y-4 sm:p-6">

                <!-- Title -->
                <div class="space-y-1">
                    <label class="block text-sm font-medium">{{ __('Title') }} <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="title" class="form-control"
                        value="{{ old('title', $property->title ?? '') }}" placeholder="{{ __('Title') }}" required>
                </div>

                <!-- Description -->
                <div class="space-y-1">
                    <label for="description"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Description') }} <span
                            class="text-red-500">*</span></label>
                    <div>
                        <textarea name="description" id="description" rows="10" required>{!! old('description', $property->description ?? '') !!}</textarea>
                    </div>
                </div>

                <!-- Location Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- ADD THIS: Locality Dropdown -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ __('Locality/Area') }}
                        </label>
                        @php
                            $localities = \App\Models\Locality::getGroupedByCategory();
                            $selectedLocality = old('locality', $property->locality->name ?? '');
                        @endphp
                        
                        <select name="locality" id="locality" class="form-control tom-select-locality">
                            <option value="">{{ __('Select Locality') }}</option>
                            
                            @if(!empty($localities['nearby_cities']))
                                <optgroup label="{{ __('Nearby Roads') }}">
                                    @foreach($localities['nearby_cities'] as $locality)
                                        <option value="{{ $locality['name'] }}" 
                                            {{ $selectedLocality == $locality['name'] ? 'selected' : '' }}>
                                            {{ $locality['name'] }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endif

                            @if(!empty($localities['popular_cities']))
                                <optgroup label="{{ __('Popular Areas') }}">
                                    @foreach($localities['popular_cities'] as $locality)
                                        <option value="{{ $locality['name'] }}" 
                                            {{ $selectedLocality == $locality['name'] ? 'selected' : '' }}>
                                            {{ $locality['name'] }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endif

                            @if(!empty($localities['other_cities']))
                                <optgroup label="{{ __('Other Areas') }}">
                                    @foreach($localities['other_cities'] as $locality)
                                        <option value="{{ $locality['name'] }}" 
                                            {{ $selectedLocality == $locality['name'] ? 'selected' : '' }}>
                                            {{ $locality['name'] }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endif
                        </select>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-300">
                            {{ __('Select the locality/area where the property is located') }}
                        </p>
                    </div>

                    <!-- Existing Location Field (Full Address) -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Full Address/Location') }} <span
                                class="text-red-500">*</span></label>

                        @include('place_search', [
                            'name' => 'location',
                            'id' => 'location',
                            'class' => 'form-control',
                            'value' => old('location', $property->location ?? ''),
                            'required' => 'required',
                            'placeholder' => __('Full Address'),
                        ])
                    </div>
                </div>

                <!-- Price Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700
                            dark:text-gray-300">{{ __('Admin Price') }}</label>
                        <input type="number" name="admin_price" step="0.01" class="form-control"
                            value="{{ old('admin_price', $property->admin_price ?? '') }}"
                            placeholder="{{ __('Admin Price') }}">
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Price') }} <span
                                class="text-red-500">*</span></label>
                        <input type="number" name="price" step="0.01" class="form-control"
                            value="{{ old('price', $property->price ?? '') }}" placeholder="{{ __('Price') }}"
                            required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div x-data="{ sitePlan: '{{ old('site_plan', $property->site_plan ?? 'no') }}' }" class="space-y-4">
                        <!-- Site Plan -->
                        <div class="space-y-1">
                            <label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Site Plan') }}</label>
                            <select name="site_plan" class="form-control" x-model="sitePlan">
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>

                        <!-- Property Site Plan Images (only if sitePlan == yes) -->
                        <div x-show="sitePlan === 'yes'" x-cloak>
                            <x-inputs.file-input name="plan_images[]" id="plan_images" accept="image/*"
                                label="{{ __('Property Site Plan Images') }}" :existingAttachment="isset($property)
                                    ? $property->images()->where('type', 'site_plan')->pluck('path')->toArray()
                                    : null" :existingAltText="isset($property) ? $property->title : ''"
                                :removeCheckboxLabel="__('Remove image')" class="mt-1" :multiple="true" :removeCheckboxName="'remove_plan_images'">
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-300">
                                    {{ __('Select site plan images to showcase this property. You can select multiple images.') }}
                                </p>
                            </x-inputs.file-input>
                        </div>
                    </div>
                </div>

                <!-- Property Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1 hiddeninput">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Bedrooms') }}</label>
                        <input type="number" name="bedrooms" class="form-control"
                            value="{{ old('bedrooms', $property->bedrooms ?? '') }}" min="0" max="10"
                            placeholder="{{ __('Bedrooms') }}">
                    </div>

                    <div class="space-y-1 hiddeninput">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Kitchens') }}</label>
                        <input type="number" name="kitchens" class="form-control"
                            value="{{ old('kitchens', $property->kitchens ?? 1) }}" min="0" max="10"
                            placeholder="{{ __('Kitchens') }}">
                    </div>

                    <div class="space-y-1 hiddeninput">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Bathrooms') }}</label>
                        <input type="number" name="bathrooms" class="form-control"
                            value="{{ old('bathrooms', $property->bathrooms ?? '') }}" min="0" max="10"
                            placeholder="{{ __('Bathrooms') }}">
                    </div>
                    
                    <div class="space-y-1">
                        <x-inputs.combobox name="current_status" label="{{ __('Current Status') }}"
                            placeholder="{{ __('Select Status') }}" :options="collect(propertyCurrentStatus())
                                ->map(fn($name, $id) => ['value' => $id, 'label' => ucfirst($name)])
                                ->values()
                                ->toArray()" :selected="old('current_status', $property->current_status ?? '')"
                            :searchable="false" />
                    </div>
                </div>

                <!-- Smart Home Features -->
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        {{ __('Smart Home Features') }}
                    </label>
                    @php
                        $selectedAmenities = $property->smart_home_features ?? []; // from session or DB
                    @endphp
                    @foreach (allAmenities() as $group => $items)
                        <h4 class="mt-3">{{ $group }}</h4>
                        <div class="w-full grid grid-cols-2 md:grid-cols-2 gap-6">
                            @foreach ($items as $key => $label)
                                <div class="">
                                    <label class="">
                                        <input type="checkbox" name="smart_home_features[]"
                                            value="{{ $key }}"
                                            {{ in_array($key, $selectedAmenities) ? 'checked' : '' }}>
                                        {{ $label }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Sidebar Area -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Status and Visibility -->
            <div class="rounded-md border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
                <div class="px-4 py-3 sm:px-6 border-b border-gray-100 dark:border-gray-800">
                    <h3 class="text-base font-medium text-gray-700 dark:text-white">{{ __('Status') }}</h3>
                </div>
                <div class="p-3 space-y-2 sm:p-4">
                    <div class="mb-4">
                        <x-buttons.submit-buttons cancelUrl="{{ route('admin.properties.index', $property) }}" />
                    </div>
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Featured') }}</label>
                        <div class="mt-2">
                            <x-toggle-switch name="is_featured" :checked="$property->is_featured ?? false" />
                        </div>
                    </div>
                    <!-- Status with Combobox -->
                    <x-inputs.combobox name="status" label="{{ __('Status') }}"
                        placeholder="{{ __('Select Status') }}" :options="collect($statuses)
                            ->map(fn($name, $id) => ['value' => $id, 'label' => ucfirst($name)])
                            ->values()
                            ->toArray()" :selected="old('status', $property->status ?? '')"
                        :searchable="false" />

                    <x-inputs.combobox name="property_category_id" label="{{ __('Categories') }}"
                        placeholder="{{ __('Select Category') }}" :options="collect($categories)
                            ->map(fn($name, $id) => ['value' => $id, 'label' => ucfirst($name)])
                            ->values()
                            ->toArray()" :selected="old('property_category_id', $property->property_category_id ?? '')"
                        :multiple="false" :searchable="false" />

                    <x-inputs.combobox name="property_type" label="{{ __('Property Type') }}"
                        placeholder="{{ __('Select Property Type') }}" :options="collect($types)
                            ->map(fn($name, $id) => ['value' => $id, 'label' => ucfirst($name)])
                            ->values()
                            ->toArray()" :selected="old('property_type', $property->property_type ?? '')"
                        :multiple="false" :searchable="false" />

                    <x-inputs.combobox name="user_id" label="{{ __('Assign to Agent') }}"
                        placeholder="{{ __('Select Agent') }}" :options="collect($users)
                            ->map(fn($name, $id) => ['value' => $id, 'label' => ucfirst($name)])
                            ->values()
                            ->toArray()" :selected="old('user_id', $property->user_id ?? '')"
                        :multiple="false" :searchable="true" />

                    <x-inputs.file-input name="featured_image" id="featured_image" accept="image/*"
                        label="{{ __('Featured Image') }}" :existingAttachment="isset($property) && $property->featured_image
                            ? asset('storage/' . $property->featured_image)
                            : null" :existingAltText="isset($property) ? $property->title : ''" :removeCheckboxLabel="__('Remove featured image')"
                        class="mt-1">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-300">
                            {{ __('Select an image to represent this property') }}
                        </p>
                    </x-inputs.file-input>
                    
                    <x-inputs.file-input name="images[]" id="images" accept="image/*"
                        label="{{ __('Property Images') }}" :existingAttachment="isset($property)
                            ? $property->images()->where('type', 'property')->pluck('path')->toArray()
                            : null" :existingAltText="isset($property) ? $property->title : ''" :removeCheckboxLabel="__('Remove image')"
                        class="mt-1" :multiple="true" :removeCheckboxName="'remove_images'">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-300">
                            {{ __('Select images to showcase this property. You can select multiple images.') }}
                        </p>
                    </x-inputs.file-input>
                </div>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Tom Select for locality dropdown if you're using it
        if (typeof TomSelect !== 'undefined') {
            new TomSelect('.tom-select-locality', {
                create: true,
                createOnBlur: true,
                maxOptions: null,
                placeholder: '{{ __('Search or enter locality...') }}',
                persist: false,
                render: {
                    option: function(data, escape) {
                        return '<div class="py-1 px-2">' + escape(data.text) + '</div>';
                    }
                }
            });
        }
    });
</script>
@endpush