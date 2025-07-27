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
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <style>
    </style>
    @yield('css')
</head>
<body>


    <!-- モーダル召喚のid実装 -->
    <div id="" class="modal-table__wrapper">

        <!-- モーダルトリガー -->
        <!-- <label for="" class="modal-close__button"> -->
            <button class="close-button-submit" type="submit">×</button>
        <!-- </label> -->

        <!-- モーダル本体 -->
        <div class="modal">
            <div class="modal-content">
                <!-- 閉じるトリガー -->
                <!-- <label for="modal-open" class="close-button"></label> -->

                <!-- モーダル内容 -->
                <form class="modal-form__form" action="{{ route('admin.modal') }}" method="get">
                    @csrf
                    <table class="modal-form__table">
                        <tr class="modal-form__table__row">
                            <th class="modal-form__table__header">お名前</th>
                            <td class="modal-form__table__value">
                                <input class="input" type="text" name="name" value="{{ $contact['name'] }}" readonly />
                            </td>
                        </tr>
                        <tr class="modal-form__table__row">
                            <th class="modal-form__table__header">性別</th>
                            <td class="modal-form__table__value">
                                <input class="input" type="text" name="gender" value="{{ $contact['gender'] }}">{{ $contact['gender_name'] }} readonly />
                            </td>
                        </tr>
                        <tr class="modal-form__table__row">
                            <th class="modal-form__table__header">メールアドレス</th>
                            <td class="modal-form__table__value">
                                <input class="input" type="email" name="email" value="{{ $contact['email'] }}" readonly />
                            </td>
                        </tr>
                        <tr class="modal-form__table__row">
                            <th class="modal-form__table__header">電話番号</th>
                            <td class="modal-form__table__value">
                                <input class="input" type="tel" name="tel" value="{{ $contact['tel'] }}" readonly />
                            </td>
                        </tr>
                        <tr class="modal-form__table__row">
                            <th class="modal-form__table__header">住所</th>
                            <td class="modal-form__table__value">
                                <input class="input" type="text" name="address" value="{{ $contact['address'] }}" readonly />
                            </td>
                        </tr>
                        <tr class="modal-form__table__row">
                            <th class="modal-form__table__header">建物名</th>
                            <td class="modal-form__table__value">
                                <input class="input" type="text" name="building" value="{{ $contact['building'] }}" readonly />
                            </td>
                        </tr>
                        <tr class="modal-form__table__row">
                            <th class="modal-form__table__header">お問い合わせの種類</th>
                            <td class="modal-form__table__value">
                                <input class="input" type="text" name="category_id" value="{{ $category['category_id'] }}">{{ $category['category_name'] }}" readonly />
                            </td>
                        </tr>
                        <tr class="modal-form__table__row">
                            <th class="modal-form__table__header">お問い合わせ内容</th>
                            <td class="modal-form__table__value">
                                <textarea class="textarea" name="detail" value="{{ $contact['detail'] }}" rows="5" wrap="soft" readonly>お問い合わせ内容</textarea>
                            </td>
                        </tr>
                    </table>

                </form>
                <div class="modal-form__button">
                    <button class="model-form__delete--submit" type="submit">削除</button>
                </div>
            </div>
        </div>
        
    </div>


</body>
</html>