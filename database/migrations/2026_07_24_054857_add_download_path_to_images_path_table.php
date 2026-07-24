<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 用 hasColumn 判斷，避免你本機資料庫已經手動加過這欄位而導致重複新增出錯
        if (!Schema::hasColumn('images_path', 'download_path')) {
            Schema::table('images_path', function (Blueprint $table) {
                $table->string('download_path')->nullable()->after('filepath');
            });
        }
    }

    public function down(): void
    {
        Schema::table('images_path', function (Blueprint $table) {
            $table->dropColumn('download_path');
        });
    }
};
