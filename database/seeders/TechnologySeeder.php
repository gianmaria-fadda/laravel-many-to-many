<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Schema;

use App\Models\Technoloy;

class TechnoloySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints(function() {
            Technoloy::truncate();
        });

        for ($i=0; $i < 10; $i++) { 
            Technoloy::create([
                'title' => fake()->words(rand(1,3), true)
            ])
        }
    }
}
