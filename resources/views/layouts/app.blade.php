<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Minimal Gallery')</title>

    <!-- 1. 導入 Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- 1. 導入 Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- 2. 極簡風全局客製化 CSS -->
    <style>
        body {
            background-color: #fcfcfc;
            /* 偏白色的微暖背景，降低視覺疲勞 */
            color: #2b2b2b;
            /* 深灰色文字，增加對比與質感 */
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        /* 極簡風格導覽列 */
        .navbar-minimal {
            background-color: #ffffff;
            border-bottom: 1px solid #eeeeee;
            /* 以細微邊框取代粗重陰影 */
        }

        .navbar-brand {
            font-weight: 300;
            letter-spacing: 1.5px;
            color: #111111 !important;
        }

        /* 極簡按鈕風格 */
        .btn-minimal {
            background-color: #ffffff;
            color: #333333;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            transition: all 0.2s ease-in-out;
        }

        .btn-minimal:hover {
            background-color: #f5f5f5;
            border-color: #cccccc;
            color: #000000;
        }

        /* 頁尾極簡風格 */
        footer {
            border-top: 1px solid #eeeeee;
            background-color: #ffffff;
            color: #888888;
            font-size: 0.875rem;
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- 全局導覽列 (Header) -->
    @include('includes.header')

    <!-- 主要內容展示區 -->
    <main class="py-5">
        @yield('content')
    </main>

    <!-- 全局頁尾 (Footer) -->
    @include('includes.footer')

    <!-- 3. 導入 jQuery 與 Bootstrap 5 JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


    @stack('scripts')
</body>

</html>
