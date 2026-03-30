<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {

            // ---------------- OFFICE / COMMON ----------------
            if (!Schema::hasColumn('properties', 'min_seats')) {
                $table->integer('min_seats')->nullable()->after('smart_home_features');
            }

            if (!Schema::hasColumn('properties', 'max_seats')) {
                $table->integer('max_seats')->nullable()->after('min_seats');
            }

            if (!Schema::hasColumn('properties', 'cabins')) {
                $table->integer('cabins')->nullable()->after('max_seats');
            }

            if (!Schema::hasColumn('properties', 'meeting_rooms')) {
                $table->integer('meeting_rooms')->nullable()->after('cabins');
            }

            if (!Schema::hasColumn('properties', 'conference_room')) {
                $table->enum('conference_room', ['available', 'not_available'])->nullable()->after('meeting_rooms');
            }

            if (!Schema::hasColumn('properties', 'pantry_type')) {
                $table->enum('pantry_type', ['private', 'shared', 'not_available'])->nullable()->after('conference_room');
            }

            if (!Schema::hasColumn('properties', 'flooring_type')) {
                $table->string('flooring_type')->nullable()->after('pantry_type');
            }

            if (!Schema::hasColumn('properties', 'wall_status')) {
                $table->string('wall_status')->nullable()->after('flooring_type');
            }

            if (!Schema::hasColumn('properties', 'washrooms_status')) {
                $table->enum('washrooms_status', ['available', 'not_available'])->nullable()->after('wall_status');
            }

            if (!Schema::hasColumn('properties', 'washrooms')) {
                $table->string('washrooms')->nullable()->after('washrooms_status');
            }

            if (!Schema::hasColumn('properties', 'furnishing')) {
                $table->enum('furnishing', ['available', 'not_available'])->nullable()->after('washrooms');
            }

            if (!Schema::hasColumn('properties', 'central_ac')) {
                $table->enum('central_ac', ['available', 'not_available'])->nullable()->after('furnishing');
            }

            if (!Schema::hasColumn('properties', 'oxygen_duct')) {
                $table->enum('oxygen_duct', ['available', 'not_available'])->nullable()->after('central_ac');
            }

            if (!Schema::hasColumn('properties', 'ups')) {
                $table->enum('ups', ['available', 'not_available'])->nullable()->after('oxygen_duct');
            }

            if (!Schema::hasColumn('properties', 'fire_safety')) {
                $table->json('fire_safety')->nullable()->after('ups');
            }

            // ---------------- RETAIL ----------------
            if (!Schema::hasColumn('properties', 'washroom_type')) {
                $table->enum('washroom_type', ['private', 'public', 'not_available'])->nullable()->after('fire_safety');
            }

            if (!Schema::hasColumn('properties', 'business_type')) {
                $table->json('business_type')->nullable()->after('washroom_type');
            }

            // ---------------- PLOT / COMMON ----------------
            if (!Schema::hasColumn('properties', 'road_width')) {
                $table->string('road_width')->nullable()->after('business_type');
            }

            if (!Schema::hasColumn('properties', 'road_type')) {
                $table->enum('road_type', ['feet', 'meter'])->nullable()->after('road_width');
            }

            if (!Schema::hasColumn('properties', 'property_facing')) {
                $table->enum('property_facing', ['North', 'East', 'West', 'South', 'Other Sides'])->nullable()->after('road_type');
            }
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn([
                'min_seats',
                'max_seats',
                'cabins',
                'meeting_rooms',
                'conference_room',
                'pantry_type',
                'flooring_type',
                'wall_status',
                'washrooms_status',
                'washrooms',
                'furnishing',
                'central_ac',
                'oxygen_duct',
                'ups',
                'fire_safety',
                'washroom_type',
                'business_type',
                'road_width',
                'road_type',
                'property_facing',
            ]);
        });
    }
};


