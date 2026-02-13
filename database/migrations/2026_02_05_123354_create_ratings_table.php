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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('location')->nullable();
            $table->tinyInteger('rating'); // 1–5
            $table->text('message')->nullable();

            $table->string('device_hash')->nullable();
            $table->string('ip_address', 45)->nullable();

            $table->boolean('is_testimonial')->default(false);
            $table->string('status', 22)->default('inactive');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
