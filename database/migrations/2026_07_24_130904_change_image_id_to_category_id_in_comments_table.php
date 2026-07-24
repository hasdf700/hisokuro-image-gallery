<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('comments', function (Blueprint $table) {
        if (Schema::hasColumn('comments', 'image_id')) {
            $table->dropForeign(['image_id']);  // 先解除外鍵約束
            $table->dropColumn('image_id');      // 再刪欄位
        }
        if (!Schema::hasColumn('comments', 'category_id')) {
            $table->foreignId('category_id')->after('id')->constrained('categories')->onDelete('cascade');
        }
    });
    }

    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            $table->unsignedBigInteger('image_id')->nullable();
        });
    }
};
