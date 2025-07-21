@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection


@section('main')
    <div class="top-ttl">
        <h1 class="top-ttl__heading">
            Contact
        </h1>
    </div>
    <div class="contact-form">
        <form class="contact-form__form" action="" method="POST">
            @csrf
            <div class="contact-form__group contact-form__group--name">
                <label for="last-name" class="contact-form__label">お名前<span class="span__required">※</span></label>
                <div class="contact-form__name">
                    <input type="text" id="last-name" name="last_name" class="contact-form__input" placeholder="例: 山田" required>
                    <input type="text" id="first-name" name="first_name" class="contact-form__input" placeholder="例: 太郎" required>
                </div>
            </div>
            <div class="contact-form__group contact-form__group--gender">
                <label class="contact-form__label">性別<span class="span__required">※</span></label>
                <div class="contact-form__radios">
                    <label class="contact-form__radio-label">
                        <input type="radio" id="gender-male" name="gender" value="1" class="contact-form__radio" required>
                        男性
                    </label>
                    <label class="contact-form__radio-label">
                        <input type="radio" id="gender-female" name="gender" value="2" class="contact-form__radio">
                        女性
                    </label>
                    <label class="contact-form__radio-label">
                        <input type="radio" id="gender-other" name="gender" value="3" class="contact-form__radio">
                        その他
                    </label>
                </div>
            </div>
            <div class="contact-form__group contact-form__group--email">
                <label for="email" class="contact-form__label">メールアドレス<span class="span__required">※</span></label>
                <input type="email" id="email" name="email" class="contact-form__input" placeholder="例: test@example.com" required>
            </div>
            <div class="contact-form__group contact-form__group--tel">
                <label for="tel" class="contact-form__label">電話番号<span class="span__required">※</span></label>
                <div class="contact-form__tel">
                    <input type="tel" id="tel" name="tel" class="contact-form__input" placeholder="080" required>
                    <span class="tel-line__text">-</span>
                    <input type="tel" id="tel" name="tel" class="contact-form__input" placeholder="1234" required>
                    <span class="tel-line__text">-</span>
                    <input type="tel" id="tel" name="tel" class="contact-form__input" placeholder="5678" required>
                </div>
            </div>
            <div class="contact-form__group contact-form__group--address">
                <label for="address" class="contact-form__label">住所<span class="span__required">※</span></label>
                <input type="text" id="address" name="address" class="contact-form__input" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" required>
            </div>
            <div class="contact-form__group contact-form__group--building">
                <label for="building" class="contact-form__label">建物名</label>
                <input type="text" id="building" name="building" class="contact-form__input" placeholder="例: 千駄ヶ谷マンション101">
            </div>
            <div class="contact-form__group contact-form__group--category">
                <label for="category_id" class="contact-form__label">お問い合わせの種類<span class="span__required">※</span></label>
                <select id="category_id" name="category_id" class="contact-form__select" required>
                    <option value="" disabled selected class="select-form-placeholder">選択してください</option>
                    <option value="1">商品のお届けについて</option>
                    <option value="2">商品の交換について</option>
                    <option value="3">商品トラブル</option>
                    <option value="4">ショップへのお問い合わせ</option>
                    <option value="5">その他</option>
                </select>
            </div>
            <div class="contact-form__group  contact-form__group--message">
                <label for="message" class="contact-form__label contact-form__label--message">お問い合わせ内容<span class="span__required">※</span></label>
                <textarea id="message" name="message" class="contact-form__textarea" rows="5" required maxlength="120" placeholder="例: お問い合わせ内容をご記載ください"></textarea>
            </div>
            <div class="contact-form__button">
                <button class="contact-form__submit" type="submit">確認画面</button>
            </div>
            
        </form>
    </div>


@endsection