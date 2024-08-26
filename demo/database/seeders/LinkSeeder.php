<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog\Link; 
class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Link::create([
            'url' => 'https://www.facebook.com',
            'title' => json_encode(['en' => 'Sample Title', 'vi' => 'Tiêu đề mẫu']),
            'description' => json_encode(['en' => 'Sample description for this link.', 'vi' => 'Mô tả mẫu cho liên kết này.']),
            'color' => '#FF5733', // Màu bạn muốn đặt
            'image' => 'https://images.pexels.com/photos/3611395/pexels-photo-3611395.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
        ]);
    }
}
