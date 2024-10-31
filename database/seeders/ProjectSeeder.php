<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Project;
use App\Models\Type;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::truncate();

        $randomTypeId = null;
        if (rand(0, 1)) {
            $randomType = Type::inRandomOrder()->first();
            $randomTypeId = $randomType ? $randomType->id : null;
        }


        for ($i=0; $i < 50; $i++) {
            $title = fake()->words(3, true);
            Project::create([
                'title' => $title,
                'slug' => str()->slug($title),
                'content' => fake()->paragraph(),
                'type_id' => $randomTypeId,
            ]);
        }
    }
}
