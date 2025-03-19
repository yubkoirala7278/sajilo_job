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

            // gender
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            // dob
            $table->date('date_of_birth')->nullable();
            // maritial status
            $table->enum('marital_status', ['Married', 'Unmarried'])->nullable();

            // religion
            $table->unsignedBigInteger('religion_id')->nullable();
            $table->foreign('religion_id')->references('id')->on('religions')->cascadeOnDelete()->cascadeOnUpdate();

            // is disabled
            $table->boolean('is_disabled')->default(false);

            // nationality
            $table->string('nationality')->nullable();

            // resume
            $table->string('resume')->nullable();

            // current address
            $table->string('current_address')->nullable();

            // Permanent Address
            $table->string('permanent_address')->nullable();

            // Contact Number
            $table->string('contact_number')->nullable();


            // degree
            $table->unsignedBigInteger('degree_id')->nullable();
            $table->foreign('degree_id')->references('id')->on('degrees')->cascadeOnDelete()->cascadeOnUpdate();

            // course/program
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->cascadeOnDelete()->cascadeOnUpdate();

            //Education Board/University
            $table->string('board_or_university')->nullable();

            // School/College/Institute
            $table->string('school_or_college_or_institute')->nullable();

            // is_currently_studying
            $table->boolean('is_currently_studying')->default(false);

            // grade type
            $table->string('grade_type')->nullable();

            // mark secured
            $table->float('mark_secured')->nullable();

            // graduation year
            $table->string('graduation_year')->nullable();

            // graduation month
            $table->string('graduation_month')->nullable();

            // education started year
            $table->string('education_started_year')->nullable();
            // education started month
            $table->string('education_started_month')->nullable();

            // other informations
            $table->boolean('willing_to_travel')->default(false);
            $table->boolean('willing_to_relocate')->default(false);
            $table->boolean('two_wheeler_license')->default(false);
            $table->boolean('four_wheeler_license')->default(false);
            $table->boolean('own_two_wheeler')->default(false);
            $table->boolean('own_four_wheeler')->default(false);

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
