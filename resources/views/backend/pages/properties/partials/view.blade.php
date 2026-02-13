<div class="space-y-3 grid grid-cols-1 md:grid-cols-2 gap-6">

    <div class="mb-6">
        <h4 class="text-lg font-medium text-gray-700 dark:text-white/90 mb-2">{{ __('Is Featured') }}:</h4>
        <div
            class="prose max-w-none dark:prose-invert prose-headings:font-medium prose-headings:text-gray-700 dark:prose-headings:text-white/90 prose-p:text-gray-700 dark:prose-p:text-gray-300">
            {{ $property->is_featured ? 'Yes' : 'No' }}</div>
    </div>

    <div class="mb-6">
        <h4 class="text-lg font-medium text-gray-700 dark:text-white/90 mb-2">{{ __('Location') }}:</h4>
        <div
            class="prose max-w-none dark:prose-invert prose-headings:font-medium prose-headings:text-gray-700 dark:prose-headings:text-white/90 prose-p:text-gray-700 dark:prose-p:text-gray-300">
            {{ $property->location }}</div>
    </div>

    <div class="mb-6">
        <h4 class="text-lg font-medium text-gray-700 dark:text-white/90 mb-2">{{ __('Size') }}:</h4>
        <div
            class="prose max-w-none dark:prose-invert prose-headings:font-medium prose-headings:text-gray-700 dark:prose-headings:text-white/90 prose-p:text-gray-700 dark:prose-p:text-gray-300">
            {{ $property->size }}</div>
    </div>


    <div class="mb-6">
        <h4 class="text-lg font-medium text-gray-700 dark:text-white/90 mb-2">{{ __('Measurement') }}:</h4>
        <div
            class="prose max-w-none dark:prose-invert prose-headings:font-medium prose-headings:text-gray-700 dark:prose-headings:text-white/90 prose-p:text-gray-700 dark:prose-p:text-gray-300">
            {{ $property->measurement }}</div>
    </div>

    <div class="mb-6">
        <h4 class="text-lg font-medium text-gray-700 dark:text-white/90 mb-2">{{ __('Facing') }}:</h4>
        <div
            class="prose max-w-none dark:prose-invert prose-headings:font-medium prose-headings:text-gray-700 dark:prose-headings:text-white/90 prose-p:text-gray-700 dark:prose-p:text-gray-300">
            {{ $property->facing }}</div>
    </div>

    <div class="mb-6">
        <h4 class="text-lg font-medium text-gray-700 dark:text-white/90 mb-2">{{ __('Corner') }}:</h4>
        <div
            class="prose max-w-none dark:prose-invert prose-headings:font-medium prose-headings:text-gray-700 dark:prose-headings:text-white/90 prose-p:text-gray-700 dark:prose-p:text-gray-300">
            {{ $property->corner ? 'Yes' : 'No' }}</div>
    </div>

    <div class="mb-6">
        <h4 class="text-lg font-medium text-gray-700 dark:text-white/90 mb-2">{{ __('Admin Price') }}:</h4>
        <div
            class="prose max-w-none dark:prose-invert prose-headings:font-medium prose-headings:text-gray-700 dark:prose-headings:text-white/90 prose-p:text-gray-700 dark:prose-p:text-gray-300">
            {{ env('CURRENCY_SYMBOL', '₹') }}{{ number_format($property->admin_price, 2) }}</div>
    </div>

    <div class="mb-6">
        <h4 class="text-lg font-medium text-gray-700 dark:text-white/90 mb-2">{{ __('Price') }}:</h4>
        <div
            class="prose max-w-none dark:prose-invert prose-headings:font-medium prose-headings:text-gray-700 dark:prose-headings:text-white/90 prose-p:text-gray-700 dark:prose-p:text-gray-300">
            {{ env('CURRENCY_SYMBOL', '₹') }}{{ number_format($property->price, 2) }}</div>
    </div>

    <div class="mb-6">
        <h4 class="text-lg font-medium text-gray-700 dark:text-white/90 mb-2">{{ __('Bedrooms') }}:</h4>
        <div
            class="prose max-w-none dark:prose-invert prose-headings:font-medium prose-headings:text-gray-700 dark:prose-headings:text-white/90 prose-p:text-gray-700 dark:prose-p:text-gray-300">
            {{ $property->bedrooms }}</div>
    </div>

    <div class="mb-6">
        <h4 class="text-lg font-medium text-gray-700 dark:text-white/90 mb-2">{{ __('Kitchens') }}:</h4>
        <div
            class="prose max-w-none dark:prose-invert prose-headings:font-medium prose-headings:text-gray-700 dark:prose-headings:text-white/90 prose-p:text-gray-700 dark:prose-p:text-gray-300">
            {{ $property->kitchens }}</div>
    </div>

    <div class="mb-6">
        <h4 class="text-lg font-medium text-gray-700 dark:text-white/90 mb-2">{{ __('Bathrooms') }}:</h4>
        <div
            class="prose max-w-none dark:prose-invert prose-headings:font-medium prose-headings:text-gray-700 dark:prose-headings:text-white/90 prose-p:text-gray-700 dark:prose-p:text-gray-300">
            {{ $property->bathrooms }}</div>
    </div>

    <div class="mb-6">
        <h4 class="text-lg font-medium text-gray-700 dark:text-white/90 mb-2">{{ __('Area (sqft)') }}:</h4>
        <div
            class="prose max-w-none dark:prose-invert prose-headings:font-medium prose-headings:text-gray-700 dark:prose-headings:text-white/90 prose-p:text-gray-700 dark:prose-p:text-gray-300">
            {{ $property->area }}</div>
    </div>

    <div class="mb-6">
        <h4 class="text-lg font-medium text-gray-700 dark:text-white/90 mb-2">{{ __('Year Built') }}:</h4>
        <div
            class="prose max-w-none dark:prose-invert prose-headings:font-medium prose-headings:text-gray-700 dark:prose-headings:text-white/90 prose-p:text-gray-700 dark:prose-p:text-gray-300">
            {{ $property->year }}</div>
    </div>

    <div class="mb-6">
        <h4 class="text-lg font-medium text-gray-700 dark:text-white/90 mb-2">{{ __('Property Type') }}:</h4>
        <div
            class="prose max-w-none dark:prose-invert prose-headings:font-medium prose-headings:text-gray-700 dark:prose-headings:text-white/90 prose-p:text-gray-700 dark:prose-p:text-gray-300">
            {{ $property->property_type }}</div>
    </div>

    <div class="mb-6">
        <h4 class="text-lg font-medium text-gray-700 dark:text-white/90 mb-2">{{ __('Status') }}:</h4>
        <div
            class="prose max-w-none dark:prose-invert prose-headings:font-medium prose-headings:text-gray-700 dark:prose-headings:text-white/90 prose-p:text-gray-700 dark:prose-p:text-gray-300">
            {{ $property->status }}</div>
    </div>

    <div class="mb-6">
        <h4 class="text-lg font-medium text-gray-700 dark:text-white/90 mb-2">{{ __('List Date') }}:</h4>
        <div
            class="prose max-w-none dark:prose-invert prose-headings:font-medium prose-headings:text-gray-700 dark:prose-headings:text-white/90 prose-p:text-gray-700 dark:prose-p:text-gray-300">
            {{ $property->created_at }}</div>
    </div>

