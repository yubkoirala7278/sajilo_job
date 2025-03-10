<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeeSpecializationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specializations = [
            'Software Development',
            'Graphic Design',
            'Digital Marketing',
            'Data Analysis',
            'Cybersecurity',
            'Network Administration',
            'Project Management',
            'Human Resources',
            'Finance & Accounting',
            'Healthcare & Nursing',
        ];

        foreach ($specializations as $specialization) {
            DB::table('employee_specializations')->insert([
                'slug' => Str::slug($specialization),
                'name' => $specialization,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
