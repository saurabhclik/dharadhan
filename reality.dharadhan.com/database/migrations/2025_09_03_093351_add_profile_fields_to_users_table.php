<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('dob')->nullable()->after('email');
            $table->string('phone', 20)->nullable()->after('dob');
            $table->string('whatsapp', 20)->nullable()->after('phone');
            $table->string('address', 255)->nullable()->after('whatsapp');
            $table->string('city', 100)->nullable()->after('address');
            $table->string('state', 100)->nullable()->after('city');
            $table->string('country', 100)->nullable()->after('state');
            $table->string('postal_code', 20)->nullable()->after('country');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'dob',
                'phone',
                'whatsapp',
                'address',
                'city',
                'state',
                'country',
                'postal_code',
            ]);
        });
    }
};
