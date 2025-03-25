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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('slug')->unique();
            // Job Details
            $table->string('job_title');
            $table->integer('job_views_count')->default(0);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('job_categories')->cascadeOnDelete();
            $table->enum('job_level', ['Entry Level', 'Mid Level', 'Senior Level']);
            $table->integer('no_of_vacancy');
            $table->enum('employment_type', ['Full Time', 'Part Time', 'Contract', 'Freelance', 'Internship']);
            $table->string('job_country');
            $table->string('job_location');
            $table->boolean('is_negotiable')->default(false);
            $table->string('offered_salary')->nullable();
            $table->date('posted_at')->default(now());
            $table->date('expiry_date')->nullable();
            $table->unsignedBigInteger('degree_id')->nullable();
            $table->foreign('degree_id')->references('id')->on('degrees')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('experience_required');
            $table->text('other_specification')->nullable();
            $table->longText('job_description');
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
