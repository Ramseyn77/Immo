<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->title() ,
            'surface' => rand(100,3000),
            'nbr_piece' => rand(1,10),
            'prix' => rand(10000,10000000),
            'description' => fake()->sentences() ,
            'departement' => 'departement' ,
            'quartier' => 'quartier',
            'ville' => 'ville' ,
            'user_id' => rand(1,3) ,
            'categorie_id'  => rand(1,2) ,
            'type_id' => rand(1,2),
        ];
    }
}
