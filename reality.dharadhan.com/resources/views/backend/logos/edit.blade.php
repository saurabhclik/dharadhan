@extends('backend.layouts.app')

@section('title')
    {{ $breadcrumbs['title'] }} | {{ config('app.name') }}
@endsection

@section('admin-content')
<div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

    <div class="space-y-6">
        <div class="rounded-md border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="p-5 space-y-6 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <form action="{{ route('admin.logos.update', $logo->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <!-- Title -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                            <input type="text" name="title" value="{{ old('title', $logo->title) }}" class="form-control">
                        </div>

                        <!-- Current Image -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Current Image</label>
                            <img src="{{ $logo->image_url }}" alt="{{ $logo->title }}" class="w-32 h-32 object-contain border rounded p-2">
                        </div>

                        <!-- New Image -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">New Image (leave empty to keep current)</label>
                            <input type="file" name="image" accept="image/*" class="form-control">
                        </div>

                        <!-- Link Type -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Link Type <span class="text-red-500">*</span></label>
                            <select name="link_type" id="link_type" class="form-control" required>
                                <option value="none" {{ $logo->link_type == 'none' ? 'selected' : '' }}>No Link</option>
                                <option value="property" {{ $logo->link_type == 'property' ? 'selected' : '' }}>Link to Property</option>
                                <option value="url" {{ $logo->link_type == 'url' ? 'selected' : '' }}>External URL</option>
                            </select>
                        </div>

                        <!-- Property Selection -->
                        <div class="space-y-1" id="property_field" style="display: {{ $logo->link_type == 'property' ? 'block' : 'none' }};">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Select Property</label>
                            <select name="property_id" class="form-control">
                                <option value="">Select Property</option>
                                @foreach($properties as $id => $title)
                                    <option value="{{ $id }}" {{ $logo->property_id == $id ? 'selected' : '' }}>{{ $title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- External URL -->
                        <div class="space-y-1" id="url_field" style="display: {{ $logo->link_type == 'url' ? 'block' : 'none' }};">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">External URL</label>
                            <input type="url" name="external_url" value="{{ old('external_url', $logo->external_url) }}" class="form-control">
                        </div>

                        <!-- Badge Text -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Badge Text</label>
                            <input type="text" name="badge_text" value="{{ old('badge_text', $logo->badge_text) }}" class="form-control">
                        </div>

                        <!-- Badge Color -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Badge Color</label>
                            <input type="color" name="badge_color" value="{{ old('badge_color', $logo->badge_color) }}" class="form-control" style="height: 38px;">
                        </div>

                        <!-- Sort Order -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sort Order</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', $logo->sort_order) }}" class="form-control">
                        </div>

                        <!-- Active Status -->
                        <div class="space-y-1">
                            <div class="flex items-center gap-2 mt-2">
                                <input type="checkbox" name="is_active" id="is_active" value="1" {{ $logo->is_active ? 'checked' : '' }} class="form-checkbox">
                                <label for="is_active" class="text-sm font-medium text-gray-700 dark:text-gray-300">Active</label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <x-buttons.submit-buttons cancelUrl="{{ route('admin.logos.index') }}" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('link_type').addEventListener('change', function() {
    document.getElementById('property_field').style.display = this.value === 'property' ? 'block' : 'none';
    document.getElementById('url_field').style.display = this.value === 'url' ? 'block' : 'none';
});
</script>
@endsection