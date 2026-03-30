<?php
// database/migrations/[timestamp]_create_localities_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('localities', function (Blueprint $table) 
        {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('category', ['nearby', 'popular', 'other'])->default('other');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index('category');
            $table->index('slug');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('localities');
    }
};