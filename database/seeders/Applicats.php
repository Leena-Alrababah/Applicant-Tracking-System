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
            'email' => 'applicant1@example.com',
            'phone' => '123-456-7890',
            'linkedin_profile' => 'https://www.linkedin.com/in/johndoe/',
            'resume' => 'Leena AlRababah - CV.pdf',
            'job_id' => 1,
        ]);

        Applicant::create([
            'name' => 'Jane Smith',
            'email' => 'applicant2@example.com',
            'phone' => '987-654-3210',
            'linkedin_profile' => 'https://www.linkedin.com/in/janesmith/',
            'resume' => 'Jane Smith - CV.pdf',
            'job_id' => 2,
        ]);

        Applicant::create([
            'name' => 'Alice Johnson',
            'email' => 'applicant3@example.com',
            'phone' => '555-123-4567',
            'linkedin_profile' => 'https://www.linkedin.com/in/alicejohnson/',
            'resume' => 'Alice Johnson - CV.pdf',
            'job_id' => 1,
        ]);

        Applicant::create([
            'name' => 'Bob Williams',
            'email' => 'applicant4@example.com',
            'phone' => '444-987-6543',
            'linkedin_profile' => 'https://www.linkedin.com/in/bobwilliams/',
            'resume' => 'Bob Williams - CV.pdf',
            'job_id' => 3,
        ]);

        Applicant::create([
            'name' => 'Eva Davis',
            'email' => 'applicant5@example.com',
            'phone' => '111-222-3333',
            'linkedin_profile' => 'https://www.linkedin.com/in/evadavis/',
            'resume' => 'Eva Davis - CV.pdf',
            'job_id' => 2,
        ]);
    }
}
