<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('home');
});
//首頁路由
Route::get('/', [ImageController::class, 'index'])->name('home');

// 多國語言切換路由
Route::get('/lang/{locale}', [ImageController::class, 'switchLanguage'])->name('lang.switch');
