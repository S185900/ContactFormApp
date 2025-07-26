<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;



Route::get('/', [ContactController::class, 'create']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']); // 動作だけでビューなし
Route::get('/thanks', [ContactController::class, 'thanks']);
Route::get('/', [ContactController::class, 'create'])->name('back.to.contact.home');

// 管理画面にデータ取得
Route::get('/dashboard', [AdminController::class, 'getContacts']);


Route::view('/dashboard', 'admin.dashboard');

Route::view('/login', 'auth.login');

Route::view('/register', 'auth.register');

