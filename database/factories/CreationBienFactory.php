<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CreationBienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->name(),
            'categorie' => fake()->categorie(),
            'image' => fake()->image(),
            'description' => fake()->description(),
            'adresse_localisation' => fake()->adresse_localisation(),
            'status' => fake()->status(),
            'nbrChambre' => fake()->nbrChambre(),
            'dimension' => fake()->dimension(),
            'nbrToilette' => fake()->nbrToilette(),
            'nbrBalcon' => fake()->nbrBalcon(),
            'nbrEspaceVert' => fake()->nbrEspaceVert(),
        ];
    }
}
