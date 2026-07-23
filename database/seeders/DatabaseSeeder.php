<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * 執行主要資料庫種子
     */
    public function run(): void
    {
        $this->call([
            LanguageSeeder::class, // 先有語言 (id 1, 2, 3)
            CategorySeeder::class, // 再有分類 (綜合, 日常, hiso, kuro)
            ImageSeeder::class,    // 最後產生圖片、路徑、下載檔與留言
        ]);
    }
}
