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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->foreign('employer_id')->references('id')->on('employers')->cascadeOnDelete();

            $table->enum('plan_type', ['1_month', '3_months', '6_months', '1_year']);
            $table->decimal('amount', 8, 2); // Subscription cost
            $table->string('receipt_path')->nullable(); // Path to uploaded receipt
            $table->enum('payment_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->text('admin_notes')->nullable(); // Admin feedback on payment review
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
