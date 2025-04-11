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
        Schema::create('employer_job_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->unsignedBigInteger('job_category_id');
            
            // Foreign keys
            $table->foreign('employer_id')->references('id')->on('employers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('job_category_id')->references('id')->on('job_categories')->cascadeOnDelete()->cascadeOnUpdate();
            
            // Ensure unique combinations (an employer can’t have the same category twice)
            $table->unique(['employer_id', 'job_category_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer_job_category');
    }
};
