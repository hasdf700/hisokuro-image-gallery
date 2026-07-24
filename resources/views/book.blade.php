@extends('layouts.app')

@section('title', '內頁 - HisoKuroGallery')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-12">
                <h2 class="text-center mb-4 fw-bold">{{ $category->name }}</h2>

                @if ($category->images->count() > 0)
                    <!-- 輪播容器 ( Carousel ) -->
                    <div id="bookImageCarousel" class="carousel" data-bs-ride="false" data-bs-interval="false">

                        <!-- 輪播內部區域 -->
                        <div class="carousel-inner">
                            @foreach ($category->images as $index => $image)
                                @php
                                    // 取得該張圖片符合目前語系的第一筆路徑
                                    $currentPath = $image->paths->first();
                                @endphp

                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <div class="d-flex flex-column align-items-center justify-content-center p-3"
                                        style="min-height: 450px;">

                                        @if ($currentPath && $currentPath->filepath)
                                            <!-- 圖片正中間置中與最大寬度控制 -->
                                            <img src="{{ asset($currentPath->filepath) }}" class="d-block img-fluid rounded"
                                                style="max-height: 80vh; object-fit: contain;">

                                            <!-- 頁碼與圖片標題說明 -->
                                            <div class="d-none d-md-block mt-3">
                                                <small class="text-dark">頁數：{{ $index + 1 }} /
                                                    {{ $category->images->count() }}</small>
                                                @if ($image->title)
                                                    <span class="ms-2">| {{ $image->title }}</span>
                                                @endif
                                            </div>
                                        @else
                                            <!-- 無對應語系圖片時的提示資訊 -->
                                            <div class="text-white text-center py-5">
                                                <i class="fa-regular fa-image fa-3x mb-3 text-secondary"></i>
                                                <p class="mb-0">此頁面尚無目前語系的圖片資訊</p>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- 左右切換按鈕 (只在有 2 張圖以上時顯示) -->
                        @if ($category->images->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#bookImageCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon bg-secondary rounded-circle p-3"
                                    aria-hidden="true"></span>
                                <span class="visually-hidden">上一頁</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#bookImageCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon bg-secondary rounded-circle p-3"
                                    aria-hidden="true"></span>
                                <span class="visually-hidden">下一頁</span>
                            </button>
                        @endif

                    </div>
                @else
                    <!-- 完全沒有圖片時的提示 -->
                    <div class="alert alert-info text-center py-4" role="alert">
                        這本書目前還沒有包含任何頁面圖片！
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
