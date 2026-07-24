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
                        <a class="nav-link"
                            href="#">
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
                        @switch(app()->getLocale())
                            @case('ja')
                                日本語
                            @break

                            @case('ko')
                                한국어
                            @break

                            @default
                                繁體中文
                        @endswitch
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                        <li>
                            <a class="dropdown-item {{ (session('locale') ?? app()->getLocale()) == 'zh_TW' ? 'active' : '' }}"
                                href="{{ route('lang.switch', 'zh_TW') }}">
                                繁體中文
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ (session('locale') ?? app()->getLocale()) == 'ja' ? 'active' : '' }}"
                                href="{{ route('lang.switch', 'ja') }}">
                                日本語
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ (session('locale') ?? app()->getLocale()) == 'ko' ? 'active' : '' }}"
                                href="{{ route('lang.switch', 'ko') }}">
                                한국어
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
