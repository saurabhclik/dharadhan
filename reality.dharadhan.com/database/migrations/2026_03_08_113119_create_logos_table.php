<?php
// database/migrations/2024_01_01_000001_create_logos_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('logos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('image_path');
            $table->string('link_type')->default('property'); // property, url, none
            $table->unsignedBigInteger('property_id')->nullable();
            $table->string('external_url')->nullable();
            $table->string('badge_text')->nullable();
            $table->string('badge_color')->default('#dc3545');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('logos');
    }
};