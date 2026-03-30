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
            $table->decimal('admin_price', 15, 2)->nullable()->change();
        });

        Schema::table('properties', function (Blueprint $table) {
            $table->string('price')->change()->nullable();
            $table->string('admin_price')->change()->nullable();
            $table->string('dlc_rate')->change()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->decimal('price', 15, 2)->change();
            $table->decimal('admin_price', 15, 2)->change();
            $table->decimal('dlc_rate', 15, 2)->change();
        });
    }
};
