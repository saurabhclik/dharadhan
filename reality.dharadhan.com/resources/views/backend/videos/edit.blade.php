@extends('backend.layouts.app')

@section('title')
    {{ $breadcrumbs['title'] }} | {{ config('app.name') }}
@endsection

@section('admin-content')
    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
        <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

        {!! ld_apply_filters('videos_after_breadcrumbs', '') !!}

        <div class="space-y-6">
            <div class="rounded-md border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="p-5 space-y-6 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                    <form action="{{ route('admin.videos.update', $video->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div class="space-y-1">
                                <label for="title"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Video Title') }}
                                    <span class="text-red-500">*</span></label>
                                <input type="text" name="title" id="title" required
                                    value="{{ old('title', $video->title) }}" placeholder="{{ __('Enter video title') }}"
                                    class="form-control">
                            </div>

                            <div class="space-y-1">
                                <label for="youtube_url"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('YouTube URL') }}
                                    <span class="text-red-500">*</span></label>
                                <input type="url" name="youtube_url" id="youtube_url" required value="{{ old('youtube_url', $video->youtube_url) }}"
                                    placeholder="{{ __('https://www.youtube.com/watch?v=...') }}" class="form-control">
                            </div>

                            <div class="space-y-1">
                                <label for="position"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Position') }}
                                    <span class="text-red-500">*</span></label>
                                <select name="position" id="position" required class="form-control">
                                    <option value="center" {{ (old('position', $video->position) == 'center') ? 'selected' : '' }}>
                                        {{ __('Center (Main)') }}</option>
                                    <option value="left" {{ (old('position', $video->position) == 'left') ? 'selected' : '' }}>
                                        {{ __('Left Sidebar') }}</option>
                                    <option value="right" {{ (old('position', $video->position) == 'right') ? 'selected' : '' }}>
                                        {{ __('Right Sidebar') }}</option>
                                </select>
                            </div>

                            <div class="space-y-1">
                                <label for="sort_order"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Sort Order') }}</label>
                                <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $video->sort_order) }}"
                                    placeholder="{{ __('Enter sort order (lower numbers first)') }}" class="form-control">
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ __('Lower numbers appear first') }}</p>
                            </div>

                            <div class="space-y-1">
                                <div class="flex items-center gap-2 mt-2">
                                    <input type="checkbox" name="is_active" id="is_active" value="1" 
                                        {{ old('is_active', $video->is_active) ? 'checked' : '' }}
                                        class="form-checkbox h-4 w-4 text-primary border-gray-300 rounded focus:ring-primary dark:focus:ring-primary dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="is_active"
                                        class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Active') }}</label>
                                </div>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ __('Inactive videos will not be displayed') }}</p>
                            </div>

                            {!! ld_apply_filters('after_video_fields', '', $video) !!}
                        </div>

                        <!-- YouTube Preview -->
                        <div class="mt-6" x-data="{ 
                            url: '{{ old('youtube_url', $video->youtube_url) }}',
                            get youtubeId() {
                                const match = this.url.match(/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/);
                                return match ? match[1] : null;
                            }
                        }">
                            <div class="border border-gray-200 dark:border-gray-700 rounded-md p-4 bg-gray-50 dark:bg-gray-800/50">
                                <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">{{ __('Preview') }}</h4>
                                <template x-if="youtubeId">
                                    <div class="aspect-video bg-black rounded-md overflow-hidden">
                                        <iframe :src="'https://www.youtube.com/embed/' + youtubeId" 
                                                class="w-full h-full" frameborder="0" 
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                                allowfullscreen></iframe>
                                    </div>
                                </template>
                                <template x-if="!youtubeId">
                                    <div class="aspect-video bg-gray-200 dark:bg-gray-700 rounded-md flex items-center justify-center">
                                        <span class="text-gray-500 dark:text-gray-400">{{ __('Enter a YouTube URL to see preview') }}</span>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div class="mt-6">
                            <x-buttons.submit-buttons cancelUrl="{{ route('admin.videos.index') }}" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Auto-update preview when URL changes
        document.getElementById('youtube_url').addEventListener('input', function() {
            // This will trigger the Alpine.js reactivity
            window.dispatchEvent(new CustomEvent('youtube-url-changed', { detail: this.value }));
        });
    </script>
    @endpush
@endsection