<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake('ru_RU')->city(),
            'code' => substr(fake('ru_RU')->slug, 0, fake()->numberBetween(5, 16)),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude()
        ];
    }
}
