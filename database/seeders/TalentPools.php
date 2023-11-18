<?php

namespace Database\Seeders;

use App\Models\TalentPool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TalentPools extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed data for talent_pools table
        TalentPool::create([
            'title' => 'Web Developer',
            'role' => 'Developer',
            'location' => 'City A',
            'skill' => 'PHP, Laravel, JavaScript',
            'experience' => '2 years',
        ]);

        TalentPool::create([
            'title' => 'Graphic Designer',
            'role' => 'Designer',
            'location' => 'City B',
            'skill' => 'Adobe Photoshop, Illustrator',
            'experience' => '3 years',
        ]);
    }
}
