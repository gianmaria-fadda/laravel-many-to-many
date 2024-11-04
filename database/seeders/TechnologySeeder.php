<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Technology::truncate();
        Schema::enableForeignKeyConstraints();

        for ($i = 0; $i < 10; $i++) { 
            Technology::create([
                'title' => fake()->words(rand(1, 3), true),
            ]);
        }
    }
}
