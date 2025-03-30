<?php

namespace Database\Seeders;

use App\Models\EmployeeSkill;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $userIds = User::role('employer')->pluck('id')->toArray();
        $categoryIds = range(1, 5); // Adjust based on your JobCategory table
        $degreeIds = range(1, 5);  // Adjust based on your Degree table
        $skillIds = EmployeeSkill::pluck('id')->toArray(); // Assuming EmployeeSkill table has data

        for ($i = 1; $i <= 40; $i++) {
            $jobTitle = fake()->jobTitle();
            $job = Job::create([
                'user_id' => fake()->randomElement($userIds),
                'slug' => Str::slug($jobTitle . '-' . $i),
                'job_title' => $jobTitle,
                'category_id' => fake()->randomElement($categoryIds),
                'job_level' => fake()->randomElement(['Entry Level', 'Mid Level', 'Senior Level']),
                'employment_type' => fake()->randomElement(['Full Time', 'Part Time', 'Contract', 'Freelance','Internship']),
                'no_of_vacancy' => fake()->numberBetween(1, 10),
                'job_country' => fake()->country(),
                'job_location' => fake()->city(),
                'offered_salary' => fake()->numberBetween(20000, 120000),
                'is_negotiable' => fake()->boolean(30),
                'posted_at' => fake()->dateTimeBetween('-1 month', 'now'),
                'expiry_date' => fake()->dateTimeBetween('now', '+2 months'),
                'degree_id' => fake()->randomElement($degreeIds),
                'experience_required' => fake()->randomElement(['0-1 years', '1-3 years', '3-5 years', '5+ years']),
                'job_description' => fake()->paragraphs(3, true),
                'other_specification' => fake()->optional()->paragraph(),
                'status' => fake()->randomElement(['active', 'inactive']),
                'is_approved' => fake()->randomElement(['pending', 'rejected','approved']),
                'job_views_count' => fake()->numberBetween(0, 1000),
            ]);

            // Attach 1-3 random skills to the job
            if (!empty($skillIds)) {
                $randomSkills = fake()->randomElements($skillIds, fake()->numberBetween(1, 3));
                $job->skills()->attach($randomSkills);
            }
        }
    }
}
