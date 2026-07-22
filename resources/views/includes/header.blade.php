<nav class="navbar navbar-expand-lg navbar-minimal py-3">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <strong>HISOKURO</strong> GALLERY
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item me-3">
                    <a class="nav-link text-secondary" href="{{ url('/') }}">首頁</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link text-secondary" href="#">更新日誌</a>
                </li>

                <!-- 多國語言切換下拉選單 (預留) -->
                <li class="nav-item dropdown me-3">
                    <a class="nav-link dropdown-toggle text-secondary" href="#" role="button"
                        data-bs-toggle="dropdown">
                        🌐 繁體中文
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                        <li><a class="dropdown-item" href="#">繁體中文</a></li>
                        <li><a class="dropdown-item" href="#">日本語</a></li>
                        <li><a class="dropdown-item" href="#">한국어</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
