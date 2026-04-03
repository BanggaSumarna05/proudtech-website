<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'site_name' => 'Proud Tech',
            'hero_title' => 'We design and build digital products that move serious businesses forward.',
            'hero_subtitle' => fake()->sentence(18),
            'whatsapp_number' => '6281234567890',
            'email' => 'hello@proudtech.id',
        ];
    }
}
