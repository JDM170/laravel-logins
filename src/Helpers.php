<?php

namespace JDM170\Logins;

class Helpers
{
    /**
     * Check if Laravel Sanctum is installed.
     */
    public static function sanctumIsInstalled(): bool
    {
        return is_dir(base_path('vendor/laravel/sanctum'));
    }
}
