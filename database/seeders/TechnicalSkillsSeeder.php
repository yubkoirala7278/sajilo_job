<?php

namespace Database\Seeders;

use App\Models\TechnicalSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnicalSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Define an array with a diverse range of technical skills
        $skills = [
            // Programming and Technical Skills
            'PHP',
            'JavaScript',
            'Laravel',
            'React',
            'Node.js',
            'HTML',
            'CSS',
            'AWS',
            'Docker',
            'UI/UX Design',

            // Non-Programming Skills
            'Project Management',
            'Leadership',
            'Team Collaboration',
            'Customer Support',
            'Data Analysis',
            'Cybersecurity',

            // Training and Counseling
            'Career Counseling',
            'Employee Training',
            'Technical Support',
            'Mental Health Counseling',
            'Conflict Resolution',

            // Soft Skills
            'Time Management',
            'Communication Skills',
            'Adaptability',
            'Problem Solving',
            'Creativity'
        ];

        // Loop through each skill and insert it into the database
        foreach ($skills as $skill) {
            TechnicalSkill::create([
                'name' => $skill,             // Name of the technical skill
            ]);
        }
    }
}
