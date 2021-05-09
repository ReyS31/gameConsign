<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()
        //     ->count(50)
        //     ->hasPosts(1)
        //     ->create();
        Movie::factory()
            ->count(300)
            ->create();
    }
}
