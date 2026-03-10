<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Astros>
 */
class AstrosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(),
            'tipo' => $this->faker->numberBetween(0, 3),
            'historia' => $this->faker->text(100),
            'caracteristicas' => $this->faker->text(100),
            'precio' => $this->faker->numberBetween(10000, 1000000)
        ];
    }
}
