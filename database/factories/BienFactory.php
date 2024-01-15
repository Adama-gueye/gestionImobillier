<?php

namespace Database\Factories;

use App\Models\Bien;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->word,
            'categorie' => $this->faker->randomElement(['Luxe', 'Moyen', 'Classique']),
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph,
            'adresse_localisation' => $this->faker->address,
            'status' => $this->faker->randomElement(['Occupé', 'Non Occupé']),
            'nbrChambre' => $this->faker->numberBetween(1, 5),
            'dimension' => $this->faker->randomFloat(2, 50, 500),
            'nbrToilette' => $this->faker->numberBetween(1, 3),
            'nbrBalcon' => $this->faker->numberBetween(0, 2),
            'nbrEspaceVert' => $this->faker->numberBetween(0, 1),
        ];
    }
}
