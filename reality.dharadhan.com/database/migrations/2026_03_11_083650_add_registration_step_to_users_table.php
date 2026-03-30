<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration 
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) 
        {
            $table->string('registration_step')->nullable()->after('plan_duration');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) 
        {
            $table->dropColumn('registration_step');
        });
    }
};
