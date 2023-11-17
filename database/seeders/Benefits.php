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
    }
}
