<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('home');
});

Route::get('/', [ImageController::class, 'index'])->name('home');
