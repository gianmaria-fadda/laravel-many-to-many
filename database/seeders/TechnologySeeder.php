<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Project;
use App\Models\Technology;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::truncate();

        $randomTechnologyId = null;
        if (rand(0, 1)) {
            $randomTechnology = Technology::inRandomOrder()->first();
            $randomTechnologyId = $randomTechnology->id;
        }

        for ($i=0; $i < 50; $i++) {
            $title = fake()->sentence();
            Project::create([
                'title' => $title,
            ]);
        }
    }
}
