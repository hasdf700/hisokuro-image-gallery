<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hisokuro Image Gallery - 首頁</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- 導覽列 -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">Hisokuro Gallery</a>
        </div>
    </nav>

    <div class="container">
        <!-- 分類篩選選單 -->
        <div class="d-flex justify-content-center mb-4">
            <a href="{{ route('home') }}" class="btn btn-outline-secondary me-2 {{ !request('category_id') ? 'active' : '' }}">全部</a>
            @foreach($categories as $category)
                <a href="{{ route('home', ['category_id' => $category->id]) }}"
                   class="btn btn-outline-primary me-2 {{ request('category_id') == $category->id ? 'active' : '' }}">
                   {{ $category->name }}
                </a>
            @endforeach
        </div>

        <!-- 圖片展示卡片區 -->
        <div class="row">
            @forelse($images as $image)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <!-- 預覽圖片展示 (預設抓第一個路徑或預設圖) -->
                        @php
                            $firstPath = $image->paths->first();
                            $imgSrc = $firstPath ? asset($firstPath->filepath) : 'https://via.placeholder.com/400x300?text=No+Image';
                        @endphp
                        <img src="{{ $imgSrc }}" class="card-img-top" alt="Gallery Image" style="height: 220px; object-fit: cover;">

                        <div class="card-body">
                            <span class="badge bg-info text-dark mb-2">{{ $image->category->name ?? '未分類' }}</span>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <span class="text-muted">❤️ {{ $image->likes_count }} 讚</span>
                                <span class="text-muted">📥 {{ $image->downloads_count }} 下載</span>
                            </div>

                            <hr>

                            <!-- 多國語言留言列表展示 -->
                            <h6>最新留言：</h6>
                            <ul class="list-unstyled text-small mb-0">
                                @forelse($image->comments as $comment)
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
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-5">目前沒有相關圖片資料。</p>
                </div>
            @endforelse
        </div>
    </div>

</body>
</html>
