@extends('backend.layouts.app')

@section('title')
    {{ $breadcrumbs['title'] }} | {{ config('app.name') }}
@endsection

@section('admin-content')

    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6" x-data="{ selectedVideos: [], selectAll: false, bulkDeleteModalOpen: false }">
        <x-breadcrumbs :breadcrumbs="$breadcrumbs">
            <x-slot name="title_after">
                @if (request('position'))
                    <span class="badge">{{ ucfirst(request('position')) }}</span>
                @endif
            </x-slot>
        </x-breadcrumbs>

        {!! ld_apply_filters('videos_after_breadcrumbs', '') !!}

        <div class="space-y-6">
            <div class="rounded-md border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5 flex flex-col md:flex-row justify-between items-center gap-3">
                    @include('backend.partials.search-form', [
                        'placeholder' => __('Search by title or YouTube ID'),
                    ])
                    <div class="flex items-center gap-3">
                        <div class="flex items-center gap-2">
                            <!-- Bulk Actions dropdown -->
                            <div class="flex items-center justify-center" x-show="selectedVideos.length > 0">
                                <button id="bulkActionsButton" data-dropdown-toggle="bulkActionsDropdown"
                                    class="btn-secondary flex items-center justify-center gap-2 text-sm" type="button">
                                    <iconify-icon icon="lucide:more-vertical"></iconify-icon>
                                    <span>{{ __('Bulk Actions') }} (<span x-text="selectedVideos.length"></span>)</span>
                                    <iconify-icon icon="lucide:chevron-down"></iconify-icon>
                                </button>

                                <!-- Bulk Actions dropdown menu -->
                                <div id="bulkActionsDropdown"
                                    class="z-10 hidden w-48 p-2 bg-white rounded-md shadow dark:bg-gray-700">
                                    <ul class="space-y-2">
                                        <li class="cursor-pointer flex items-center gap-1 text-sm text-red-600 dark:text-red-500 hover:bg-red-50 dark:hover:bg-red-500 dark:hover:text-red-50 px-2 py-1.5 rounded transition-colors duration-300"
                                            @click="bulkDeleteModalOpen = true">
                                            <iconify-icon icon="lucide:trash"></iconify-icon> {{ __('Delete Selected') }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        @if (auth()->user()->can('video.create'))
                            <a href="{{ route('admin.videos.create') }}" class="btn-primary flex items-center gap-2">
                                <iconify-icon icon="feather:plus" height="16"></iconify-icon>
                                {{ __('Add New Video') }}
                            </a>
                        @endif
                    </div>
                </div>
                <div class="space-y-3 border-t border-gray-100 dark:border-gray-800 overflow-x-auto overflow-y-visible">
                    <table id="dataTable" class="w-full dark:text-gray-300">
                        <thead class="bg-light text-capitalize">
                            <tr class="border-b border-gray-100 dark:border-gray-800">
                                <th width="5%"
                                    class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5 sm:px-6">
                                    <div class="flex items-center">
                                        <input type="checkbox"
                                            class="form-checkbox h-4 w-4 text-primary border-gray-300 rounded focus:ring-primary dark:focus:ring-primary dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                            x-model="selectAll"
                                            @click="
                                            selectAll = !selectAll;
                                            selectedVideos = selectAll ?
                                                [...document.querySelectorAll('.video-checkbox')].map(cb => cb.value) :
                                                [];
                                        ">
                                    </div>
                                </th>
                                <th width="25%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">
                                    <div class="flex items-center">
                                        {{ __('Title') }}
                                        <a href="{{ request()->fullUrlWithQuery(['sort' => request()->sort === 'title' ? '-title' : 'title']) }}"
                                            class="ml-1">
                                            @if (request()->sort === 'title')
                                                <iconify-icon icon="lucide:sort-asc" class="text-primary"></iconify-icon>
                                            @elseif(request()->sort === '-title')
                                                <iconify-icon icon="lucide:sort-desc" class="text-primary"></iconify-icon>
                                            @else
                                                <iconify-icon icon="lucide:arrow-up-down"
                                                    class="text-gray-400"></iconify-icon>
                                            @endif
                                        </a>
                                    </div>
                                </th>
                                <th width="15%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">
                                    {{ __('YouTube ID') }}
                                </th>
                                <th width="10%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">
                                    <div class="flex items-center">
                                        {{ __('Position') }}
                                        <a href="{{ request()->fullUrlWithQuery(['sort' => request()->sort === 'position' ? '-position' : 'position']) }}"
                                            class="ml-1">
                                            @if (request()->sort === 'position')
                                                <iconify-icon icon="lucide:sort-asc" class="text-primary"></iconify-icon>
                                            @elseif(request()->sort === '-position')
                                                <iconify-icon icon="lucide:sort-desc" class="text-primary"></iconify-icon>
                                            @else
                                                <iconify-icon icon="lucide:arrow-up-down"
                                                    class="text-gray-400"></iconify-icon>
                                            @endif
                                        </a>
                                    </div>
                                </th>
                                <th width="10%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">
                                    <div class="flex items-center">
                                        {{ __('Sort Order') }}
                                        <a href="{{ request()->fullUrlWithQuery(['sort' => request()->sort === 'sort_order' ? '-sort_order' : 'sort_order']) }}"
                                            class="ml-1">
                                            @if (request()->sort === 'sort_order')
                                                <iconify-icon icon="lucide:sort-asc" class="text-primary"></iconify-icon>
                                            @elseif(request()->sort === '-sort_order')
                                                <iconify-icon icon="lucide:sort-desc" class="text-primary"></iconify-icon>
                                            @else
                                                <iconify-icon icon="lucide:arrow-up-down"
                                                    class="text-gray-400"></iconify-icon>
                                            @endif
                                        </a>
                                    </div>
                                </th>
                                <th width="10%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">
                                    <div class="flex items-center">
                                        {{ __('Status') }}
                                        <a href="{{ request()->fullUrlWithQuery(['sort' => request()->sort === 'is_active' ? '-is_active' : 'is_active']) }}"
                                            class="ml-1">
                                            @if (request()->sort === 'is_active')
                                                <iconify-icon icon="lucide:sort-asc" class="text-primary"></iconify-icon>
                                            @elseif(request()->sort === '-is_active')
                                                <iconify-icon icon="lucide:sort-desc" class="text-primary"></iconify-icon>
                                            @else
                                                <iconify-icon icon="lucide:arrow-up-down"
                                                    class="text-gray-400"></iconify-icon>
                                            @endif
                                        </a>
                                    </div>
                                </th>
                                @php ld_apply_filters('video_list_page_table_header_before_action', '') @endphp
                                <th width="15%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">
                                    {{ __('Action') }}</th>
                                @php ld_apply_filters('video_list_page_table_header_after_action', '') @endphp
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($videos as $video)
                                <tr
                                    class="{{ $loop->index + 1 != count($videos) ? 'border-b border-gray-100 dark:border-gray-800' : '' }}">
                                    <td class="px-5 py-4 sm:px-6">
                                        <input type="checkbox"
                                            class="video-checkbox form-checkbox h-4 w-4 text-primary border-gray-300 rounded focus:ring-primary dark:focus:ring-primary dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                            value="{{ $video->id }}" x-model="selectedVideos"
                                            {{ !auth()->user()->can('video.delete') ? 'disabled' : '' }}>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <div class="flex items-center">
                                            <div class="flex flex-col">
                                                <a href="{{ auth()->user()->can('video.edit') ? route('admin.videos.edit', $video->id) : '#' }}"
                                                    class="hover:text-primary">
                                                    <span>{{ $video->title }}</span>
                                                </a>
                                                <span class="text-xs text-gray-500 dark:text-gray-300">ID: {{ $video->id }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <div class="flex items-center gap-2">
                                            <span class="font-mono text-sm">{{ $video->youtube_id }}</span>
                                            <a href="{{ $video->youtube_url }}" target="_blank" class="text-primary hover:text-primary-dark">
                                                <iconify-icon icon="lucide:external-link" height="14"></iconify-icon>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        @if($video->position == 'center')
                                            <span class="badge bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">Center</span>
                                        @elseif($video->position == 'left')
                                            <span class="badge bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400">Left</span>
                                        @else
                                            <span class="badge bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-400">Right</span>
                                        @endif
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <span class="badge bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">{{ $video->sort_order }}</span>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        @if($video->is_active)
                                            <span class="badge bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">Active</span>
                                        @else
                                            <span class="badge bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400">Inactive</span>
                                        @endif
                                    </td>
                                    @php ld_apply_filters('video_list_page_table_row_before_action', '', $video) @endphp
                                    <td class="px-5 py-4 sm:px-6 flex justify-center">
                                        <x-buttons.action-buttons :label="__('Actions')" :show-label="false" align="right">
                                            @if (auth()->user()->can('video.edit'))
                                                <x-buttons.action-item :href="route('admin.videos.edit', $video->id)" icon="pencil"
                                                    :label="__('Edit')" />
                                            @endif
                                            
                                            @if (auth()->user()->can('video.delete'))
                                                <div x-data="{ deleteModalOpen: false }">
                                                    <x-buttons.action-item type="modal-trigger"
                                                        modal-target="deleteModalOpen" icon="trash" :label="__('Delete')"
                                                        class="text-red-600 dark:text-red-400" />

                                                    <x-modals.confirm-delete id="delete-modal-{{ $video->id }}"
                                                        title="{{ __('Delete Video') }}"
                                                        content="{{ __('Are you sure you want to delete this video?') }}"
                                                        formId="delete-form-{{ $video->id }}"
                                                        formAction="{{ route('admin.videos.destroy', $video->id) }}"
                                                        modalTrigger="deleteModalOpen"
                                                        cancelButtonText="{{ __('No, cancel') }}"
                                                        confirmButtonText="{{ __('Yes, Confirm') }}" />
                                                </div>
                                            @endif
                                        </x-buttons.action-buttons>
                                    </td>
                                    @php ld_apply_filters('video_list_page_table_row_after_action', '', $video) @endphp
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-8">
                                        <div class="flex flex-col items-center justify-center">
                                            <iconify-icon icon="lucide:video-off" height="48" class="text-gray-400 mb-2"></iconify-icon>
                                            <p class="text-gray-500 dark:text-gray-300">{{ __('No videos found') }}</p>
                                            @if (auth()->user()->can('video.create'))
                                                <a href="{{ route('admin.videos.create') }}" class="btn-primary mt-3">
                                                    {{ __('Add Your First Video') }}
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="my-4 px-4 sm:px-6">
                        {{ $videos->links() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Bulk Delete Confirmation Modal -->
        <div x-cloak x-show="bulkDeleteModalOpen" x-transition.opacity.duration.200ms
            x-trap.inert.noscroll="bulkDeleteModalOpen" x-on:keydown.esc.window="bulkDeleteModalOpen = false"
            x-on:click.self="bulkDeleteModalOpen = false"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/20 p-4 backdrop-blur-md" role="dialog"
            aria-modal="true" aria-labelledby="bulk-delete-modal-title">
            <div x-show="bulkDeleteModalOpen"
                x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
                class="flex max-w-md flex-col gap-4 overflow-hidden rounded-md border border-outline border-gray-100 dark:border-gray-800 bg-white text-on-surface dark:border-outline-dark dark:bg-gray-700 dark:text-gray-300">
                <div class="flex items-center justify-between border-b border-gray-100 px-4 py-2 dark:border-gray-800">
                    <div
                        class="flex items-center justify-center rounded-full bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400 p-1">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    <h3 id="bulk-delete-modal-title" class="font-semibold tracking-wide text-gray-700 dark:text-white">
                        {{ __('Delete Selected Videos') }}
                    </h3>
                    <button x-on:click="bulkDeleteModalOpen = false" aria-label="close modal"
                        class="text-gray-400 hover:bg-gray-200 hover:text-gray-700 rounded-md p-1 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                            stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="px-4 text-center">
                    <p class="text-gray-500 dark:text-gray-300">
                        {{ __('Are you sure you want to delete the selected videos?') }}
                        {{ __('This action cannot be undone.') }}
                    </p>
                </div>
                <div class="flex items-center justify-end gap-3 border-t border-gray-100 p-4 dark:border-gray-800">
                    <form id="bulk-delete-form" action="{{ route('admin.videos.bulk-delete') }}" method="POST">
                        @method('DELETE')
                        @csrf

                        <template x-for="id in selectedVideos" :key="id">
                            <input type="hidden" name="ids[]" :value="id">
                        </template>

                        <button type="button" x-on:click="bulkDeleteModalOpen = false"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                            {{ __('No, Cancel') }}
                        </button>

                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-300 dark:focus:ring-red-800">
                            {{ __('Yes, Delete') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function handlePositionFilter(value) {
                let currentUrl = new URL(window.location.href);

                // Preserve sort parameter if it exists.
                const sortParam = currentUrl.searchParams.get('sort');

                // Reset the search params but keep the sort if it exists.
                currentUrl.search = '';

                if (value) {
                    currentUrl.searchParams.set('position', value);
                }

                // Re-add sort parameter if it existed.
                if (sortParam) {
                    currentUrl.searchParams.set('sort', sortParam);
                }

                window.location.href = currentUrl.toString();
            }
        </script>
    @endpush
@endsection