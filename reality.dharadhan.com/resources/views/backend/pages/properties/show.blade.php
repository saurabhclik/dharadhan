@extends('backend.layouts.app')

@section('title')
    {{ $breadcrumbs['title'] }} | {{ config('app.name') }}
@endsection

@section('admin-content')
    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
        <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

        {!! ld_apply_filters('tasks_after_breadcrumbs', '') !!}
        <div class="space-y-6">
            <div class="rounded-md border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div
                    class="px-5 py-4 sm:px-6 sm:py-5 flex justify-between items-center border-b border-gray-100 dark:border-gray-800">
                    <h3 class="text-base font-medium text-gray-700 dark:text-white/90">{{ __('Property Details') }}</h3>
                    <div class="flex gap-2">
                        @if (auth()->user()->can('property.edit'))
                            <a href="{{ route('admin.properties.edit', [$property->id]) }}" class="btn-primary">
                                <iconify-icon icon="lucide:pencil" class="mr-2"></iconify-icon>
                                {{ __('Edit') }}
                            </a>
                        @endif
                        <a href="{{ route('admin.properties.index') }}" class="btn-default">
                            <iconify-icon icon="lucide:arrow-left" class="mr-2"></iconify-icon>
                            {{ __('Back') }}
                        </a>
                    </div>
                </div>

                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <!-- Meta Information -->
                    <div class="mb-6 flex flex-wrap gap-4 text-sm text-gray-600 dark:text-gray-300">
                        <div class="flex items-center">
                            <iconify-icon icon="lucide:user" class="mr-1"></iconify-icon>
                            {{ __('Author:') }} {{ $property->user->name }}
                        </div>
                        <div class="flex items-center">
                            <iconify-icon icon="lucide:calendar" class="mr-1"></iconify-icon>
                            {{ __('Created:') }} {{ $property->created_at->format('M d, Y h:i A') }}
                        </div>
                        @if ($property->created_at != $property->updated_at)
                            <div class="flex items-center">
                                <iconify-icon icon="lucide:clock" class="mr-1"></iconify-icon>
                                {{ __('Updated:') }} {{ $property->updated_at->format('M d, Y h:i A') }}
                            </div>
                        @endif
                        <div class="flex items-center">
                            <iconify-icon icon="lucide:tag" class="mr-1"></iconify-icon>
                            {{ __('Status:') }}
                            <span
                                class="ml-1 {{ get_post_status_class($property->status) }}">{{ ucfirst($property->status) }}</span>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    @if ($property->featured_image)
                        <div class="mb-6">
                            <img src="{{ asset('storage/' . $property->featured_image) }}" alt="{{ $property->title }}"
                                class="max-h-64 rounded-md">
                        </div>
                    @endif

                    <!-- Content -->
                    <div class="mb-6">
                        <h4 class="text-lg font-medium text-gray-700 dark:text-white/90 mb-2">{{ __('Description') }}</h4>
                        <div
                            class="prose max-w-none dark:prose-invert prose-headings:font-medium prose-headings:text-gray-700 dark:prose-headings:text-white/90 prose-p:text-gray-700 dark:prose-p:text-gray-300">
                            {!! $property->description !!}
                        </div>
                    </div>

                    @include('backend.pages.properties.partials.view', [
                        'property' => $property,
                    ])

                </div>
            </div>
        </div>
    </div>
@endsection
