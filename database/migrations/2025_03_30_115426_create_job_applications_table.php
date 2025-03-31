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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // The applicant (employee)
            $table->unsignedBigInteger('job_id'); // The job being applied to
            $table->enum('status', ['pending', 'reviewed', 'selected', 'rejected','shortlisted'])->default('pending'); // Application status
            $table->timestamp('applied_at')->useCurrent(); // When the application was submitted

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('job_id')->references('id')->on('jobs')->cascadeOnDelete();

            // Unique constraint to prevent duplicate applications
            $table->unique(['user_id', 'job_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
