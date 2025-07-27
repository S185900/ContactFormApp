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
    <!-- <link rel="stylesheet" href="{{ asset('css/common.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <style>
    </style>
    @yield('css')
</head>
<body class="register-page">
    <header class="header">
        <div class="header__wrapper">
            <div class="header__logo">
                <a href="/" class="header__logo-link">
                    <span class="header__logo-text">FashionablyLate</span>
                </a>
            </div>
            <div class="header__nav--button">
                <button class="header__nav--button-submit" type='submit' 
                    onclick="window.location.href='/login'">
                    Login
                </button>
            <!-- Fortifyの設定がすでに/loginのルートを処理しているので、特別な追加修正不要 -->
            </div>
        </div>
    </header>
    <main>
        <div class="top-ttl">
            <h1 class="top-ttl__heading">
                Register
            </h1>
        </div>
        <div class="register-form">
            <!-- action:フォーム内容の送信先を指定 post:送信するとき -->
            <form class="register-form__form" action="/register" method="post">
                @csrf
                <table class="register-form__table">
                    <tr>
                        <td>
                            <label class="label-ttl register-form__group--name-ttl">お名前</label>
                            <div class="login-form__group login-form__group--name">
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="login-form__input" placeholder="例: 山田 太郎" />
                            </div>
                        </td>
                        <!-- バリデーション:`お名前を入力してください` -->
                                @error('name')
                                    <p class="error-message-1">{{ $message }}</p>
                                @enderror
                    </tr>
                    <tr>
                        <td>
                            <label class="label-ttl register-form__group--email-ttl">メールアドレス</label>
                            <div class="login-form__group login-form__group--email">
                                <input type="email" id="email" name="email" value="{{ old('email') }}"class="login-form__input" placeholder="例: test@example.com" />
                            </div>
                        </td>
                        <!-- バリデーション:`メールアドレスを入力してください` -->
                                @error('email')
                                    <p class="error-message-2">{{ $message }}</p>
                                @enderror
                    </tr>
                    <tr>
                        <td>
                            <label class="label-ttl register-form__group--password-ttl">パスワード</label>
                            <div class="login-form__group login-form__group--password">
                                <input type="password" id="password" name="password" class="login-form__input" placeholder="例: coachtech1106" />
                            </div>

                        </td>
                        <!-- バリデーション:`パスワードを入力してください` -->
                                @error('password')
                                    <p class="error-message-3">{{ $message }}</p>
                                @enderror
                    </tr>
                </table>
                <div class="login-form__group login-form__group--button">
                    <button class="login-form__submit" type="submit">登録</button>
                </div>
            </form>

        </div>
    </main>
</body>
</html>
