<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrganizationNatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $organizations = [
            'Bank', 'Hospital', 'Advertising Agency', 'Software Company', 'Manufacturing', 
            'Retail', 'Education Institution', 'Media & Entertainment', 'Pharmaceutical', 
            'Real Estate', 'Automobile Industry', 'E-commerce', 'Construction', 
            'Telecommunications', 'Government', 'NGO', 'Financial Services', 'Tourism & Hospitality', 
            'Legal Services', 'IT Consultancy'
        ];

        $data = [];

        foreach ($organizations as $organization) {
            $data[] = [
                'slug' => Str::slug($organization), // Generates a URL-friendly slug
                'name' => $organization,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('organization_natures')->insert($data);
    }
}
