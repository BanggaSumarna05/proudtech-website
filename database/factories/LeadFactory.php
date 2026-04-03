<?php

namespace Database\Factories;

use App\Models\Lead;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'business' => fake()->company(),
            'budget' => fake()->randomElement([
                '< 10 juta',
                '10 - 25 juta',
                '25 - 50 juta',
                '> 50 juta',
            ]),
            'message' => fake()->paragraph(),
            'status' => fake()->randomElement(Lead::STATUSES),
        ];
    }
}
