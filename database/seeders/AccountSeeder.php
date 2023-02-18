<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Account::factory()->create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'name' => fake()->name(),
            'role' => 'admin'
        ])->each(function (Account $account) {
            $posts = [];
            for ($i = 0; $i < 10; $i++) {
                $data = [
                    'title' => fake()->sentence(),
                    'content' => fake()->paragraph(12)
                ];

                array_push($posts, $data);
            }
            $account->posts()->createMany($posts);
        });

        Account::factory()->create([
            'username' => 'author',
            'password' => bcrypt('author'),
            'name' => fake()->name(),
            'role' => 'author'
        ])->each(function (Account $account) {
            $posts = [];
            for ($i = 0; $i < 10; $i++) {
                $data = [
                    'title' => fake()->sentence(),
                    'content' => fake()->paragraph(12)
                ];

                array_push($posts, $data);
            }
            $account->posts()->createMany($posts);
        });
    }
}
