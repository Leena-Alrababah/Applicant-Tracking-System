<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Jobs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::create([
            'title' => 'Software Engineer',
            'description' => 'We are looking for a skilled software engineer...',
            'location' => 'Amman, Jordan',
            'image' => 'front-end/images/logo.png', 
            'application_deadline' => now()->addWeek(),
            'status' => 'open',
        ]);

        Job::create([
            'title' => 'Frontend Developer',
            'description' => 'Join our team as a frontend developer and create amazing user interfaces.',
            'location' => 'Remote',
            'image' => 'front-end/images/logo.png', 
            'application_deadline' => now()->addWeeks(2),
            'status' => 'open',
        ]);

        Job::create([
            'title' => 'Data Scientist',
            'description' => 'Exciting opportunity for a data scientist to work on cutting-edge projects.',
            'location' => 'San Francisco, USA',
            'image' => 'front-end/images/logo.png', 
            'application_deadline' => now()->addWeeks(3),
            'status' => 'open',
        ]);

        Job::create([
            'title' => 'UI/UX Designer',
            'description' => 'We are seeking a talented UI/UX designer to join our creative team.',
            'location' => 'Amman, Jordan',
            'image' => 'front-end/images/logo.png', 
            'application_deadline' => now()->addWeeks(4),
            'status' => 'open',
        ]);

    }
}
