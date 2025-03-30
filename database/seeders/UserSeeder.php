<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Employer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $roles = ['employee', 'employer'];

        for ($i = 1; $i <= 30; $i++) {
            // Create the user
            $user = User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'status' => fake()->randomElement(['active', 'inactive']),
                'password' => Hash::make('password'), // Default password
                'avatar' => self::assignRandomAvatar(),
                'email_verified_at' => Carbon::now(),
                'is_black_listed'=>fake()->boolean()
            ]);

            // Assign a random role
            $randomRole = fake()->randomElement($roles);
            $user->assignRole($randomRole);

            // Create corresponding Employee or Employer record based on role
            if ($randomRole === 'employee') {
                Employee::create([
                    'user_id' => $user->id,
                    'profile' => fake()->sentence(),
                    'job_level' => fake()->randomElement(['Top Level', 'Senior Level', 'Mid Level','Entry Level']),
                    'expected_salary_currency' => 'NRs',
                    'expected_salary_operator' => 'Above',
                    'expected_salary' => fake()->numberBetween(20000, 100000),
                    'expected_salary_unit' => fake()->randomElement(['Hourly', 'Daily','Weekly','Monthly','Yearly']),
                    'current_salary_currency' => 'NRs',
                    'current_salary_operator' => 'Above',
                    'current_salary' => fake()->numberBetween(15000, 80000),
                    'current_salary_unit' => fake()->randomElement(['Hourly', 'Daily','Weekly','Monthly','Yearly']),
                    'career_objective_summary' => fake()->paragraph(),
                    'gender' => fake()->randomElement(['Male', 'Female', 'Other']),
                    'date_of_birth' => fake()->dateTimeBetween('-40 years', '-18 years'),
                    'marital_status' => fake()->randomElement(['Married', 'Unmarried']),
                    'religion_id' => fake()->numberBetween(1, 5), // Assuming religion IDs 1-5 exist
                    'is_disabled' => fake()->boolean(10), // 10% chance of being true
                    'country' => fake()->country(),
                    'resume' => 'resumes/cMMnhkGj3riMjhb2OxzIhMz0un4KQcTlgqj0bPjG.pdf',
                    'current_address' => fake()->address(),
                    'permanent_address' => fake()->address(),
                    'contact_number' => fake()->phoneNumber(),
                    'degree_id' => fake()->numberBetween(1, 10), // Assuming degree IDs 1-10 exist
                    'course_id' => fake()->numberBetween(1, 10), // Assuming course IDs 1-10 exist
                    'board_or_university' => fake()->company(),
                    'school_or_college_or_institute' => fake()->company(),
                    'is_currently_studying' => fake()->boolean(20), // 20% chance of being true
                    'grade_type' => fake()->randomElement(['Percentage', 'CGPA']),
                    'mark_secured' => fake()->randomFloat(2, 50, 100),
                    'graduation_year' => fake()->year(),
                    'graduation_month' => fake()->month(),
                    'education_started_year' => fake()->year('now - 5 years'),
                    'education_started_month' => fake()->month(),
                    'willing_to_travel' => fake()->boolean(),
                    'willing_to_relocate' => fake()->boolean(),
                    'two_wheeler_license' => fake()->boolean(),
                    'four_wheeler_license' => fake()->boolean(),
                    'own_two_wheeler' => fake()->boolean(),
                    'own_four_wheeler' => fake()->boolean()
                ]);
            } elseif ($randomRole === 'employer') {
                Employer::create([
                    'user_id' => $user->id,
                    'contact_number' => fake()->phoneNumber(),
                    'company_logo' => 'company_logo/0VGihyKWiFDqvUpErFLCDMO9nC0k3eALBA0DKRTc.jpg',
                    'company_description' => fake()->paragraph(),
                    'company_website' => fake()->url(),
                    'company_address' => fake()->address(),
                ]);
            }
        }
    }

    private static function assignRandomAvatar()
    {
        return "avatars/Asset " . rand(1, 47) . ".png";
    }
}
