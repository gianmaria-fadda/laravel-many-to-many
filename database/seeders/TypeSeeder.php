<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Type::truncate();
        Schema::enableForeignKeyConstraints();

        $allTypes = [
            'HTML',
            'CSS',
            'JavaScript',
            'Vue',
            'SQL',
            'PHP',
            'Laravel'
        ];

        foreach ($allTypes as $singleType) {
            Type::create([
                'title' => $singleType,
                'slug' => str()->slug($singleType),
            ]);
        }
    }
}
