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
        Schema::create('employee_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('organization_name');
            $table->string('job_location');
            $table->string('job_title');
            $table->string('job_level');
            $table->date('started_date');
            $table->date('end_date')->nullable();
            $table->longText('duties_and_responsibilities');
            $table->boolean('is_currently_working')->default(true);

            $table->unsignedBigInteger('organization_nature_id');
            $table->foreign('organization_nature_id')->references('id')->on('organization_natures')->cascadeOnDelete()->cascadeOnUpdate();

            $table->unsignedBigInteger('job_category_id');
            $table->foreign('job_category_id')->references('id')->on('job_categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_experiences');
    }
};
