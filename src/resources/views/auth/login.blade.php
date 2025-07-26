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
<body>
    <header class="header">
        <div class="header__wrapper">
            <div class="header__logo">
                <a href="/" class="header__logo-link">
                    <span class="header__logo-text">FashionablyLate</span>
                </a>
            </div>
            <div class="header__nav--button">
                <button class="header__nav--button-submit" type='submit' 
                    onclick=\"window.location.href='/register'">
                    Register
                </button>
            </div>
        </div>
    </header>
    <main>
        <div class="top-ttl">
            <h1 class="top-ttl__heading">
                Login
            </h1>
        </div>
        <div class="login-form">
            <!-- action:フォーム内容の送信先を指定 post:送信するとき -->
            <form class="login-form__form" action="/login" method="post">
                @csrf
                <table class="login-form__table">
                    <tr>
                        <td>
                            <label class="login-form__group--email-ttl">メールアドレス</label>
                                
                            <div class="login-form__group login-form__group--email">
                                <input type="email" id="email" name="email" class="login-form__input" placeholder="例: test@example.com">
                            </div>
                            
                        </td>
                        <!-- バリデーション:`メールアドレスを入力してください` -->
                                @error('email')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                    </tr>
                    <tr>
                        <td>
                            <label class="login-form__group--password-ttl">パスワード</label>
                                <!-- バリデーション:`パスワードを入力してください` -->
                                @error('password')
                                    <p class="error-password">{{ $message }}</p>
                                @enderror
                            <div class="login-form__group login-form__group--password">
                                <input type="password" id="password" name="password" class="login-form__input" placeholder="例: coachtech1106">
                            </div>
                            
                        </td>
                        <!-- バリデーション:`メールアドレスを入力してください` -->
                                @error('email')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                    </tr>
                </table>
                <div class="login-form__group login-form__group--button">
                    <button class="login-form__submit" type="submit">ログイン</button>
                </div>

            </form>

        </div>
    </main>
</body>
</html>
