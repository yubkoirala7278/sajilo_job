<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Insert religions
        $religions = [
            ['slug' => 'hindu', 'name' => 'Hindu', 'status' => 'active'],
            ['slug' => 'christian', 'name' => 'Christian', 'status' => 'active'],
            ['slug' => 'muslim', 'name' => 'Muslim', 'status' => 'active'],
            ['slug' => 'buddhist', 'name' => 'Buddhist', 'status' => 'active'],
            ['slug' => 'sikh', 'name' => 'Sikh', 'status' => 'active'],
            ['slug' => 'jewish', 'name' => 'Jewish', 'status' => 'active'],
            ['slug' => 'jain', 'name' => 'Jain', 'status' => 'active'],
        ];

        DB::table('religions')->insert($religions);
    }
}
