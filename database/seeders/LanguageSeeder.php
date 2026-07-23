<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * 寫入語系資料 (繁體中文, 日本語, 한국어)
     */
    public function run(): void
    {
        $languages = [
            ['id' => 1, 'name' => 'zh_TW', 'sort_order' => 1],
            ['id' => 2, 'name' => 'ja',    'sort_order' => 2],
            ['id' => 3, 'name' => 'ko',    'sort_order' => 3],
        ];

        foreach ($languages as $lang) {
            DB::table('languages')->updateOrInsert(
                ['id' => $lang['id']],
                [
                    'name'       => $lang['name'],
                    'sort_order' => $lang['sort_order'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
