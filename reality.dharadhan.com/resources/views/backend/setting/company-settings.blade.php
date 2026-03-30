<div class="mt-2 rounded-2xl border border-gray-200 dark:border-gray-800 dark:bg-white/[0.03]">
    <div class="px-5 py-4 sm:px-6 sm:py-5">
        <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
            {{ __('Company Settings') }}
        </h3>
    </div>
    <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
        <div class="flex">
            <div class="md:basis-1/2 relative">
                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                    {{ __('Company Name') }}
                </label>
                <input type="text" name="company_name" placeholder="{{ __('Enter Company Name') }}"
                    value="{{ config('settings.company_name') ?? '' }}"
                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
            </div>
        </div>
    </div>

    <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
        <div class="flex">
            <div class="md:basis-1/2 relative">
                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                    {{ __('Company Address') }}
                </label>
                <input type="text" name="company_address" placeholder="{{ __('Enter CompanyAddress') }}"
                    value="{{ config('settings.company_address') ?? '' }}"
                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
            </div>
        </div>
    </div>
    <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
        <div class="flex">
            <div class="md:basis-1/2 relative">
                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                    {{ __('Company Phone Number') }}
                </label>
                <input type="text" name="company_phone_number" placeholder="{{ __('Enter Company Phone Number') }}"
                    value="{{ config('settings.company_phone_number') ?? '' }}"
                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
            </div>
        </div>
    </div>

    <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
        <div class="flex">
            <div class="md:basis-1/2 relative">
                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                    {{ __('Company Email') }}
                </label>
                <input type="email" name="company_email" placeholder="{{ __('Enter Company Email') }}"
                    value="{{ config('settings.company_email') ?? '' }}"
                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
            </div>
        </div>
    </div>

    <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
        <div class="flex">
            <div class="md:basis-1/2 relative">
                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                    {{ __('Company Website') }}
                </label>
                <input type="text" name="company_website" placeholder="{{ __('Enter Company Email') }}"
                    value="{{ config('settings.company_website') ?? '' }}"
                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
            </div>
        </div>
    </div>

    <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
        <div class="flex">
            <div class="md:basis-1/2 relative">
                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                    {{ __('ID/GST Number') }}
                </label>
                <input type="text" name="company_id_number" placeholder="{{ __('Enter Company ID/GST Number') }}"
                    value="{{ config('settings.company_id_number') ?? '' }}"
                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
            </div>
        </div>
    </div>

    <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
        <div class="relative">
            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">
                {{ __('Google Embeded Map') }}
            </label>
            <textarea name="company_map_location" rows="6" placeholder="{{ __('Paste your Embeded Map script here') }}"
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-md border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-700 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                data-tooltip-target="tooltip-google-analytics">{{ config('settings.company_map_location') ?? '' }}</textarea>
        </div>
    </div>
</div>
