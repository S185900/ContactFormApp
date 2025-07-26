@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection


@section('main')
    <div class="top-ttl">
        <h1 class="top-ttl__heading">
            Admin
        </h1>
    </div>
    <div class="dashboard-form">
        <form class="dashboard-form__form" action="/" method="post">
            @csrf
            <div class="dashboard-form__group dashboard-form__group--input-text">
                <input class="input" type="text" name="" value="" placeholder="名前やメールアドレスを入力してください" />
            </div>

            <div class="dashboard-form__group dashboard-form__group--select-gender">
                <select id="category_id" name="gender" class="dashboard-form__select--gender" >
                    <option value="" disabled selected class="select-form-placeholder">性別</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>
            </div>

            <div class="dashboard-form__group dashboard-form__group--select-categories">
                <select id="category_id" name="category_id" class="dashboard-form__select--categories" >
                    <option value="" disabled selected class="select-form-placeholder">お問い合わせの種類</option>
                    <option value="1">商品のお届けについて</option>
                    <option value="2">商品の交換について</option>
                    <option value="3">商品トラブル</option>
                    <option value="4">ショップへのお問い合わせ</option>
                    <option value="5">その他</option>
                </select>
            </div>

            <div class="dashboard-form__group dashboard-form__group--select-date">
                <lavel class="dashboard-form__label" ></label>
                <input class="dashboard-form__input--date"
                    type="date" 
                    id="search-date" 
                    name="search_date" 
                >
            </div>

            <div class="dashboard-form__group dashboard-form__group--buttons-1">
                <button type="submit" class="dashboard-form__button dashboard-form__button--search">検索</button>
            </div>
            <div class="dashboard-form__group dashboard-form__group--buttons-2">
                <button type="reset" class="dashboard-form__button dashboard-form__button--reset">リセット</button>
            </div>

        </form>
        <div class="dashboard-table__wrapper">

            <div class="dashboard-table__info">

                <!-- エクスポートボタン -->
                <div class="dashboard-form__export--button">
                    <button type="button" class="dashboard-form__export--button-submit" id="export-button">エクスポート</button>
                </div>

                <!-- ページナンバーのタブ -->
                <div class="dashboard-form__pagination--button">
                    <div class="pagination--button">
                    <button class="pagination--button" onclick="goToPage('prev')">&lt;</button>
                    <button class="pagination--button active" onclick="goToPage(1)">1</button>
                    <button class="pagination--button" onclick="goToPage(2)">2</button>
                    <button class="pagination--button" onclick="goToPage(3)">3</button>
                    <button class="pagination--button" onclick="goToPage(4)">4</button>
                    <button class="pagination--button" onclick="goToPage(5)">5</button>
                    <button class="pagination--button" onclick="goToPage('next')">&gt;</button>
                </div>

            </div>
        </div>
        <!-- テーブル -->
        <div class="dashboard-table__table">
            <table id="data-table" class="dashboard-table">
                <thead>
                    <tr>
                        <th>お名前</th>
                        <th>性別</th>
                        <th>メールアドレス</th>
                        <th>お問い合わせの種類</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>山田 太郎</td>
                        <td>男性</td>
                        <td>test@example.com</td>
                        <td>商品の交換について</td>
                        <td><button class="details-button">詳細</button></td>
                    </tr>
                    <tr>
                        <td>山田 太郎</td>
                        <td>男性</td>
                        <td>test@example.com</td>
                        <td>商品の交換について</td>
                        <td><button class="details-button">詳細</button></td>
                    </tr>
                    <tr>
                        <td>山田 太郎</td>
                        <td>男性</td>
                        <td>test@example.com</td>
                        <td>商品の交換について</td>
                        <td><button class="details-button">詳細</button></td>
                    </tr>
                    <tr>
                        <td>山田 太郎</td>
                        <td>男性</td>
                        <td>test@example.com</td>
                        <td>商品の交換について</td>
                        <td><button class="details-button">詳細</button></td>
                    </tr>
                    <tr>
                        <td>山田 太郎</td>
                        <td>男性</td>
                        <td>test@example.com</td>
                        <td>商品の交換について</td>
                        <td><button class="details-button">詳細</button></td>
                    </tr>
                    <tr>
                        <td>山田 太郎</td>
                        <td>男性</td>
                        <td>test@example.com</td>
                        <td>商品の交換について</td>
                        <td><button class="details-button">詳細</button></td>
                    </tr>
                    <tr>
                        <td>山田 太郎</td>
                        <td>男性</td>
                        <td>test@example.com</td>
                        <td>商品の交換について</td>
                        <td><button class="details-button">詳細</button></td>
                    </tr>
                    <!-- 他の行を追加 -->
                </tbody>
            </table>
        </div>
    </div>



@endsection