<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;
use App\Models\City;
use App\Models\Shop;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    public function configure(): static
    {
        return $this->afterMaking(function (Shop $shop) {
            // ...
        })->afterCreating(function (Shop $shop) {
            $brandsCount = Brand::query()->count();
            $brandsCount = fake()->numberBetween(- $brandsCount / 3, $brandsCount);
            if ($brandsCount > 0) {
                $brandIds = Brand::query()->inRandomOrder()->limit($brandsCount)->pluck('id');
                $shop->brands()->sync($brandIds);
            }
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake('ru_RU')->company(),
            'description' => fake('ru_RU')->realText(256),
            'address' => fake('ru_RU')->address(),
            'email' => fake()->companyEmail(),
            'city_id' => City::query()->select('id')->inRandomOrder()->firstOrFail()->id,
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude()
        ];
    }
}
