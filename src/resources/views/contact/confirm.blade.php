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
        <form class="confirm-form__form" action="/thanks" method="post">
            @csrf
            <table class="confirm-form__table">
                    <tr class="confirm-form__table__row">
                        <th class="confirm-form__table__header">お名前</th>
                        <td class="confirm-form__table__value">
                            <input class="input" type="text" name="name" value="{{ $contact['name'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm-form__table__row">
                        <th class="confirm-form__table__header">性別</th>
                        <td class="confirm-form__table__value">
                            <input class="input" type="text" name="gender" value="{{ $contact['gender_name'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm-form__table__row">
                        <th class="confirm-form__table__header">メールアドレス</th>
                        <td class="confirm-form__table__value">
                            <input class="input" type="email" name="email" value="{{ $contact['email'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm-form__table__row">
                        <th class="confirm-form__table__header">電話番号</th>
                        <td class="confirm-form__table__value">
                            <input class="input" type="tel" name="tel" value="{{ $contact['tel'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm-form__table__row">
                        <th class="confirm-form__table__header">電住所</th>
                        <td class="confirm-form__table__value">
                            <input class="input" type="text" name="address" value="{{ $contact['address'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm-form__table__row">
                        <th class="confirm-form__table__header">建物名</th>
                        <td class="confirm-form__table__value">
                            <input class="input" type="text" name="building" value="{{ $contact['building'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm-form__table__row">
                        <th class="confirm-form__table__header">お問い合わせの種類</th>
                        <td class="confirm-form__table__value">
                            <input class="input" type="text" name="category_id" value="{{ $contact['category_name'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm-form__table__row">
                        <th class="confirm-form__table__header">お問い合わせ内容</th>
                        <td class="confirm-form__table__value">
                            <textarea class="textarea" name="detail" wrap="soft" readonly>{{ $contact['detail'] }}</textarea>
                        </td>
                    </tr>
            </table>

            <div class="confirm-form__btn-edit">
                <div class="confirm-form__button">
                    <button class="confirm-form__submit" type="submit">送信</button>
                </div>
                <div class="confirm-form__edit">
                    <a href="/" class="confirm-form__submit-edit">修正</a>
                </div>
            </div>


        </form>
    </div>


@endsection