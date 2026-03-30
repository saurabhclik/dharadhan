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
                <form action="{{ route('admin.localities.store') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <!-- Name -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" 
                                   placeholder="Enter locality name" required>
                            @error('name')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category <span class="text-red-500">*</span></label>
                            <select name="category" class="form-control" required>
                                @foreach($categories as $value => $label)
                                    <option value="{{ $value }}" {{ old('category') == $value ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Sort Order -->
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sort Order</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="form-control">
                            <small class="text-muted">Lower numbers appear first</small>
                            @error('sort_order')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Active Status -->
                        <div class="space-y-1">
                            <div class="flex items-center gap-2 mt-2">
                                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="form-checkbox">
                                <label for="is_active" class="text-sm font-medium text-gray-700 dark:text-gray-300">Active</label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <x-buttons.submit-buttons cancelUrl="{{ route('admin.localities.index') }}" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection