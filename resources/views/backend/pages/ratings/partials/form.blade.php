<form action="{{ $action }}" method="POST">
    @method($method ?? 'POST')
    @csrf
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <div>
            <x-inputs.text name="name" label="{{ __('Name') }}" :value="old('name', $rating->name ?? '')" />
        </div>

        <div>
            <x-inputs.text name="location" label="{{ __('Location') }}" :value="old('location', $rating->location ?? '')" />
        </div>
        <div>
            <x-inputs.text name="rating" label="{{ __('Rating') }}" :value="old('rating', $rating->rating ?? '')" />
        </div>

        <div>
            <x-inputs.textarea name="message" label="{{ __('Comment') }}" :value="old('message', $rating->message ?? '')" />
        </div>

        <div>
            <x-inputs.combobox name="status" label="{{ __('Status') }}" placeholder="{{ __('Select Status') }}"
                :options="collect($statuses)
                    ->map(fn($name, $id) => ['value' => $id, 'label' => ucfirst($name)])
                    ->values()
                    ->toArray()" :selected="old('status', $rating->status ?? '')" :searchable="false" />
        </div>
    </div>

    <div class="mt-6 flex justify-start gap-4">
        <button type="submit" class="btn-primary">{{ __('Save') }}</button>
        <a href="{{ route('admin.ratings.index') }}" class="btn-default">{{ __('Cancel') }}</a>
    </div>
</form>
