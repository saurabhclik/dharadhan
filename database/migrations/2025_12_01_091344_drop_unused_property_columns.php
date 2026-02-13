<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            if (Schema::hasColumn('properties', 'colony_name')) {
                $table->dropColumn('colony_name');
            }
            if (Schema::hasColumn('properties', 'building_name')) {
                $table->dropColumn('building_name');
            }
            if (Schema::hasColumn('properties', 'building_age')) {
                $table->dropColumn('building_age');
            }
            if (Schema::hasColumn('properties', 'plot_flat_no')) {
                $table->dropColumn('plot_flat_no');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            //
        });
    }
};
