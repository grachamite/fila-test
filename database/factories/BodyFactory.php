<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Body;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Body>
 */
class BodyFactory extends Factory
{

    private array $used = [];

    const CAR_BODIES = [
        'Седан',
        'Хетчбэк',
        'Внедорожник',
        'Универсал',
        'Купе',
        'Минивэн',
        'Пикап',
        'Лимузин',
        'Фургон',
        'Кабриолет',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bodies = self::CAR_BODIES;
        $existedBodies = Body::query()->pluck('id')->toArray() + $this->used;
        $bodies = array_values(array_filter($bodies, function($option) use ($existedBodies) {
            return ! in_array($option, $existedBodies);
        }));

        $body = $bodies[rand(0, count($bodies) - 1)];
        $this->used[] = $body;

        return [
            'name' => $body,

        ];
    }
}
