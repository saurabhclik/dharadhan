@extends('backend.layouts.app')

@section('title')
    {{ $breadcrumbs['title'] }} | {{ config('app.name') }}
@endsection

@section('admin-content')
<div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6" x-data="{ selectedLocalities: [], selectAll: false, bulkDeleteModalOpen: false }">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

    <div class="space-y-6">
        <div class="rounded-md border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-5 py-4 sm:px-6 sm:py-5 flex flex-col md:flex-row justify-between items-center gap-3">
                @include('backend.partials.search-form', [
                    'placeholder' => __('Search by name'),
                ])
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-2">
                        <!-- Bulk Actions dropdown -->
                        <div class="flex items-center justify-center" x-show="selectedLocalities.length > 0">
                            <button id="bulkActionsButton" data-dropdown-toggle="bulkActionsDropdown"
                                class="btn-secondary flex items-center justify-center gap-2 text-sm" type="button">
                                <iconify-icon icon="lucide:more-vertical"></iconify-icon>
                                <span>{{ __('Bulk Actions') }} (<span x-text="selectedLocalities.length"></span>)</span>
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

                    @if (auth()->user()->can('locality.create'))
                        <a href="{{ route('admin.localities.create') }}" class="btn-primary flex items-center gap-2">
                            <iconify-icon icon="feather:plus" height="16"></iconify-icon>
                            {{ __('Add New Locality') }}
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
                                       @click="selectAll = !selectAll; selectedLocalities = selectAll ? [...document.querySelectorAll('.locality-checkbox')].map(cb => cb.value) : []">
                            </th>
                            <th width="30%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">Name</th>
                            <th width="20%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">Slug</th>
                            <th width="20%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">Category</th>
                            <th width="10%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">Sort Order</th>
                            <th width="10%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">Status</th>
                            <th width="15%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($localities as $locality)
                            <tr class="{{ $loop->index + 1 != count($localities) ? 'border-b border-gray-100 dark:border-gray-800' : '' }}">
                                <td class="px-5 py-4 sm:px-6">
                                    <input type="checkbox" class="locality-checkbox form-checkbox" value="{{ $locality->id }}"
                                           x-model="selectedLocalities" {{ !auth()->user()->can('locality.delete') ? 'disabled' : '' }}>
                                </td>
                                <td class="px-5 py-4 sm:px-6">{{ $locality->name }}</td>
                                <td class="px-5 py-4 sm:px-6">{{ $locality->slug }}</td>
                                <td class="px-5 py-4 sm:px-6">
                                    @if($locality->category == 'nearby')
                                        <span class="badge bg-info">Nearby</span>
                                    @elseif($locality->category == 'popular')
                                        <span class="badge bg-success">Popular</span>
                                    @else
                                        <span class="badge bg-secondary">Other</span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 sm:px-6">{{ $locality->sort_order }}</td>
                                <td class="px-5 py-4 sm:px-6">
                                    @if($locality->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 sm:px-6">
                                    <x-buttons.action-buttons :label="__('Actions')" :show-label="false" align="right">
                                        @if (auth()->user()->can('locality.edit'))
                                            <x-buttons.action-item :href="route('admin.localities.edit', $locality->id)" icon="pencil" :label="__('Edit')" />
                                        @endif
                                        
                                        @if (auth()->user()->can('locality.delete'))
                                            <div x-data="{ deleteModalOpen: false }">
                                                <x-buttons.action-item type="modal-trigger" modal-target="deleteModalOpen" 
                                                    icon="trash" :label="__('Delete')" class="text-red-600 dark:text-red-400" />
                                                <x-modals.confirm-delete id="delete-modal-{{ $locality->id }}"
                                                    title="{{ __('Delete Locality') }}"
                                                    content="{{ __('Are you sure you want to delete this locality?') }}"
                                                    formId="delete-form-{{ $locality->id }}"
                                                    formAction="{{ route('admin.localities.destroy', $locality->id) }}"
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
                                <td colspan="7" class="text-center py-8">
                                    <p class="text-gray-500 dark:text-gray-300">{{ __('No localities found') }}</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="my-4 px-4 sm:px-6">
                    {{ $localities->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Bulk Delete Modal -->
    <div x-cloak x-show="bulkDeleteModalOpen" x-transition.opacity.duration.200ms
         x-trap.inert.noscroll="bulkDeleteModalOpen" x-on:keydown.esc.window="bulkDeleteModalOpen = false"
         x-on:click.self="bulkDeleteModalOpen = false"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black/20 p-4 backdrop-blur-md">
        <div x-show="bulkDeleteModalOpen"
            x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
            x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
            class="flex max-w-md flex-col gap-4 overflow-hidden rounded-md border border-outline border-gray-100 dark:border-gray-800 bg-white text-on-surface dark:border-outline-dark dark:bg-gray-700 dark:text-gray-300">
            <div class="flex items-center justify-between border-b border-gray-100 px-4 py-2 dark:border-gray-800">
                <div class="flex items-center justify-center rounded-full bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400 p-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h3 class="font-semibold tracking-wide text-gray-700 dark:text-white">{{ __('Delete Selected Localities') }}</h3>
                <button x-on:click="bulkDeleteModalOpen = false" class="text-gray-400 hover:bg-gray-200 hover:text-gray-700 rounded-md p-1 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="px-4 text-center">
                <p class="text-gray-500 dark:text-gray-300">
                    {{ __('Are you sure you want to delete the selected localities?') }}
                    {{ __('This action cannot be undone.') }}
                </p>
            </div>
            <div class="flex items-center justify-end gap-3 border-t border-gray-100 p-4 dark:border-gray-800">
                <form id="bulk-delete-form" action="{{ route('admin.localities.bulk-delete') }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <template x-for="id in selectedLocalities" :key="id">
                        <input type="hidden" name="ids[]" :value="id">
                    </template>
                    <button type="button" x-on:click="bulkDeleteModalOpen = false" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700">
                        {{ __('Cancel') }}
                    </button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-800">
                        {{ __('Delete') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection