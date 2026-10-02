<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable(Config::get('logins.table_name')) || ! Schema::hasColumn(Config::get('logins.table_name'), 'user_agent')) {
            return;
        }

        Schema::table(Config::get('logins.table_name'), function (Blueprint $table) {
            $table->text('user_agent')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasTable(Config::get('logins.table_name')) || ! Schema::hasColumn(Config::get('logins.table_name'), 'user_agent')) {
            return;
        }

        Schema::table(Config::get('logins.table_name'), function (Blueprint $table) {
            $table->string('user_agent')->nullable()->change();
        });
    }
};
