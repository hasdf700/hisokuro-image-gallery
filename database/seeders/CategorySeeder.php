<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * 寫入圖片分類資料 (綜合, 日常, hiso, kuro)
     */
    public function run(): void
    {
        $categories = [
            ['name' => '綜合', 'sort_order' => 1],
            ['name' => '日常', 'sort_order' => 2],
            ['name' => 'hiso', 'sort_order' => 3],
            ['name' => 'kuro', 'sort_order' => 4],
        ];

        foreach ($categories as $cat) {
            DB::table('categories')->insert([
                'name'       => $cat['name'],
                'sort_order' => $cat['sort_order'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
