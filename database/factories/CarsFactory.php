<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cars>
 */
class CarsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'num_carte_grise'=> $this->faker->bothify('?####??##'),
            'num_carte_propietaire'=>0,
            'matricule'=>$this->faker->bothify('####??##'),
            'categorie'=>$this->faker->randomElement(str_split('ABCDEF')),
            'mark'=>$this->faker->company,
            'user_id'=>$this->faker->numberBetween(1,150),
        ];
    }
}
