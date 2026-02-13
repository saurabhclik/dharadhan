<div class="mt-2 rounded-2xl border border-gray-200 dark:border-gray-800 dark:bg-white/[0.03]">
    <div class="px-5 py-4 sm:px-6 sm:py-5">
        <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
            {{ __('Site Settings') }}
        </h3>
    </div>
    <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
        <div class="flex">
            <div class="md:basis-1/2 relative">
                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                    {{ __('Instagram Link') }}
                </label>
                <input type="url" name="instagram_link" placeholder="{{ __('Enter Instagam Link') }}"
                    value="{{ config('settings.instagram_link') ?? '' }}"
                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                />
            </div>
        </div>
    </div>

    <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
        <div class="flex">
            <div class="md:basis-1/2 relative">
                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                    {{ __('Facebook Link') }}
                </label>
                <input type="url" name="facebook_link" placeholder="{{ __('Enter Facebook Link') }}"
                    value="{{ config('settings.facebook_link') ?? '' }}"
                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                />
            </div>
        </div>
    </div>
    <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
        <div class="flex">
            <div class="md:basis-1/2 relative">
                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                    {{ __('Twitter Link') }}
                </label>
                <input type="url" name="twitter_link" placeholder="{{ __('Enter Twitter Link') }}"
                    value="{{ config('settings.twitter_link') ?? '' }}"
                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                />
            </div>
        </div>
    </div>

    <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
        <div class="flex">
            <div class="md:basis-1/2 relative">
                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                    {{ __('Youtube Link') }}
                </label>
                <input type="url" name="youtube_link" placeholder="{{ __('Enter Youtube Link') }}"
                    value="{{ config('settings.youtube_link') ?? '' }}"
                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                />
            </div>
        </div>
    </div>
</div>