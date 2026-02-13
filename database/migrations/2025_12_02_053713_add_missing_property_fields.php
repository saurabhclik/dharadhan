<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->string('allowed_floors')->nullable()->after('status');
            $table->string('annual_dues')->nullable()->after('status');
            $table->string('booking_amount')->nullable()->after('status');
            $table->string('breadth')->nullable()->after('status');
            $table->string('expected_rental')->nullable()->after('status');
            $table->string('length')->nullable()->after('status');
            $table->string('maintenance_amount')->nullable()->after('status');
            $table->string('maintenance_type')->nullable()->after('status');
            $table->string('membership_charge')->nullable()->after('status');
            $table->string('plot_area')->nullable()->after('status');
            $table->string('possession_by')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn([
                'allowed_floors',
                'annual_dues',
                'booking_amount',
                'breadth',
                'expected_rental',
                'length',
                'maintenance_amount',
                'maintenance_type',
                'membership_charge',
                'plot_area',
                'possession_by',
            ]);
        });
    }
};
