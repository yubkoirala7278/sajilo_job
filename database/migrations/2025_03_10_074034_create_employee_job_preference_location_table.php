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
        Schema::create('employee_job_preference_location', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('job_preference_location_id');

            // Define the foreign key constraints with shorter names
            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade')
                ->onUpdate('cascade')
                ->name('fk_employee_job_preference_location_employee_id'); // custom short name

            $table->foreign('job_preference_location_id')
                ->references('id')
                ->on('job_preference_locations')
                ->onDelete('cascade')
                ->onUpdate('cascade')
                ->name('fk_employee_job_preference_location_job_location_id'); // custom short name

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_job_preference_location');
    }
};
