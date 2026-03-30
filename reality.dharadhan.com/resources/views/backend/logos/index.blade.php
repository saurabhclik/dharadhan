@extends('backend.layouts.app')

@section('title')
    {{ $breadcrumbs['title'] }} | {{ config('app.name') }}
@endsection

@section('admin-content')
<div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6" x-data="{ selectedLogos: [], selectAll: false, bulkDeleteModalOpen: false }">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

    <div class="space-y-6">
        <div class="rounded-md border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-5 py-4 sm:px-6 sm:py-5 flex flex-col md:flex-row justify-between items-center gap-3">
                @include('backend.partials.search-form', [
                    'placeholder' => __('Search by title'),
                ])
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-2">
                        <!-- Bulk Actions dropdown -->
                        <div class="flex items-center justify-center" x-show="selectedLogos.length > 0">
                            <button id="bulkActionsButton" data-dropdown-toggle="bulkActionsDropdown"
                                class="btn-secondary flex items-center justify-center gap-2 text-sm" type="button">
                                <iconify-icon icon="lucide:more-vertical"></iconify-icon>
                                <span>{{ __('Bulk Actions') }} (<span x-text="selectedLogos.length"></span>)</span>
                                <iconify-icon icon="lucide:chevron-down"></iconify-icon>
                            </button>

                            <div id="bulkActionsDropdown" class="z-10 hidden w-48 p-2 bg-white rounded-md shadow dark:bg-gray-700">
                                <ul class="space-y-2">
                                    <li class="cursor-pointer flex items-center gap-1 text-sm text-red-600 dark:text-red-500 hover:bg-red-50 dark:hover:bg-red-500 dark:hover:text-red-50 px-2 py-1.5 rounded transition-colors duration-300"
                                        @click="bulkDeleteModalOpen = true">
                                        <iconify-icon icon="lucide:trash"></iconify-icon> {{ __('Delete Selected') }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    @if (auth()->user()->can('logo.create'))
                        <a href="{{ route('admin.logos.create') }}" class="btn-primary flex items-center gap-2">
                            <iconify-icon icon="feather:plus" height="16"></iconify-icon>
                            {{ __('Add New Logo') }}
                        </a>
                    @endif
                </div>
            </div>

            <div class="space-y-3 border-t border-gray-100 dark:border-gray-800 overflow-x-auto">
                <table class="w-full dark:text-gray-300">
                    <thead class="bg-light">
                        <tr class="border-b border-gray-100 dark:border-gray-800">
                            <th width="5%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">
                                <input type="checkbox" class="form-checkbox" x-model="selectAll"
                                       @click="selectAll = !selectAll; selectedLogos = selectAll ? [...document.querySelectorAll('.logo-checkbox')].map(cb => cb.value) : []">
                            </th>
                            <th width="10%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">Image</th>
                            <th width="20%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">Title</th>
                            <th width="15%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">Link Type</th>
                            <th width="15%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">Badge</th>
                            <th width="10%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">Sort Order</th>
                            <th width="10%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">Status</th>
                            <th width="15%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($logos as $logo)
                            <tr class="{{ $loop->index + 1 != count($logos) ? 'border-b border-gray-100 dark:border-gray-800' : '' }}">
                                <td class="px-5 py-4 sm:px-6">
                                    <input type="checkbox" class="logo-checkbox form-checkbox" value="{{ $logo->id }}"
                                           x-model="selectedLogos" {{ !auth()->user()->can('logo.delete') ? 'disabled' : '' }}>
                                </td>
                                <td class="px-5 py-4 sm:px-6">
                                    <img src="{{ $logo->image_url }}" alt="{{ $logo->title }}" class="w-16 h-16 object-contain rounded">
                                </td>
                                <td class="px-5 py-4 sm:px-6">{{ $logo->title ?? 'No title' }}</td>
                                <td class="px-5 py-4 sm:px-6">
                                    <span class="badge bg-info">{{ ucfirst($logo->link_type) }}</span>
                                </td>
                                <td class="px-5 py-4 sm:px-6">
                                    @if($logo->badge_text)
                                        <span class="badge" style="background-color: {{ $logo->badge_color }}; color: white;">
                                            {{ $logo->badge_text }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 sm:px-6">{{ $logo->sort_order }}</td>
                                <td class="px-5 py-4 sm:px-6">
                                    @if($logo->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 sm:px-6">
                                    <x-buttons.action-buttons :label="__('Actions')" :show-label="false" align="right">
                                        @if (auth()->user()->can('logo.edit'))
                                            <x-buttons.action-item :href="route('admin.logos.edit', $logo->id)" icon="pencil" :label="__('Edit')" />
                                        @endif
                                        
                                        @if (auth()->user()->can('logo.delete'))
                                            <div x-data="{ deleteModalOpen: false }">
                                                <x-buttons.action-item type="modal-trigger" modal-target="deleteModalOpen" 
                                                    icon="trash" :label="__('Delete')" class="text-red-600 dark:text-red-400" />
                                                <x-modals.confirm-delete id="delete-modal-{{ $logo->id }}"
                                                    title="{{ __('Delete Logo') }}"
                                                    content="{{ __('Are you sure you want to delete this logo?') }}"
                                                    formId="delete-form-{{ $logo->id }}"
                                                    formAction="{{ route('admin.logos.destroy', $logo->id) }}"
                                                    modalTrigger="deleteModalOpen"
                                                    cancelButtonText="{{ __('No, cancel') }}"
                                                    confirmButtonText="{{ __('Yes, Confirm') }}" />
                                            </div>
                                        @endif
                                    </x-buttons.action-buttons>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-8">
                                    <p class="text-gray-500 dark:text-gray-300">{{ __('No logos found') }}</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="my-4 px-4 sm:px-6">
                    {{ $logos->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Bulk Delete Modal -->
    <div x-cloak x-show="bulkDeleteModalOpen" x-transition.opacity.duration.200ms
         x-trap.inert.noscroll="bulkDeleteModalOpen" x-on:keydown.esc.window="bulkDeleteModalOpen = false"
         x-on:click.self="bulkDeleteModalOpen = false"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black/20 p-4 backdrop-blur-md">
        <!-- Modal content here - same as video bulk delete modal -->
    </div>
</div>
@endsection