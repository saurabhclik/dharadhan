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
        Schema::create('payments', function (Blueprint $table) 
        {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('razorpay_payment_id')->nullable()->index();
            $table->string('razorpay_order_id')->nullable()->index();
            $table->string('razorpay_signature')->nullable();
            $table->string('order_id')->nullable()->index();
            $table->decimal('amount', 10, 2);
            $table->string('currency', 10)->default('INR');
            $table->string('status')->default('pending');
            $table->string('payment_method')->nullable();
            $table->string('plan_type')->nullable();
            $table->string('plan_duration')->nullable();
            $table->text('description')->nullable();
            $table->json('metadata')->nullable();
            $table->string('utr_number')->nullable();
            $table->string('payment_screenshot')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('refunded_at')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};