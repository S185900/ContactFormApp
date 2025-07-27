<?php

use Illuminate\Support\Facades\Route;

use Laravel\Fortify\Features; // エラーになったからダメもとで入れている
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;


// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
// コントローラ一式
// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

// お問い合わせフォームのアクション一式
Route::get('/', [ContactController::class, 'create']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']); // 動作だけでビューなし
Route::get('/thanks', [ContactController::class, 'thanks']);
Route::get('/', [ContactController::class, 'create'])->name('back.to.contact.home');

// 管理画面のアクション一式
Route::get('/admin', [AdminController::class, 'getContacts']);
Route::get('/admin/search', [AdminController::class, 'search'])->name('admin.search');
Route::get('/adimin/modal/info', [AdminController::class, 'getContacts'])->name('admin.modal'); // モーダルウィンドウ

// 登録画面・ログイン画面のアクションたち
Route::post('/register', [UserController::class, 'store'])->name('admin.dashboard');
Route::post('/login', [UserController::class, 'login'])->name('admin.dashboard');



// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
// 大ビンチ！fortifyでデフォルトルートが表示されなくなってしまった？(/login, /register)
// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
Route::view('/login', 'auth.login');
Route::view('/register', 'auth.register');

// Route::view('/modal', 'layouts.modal');
// Route::view('/modal-2', 'layouts.modal-2');

// Route::post('/admin/search', [AdminController::class, 'search'])->name('admin.search');
// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
// セッション用
// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

// 初期入力画面
Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
// 修正処理
Route::post('/contact/edit', [ContactController::class, 'edit'])->name('contact.edit');
// 保存された状態の入力フォーム
Route::get('/contact/home', [ContactController::class, 'home'])->name('contact.home');
// エラー回避
Route::match(['GET', 'POST'], '/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');


// コントローラのこと：ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
// 制作中はエラー回避のため先に実装しないこと！！！）

// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
// ビュー制作用（単純にブラウザに表示するだけ）
// 上記で同じページへのルーティングが発生したらエラー回避のため下記は消すこと！！！）
Route::view('/modal', 'admin.modal');
// モーダルウィンドウ確認用
// Route::view('/admin/modal', 'admin.new-modal');
// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー


// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
// getContacts：データ取得（ただページを見るだけで作動）
// name('admin.search')がついていることで、ルートを名前でも参照できる
// Route::match(['GET', 'POST'], '/admin/search', [AdminController::class, 'search'])->name('admin.search');


// エラーコード：ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
// 通常のコントローラと競合しないルートを考える
// そもそも保存できない仕組みだから保存できなくてエラーになる・・・？
// The POST method is not supported for this route. Supported methods: GET, HEAD.
// fortifyによるユーザー認証でルーティングが通るのでコントローラ設定は不要
// fortifyと競合してしまうため、ルーティングの方だけ/login, /register関連は削除しておく
// ルート::get('/login', [AuthController::class, 'showLoginForm']);
// ルート::get('/register', [AuthController::class, 'showRegisterForm']);
// ->with('success', '新規ユーザーが登録されました');

// Route::get('/session', [SessionController::class, 'getSes']);
// Route::post('/session', [SessionController::class, 'postSes']);

// 修正ボタン押すときデータを保存
// Route::post('/edit-session', [ContactController::class, 'edit'])->name('contact.edit');

// 入力フォームへ遷移（名前変更で衝突防止）
// Route::get('/edit', [ContactController::class, 'editForm'])->name('contact.editForm');

// Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');

// 登録画面で新規登録してusersテーブルに登録したい・・・
// Route::post('/register', [UserController::class, 'store'])->name('go.to.dashboard');
// Route::get('/dashboard', [AdminController::class, 'getContacts']);

