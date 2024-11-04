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
            $title = fake()->words(3, true);
            Technology::create([
                'title' => $title,
            ]);
        }
    }
}
