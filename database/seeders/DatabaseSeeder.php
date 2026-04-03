<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
            ServiceSeeder::class,
            PortfolioSeeder::class,
        ]);

        User::query()->updateOrCreate([
            'email' => 'admin@proudtech.id',
        ], [
            'name' => 'Proud Tech Admin',
            'password' => 'password',
        ]);
    }
}
