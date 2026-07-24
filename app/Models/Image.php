<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;      // 引入 Category Model
use App\Models\ImagePath;     // 引入 ImagePath Model
use App\Models\ImageDownload; // 引入 ImageDownload Model

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'sort_order'];

    /**
     * 圖片屬於一個分類（一本書）
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * 一張圖片可有多個語言版本的預覽路徑
     */
    public function paths()
    {
        return $this->hasMany(ImagePath::class);
    }

    /**
     * 一張圖片可有多個語言版本的下載檔案
     */
    public function downloads()
    {
        return $this->hasMany(ImageDownload::class);
    }
}
