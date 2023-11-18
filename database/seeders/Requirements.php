<?php

namespace Database\Seeders;

use App\Models\Requirement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Requirements extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Requirement::create([
            'title' => 'Experience',
            'text' => 'Minimum 3 years of experience in software development',
            'job_id' => 1,
        ]);

        Requirement::create([
            'title' => 'Education',
            'text' => 'Bachelor’s degree in Computer Science or related field',
            'job_id' => 1,
        ]);

        Requirement::create([
            'title' => 'Skills',
            'text' => 'Proficient in PHP, JavaScript, and Laravel framework',
            'job_id' => 1,
        ]);


        Requirement::create([
            'title' => 'Experience',
            'text' => 'Minimum 2 years of experience in graphic design',
            'job_id' => 2,
        ]);

        Requirement::create([
            'title' => 'Education',
            'text' => 'Bachelor’s degree in Graphic Design or related field',
            'job_id' => 2,
        ]);

        Requirement::create([
            'title' => 'Skills',
            'text' => 'Proficient in Adobe Creative Suite (Photoshop, Illustrator, InDesign)',
            'job_id' => 2,
        ]);
        Requirement::create([
            'title' => 'Experience',
            'text' => 'Minimum 4 years of experience in marketing',
            'job_id' => 3,
        ]);

        Requirement::create([
            'title' => 'Education',
            'text' => 'Bachelor’s degree in Marketing or related field',
            'job_id' => 3,
        ]);

        Requirement::create([
            'title' => 'Skills',
            'text' => 'Strong knowledge of SEO, SEM, and social media marketing',
            'job_id' => 3,
        ]);
        Requirement::create([
            'title' => 'Experience',
            'text' => 'Minimum 5 years of experience in data science',
            'job_id' => 4,
        ]);

        Requirement::create([
            'title' => 'Education',
            'text' => 'Master’s or Ph.D. in Data Science, Statistics, or related field',
            'job_id' => 4,
        ]);

        Requirement::create([
            'title' => 'Skills',
            'text' => 'Expertise in machine learning, data analysis, and programming languages (Python, R)',
            'job_id' => 4,
        ]);


    }
}
