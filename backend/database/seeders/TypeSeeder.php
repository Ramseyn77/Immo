<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::factory()->create([
            'name' => 'Villa'
        ]);
        Type::factory()->create([
            'name' => 'Villa meublée'
        ]);
        Type::factory()->create([
            'name' => 'Appartement'
        ]);
        Type::factory()->create([
            'name' => 'Appartement meublée'
        ]);
        Type::factory()->create([
            'name' => 'Magasin'
        ]);
        Type::factory()->create([
            'name' => 'Paintahouse'
        ]);
        Type::factory()->create([
            'name' => 'Terrain'
        ]);
        Type::factory()->create([
            'name' => 'Château'
        ]);
    }
}
