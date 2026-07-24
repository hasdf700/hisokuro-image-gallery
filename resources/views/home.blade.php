@extends('layouts.app')

@section('title', '首頁 - HisoKuroGallery')

@section('content')
    <section>
        <div class="container">

            <!-- 書本展示區 -->
            <div class="row">
                @forelse($categories as $category)
                    <div class="col-md-4 mb-4">
                        <a href="{{ route('book.show', $category) }}" class="text-decoration-none text-dark">
                            <div class="card h-100 shadow-sm">
                                <!-- 封面圖片：這本書 sort_order 最小的那一張 -->
                                @php
                                    $cover = $category->images->first();
                                    $coverPath = $cover?->paths->first();
                                    $imgSrc = $coverPath
                                        ? asset($coverPath->filepath)
                                        : 'https://via.placeholder.com/400x300?text=No+Image';
                                @endphp
                                <img src="{{ $imgSrc }}" class="card-img-top" alt="{{ $category->name }}"
                                    style="height: 220px; object-fit: contain">

                                <div class="card-body">
                                    <h5 class="card-title">{{ $category->name }}</h5>

                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <span class="text-muted">
                                            <i class="fa-solid fa-heart text-danger me-1"></i>{{ $category->likes_count }} 讚
                                        </span>
                                        <span class="text-muted">
                                            <i
                                                class="fa-solid fa-download text-primary me-1"></i>{{ $category->downloads_count }}
                                            下載
                                        </span>
                                    </div>

                                    <hr>

                                    <h6>最新留言：</h6>
                                    <ul class="list-unstyled text-small mb-0">
                                        @forelse($category->comments as $comment)
                                            <li class="mb-1">
                                                <strong>{{ $comment->author_name }}：</strong>
                                                <span class="text-secondary">{{ $comment->content }}</span>
                                            </li>
                                        @empty
                                            <li class="text-muted small">尚無留言</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted fs-5">目前沒有相關書籍資料。</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>


@endsection
