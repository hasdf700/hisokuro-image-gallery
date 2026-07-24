<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ImageController extends Controller
{
    /**
     * 顯示首頁：列出所有書的封面
     */
    public function index(Request $request)
    {
        $currentLocale = app()->getLocale();

        // 1. 查詢所有分類（現在等於「所有書」），每本書預先載入：
        //    - images：只抓 sort_order 最小的那一張當封面，且該張要連同它的語言路徑一起載入
        $query = Category::with([
            'images' => function ($query) use ($currentLocale) {
                $query->orderBy('sort_order', 'asc')
                    ->limit(1)
                    ->with(['paths' => function ($query) use ($currentLocale) {
                        $query->whereHas('language', function ($query) use ($currentLocale) {
                            $query->where('name', $currentLocale);
                        });
                    }]);
            },
            'comments' => function ($query) {
                $query->latest()->limit(3); // 首頁只先顯示最新 3 則，避免卡片太長
            },
        ]);

        $categories = $query->orderBy('sort_order', 'asc')->get();

        // 2. 回傳 Blade 視圖
        return view('home', compact('categories'));
    }

    /**
     * 顯示某本書的所有內頁
     */
    public function show(Request $request, Category $category)
    {
        $currentLocale = app()->getLocale();

        // 載入這本書底下所有頁面（images），依 sort_order 排序，
        // 每頁只帶出符合目前語言的那一筆路徑
        $category->load([
            'images' => function ($query) use ($currentLocale) {
                $query->orderBy('sort_order', 'asc')
                    ->with(['paths' => function ($query) use ($currentLocale) {
                        $query->whereHas('language', function ($query) use ($currentLocale) {
                            $query->where('name', $currentLocale);
                        });
                    }]);
            },
            'comments' => function ($query) {
                $query->latest();
            },
        ]);

        return view('book', compact('category'));
    }

    /**
     * 切換全站語言設定
     */
    public function switchLanguage($locale)
    {
        if (in_array($locale, ['zh_TW', 'ja', 'ko'])) {
            Session::put('locale', $locale);
        }

        return redirect()->back();
    }
}
