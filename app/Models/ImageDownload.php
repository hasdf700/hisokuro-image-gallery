<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;    // 引入 Image Model
use App\Models\Language; // 引入 Language Model

class ImageDownload extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_id',
        'language_id',
        'filepath',
        'file_size',
        'file_format',
        'resolution'
    ];

    /**
     * 此下載規格屬於某張圖片
     */
    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    /**
     * 此下載規格屬於某種語言
     */
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
