<?php

namespace App\Services;

class SettingHooks
{
    public function register(): void
    {
        ld_add_filter('settings_tabs', [$this, 'addAnotherSettingsTab'], 10, 1);
    }

    public function addAnotherSettingsTab($tabs): array
    {
        return array_merge($tabs, [
            'Site Settings' => [
                'title' => __('Site Settings'),
                'view' => 'backend.setting.site-settings',
            ],
            'Compny Detail Settings' => [
                'title' => __('Company Detail Settings'),
                'view' => 'backend.setting.company-settings',
            ],
        ]);
    }
}