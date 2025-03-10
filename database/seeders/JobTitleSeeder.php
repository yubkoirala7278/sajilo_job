<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobTitles = [
            ['slug' => 'software-developer', 'name' => 'Software Developer', 'status' => 'active'],
            ['slug' => 'project-manager', 'name' => 'Project Manager', 'status' => 'active'],
            ['slug' => 'graphic-designer', 'name' => 'Graphic Designer', 'status' => 'active'],
            ['slug' => 'ux-designer', 'name' => 'UX Designer', 'status' => 'active'],
            ['slug' => 'data-scientist', 'name' => 'Data Scientist', 'status' => 'active'],
            ['slug' => 'business-analyst', 'name' => 'Business Analyst', 'status' => 'active'],
            ['slug' => 'digital-marketing-manager', 'name' => 'Digital Marketing Manager', 'status' => 'active'],
            ['slug' => 'content-writer', 'name' => 'Content Writer', 'status' => 'active'],
            ['slug' => 'hr-manager', 'name' => 'HR Manager', 'status' => 'active'],
            ['slug' => 'customer-support-specialist', 'name' => 'Customer Support Specialist', 'status' => 'active'],
        ];

        foreach ($jobTitles as $jobTitle) {
            DB::table('job_titles')->insert($jobTitle);
        }
    }
}
