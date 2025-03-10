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
        Schema::create('employee_employee_specialization', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('employee_specialization_id');

            // Foreign key constraints with custom names
            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade')
                ->onUpdate('cascade')
                ->name('fk_employee_employee_specialization_employee_id');

            $table->foreign('employee_specialization_id')
                ->references('id')
                ->on('employee_specializations')
                ->onDelete('cascade')
                ->onUpdate('cascade')
                ->name('fk_employee_employee_specialization_specialization_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_employee_specialization');
    }
};
