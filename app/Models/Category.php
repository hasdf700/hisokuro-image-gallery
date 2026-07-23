<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image; // 引入 Image Model

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sort_order'];

    /**
     * 一個分類包含多張圖片
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
