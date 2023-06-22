<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class InboundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'link' => fake()->text(),
            'ip' => fake()->ipv4(),
            'port' => fake()->numberBetween(0, 65536),
            'description' => fake()->text(10),
        ];
    }
}
