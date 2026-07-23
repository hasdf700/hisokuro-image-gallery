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
        Schema::create('changelogs', function (Blueprint $table) {
            $table->id();
            $table->string('version')->nullable(); // 版本號，例如 v1.0.0
            $table->string('title_zh_tw'); // 標題 (繁中)
            $table->text('content_zh_tw'); // 內容 (繁中)

            $table->string('title_ja')->nullable(); // 標題 (日語)
            $table->text('content_ja')->nullable(); // 內容 (日語)

            $table->string('title_ko')->nullable(); // 標題 (韓語)
            $table->text('content_ko')->nullable(); // 內容 (韓語)

            $table->date('released_at'); // 發布日期

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('changelogs');
    }
};
