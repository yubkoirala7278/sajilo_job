<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeeAvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $availabilities = [
            'Full-Time',
            'Part-Time',
            'Freelance',
            'Remote',
            'Contract',
            'Temporary',
            'Internship',
            'On-Call',
            'Self-Employed',
            'Volunteer',
        ];

        foreach ($availabilities as $availability) {
            DB::table('employee_availabilities')->insert([
                'slug' => Str::slug($availability),
                'name' => $availability,
                'status' => 'active',
            ]);
        }
    }
}
