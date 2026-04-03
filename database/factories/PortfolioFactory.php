<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Portfolio>
 */
class PortfolioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->company() . ' Digital Launch';

        return [
            'title' => $title,
            'description' => fake()->sentence(18),
            'problem' => implode(PHP_EOL, fake()->sentences(3)),
            'solution' => implode(PHP_EOL, fake()->sentences(4)),
            'result' => implode(PHP_EOL, fake()->sentences(3)),
            'image' => 'images/portfolio/placeholder.svg',
        ];
    }
}
