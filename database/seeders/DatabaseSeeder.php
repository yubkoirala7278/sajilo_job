<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            AdminSeeder::class,
            JobCategorySeeder::class,
            TechnicalSkillsSeeder::class,
            JobTitleSeeder::class,
            PreferredIndustriesSeeder::class,
            EmployeeAvailabilitySeeder::class,
            EmployeeSpecializationsSeeder::class,
            EmployeeSkillsSeeder::class,
            JobPreferenceLocationSeeder::class,
            ReligionSeeder::class,
            DegreeCourseSeeder::class,
            OrganizationNatureSeeder::class,
            CountrySeeder::class,

            // fake
            UserSeeder::class
        ]);
    }
}
