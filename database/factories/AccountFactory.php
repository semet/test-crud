<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'username' => fake()->userName(),
            // 'password' => bcrypt('123'),
            // 'name' => fake()->name(),
            // 'role' => fake()->randomElement(['admin', 'author'])
        ];
    }
}
