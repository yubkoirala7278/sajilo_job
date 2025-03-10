<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeeSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            'JavaScript',
            'PHP',
            'Laravel',
            'ReactJS',
            'VueJS',
            'Python',
            'SQL',
            'Machine Learning',
            'UI/UX Design',
            'Project Management',
        ];

        foreach ($skills as $skill) {
            DB::table('employee_skills')->insert([
                'slug' => Str::slug($skill),
                'name' => $skill,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
