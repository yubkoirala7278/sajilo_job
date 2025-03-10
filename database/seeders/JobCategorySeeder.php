<?php

namespace Database\Seeders;

use App\Models\JobCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Software Engineer',
            'Project Manager',
            'Graphic Designer',
            'Data Analyst',
            'Digital Marketer',
            'Content Writer',
            'HR Manager',
            'Financial Analyst',
            'UI/UX Designer',
            'Network Administrator'
        ];

        foreach ($categories as $category) {
            JobCategory::create([
                'category' => $category,
            ]);
        }
    }
}
