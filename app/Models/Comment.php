<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category; // 引入 Category Model

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'author_name', 'content'];

    /**
     * 留言屬於某本書（分類）
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
