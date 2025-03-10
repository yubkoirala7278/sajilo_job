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
        Schema::create('employee_employee_availability', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('employee_availability_id');

            // Foreign key constraints
            $table->foreign('employee_id')->references('id')->on('employees')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('employee_availability_id')->references('id')->on('employee_availabilities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_employee_availability');
    }
};
