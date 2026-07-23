<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ImagePath;    // 引入 ImagePath Model
use App\Models\ImageDownload; // 引入 ImageDownload Model

class Language extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sort_order'];

    /**
     * 一種語言可對應多個圖片預覽路徑
     */
    public function imagePaths()
    {
        return $this->hasMany(ImagePath::class);
    }

    /**
     * 一種語言可對應多個圖片下載檔案
     */
    public function imageDownloads()
    {
        return $this->hasMany(ImageDownload::class);
    }
}
