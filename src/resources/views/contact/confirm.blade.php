@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection


@section('main')
    <div class="top-ttl">
        <h1 class="top-ttl__heading">
            Confirm
        </h1>
    </div>
    <div class="confirm-form">
        <form class="confirm-form__form" action="" method="POST">
            @csrf
            <table class="confirm-form__table">
                    <tr class="confirm-form__table__row">
                        <th class="confirm-form__table__header">お名前</th>
                        <td class="confirm-form__table__value">
                            <input class="input" type="text" name="name" value="山田 太郎" />
                        </td>
                    </tr>
                    <tr class="confirm-form__table__row">
                        <th class="confirm-form__table__header">性別</th>
                        <td class="confirm-form__table__value">
                            <input class="input" type="select" name="gender" value="男性" />
                        </td>
                    </tr>
                    <tr class="confirm-form__table__row">
                        <th class="confirm-form__table__header">メールアドレス</th>
                        <td class="confirm-form__table__value">
                            <input class="input" type="email" name="email" value="test@wxample.com" />
                        </td>
                    </tr>
                    <tr class="confirm-form__table__row">
                        <th class="confirm-form__table__header">電話番号</th>
                        <td class="confirm-form__table__value">
                            <input class="input" type="tel" name="email" value="08012345678" />
                        </td>
                    </tr>
                    <tr class="confirm-form__table__row">
                        <th class="confirm-form__table__header">電住所</th>
                        <td class="confirm-form__table__value">
                            <input class="input" type="text" name="address" value="東京都渋谷区千駄ヶ谷1-2-3" />
                        </td>
                    </tr>
                    <tr class="confirm-form__table__row">
                        <th class="confirm-form__table__header">建物名</th>
                        <td class="confirm-form__table__value">
                            <input class="input" type="text" name="building" value="千駄ヶ谷マンション101" />
                        </td>
                    </tr>
                    <tr class="confirm-form__table__row">
                        <th class="confirm-form__table__header">お問い合わせの種類</th>
                        <td class="confirm-form__table__value">
                            <select class="input" type="select" name="category_id" value="商品の交換について" >
                                <option value="1" selected>商品のお届けについて</option>
                                <option value="2">商品の交換について</option>
                                <option value="3">商品トラブル</option>
                                <option value="4">ショップへのお問い合わせ</option>
                                <option value="5">その他</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="confirm-form__table__row">
                        <th class="confirm-form__table__header">お問い合わせ内容</th>
                        <td class="confirm-form__table__value">
                            <textarea class="textarea" type="text" name="detail" wrap="soft value="" >届いた商品が注文した商品ではありませんでした。商品の取り替えをお願いします。</textarea>
                        </td>
                    </tr>
            </table>

            <div class="confirm-form__btn-edit">
                <div class="confirm-form__button">
                    <button class="confirm-form__submit" type="submit">送信</button>
                </div>
                <div class="confirm-form__edit">
                    <a href="/confirm" class="confirm-form__submit-edit">
                        修正
                    </a>
                </div>
            </div>

        </form>
    </div>


@endsection