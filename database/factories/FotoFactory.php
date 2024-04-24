<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul_foto' => $this->faker->sentence($nbWords = 8, $variableNbWords = true),
            'slug' => $this->faker->slug(),
            'deskripsi_foto' => $this->faker->sentence($nbWords = 20, $variableNbWords = true),
            'user_id' => rand(2, 11),
        ];
    }
}
