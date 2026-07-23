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
        Schema::create('images_path', function (Blueprint $table) {
            $table->id();
            // 1. 指向 images 資料表
            $table->foreignId('image_id')
                  ->constrained('images')
                  ->onDelete('cascade');

            // 2. 指向語言資料表 (請確認你的語言表名稱是 languages 還是 category_translations / languages)
            // 如果你的語言表叫做 languages，請使用以下寫法：
            $table->foreignId('language_id')
                  ->constrained('languages')
                  ->onDelete('cascade');

            $table->string('filepath')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images_path');
    }
};
