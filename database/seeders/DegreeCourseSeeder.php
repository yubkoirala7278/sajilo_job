<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DegreeCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $degreesWithCourses = [
            'High School Diploma' => ['Mathematics', 'Science', 'English', 'History'],
            'Associate Degree' => ['Business Studies', 'Information Technology', 'Marketing'],
            'Bachelor\'s Degree' => ['Computer Science', 'Mechanical Engineering', 'Psychology', 'Law'],
            'Master\'s Degree' => ['Data Science', 'Finance', 'Cyber Security', 'Human Resource Management'],
            'Doctorate (PhD)' => ['Artificial Intelligence', 'Neuroscience', 'Philosophy', 'Economics'],
            'Diploma' => ['Graphic Design', 'Hotel Management', 'Nursing'],
            'Certificate' => ['Digital Marketing', 'Web Development', 'UX/UI Design'],
            'Postgraduate Diploma' => ['Healthcare Management', 'Project Management', 'Education'],
            'Professional Degree' => ['Medicine', 'Architecture'],
            'Vocational Training' => ['Plumbing', 'Carpentry', 'Automobile Repair']
        ];

        foreach ($degreesWithCourses as $degree => $courses) {
            // Insert degree
            $degreeId = DB::table('degrees')->insertGetId([
                'name' => $degree,
                'slug' => Str::slug($degree),
                'status' => 'active',
            ]);

            // Insert courses related to this degree
            foreach ($courses as $course) {
                DB::table('courses')->insert([
                    'degree_id' => $degreeId,
                    'name' => $course,
                    'slug' => Str::slug($course),
                    'status' => 'active',
                ]);
            }
        }
    }
}
