@extends('layouts.app')

@section('title', '首頁 - Hisokuro Minimal Gallery')

@section('content')
    <div class="container">
        <!-- 標題說明區 -->
        <div class="text-center my-5 py-4">
            <h1 class="fw-light display-5 mb-3">極簡圖庫展示區</h1>
            <p class="text-muted fs-6">純粹、簡潔的圖片瀏覽與多語系下載平台</p>
        </div>

        <!-- 卡片範例 (測試 Bootstrap 網格與樣式) -->
        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-1 p-3 bg-white">
                    <div class="card-body text-center">
                        <h5 class="fw-normal mb-3">樣式設計成功</h5>
                        <p class="text-muted small">這是一個極簡風卡片範例，背景偏白，搭配輕微陰影與細邊框。</p>
                        <button class="btn btn-minimal btn-sm px-4 mt-2">測試按鈕</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
