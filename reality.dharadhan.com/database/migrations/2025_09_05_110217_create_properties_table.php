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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            // Foreign Key Category
            $table->unsignedBigInteger('property_category_id')->nullable();

            // Basic Property Info
            $table->string('title');
            $table->text('description');
            $table->string('featured_image')->nullable();

            // Colony, Building & Plot Info
            $table->string('location');

            // Size & Measurements
            $table->integer('size')->nullable();
            $table->string('measurement')->nullable();

            // Other Features
            $table->string('facing')->nullable();
            $table->boolean('corner')->default(false);
            $table->decimal('admin_price', 10, 2)->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('road')->nullable();
            $table->decimal('dlc_rate', 10, 2)->nullable();
            $table->enum('site_plan', ['yes', 'no'])->default('no');

            // Reference Info
            $table->string('reference_type')->nullable();
            $table->string('reference_name')->nullable();
            $table->string('reference_contact')->nullable();

            // Owner Info
            $table->string('owner_name')->nullable();
            $table->string('owner_contact')->nullable();

            // Status
            $table->string('current_status')->nullable();

            // Property Details
            $table->string('bedrooms')->nullable();
            $table->string('kitchens')->default('1')->nullable();
            $table->string('bathrooms')->nullable();
            $table->year('year')->nullable();
            $table->string('property_type');
            $table->string('status');

            // User & Featured Info
            $table->unsignedBigInteger('user_id');
            $table->boolean('is_featured')->default(false);

            // Additional Features
            $table->json('smart_home_features')->nullable();

            // Timestamps
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('property_category_id')->references('id')->on('property_categories')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
