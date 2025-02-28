<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Country;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $brand = fake()->numberBetween(1, 100);
        return [
            'name' => match(true) {
                ($brand > 0 && $brand <= 33) => fake('it_CH')->lastName(),
                ($brand > 33 && $brand <= 66) => fake('de_CH')->lastName(),
                ($brand > 66 && $brand <= 100) => fake('ro_RO')->lastName()
            },
            'country_id' => Country::query()->select('id')->inRandomOrder()->firstOrFail()->id,
            'founded' => fake()->year()
        ];
    }
}
