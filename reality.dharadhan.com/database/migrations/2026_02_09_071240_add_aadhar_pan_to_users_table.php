<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('aadhar_card_front_file')->nullable()->after('email');
            $table->string('aadhar_card_back_file')->nullable()->after('aadhar_card_front_file');
            $table->string('pan_card_file')->nullable()->after('aadhar_card_back_file');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['aadhar_card_front_file', 'aadhar_card_back_file', 'pan_card_file']);
        });
    }
};
