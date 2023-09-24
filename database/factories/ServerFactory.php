<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class ServerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = fake()->date();
        return [
            'title' => fake()->text('10'),
            'ip' => fake()->ipv4(),
            'start_date' => fake()->date(),
            'end_date' => Carbon::parse($date)->addMonth(),
            'description' => fake()->text('50'),
            'subscription_price' => fake()->numberBetween('0'),
        ];
    }
}
