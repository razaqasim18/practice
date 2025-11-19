<?php

namespace App\Helpers;

use App\Models\Setting;

class SettingHelper
{
    public static function showSettingName()
    {
        $setting = Setting::where('setting_name', 'site_name')->first();
        return $setting->value ?? 'Default Site Name';
    }
}

