<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pizza; // Assuming you have a Pizza model
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 users
        User::factory(10)->create();

        // Create 20 pizzas, associating them with random users
        Pizza::factory(20)->create();
    }
}
