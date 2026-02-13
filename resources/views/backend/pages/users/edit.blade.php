@extends('backend.layouts.app')

@section('title')
    {{ $breadcrumbs['title'] }} | {{ config('app.name') }}
@endsection

@section('admin-content')
    <div class="p-4 mx-auto max-w-7xl md:p-6">
        <x-breadcrumbs :breadcrumbs="$breadcrumbs" />

        {!! ld_apply_filters('users_after_breadcrumbs', '') !!}

        <div class="space-y-6">
            <div class="rounded-md border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
                <div class="p-5 space-y-6 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div class="space-y-1">
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Full Name') }}
                                    <span class="text-red-500">*</span></label>
                                <input type="text" name="name" id="name" required value="{{ $user->name }}"
                                    placeholder="{{ __('Enter Full Name') }}" class="form-control">
                            </div>
                            <div class="space-y-1">
                                <label for="email"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('User Email') }}
                                    <span class="text-red-500">*</span></label>
                                <input type="email" name="email" id="email" required value="{{ $user->email }}"
                                    placeholder="{{ __('Enter Email') }}" class="form-control">
                            </div>
                            <div>
                                <x-inputs.password name="password" label="{{ __('Password (Optional)') }}"
                                    placeholder="{{ __('Enter Password') }}" />
                            </div>
                            <div>
                                <x-inputs.password name="password_confirmation"
                                    label="{{ __('Confirm Password (Optional)') }}"
                                    placeholder="{{ __('Confirm Password') }}" />
                            </div>
                            <div>
                                <x-inputs.combobox name="roles[]" label="{{ __('Assign Roles') }}"
                                    placeholder="{{ __('Select Roles') }}" :options="collect($roles)
                                        ->map(fn($name, $id) => ['value' => $name, 'label' => ucfirst($name)])
                                        ->values()
                                        ->toArray()" :selected="$user->roles->pluck('name')->toArray()"
                                    :multiple="true" :searchable="false" />
                            </div>

                            <div class="space-y-1">
                                <label for="status"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Status') }}</label>

                                <select name="status" id="status" required class="form-control">
                                    <option value="active" {{ $user->status === 'active' ? 'selected' : '' }}>
                                        {{ __('Active') }}</option>
                                    <option value="inactive" {{ $user->status === 'inactive' ? 'selected' : '' }}>
                                        {{ __('Inactive') }}</option>
                                    <option value="banned" {{ $user->status === 'banned' ? 'selected' : '' }}>
                                        {{ __('Banned') }}</option>
                                    <option value="suspended" {{ $user->status === 'suspended' ? 'selected' : '' }}>
                                        {{ __('Suspended') }}</option>
                                </select>
                            </div>

                            <div class="space-y-1">
                                <label for="username"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Username') }}
                                    <span class="text-red-500">*</span></label>

                                <input type="text" name="username" id="username" required value="{{ $user->username }}"
                                    placeholder="{{ __('Enter Username') }}" class="form-control">
                            </div>
                            {!! ld_apply_filters('after_username_field', '', $user) !!}
                        </div>

                        @if($user->aadhar_card_front_file)
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Aadhar Card Front File') }}</label>
                            <div class="flex justify-start">
                                <div class="w-64 h-64 overflow-hidden rounded-lg shadow cursor-pointer">
                                    <img
                                        id="aadharFrontPreview"
                                        src="{{ asset('storage/' . $user->aadhar_card_front_file) }}"
                                        alt="Aadhar Card Front File"
                                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-105"
                                    >
                                </div>
                            </div>
                            <a href="{{ asset('storage/' . $user->aadhar_card_front_file) }}" download class="ml-4 inline-flex items-center px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition">{{ __('Download') }}</a>
                        @endif

                        @if($user->aadhar_card_back_file)
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Aadhar Card Back File') }}</label>
                            <div class="flex justify-start">
                                <div class="w-64 h-64 overflow-hidden rounded-lg shadow cursor-pointer">
                                    <img
                                        id="aadharBackPreview"
                                        src="{{ asset('storage/' . $user->aadhar_card_back_file) }}"
                                        alt="Aadhar Card Back File"
                                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-105"
                                    >
                                </div>
                            </div>
                            <a href="{{ asset('storage/' . $user->aadhar_card_back_file) }}" download class="ml-4 inline-flex items-center px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition">{{ __('Download') }}</a>
                        @endif

                        @if($user->pan_card_file)
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Pan Card File') }}</label>
                            <div class="flex justify-start">
                                <div class="w-64 h-64 overflow-hidden rounded-lg shadow cursor-pointer">
                                    <img
                                        id="panPreview"
                                        src="{{ asset('storage/' . $user->pan_card_file) }}"
                                        alt="Pan Card File"
                                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-105"
                                    >
                                </div>
                            </div>
                            <a href="{{ asset('storage/' . $user->pan_card_file) }}" download class="ml-4 inline-flex items-center px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition">{{ __('Download') }}</a>                                    
                        @endif

                        @if($user->payment_screenshot)
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Payment Screenshot') }}</label>
                            <div class="flex justify-start">
                                <div class="w-64 h-64 overflow-hidden rounded-lg shadow cursor-pointer">
                                    <img
                                        id="paymentPreview"
                                        src="{{ asset('storage/' . $user->payment_screenshot) }}"
                                        alt="Payment Screenshot"
                                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-105"
                                    >
                                </div>
                            </div>

                            {{-- Zoom Modal --}}
                            <div
                                id="imageModal"
                                class="fixed inset-0 hidden bg-black bg-opacity-70 z-50 flex items-center justify-center"
                            >
                                <img
                                    id="modalImage"
                                    src="{{ asset('storage/' . $user->payment_screenshot) }}"
                                    class="max-w-[90%] max-h-[90%] rounded-lg shadow-lg scale-75 transition-transform duration-300"
                                >
                            </div>

                            {{-- JS --}}
                            <script>
                                const preview = document.getElementById('paymentPreview');
                                const modal = document.getElementById('imageModal');
                                const modalImage = document.getElementById('modalImage');

                                preview.addEventListener('click', () => {
                                    modal.classList.remove('hidden');
                                    setTimeout(() => {
                                        modalImage.classList.remove('scale-75');
                                        modalImage.classList.add('scale-100');
                                    }, 10);
                                });

                                modal.addEventListener('click', () => {
                                    modalImage.classList.remove('scale-100');
                                    modalImage.classList.add('scale-75');

                                    setTimeout(() => {
                                        modal.classList.add('hidden');
                                    }, 200);
                                });
                            </script>
                        @endif
                        <div class="mt-6">
                            <x-buttons.submit-buttons cancelUrl="{{ route('admin.users.index') }}" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
