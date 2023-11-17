<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Jobs::class);
        $this->call(Requirements::class);
        $this->call(Benefits::class);
        $this->call(Applicats::class);

    }
}
