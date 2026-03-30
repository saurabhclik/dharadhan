<form action="{{ $action }}" method="POST">
    @method($method ?? 'POST')
    @csrf
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="shipment_id"
                class="form-label">{{ __('Name') }} <span class="text-red-500">*</span></label>
            <input type="text" class="form-control" value="{{ $propertyCategory->name ?? old('name') }}" name="name"
                id="name" placeholder="{{ __('Enter Name') }}" required autofocus>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="shipment_id"
                class="form-label">{{ __('Slug') }} <span class="text-red-500">*</span></label>
            <input type="text" class="form-control" value="{{ $propertyCategory->slug ?? old('slug') }}"
                name="slug" id="slug" placeholder="{{ __('Enter Slug') }}" required autofocus>
        </div>

        <div>
            <x-inputs.combobox name="status" label="{{ __('Status') }}" placeholder="{{ __('Select Status') }}"
                :options="collect($statuses)
                    ->map(fn($name, $id) => ['value' => $id, 'label' => ucfirst($name)])
                    ->values()
                    ->toArray()" :selected="old('status', $propertyCategory->status ?? '')" :searchable="false" />
        </div>
    </div>

    <div class="mt-6 flex justify-start gap-4">
        <button type="submit" class="btn-primary">{{ __('Save') }}</button>
        <a href="{{ route('admin.property.categories.index') }}" class="btn-default">{{ __('Cancel') }}</a>
    </div>
</form>
