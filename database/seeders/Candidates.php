<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\TalentPool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Candidates extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assuming you have talent pools seeded already
        $talentPoolIds = TalentPool::pluck('id');

        // Seed data for candidates table
        Candidate::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phone' => '123456789',
            'linkedin_profile' => 'https://www.linkedin.com/in/johndoe/',
            'resume' => 'Path to John Doe\'s resume file',
            'talent_pool_id' => $talentPoolIds->random(),
        ]);

        Candidate::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'phone' => '987654321',
            'linkedin_profile' => 'https://www.linkedin.com/in/janesmith/',
            'resume' => 'Path to Jane Smith\'s resume file',
            'talent_pool_id' => $talentPoolIds->random(),
        ]);

    }
}
