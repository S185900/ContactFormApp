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
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <style>
    </style>
</head>
<body>
    <main>
        <!-- 勉強として：特殊ページかつ検索エンジン用にsection使用してみる -->
        <section class="thank-you">
            <div class="thank-you__background">
                <p class="thank-you__image">Thank you</p>
            </div>
            <div class="thank-you__content">
                <p class="thank-you__text">お問い合わせありがとうございました</p>
                <button class="thank-you__submit" type="submit">HOME</button>
            </div>
        </section>
    </main>
    <footer>
        <div class="footer"></div>
    </footer>
</body>
</html>

