<?php

namespace Database\Seeders;

use App\Models\Benefit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Benefits extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Benefit::create([
            'title' => 'Health Insurance',
            'text' => 'Comprehensive health insurance coverage',
            'job_id' => 1,
        ]);

        Benefit::create([
            'title' => 'Flexible Work Hours',
            'text' => 'Option to choose flexible work hours',
            'job_id' => 1,
        ]);

        Benefit::create([
            'title' => 'Professional Development',
            'text' => 'Opportunities for continuous professional development',
            'job_id' => 1,
        ]);
        Benefit::create([
            'title' => 'Health Insurance',
            'text' => 'Comprehensive health insurance coverage',
            'job_id' => 2,
        ]);

        Benefit::create([
            'title' => 'Creative Workspace',
            'text' => 'Inspiring and creative work environment',
            'job_id' => 2,
        ]);

        Benefit::create([
            'title' => 'Work-Life Balance',
            'text' => 'Emphasis on maintaining a healthy work-life balance',
            'job_id' => 2,
        ]);
        Benefit::create([
            'title' => 'Health Insurance',
            'text' => 'Comprehensive health insurance coverage',
            'job_id' => 3,
        ]);

        Benefit::create([
            'title' => 'Performance Bonuses',
            'text' => 'Opportunity for performance-based bonuses',
            'job_id' => 3,
        ]);

        Benefit::create([
            'title' => 'Team Building Activities',
            'text' => 'Engagement in team building activities and events',
            'job_id' => 3,
        ]);
        Benefit::create([
            'title' => 'Health Insurance',
            'text' => 'Comprehensive health insurance coverage',
            'job_id' => 4,
        ]);

        Benefit::create([
            'title' => 'Remote Work Options',
            'text' => 'Option for remote work flexibility',
            'job_id' => 4,
        ]);

        Benefit::create([
            'title' => 'Research Opportunities',
            'text' => 'Access to cutting-edge research opportunities',
            'job_id' => 4,
        ]);

    }
}
