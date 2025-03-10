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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();

            // employee job searching level
            $table->string('job_level')->nullable();

            // expected salary
            $table->string('expected_salary_currency')->nullable(); // Currency field (nullable)
            $table->string('expected_salary_operator')->nullable(); // Operator field (nullable)
            $table->decimal('expected_salary', 15, 2)->nullable(); // Amount field (nullable, allows empty value)
            $table->string('expected_salary_unit')->nullable();


            // current salary
            $table->string('current_salary_currency')->nullable(); // Currency field (nullable)
            $table->string('current_salary_operator')->nullable(); // Operator field (nullable)
            $table->decimal('current_salary', 15, 2)->nullable(); // Amount field (nullable, allows empty value)
            $table->string('current_salary_unit')->nullable();


            // Career Objective Summary
            $table->longText('career_objective_summary')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
