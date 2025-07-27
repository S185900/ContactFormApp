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
        <form class="dashboard-form__form" action="{{ route('admin.search') }}" method="get">
        <!-- <form class="dashboard-form__form" action="/admin/search" method="post"> -->
            @csrf
            <div class="dashboard-form__group dashboard-form__group--input-text">
                <input class="input" type="text" name="name_email_search" value="" placeholder="名前やメールアドレスを入力してください" />
            </div>


            <div class="dashboard-form__group dashboard-form__group--select-gender">
                <select id="gender" name="gender" class="dashboard-form__select--gender" >
                    <option value="" disabled selected class="select-form-placeholder">性別</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                    <option value="all">全て</option>
                </select>
            </div>

            <div class="dashboard-form__group dashboard-form__group--select-categories">
                <select name="category_id" id="category_id" class="dashboard-form__select--categories">
                    <!-- public function getContacts() -->
                    <!-- Route::get('/admin', [AdminController::class, 'getContacts']); -->
                    <option value="" disabled selected class="select-form-placeholder">お問い合わせの種類</
                        @foreach ($categories as $category)
                            <option value="{{ $category['category_id'] }}">{{ $category['category_name'] }}</option>
                        @endforeach
                </select>
            </div>

            <div class="dashboard-form__group dashboard-form__group--select-date">
                <input  type="date" name="date" value="年/月/日" id="created_at" class="dashboard-form__input--date">
            </div>

            <div class="dashboard-form__group dashboard-form__group--buttons-1">
                <button type="submit" class="dashboard-form__button dashboard-form__button--search">検索</button>
            </div>

            <!-- formの中にあれば勝手にリセットしてくれる -->
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
                        <button class="pagination--button" onclick="goToPage('prev')" {{ $contacts->previousPageUrl() ? '' : 'disabled' }}>&lt;</button>
                        @for ($i = 1; $i <= $contacts->lastPage(); $i++)
                            <button class="pagination--button {{ $i == $contacts->currentPage() ? 'active' : '' }}" onclick="goToPage({{ $i }})">
                                {{ $i }}
                            </button>
                        @endfor
                        <button class="pagination--button" onclick="goToPage('next')" {{ $contacts->nextPageUrl() ? '' : 'disabled' }}>&gt;</button>
                    </div>
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
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                        <td>{{ $contact->gender_text }}</td>
                        <td>{{ $contact->email }}</td>
                        <!-- <td>{{ $contact->category_id }}</td> デバッグ用-->
                        <td>{{ $contact->category_name }}</td>
                        <td><button class="details-button">詳細</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">ログアウト</button>
            </form>

            <!-- 念の為、確認で・・・ -->
            <div class="pagination-wrapper">
                {{ $contacts->links() }}
            </div>
            
        </div>
    </div>

    <!-- モーダルウィンドウ -->
    

@endsection



