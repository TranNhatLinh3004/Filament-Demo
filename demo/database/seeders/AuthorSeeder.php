<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Blog\Author;
class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Author::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'photo' => $faker->imageUrl(200, 200, 'people'),
                'bio' => $faker->paragraph,
                'github_handle' => $faker->userName,
                'twitter_handle' => $faker->userName,
            ]);
        }
    }
}
