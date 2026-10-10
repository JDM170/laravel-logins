<?php

use JDM170\Logins\Support\SanctumForeignKey;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Laravel\Sanctum\Sanctum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        SanctumForeignKey::ensure();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        SanctumForeignKey::drop();
    }
};
