<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::insert([
            ['title' => 'Hướng dẫn nâng cấp Canva', 'content' => 'Chi tiết các bước...'],
            ['title' => 'Spotify 1 tháng vs 1 năm', 'content' => 'So sánh chi phí và tiện lợi...'],
            ['title' => 'Tại sao nên mua tài khoản chính chủ?', 'content' => 'Bảo mật và ổn định hơn...'],
        ]);
    }
}
