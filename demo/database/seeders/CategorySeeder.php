<?php

namespace Database\Seeders;

use App\Models\Blog\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $fake = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Category::create(
                [
                    'name' => $fake->name,
                    'slug' => Str::slug($fake->name),
                    'description' => $fake->paragraph,
                    'visible' => $fake->boolean,
                    
                ]
                );

        }
    }
}
