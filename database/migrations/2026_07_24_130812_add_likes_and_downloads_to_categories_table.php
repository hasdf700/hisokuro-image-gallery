<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            if (!Schema::hasColumn('categories', 'likes_count')) {
                $table->integer('likes_count')->default(0)->after('name');
            }
            if (!Schema::hasColumn('categories', 'downloads_count')) {
                $table->integer('downloads_count')->default(0)->after('likes_count');
            }
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['likes_count', 'downloads_count']);
        });
    }
};
