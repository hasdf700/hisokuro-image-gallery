<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('image_downloads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('image_id')->constrained()->onDelete('cascade'); // 外鍵關聯主表
            $table->foreignId('language_id')
                  ->constrained('languages')
                  ->onDelete('cascade');
            $table->string('filepath'); // 可下載原圖檔案路徑
            $table->unsignedBigInteger('file_size'); // 檔案大小 (Bytes)
            $table->string('file_format', 10)->default('png'); // 檔案格式 (jpg, png, webp 等)
            $table->string('resolution')->nullable(); // 圖片解析度 (例如：1920x1080)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_downloads');
    }
};
