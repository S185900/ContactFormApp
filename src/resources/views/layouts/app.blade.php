
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="ContactFormApp" content="お問い合わせ管理アプリです。">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContactFormApp</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gorditas:wght@400;700&family=Inika:wght@400;700&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Noto+Serif+JP:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <style>
    </style>
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__wrapper">
            <div class="header__logo">
                <a href="/" class="header__logo-link">
                    <span class="header__logo-text">FashionablyLate</span>
                </a>
            </div>
        </div>
    </header>
    <main>
        @yield('main')
    </main>
    <footer>
        <div class="footer"></div>
    </footer>
</body>
</html>