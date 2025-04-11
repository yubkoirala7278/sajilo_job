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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();

            // Company details
            $table->string('contact_number')->nullable();
            $table->string('company_logo')->nullable();
            $table->longText('company_description')->nullable();
            $table->string('company_website')->nullable();
            $table->string('company_address')->nullable();

            // Subscription fields
            $table->boolean('is_trial_active')->default(true); // Tracks if trial is active
            $table->timestamp('trial_ends_at')->nullable(); // Trial expiry date
            $table->timestamp('subscription_ends_at')->nullable(); // Subscription expiry date
            $table->enum('subscription_status', ['trial', 'active', 'expired'])->default('trial');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
