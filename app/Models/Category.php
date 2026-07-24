<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;   // 引入 Image Model
use App\Models\Comment; // 引入 Comment Model

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sort_order', 'likes_count', 'downloads_count'];

    /**
     * 一本書（分類）包含多張圖片（頁面）
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /**
     * 一本書（分類）可有多條留言
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
