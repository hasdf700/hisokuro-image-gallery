<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\ImagePath;
use App\Models\Category;
use App\Models\Language;
use App\Models\Comment;

class ImageSeeder extends Seeder
{
    /**
     * 寫入測試圖片、預覽路徑、下載規格與留言資料
     */
    public function run(): void
    {
        // 1. 取得第一個分類（若不存在則建立預設分類）
        $category = Category::first();

        // 2. 建立主要圖片主表紀錄
        $image = Image::updateOrCreate([
            'category_id'     => $category->id,
            'likes_count'     => 0,
            'downloads_count' => 0,
            'sort_order' => 1,
        ]);

        // 3. 取得所有支援的語系資料 (zh_TW, ja, ko)
        $languages = Language::all()->keyBy('name');

        $imageData = [
            'zh_TW' => [
                'preview'  => 'storage/images/previews/demo_zh_TW.webp',
                'download' => 'storage/images/downloads/demo_zh_TW.png',
            ],
            'ja' => [
                'preview'  => 'storage/images/previews/demo_ja.webp',
                'download' => 'storage/images/downloads/demo_ja.png',
            ],
            'ko' => [
                'preview'  => 'storage/images/previews/demo_ko.webp',
                'download' => 'storage/images/downloads/demo_ko.png',
            ],
        ];

        // 5. 寫入各語系的圖片路徑至 image_paths 資料表
        foreach ($imageData as $langCode => $paths) {
            if (isset($languages[$langCode])) {
                ImagePath::create([
                    'image_id'      => $image->id,
                    'language_id'   => $languages[$langCode]->id,
                    'filepath'      => $paths['preview'],  // WebP 網頁預覽圖
                    'download_path' => $paths['download'], // JPG 原圖下載
                ]);
            }
        }

        // 5. 新增該圖片的測試留言資料
        $comments = [
            ['author_name' => '路人甲', 'content' => '這張圖片太美了！感謝分享！'],
            ['author_name' => '繪師小明', 'content' => '色彩搭配得非常好，收藏了！'],
        ];

        foreach ($comments as $comment) {
            Comment::updateOrCreate([
                'image_id' => $image->id,
                'author_name' => $comment['author_name'],
                'content'  => $comment['content'],
            ]);
        }
    }
}
