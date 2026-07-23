<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image; // 引入 Image Model

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['image_id', 'author_name', 'content'];

    /**
     * 留言屬於某張圖片
     */
    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
