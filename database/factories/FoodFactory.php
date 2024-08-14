<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'peso' => $this->faker->randomFloat(),
            'kcal' => $this->faker->randomDigit(),
            'categoria' => $this->faker->word(),
            'menu_id' => $this->faker->randomDigit(),

        ];
    }
}
