@php
    // 1. 定義導覽列選單陣列結構
    $navItems = [
        [
            'route' => 'home',
            'icon' => 'fa-house',
            'label' => [
                'zh_TW' => '首頁',
                'ja' => 'ホーム',
                'ko' => '홈',
            ],
        ],
        [
            'route' => 'changelog',
            'icon' => 'fa-clipboard-list',
            'label' => [
                'zh_TW' => '更新日誌',
                'ja' => '更新履歴',
                'ko' => '업데이트 일지',
            ],
        ],
    ];

    // 語言清單：key 是語系代碼，value 是顯示文字
    $locales = [
        'zh_TW' => '繁體中文',
        'ja' => '日本語',
        'ko' => '한국어',
    ];

    // 取得當前全域語系，若不在定義範圍內則預設為 zh_TW
    $currentLocale = app()->getLocale();
@endphp

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
                @foreach ($navItems as $item)
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa-solid {{ $item['icon'] }} me-1"></i>
                            {{ $item['label'][$currentLocale] ?? $item['label']['zh_TW'] }}
                        </a>
                    </li>
                @endforeach

                <!-- 多國語言切換下拉選單 -->
                <li class="nav-item dropdown me-3">
                    <a class="nav-link dropdown-toggle text-secondary" href="#" role="button"
                        data-bs-toggle="dropdown">
                        <i class="fa-solid fa-globe me-1"></i>
                        {{ $locales[$currentLocale] ?? '繁體中文' }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                        @foreach ($locales as $code => $label)
                            <li>
                                <a class="dropdown-item {{ $currentLocale == $code ? 'active' : '' }}"
                                    href="{{ route('lang.switch', $code) }}">
                                    {{ $label }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
