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
            'image' => 'no-image.jpg', // Replace with the actual path to an image
            'application_deadline' => now()->addWeek(),
            'status' => 'open',
        ]);

    }
}
