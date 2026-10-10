<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Logins are looked up by personal access token, and the foreign key deleting a login with its
     * token is not indexed automatically by every database (PostgreSQL, SQLite).
     */
    public function up(): void
    {
        if (! Schema::hasTable(Config::get('logins.table_name')) || $this->hasIndex()) {
            return;
        }

        Schema::table(Config::get('logins.table_name'), function (Blueprint $table) {
            $table->index('personal_access_token_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasTable(Config::get('logins.table_name')) || ! $this->hasIndex('logins_personal_access_token_id_index')) {
            return;
        }

        Schema::table(Config::get('logins.table_name'), function (Blueprint $table) {
            $table->dropIndex(['personal_access_token_id']);
        });
    }

    /**
     * Determine if an index starts with the column (MySQL creates one for the foreign key, for example).
     */
    protected function hasIndex(?string $name = null): bool
    {
        if (! method_exists(Schema::getFacadeRoot(), 'getIndexes')) {
            return Schema::hasIndex(Config::get('logins.table_name'), $name ?? ['personal_access_token_id']);
        }

        return collect(Schema::getIndexes(Config::get('logins.table_name')))->contains(
            fn (array $index): bool => $name !== null
                ? $index['name'] === $name
                : ($index['columns'][0] ?? null) === 'personal_access_token_id'
        );
    }
};
