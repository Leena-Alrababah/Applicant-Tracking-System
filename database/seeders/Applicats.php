<?php

namespace Database\Seeders;

use App\Models\Applicant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Applicats extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Applicant::create([
            'name' => 'John Doe',
            'email' => 'applicant@example.com',
            'phone' => '123-456-7890',
            'linkedin_profile' => 'https://www.linkedin.com/in/johndoe/',
            'resume' => 'Leena AlRababah - CV.pdf', 
            'job_id' => 1, 
        ]);
    }
}
