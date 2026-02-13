<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->string('availability_status')->nullable()->after('status');
            $table->string('balconies')->nullable()->after('status');
            $table->string('bhks')->nullable()->after('status');
            $table->string('boundary_wall')->nullable()->after('status');
            $table->string('build_up_area')->nullable()->after('status');
            $table->string('carpet_area')->nullable()->after('status');
            $table->string('construction')->nullable()->after('status');
            $table->string('open_sides')->nullable()->after('status');
            $table->string('ownership')->nullable()->after('status');
            $table->string('price_negotiable')->nullable()->after('status');
            $table->string('super_build_up_area')->nullable()->after('status');
            $table->string('total_floors')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {

            $table->dropColumn([
                'availability_status',
                'balconies',
                'bhks',
                'boundary_wall',
                'build_up_area',
                'carpet_area',
                'construction',
                'open_sides',
                'ownership',
                'price_negotiable',
                'super_build_up_area',
                'total_floors',
            ]);

        });
    }
};
