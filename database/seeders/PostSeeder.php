<?php

namespace Database\Seeders;
use App\Models\Blog\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fake = Faker::create();

        $categoryIds = DB::table('categories')->pluck('id')->toArray();
        $authorIds = DB::table('authors')->pluck('id')->toArray();

        // Create static posts with specific data
        Post::create([
            'category_id' => 6,
            'author_id' => 2,
            'title' => 'Updated Post Title',
            'slug' => Str::slug('Updated Post Title'),
            'content' => 'This is the updated content for the post.',
            'published_at' => $fake->dateTimeBetween('-1 month', 'now'),
            'image' => 'https://images.pexels.com/photos/3224115/pexels-photo-3224115.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
        ]);
        

//         $fake = Faker::create();
//         // Giả sử bạn có các category với ID từ 1 đến 10
//         $categoryIds = DB::table('categories')->pluck('id')->toArray();
//         $authorIds = DB::table('authors')->pluck('id')->toArray();
//         for ($i = 0; $i < 5; $i++) {
// Post::create(
// [
//     // 'category_id' => $fake->numberBetween(1, 10), // Giả sử bạn có ít nhất 10 categories
//     // 'author_id' => $fake->numberBetween(1, 10), // Giả sử bạn có ít nhất 10 authors

//     'category_id' => $fake->randomElement($categoryIds), 
//     'author_id' => $fake->randomElement($authorIds),
//     'title' => $fake->sentence,
//     'slug' => Str::slug($fake->sentence),
//     'content' => $fake->paragraph,
//     'published_at' => $fake->dateTimeBetween('-1 month', 'now'),
//     'image' => $fake->imageUrl,
// ]
// );
        
    }
}
