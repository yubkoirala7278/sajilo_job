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
        Schema::create('interested_jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // The employee who is interested
            $table->unsignedBigInteger('job_id'); // The job they are interested in
            $table->timestamp('interested_at')->useCurrent(); // When they marked it

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('job_id')->references('id')->on('jobs')->cascadeOnDelete();

            // Unique constraint to prevent duplicate interest
            $table->unique(['user_id', 'job_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interested_jobs');
    }
};
