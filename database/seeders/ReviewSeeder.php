<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::insert([
            ['name' => 'Nguyễn Văn A', 'content' => 'Dịch vụ rất tốt!'],
            ['name' => 'Lê Thị B', 'content' => 'Sản phẩm chất lượng.'],
            ['name' => 'Trần C', 'content' => 'Sẽ ủng hộ lần sau!'],
        ]);
    }
}
