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
        Schema::create('states', function (Blueprint $table) {
            $table->id(); // primary key (id)
            $table->string('state', 40)->nullable();

            // foreign key to countries.id
            $table->unsignedBigInteger('country_id')->default(1);

            $table->tinyInteger('is_active')->default(1);
            $table->integer('sort_order')->default(9999);
            $table->string('lang', 10)->default('en');

            $table->foreign('country_id')
                  ->references('id')
                  ->on('countries')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('states');
    }
};
