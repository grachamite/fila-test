<?php

namespace Database\Factories;

use App\Models\Body;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Car;
use App\Models\Option;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    public function configure(): static
    {
        return $this->afterMaking(function (Car $car) {
            // ...
        })->afterCreating(function (Car $car) {
            $optionsCount = Option::query()->count();
            $optionsCount = fake()->numberBetween(- $optionsCount / 3, $optionsCount);
            if ($optionsCount > 0) {
                $optionIds = Brand::query()->inRandomOrder()->limit($optionsCount)->pluck('id');
                $car->options()->sync($optionIds);
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
            'model' => match (fake()->numberBetween(0, 2)) {
                0 => mb_ucfirst(fake()->word()) . ' ' . fake()->regexify('[A-Z]{1}') . fake()->regexify('[0-9]{1}'),
                1 => mb_ucfirst(fake()->word()) . ' ' . fake()->regexify('[0-9]{4}'),
                2 => fake()->regexify('[A-Z]{2}') . ' ' . fake()->regexify('[0-9]{3}'),
            },
            'brand_id' => Brand::query()->select('id')->inRandomOrder()->firstOrFail()->id,
            'color_id' => Color::query()->select('id')->inRandomOrder()->firstOrFail()->id,
            'max_speed' => fake()->numberBetween(60, 240),
            'body_id' => Body::query()->select('id')->inRandomOrder()->firstOrFail()->id,
            'year' => fake()->year(),
            'used' => fake()->boolean(),
            'owner_phone' => fake()->numberBetween(-30, 30) >= 0 ? fake('ru_RU')->phoneNumber() : null,
            'shop_id' => fake()->numberBetween(-30, 30) >= 0 ? Shop::query()->select('id')->inRandomOrder()->firstOrFail()->id : null,
            'price' => fake()->numberBetween(1, 20000000) + fake()->numberBetween(0, 99) / 100
        ];
    }
}
