<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        
        User::factory()->create([
            'name' => 'Giacco',
            'email' => 'giacco@hotmail.it',
        ]);

        $this->call([
            ProjectSeeder::class,
            TechnologySeeder::class,
            TypeSeeder::class,
        ]);
    }
}
