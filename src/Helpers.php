<?php

namespace JDM170\Logins;

class Helpers
{
    /**
     * Check if Laravel Sanctum is installed.
     */
    public static function sanctumIsInstalled(): bool
    {
        return class_exists(\Laravel\Sanctum\Sanctum::class);
    }
}
