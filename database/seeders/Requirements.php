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
            'text' => 'Minimum 3 years of relevant experience',
            'job_id' => 1, 
        ]);
    }
}
