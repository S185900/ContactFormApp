<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;

// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
// コントローラ用（ビュー制作中はエラー回避のため先に実装しないこと！！！）
// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

// お問い合わせフォームのアクションたち
Route::get('/', [ContactController::class, 'create']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']); // 動作だけでビューなし
Route::get('/thanks', [ContactController::class, 'thanks']);
Route::get('/', [ContactController::class, 'create'])->name('back.to.contact.home');

// 管理画面のアクションたち
// getContacts：データ取得（ただページを見るだけで作動）
Route::get('/dashboard', [AdminController::class, 'getContacts']);

// 登録画面・ログイン画面のアクションたち(fortifyによるユーザー認証たち)
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::get('/register', [AuthController::class, 'showRegisterForm']);


// 多分ログアウト機能やミドルウェアとかは今回不要・・・


// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
// ビュー制作用（単純にブラウザに表示するだけ）
// 上記で同じページへのルーティングが発生したらエラー回避のため下記は消すこと！！！）
// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー


// Route::view('/login', 'auth.login');
// Route::view('/register', 'auth.register');

Route::view('/modal', 'layouts.modal');

