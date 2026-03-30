@extends('backend.layouts.app')

@section('title')
    {{ $breadcrumbs['title'] }} | {{ config('app.name') }}
@endsection

@section('admin-content')
    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6" x-data="{ selectedTasks: [], selectAll: false, bulkDeleteModalOpen: false }">
        <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

        {!! ld_apply_filters('loations_after_breadcrumbs', '') !!}

        <div class="space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5 flex gap-3 md:gap-1 flex-col md:flex-row justify-between items-center">
                    @include('backend.partials.search-form', [
                        'placeholder' => __('Search by name'),
                    ])
                </div>
                <div class="space-y-3 border-t border-gray-100 dark:border-gray-800 overflow-x-auto overflow-y-visible">
                    <table id="dataTable" class="w-full dark:text-gray-400">
                        <thead class="bg-light text-capitalize">
                            <tr class="border-b border-gray-100 dark:border-gray-800">
                                <th width="20%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">
                                    <div class="flex items-center">
                                        {{ __('Property') }}
                                    </div>
                                </th>
                                <th width="20%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">
                                    <div class="flex items-center">
                                        {{ __('Total Favourite') }}
                                    </div>
                                </th>
                                <th width="20%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">
                                    <div class="flex items-center">
                                        {{ __('Total Like') }}
                                    </div>
                                </th>
                                <th width="20%" class="p-2 bg-gray-50 dark:bg-gray-800 dark:text-white text-left px-5">
                                    <div class="flex items-center">
                                        {{ __('Total Dislike') }}
                                    </div>
                                </th>
                                @php ld_apply_filters('user_list_page_table_header_before_action', '') @endphp
                                @php ld_apply_filters('user_list_page_table_header_after_action', '') @endphp
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($engagements as $engagement)
                                <tr
                                    class="{{ $loop->index + 1 != count($engagements) ? 'border-b border-gray-100 dark:border-gray-800' : '' }}">
                                    <td class="px-5 py-4 sm:px-6">
                                        <a data-tooltip-target="tooltip-property-{{ $engagement->id }}"
                                            href="{{ route('admin.properties.edit', $engagement->id) }}"
                                            class="flex items-center">
                                            <div class="flex flex-col">
                                                <span>{{ $engagement->title }}</span>
                                            </div>
                                        </a>

                                        <div id="tooltip-property-{{ $engagement->id }}"
                                            href="{{ route('admin.properties.edit', $engagement->id) }}"
                                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-md shadow-xs opacity-0 tooltip dark:bg-gray-700">
                                            {{ __('Edit Property') }}
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                    </td>

                                    <td width="20%" class="px-5 py-4 sm:px-6">{{ $engagement->likes_count }}</td>
                                    <td width="20%" class="px-5 py-4 sm:px-6">{{ $engagement->dislikes_count }}</td>
                                    <td width="20%" class="px-5 py-4 sm:px-6">{{ $engagement->favourites_count }}</td>

                                    @php ld_apply_filters('user_list_page_table_row_before_action', '', $engagement) @endphp
                                    
                                    @php ld_apply_filters('user_list_page_table_row_after_action', '', $engagement) @endphp
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">
                                        <p class="text-gray-500 dark:text-gray-400">{{ __('No engagements found') }}
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="my-4 px-4 sm:px-6">
                        {{ $engagements->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
