<?php
// database/migrations/[timestamp]_add_locality_id_to_properties_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            // Add locality_id column (nullable for backward compatibility)
            $table->foreignId('locality_id')
                ->nullable()
                ->after('property_category_id')
                ->constrained('localities')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropForeign(['locality_id']);
            $table->dropColumn('locality_id');
        });
    }
};