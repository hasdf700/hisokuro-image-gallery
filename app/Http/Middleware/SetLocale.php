<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * 處理傳入的請求：設定系統語系
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 檢查 Session 中是否有記錄 locale，若有且屬於支援的語言則設定
        if (Session::has('locale') && in_array(Session::get('locale'), ['zh_TW', 'ja', 'ko'])) {
            App::setLocale(Session::get('locale'));
        } else {
            // 預設語言為繁體中文
            App::setLocale('zh_TW');
        }

        return $next($request);
    }
}
