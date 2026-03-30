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
            $table->text('user_type')->nullable()->after('year');
            $table->text('mode')->nullable()->after('user_type');
            $table->text('type')->nullable()->after('mode');
            $table->text('sub_type')->nullable()->after('type');
            $table->text('sub_type_item')->nullable()->after('sub_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn(['user_type','mode','type','sub_type','sub_type_item']);
        });
    }
};
