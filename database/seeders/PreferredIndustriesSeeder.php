<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PreferredIndustriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $industries = [
            'Information Technology',
            'Healthcare',
            'Finance',
            'Education',
            'Manufacturing',
            'Retail',
            'Real Estate',
            'Hospitality',
            'Transportation',
            'Marketing & Advertising',
        ];

        foreach ($industries as $industry) {
            DB::table('preferred_industries')->insert([
                'slug' => Str::slug($industry),
                'name' => $industry,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
