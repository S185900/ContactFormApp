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
        <!-- action:フォーム内容の送信先を指定 post:送信するとき -->
        <form class="contact-form__form" action="/confirm" method="post">
            @csrf
            <!-- input最後に入れるrequiredはあえて削除している。ブラウザのバリデーション機能を一時的に避けるため。 -->
            <div class="contact-form__group contact-form__group--name">
                <label for="last-name" class="contact-form__label">お名前<span class="span__required">※</span></label>
                <div class="contact-form__name">
                    <input type="text" id="last-name" name="last_name" value="{{ old('last_name') }}" class="contact-form__input" placeholder="例: 山田" >
                    <input type="text" id="first-name" name="first_name" value="{{ old('first_name') }}" class="contact-form__input" placeholder="例: 太郎" >
                </div>
            </div>
            @error('last_name')
                <p class="error-message">{{ $message }}</p>
            @enderror
            @error('first_name')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <div class="contact-form__group contact-form__group--gender">
                <label class="contact-form__label">性別<span class="span__required">※</span></label>
                <div class="contact-form__radios">
                    <label class="contact-form__radio-label">
                        <input type="radio" id="gender-male" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }} class="contact-form__radio" >
                        男性
                    </label>
                    <label class="contact-form__radio-label">
                        <input type="radio" id="gender-female" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }} class="contact-form__radio" >
                        女性
                    </label>
                    <label class="contact-form__radio-label">
                        <input type="radio" id="gender-other" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }} class="contact-form__radio" >
                        その他
                    </label>
                </div>
            </div>
            @error('gender')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <div class="contact-form__group contact-form__group--email">
                <label for="email" class="contact-form__label">メールアドレス<span class="span__required">※</span></label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="contact-form__input" placeholder="例: test@example.com" >
            </div>
            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <div class="contact-form__group contact-form__group--tel">
                <label for="tel" class="contact-form__label">電話番号<span class="span__required">※</span></label>
                <div class="contact-form__tel">
                    <input type="tel" id="tel-part1" name="tel[part1]" value="{{ old('tel.part1') }}" class="contact-form__input" placeholder="123" >
                    <span class="tel-line__text">-</span>
                    <input type="tel" id="tel-part2" name="tel[part2]" value="{{ old('tel.part2') }}" class="contact-form__input" placeholder="456" >
                    <span class="tel-line__text">-</span>
                    <input type="tel" id="tel-part3" name="tel[part3]" value="{{ old('tel.part3') }}" class="contact-form__input" placeholder="5678" >
                </div>
            </div>

                @php
                    $telErrors = collect($errors->getMessages())
                        ->filter(fn($message, $key) => str_starts_with($key, 'tel.'))
                        ->flatten();
                @endphp

                @if ($telErrors->contains('required_tel'))
                    <p class="error-message">電話番号を入力してください</p>
                @elseif ($telErrors->contains('invalid_tel'))
                    <p class="error-message">電話番号は5桁までの半角数字で入力してください</p>
                @endif

            <div class="contact-form__group contact-form__group--address">
                <label for="address" class="contact-form__label">住所<span class="span__required">※</span></label>
                <input type="text" id="address" name="address" {{ old('address') }} class="contact-form__input" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" >
            </div>
            @error('address')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <div class="contact-form__group contact-form__group--building">
                <label for="building" class="contact-form__label">建物名</label>
                <input type="text" id="building" name="building"  {{ old('building') }} class="contact-form__input" placeholder="例: 千駄ヶ谷マンション101">
            </div>
                @error('building')
                    <p class="error-message">{{ $message }}</p>
                @enderror

            <div class="contact-form__group contact-form__group--category">
                <label for="category_id" class="contact-form__label">お問い合わせの種類<span class="span__required">※</span></label>
                <select id="category_id" name="category_id" class="contact-form__select" >
                    <option value="" disabled selected class="select-form-placeholder" {{ old('category_id') == '' ? 'selected' : '' }}>選択してください</option>
                    <option value="1" {{ old('category_id') == '1' ? 'selected' : '' }}>商品のお届けについて</option>
                    <option value="2" {{ old('category_id') == '2' ? 'selected' : '' }}>商品の交換について</option>
                    <option value="3" {{ old('category_id') == '3' ? 'selected' : '' }}>商品トラブル</option>
                    <option value="4" {{ old('category_id') == '4' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                    <option value="5" {{ old('category_id') == '5' ? 'selected' : '' }}>その他</option>
                </select>
            </div>
            @error('category_id')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <div class="contact-form__group  contact-form__group--message">
                <label for="message" class="contact-form__label contact-form__label--message">お問い合わせ内容<span class="span__required">※</span></label>
                <textarea id="message" name="detail" class="contact-form__textarea" rows="5"  maxlength="120" placeholder="例: お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
            </div>
            @error('detail')
                <p class="error-message">{{ $message }}</p>
            @enderror

            <div class="contact-form__button">
                <button class="contact-form__submit" type="submit">確認画面</button>
            </div>

        </form>
    </div>


@endsection