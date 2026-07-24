<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('images', function (Blueprint $table) {
            if (Schema::hasColumn('images', 'likes_count')) {
                $table->dropColumn('likes_count');
            }
            if (Schema::hasColumn('images', 'downloads_count')) {
                $table->dropColumn('downloads_count');
            }
        });
    }

    public function down(): void
    {
        Schema::table('images', function (Blueprint $table) {
            $table->integer('likes_count')->default(0);
            $table->integer('downloads_count')->default(0);
        });
    }
};
