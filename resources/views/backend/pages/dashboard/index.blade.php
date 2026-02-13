@extends('backend.layouts.app')

@section('title')
    {{ $breadcrumbs['title'] }} | {{ config('app.name') }}
@endsection

@section('before_vite_build')
    <script>
        var userGrowthData = @json($user_growth_data['data']);
        var userGrowthLabels = @json($user_growth_data['labels']);
    </script>
@endsection

@section('admin-content')
    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
        <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

        @if (auth()->check() && auth()->user()->hasAnyRole('Superadmin' ,'Admin'))
            {!! ld_apply_filters('dashboard_after_breadcrumbs', '') !!}

            <div class="grid grid-cols-12 gap-4 md:gap-6">
                <div class="col-span-12 space-y-6">
                    <div class="grid grid-cols-2 gap-4 md:grid-cols-4 lg:grid-cols-4 md:gap-6">
                        {!! ld_apply_filters('dashboard_cards_before_users', '') !!}
                        @include('backend.pages.dashboard.partials.card', [
                            'icon' => 'heroicons:user-group',
                            'icon_bg' => '#635BFF',
                            'label' => __('Users'),
                            'value' => $total_users,
                            'class' => 'bg-white',
                            'url' => route('admin.users.index'),
                            'enable_full_div_click' => true,
                        ])
                        @include('backend.pages.dashboard.partials.card', [
                            'icon' => 'heroicons:user-group',
                            'icon_bg' => '#635BFF',
                            'label' => __('Properties'),
                            'value' => $total_properties,
                            'class' => 'bg-white',
                            'url' => route('admin.properties.index'),
                            'enable_full_div_click' => true,
                        ])
                    </div>
                </div>
            </div>

            {!! ld_apply_filters('dashboard_cards_after', '') !!}

            <div class="mt-6">
                <div class="grid grid-cols-12 gap-4 md:gap-6">
                    <div class="col-span-12">
                        <div class="grid grid-cols-12 gap-4 md:gap-6">
                            <div class="col-span-12 md:col-span-8">
                                @include('backend.pages.dashboard.partials.user-growth')
                            </div>
                            <div class="col-span-12 md:col-span-4">
                                @include('backend.pages.dashboard.partials.user-history')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <div class="grid grid-cols-12 gap-4 md:gap-6">
                    <div class="col-span-12">
                        <div class="grid grid-cols-12 gap-4 md:gap-6">
                            @include('backend.pages.dashboard.partials.post-chart')
                        </div>
                    </div>
                </div>
            </div>

            {!! ld_apply_filters('dashboard_after', '') !!}
        @else
            <div class="grid grid-cols-12 gap-4 md:gap-6">
                <div class="col-span-12 space-y-6">
                    <div class="grid grid-cols-2 gap-4 md:grid-cols-4 lg:grid-cols-4 md:gap-6">
                        {!! ld_apply_filters('dashboard_cards_before_users', '') !!}
                        @include('backend.pages.dashboard.partials.card', [
                            'icon' => 'heroicons:user-group',
                            'icon_bg' => '#635BFF',
                            'label' => __('Properties'),
                            'value' => auth()->user()->properties->count(),
                            'class' => 'bg-white',
                            'url' => route('myaccount.properties'),
                            'enable_full_div_click' => true,
                        ])
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endpush
