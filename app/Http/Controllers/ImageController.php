<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Category;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * 顯示首頁圖片列表
     */
    public function index(Request $request)
    {
        // 1. 取得所有分類供前端篩選選單使用
        $categories = Category::orderBy('sort_order', 'asc')->get();

        // 2. 建立圖片查詢，並預載入關聯資料（category, paths）以優化效能
        $query = Image::with(['category', 'paths.language', 'comments']);

        // 如果前端有傳入 category_id 篩選，則進行過濾
        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }

        // 3. 取得圖片清單（最新上架排前面）
        $images = $query->latest()->get();

        // 4. 回傳 Blade 視圖並傳送資料
        return view('home', compact('images', 'categories'));
    }
}
