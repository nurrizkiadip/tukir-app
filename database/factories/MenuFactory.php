<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'price' => Arr::random([10000,20000,30000,40000,50000]),
            'description' => $this->faker->sentences(random_int(3,4), true),
            'photo_path' => $this->faker->imageUrl(),
        ];
    }
}