</div>

<div class="space-y-3 grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="mb-6">
        <h4 class="text-lg font-medium text-gray-700 dark:text-white/90 mb-2">{{ __('Images') }}:</h4>

        <div class="flex flex-wrap gap-4">
            @if ($property->images->where('type', 'property') && $property->images->where('type', 'property')->count())
                @foreach ($property->images->where('type', 'property') as $image)
                    <img src="{{ asset('storage/' . $image->path) }}" alt="Property Image"
                        class="w-32 h-32 object-cover rounded-lg border border-gray-300 shadow-sm">
                @endforeach
            @else
                <span class="text-gray-500 dark:text-gray-400">N/A</span>
            @endif
        </div>
    </div>
</div>

<div class="space-y-3 grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="mb-6">
        <h4 class="text-lg font-medium text-gray-700 dark:text-white/90 mb-2">{{ __('Site Plan') }}:</h4>

        <div class="flex flex-wrap gap-4">
            @if ($property->images->where('type', 'site_plan') && $property->images->where('type', 'site_plan')->count())
                @foreach ($property->images->where('type', 'site_plan') as $image)
                    <img src="{{ asset('storage/' . $image->path) }}" alt="Property Image"
                        class="w-32 h-32 object-cover rounded-lg border border-gray-300 shadow-sm">
                @endforeach
            @else
                <span class="text-gray-500 dark:text-gray-400">N/A</span>
            @endif
        </div>
    </div>
</div>
