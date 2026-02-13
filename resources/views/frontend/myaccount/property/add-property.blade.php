@extends('layouts.myaccount')

@section('content')
    <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
        <div class="single-add-property">
            <h3>Property description and price</h3>
            <div class="property-form-group">
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            <label for="title">Property Title *</label>
                            <input type="text" name="title" id="title" placeholder="Enter your property title"
                                required value="{{ old('title', $property->title ?? '') }}">
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            <label for="description">Property Description *</label>
                            <textarea id="description" name="description" placeholder="Describe about your property" required>{!! old('description', $property->description ?? '') !!}</textarea>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <p>
                            <label for="description">Price *</label>
                            <input type="text" name="price" placeholder="{{ env('DEFAULT_CURRENCY', 'INR') }}"
                                id="price" value="{{ old('price', $property->price ?? '') }}" required>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <p>
                    <div class="col-lg-6 col-md-12">
                        <label for="facing">is Featured</label>
                        <div class="pull-right">
                            <input type="checkbox" name="is_featured" value="1"
                                @if (old('is_featured', $property->is_featured ?? false)) checked @endif>
                        </div>
                    </div>
                    </p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <p>
                        <div class="form-group">
                            <label for="description">Category *</label>
                            <select class="form-control" name="property_category_id" style="display: none;">
                                @foreach ($categories as $key => $category)
                                    <option value="{{ $key }}"
                                        {{ old('property_category_id', $property->property_category_id ?? '') == $key ? 'selected' : '' }}>
                                        {{ $category }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <p>
                        <div class="form-group">
                            <label for="description">Current Status *</label>
                            <select class="form-control" name="current_status" style="display: none;">
                                @foreach (propertyCurrentStatus() as $key => $mode)
                                    <option value="{{ $key }}"
                                        {{ old('current_status', $property->current_status ?? '') == $key ? 'selected' : '' }}>
                                        {{ ucfirst($mode) }}</option>
                                @endforeach
                            </select>

                        </div>
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <p>
                        <div class="form-group">
                            <label for="description">Type *</label>
                            <select class="form-control" id="property_type" name="property_type" style="display: none;">
                                <option value="">Select Property Type</option>
                                @foreach ($types as $key => $type)
                                    <option value="{{ $key }}"
                                        {{ old('property_type', $property->property_type ?? '') == $key ? 'selected' : '' }}>
                                        {{ $type }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                        </p>
                    </div>
                    <input type="hidden" name="status" value="inactive">
                </div>
            </div>
        </div>

        <div class="single-add-property">
            <h3>Property Media</h3>
            <div class="property-form-group">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group featured_image_block">
                            <x-inputs.file-input name="featured_image" id="featured_image" accept="image/*"
                                label="{{ __('Featured Image') }}" :existingAttachment="isset($property) && $property->featured_image
                                    ? asset('storage/' . $property->featured_image)
                                    : null" :existingAltText="isset($property) ? $property->title : ''" :removeCheckboxLabel="__('Remove featured image')"
                                class="mt-1">
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-300">
                                    {{ __('Select an image to represent this property') }}
                                </p>
                            </x-inputs.file-input>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group property-images">
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
        </div>

        <div class="single-add-property">
            <h3>Property Location</h3>
            <div class="property-form-group">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <p>
                            <label for="location">Location *</label>
                            @include('place_search', [
                                'name' => 'location',
                                'id' => 'location',
                                'value' => old('location', $property->location ?? ''),
                                'required' => 'required',
                                'placeholder' => __('Location'),
                            ])
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <p>
                                <label for="site_plan">Site Plan</label>
                                <select name="site_plan" class="form-control" id="site_plan">
                                    <option value="no"
                                        {{ old('site_plan', $property->site_plan ?? '') == 'no' ? 'selected' : '' }}>No
                                    </option>
                                    <option value="yes"
                                        {{ old('site_plan', $property->site_plan ?? '') == 'yes' ? 'selected' : '' }}>Yes
                                    </option>
                                </select>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="row {{ isset($property->site_plan) && $property->site_plan == 'yes' ? '' : 'd-none' }} site_plan_images"
                    id="site_plan_images">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
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
            </div>
        </div>

        <div class="single-add-property">
            <h3>Extra Information</h3>
            <div class="property-form-group">
                <div class="row">
                    <div class="col-lg-6 col-md-12 hiddeninput">
                        <p>
                            <label for="bedrooms">Bedrooms</label>
                            <input type="text" name="bedrooms" placeholder="Enter bedrooms" id="bedrooms"
                                value="{{ old('bedrooms', $property->bedrooms ?? '') }}">
                        </p>
                    </div>

                    <div class="col-lg-6 col-md-12 hiddeninput">
                        <p>
                            <label for="bathrooms">Bathrooms</label>
                            <input type="text" name="bathrooms" placeholder="Enter bathrooms" id="bathrooms"
                                value="{{ old('bathrooms', $property->bathrooms ?? '') }}">
                        </p>
                    </div>

                    <div class="col-lg-6 col-md-12 hiddeninput">
                        <p>
                            <label for="kitchens">Kitchens</label>
                            <input type="text" name="kitchens" placeholder="Enter kitchens" id="kitchens"
                                value="{{ old('kitchens', $property->kitchens ?? '') }}">
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-add-property">
            <h3>Smart Feature Information</h3>
            <div class="property-form-group">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <label for="features">Features</label>
                        @php
                            $selectedAmenities = $property->smart_home_features ?? []; // from session or DB
                        @endphp

                        @foreach (allAmenities() as $group => $items)
                            <h4 class="mt-3">{{ $group }}</h4>
                            <div class="row">
                                @foreach ($items as $key => $label)
                                    <div class="col-md-4">
                                        <label class=" d-flex align-items-center gap-2">
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
            <div class="add-property-button pt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="prperty-submit-button">
                            <button type="submit">Submit Property</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection




@push('styles')
    <style>
        .featured_image_block img,
        .site_plan_images img,
        .property-images img {
            width: 120px;
        }
    </style>
@endpush


@push('scripts')
    <script src="{{ asset('js/ui-lement.js') }}"></script>
    <x-quill-editor :editor-id="'description'" />

    <script>
        $("#site_plan").change(function() {
            if ($(this).val() == "yes") {
                $("#site_plan_images").removeClass('d-none');
            } else {
                $("#site_plan_images").addClass('d-none');
            }
        });

        $('.nice-select').on('click', '.option', function() {
            let value = $(this).data('value');
            if (value === 'plots') {
                $('.hiddeninput').addClass('d-none');
            } else {
                $('.hiddeninput').removeClass('d-none');
            }
        });
    </script>
@endpush
