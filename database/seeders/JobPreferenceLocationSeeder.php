<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobPreferenceLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $locations = [
            ['slug' => 'kathmandu', 'name' => 'Kathmandu', 'status' => 'active'],
            ['slug' => 'pokhara', 'name' => 'Pokhara', 'status' => 'active'],
            ['slug' => 'lalitpur', 'name' => 'Lalitpur', 'status' => 'active'],
            ['slug' => 'bhaktapur', 'name' => 'Bhaktapur', 'status' => 'active'],
            ['slug' => 'biratnagar', 'name' => 'Biratnagar', 'status' => 'active'],
            ['slug' => 'birgunj', 'name' => 'Birgunj', 'status' => 'active'],
            ['slug' => 'butwal', 'name' => 'Butwal', 'status' => 'active'],
            ['slug' => 'dharan', 'name' => 'Dharan', 'status' => 'active'],
            ['slug' => 'janakpur', 'name' => 'Janakpur', 'status' => 'active'],
            ['slug' => 'damak', 'name' => 'Damak', 'status' => 'active'],
            ['slug' => 'itahari', 'name' => 'Itahari', 'status' => 'active'],
            ['slug' => 'chitwan', 'name' => 'Chitwan', 'status' => 'active'],
        ];

        DB::table('job_preference_locations')->insert($locations);
    }
}
