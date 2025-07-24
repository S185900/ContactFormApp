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



Route::get('/confirm', [ContactController::class, 'con']);

