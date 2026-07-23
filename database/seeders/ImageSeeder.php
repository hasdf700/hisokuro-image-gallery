<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * 寫入測試圖片、預覽路徑、下載規格與留言資料
     */
    public function run(): void
    {
        // 取得第一個分類 ID
        $categoryId = DB::table('categories')->first()->id ?? 1;

        // 1. 寫入 images 主表
        $imageId = DB::table('images')->insertGetId([
            'category_id'     => $categoryId,
            'likes_count'     => 10,
            'downloads_count' => 3,
            'sort_order'      => 1,
            'created_at'      => now(),
            'updated_at'      => now(),
        ]);

        // 2. 寫入 images_path (對應不同的 language_id)
        $paths = [
            ['language_id' => 1, 'filepath' => 'uploads/images/sample-zh.jpg'], // 繁體中文
            ['language_id' => 2, 'filepath' => 'uploads/images/sample-ja.jpg'], // 日本語
            ['language_id' => 3, 'filepath' => 'uploads/images/sample-ko.jpg'], // 한국어
        ];

        foreach ($paths as $path) {
            DB::table('images_path')->insert([
                'image_id'    => $imageId,
                'language_id' => $path['language_id'],
                'filepath'    => $path['filepath'],
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }

        // 3. 寫入 image_downloads (對應不同的 language_id)
        DB::table('image_downloads')->insert([
            'image_id'    => $imageId,
            'language_id' => 1, // 預設繁體中文下載原圖
            'filepath'    => 'uploads/downloads/sample-hd.jpg',
            'file_size'   => 2048000, // 約 2 MB
            'file_format' => 'jpg',
            'resolution'  => '1920x1080',
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        // 4. 寫入 comments 多語系測試留言
        $comments = [
            ['author_name' => '小明', 'content' => '這張圖片非常好看！'],
            ['author_name' => '田中さん', 'content' => '素晴らしい写真ですね！'],
            ['author_name' => '김철수', 'content' => '정말 멋진 사진입니다!'],
        ];

        foreach ($comments as $comment) {
            DB::table('comments')->insert([
                'image_id'    => $imageId,
                'author_name' => $comment['author_name'],
                'content'     => $comment['content'],
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
