<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->randomElement([
            'Custom Website Development',
            'Mobile App Development',
            'UI/UX Product Design',
            'Web App & Dashboard Systems',
        ]);

        return [
            'title' => $title,
            'description' => fake()->sentence(16),
            'content' => implode(PHP_EOL, fake()->sentences(4)),
            'price_range' => fake()->randomElement([
                'Mulai dari 8 juta IDR',
                'Mulai dari 15 juta IDR',
                'Mulai dari 25 juta IDR',
            ]),
            'icon' => fake()->randomElement(['code', 'spark', 'briefcase', 'chart']),
        ];
    }
}
