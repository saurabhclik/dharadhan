<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', config('app.name'))</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">

    @include('backend.layouts.partials.theme-colors')
    @yield('before_vite_build')

    @viteReactRefresh
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


    @if (!empty(config('settings.global_custom_css')))
        <style>
            /* {!! config('settings.global_custom_css') !!} */
        </style>
    @endif

    @include('backend.layouts.partials.integration-scripts')

    @stack('styles')
</head>

<body x-data="{ page: 'ecommerce', loaded: true, darkMode: false, stickyMenu: false, sidebarToggle: false, scrollTop: false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark bg-gray-900': darkMode === true }">
    <!-- Preloader -->
    <div x-show="loaded" x-init="window.addEventListener('DOMContentLoaded', () => { setTimeout(() => loaded = false, 500) })"
        class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white dark:bg-black">
        <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-brand-500 border-t-transparent">
        </div>
    </div>
    <!-- End Preloader -->

    <!-- Page Wrapper -->
    <div class="flex h-screen overflow-hidden">

        <!-- Content Area -->
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
            <!-- Small Device Overlay -->
            <div @click="sidebarToggle = false" :class="sidebarToggle ? 'block lg:hidden' : 'hidden'"
                class="fixed w-full h-screen z-9 bg-gray-900/50"></div>
            <!-- End Small Device Overlay -->

            <!-- Main Content -->
            <main>
                <div class="relative flex flex-col justify-center w-full h-screen dark:bg-gray-900 sm:p-0 lg:flex-row">
                    <div class="flex flex-col flex-1 w-full lg:w-1/2">
                        <div class="flex flex-col justify-center flex-1 w-full max-w-md mx-auto px-10">
                            @yield('admin-content')
                        </div>
                    </div>
                </div>
            </main>
            <!-- End Main Content -->
        </div>
    </div>

    @stack('scripts')

    @if (!empty(config('settings.global_custom_js')))
        <script>
            {!! config('settings.global_custom_js') !!}
        </script>
    @endif
</body>

</html>
