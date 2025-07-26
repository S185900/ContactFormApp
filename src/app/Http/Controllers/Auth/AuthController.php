<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// ------------ メモ ------------
// AuthController
// ユーザー登録ページ（auth/register.blade.php）
// ログインページ（auth/login.blade.php）

class AuthController extends Controller
{
    // -------- ログインページ(/login) --------
    public function showLoginForm()
    {
        return view('auth.login');
    }


    // -------- ユーザ登録ページ(/register) --------
    public function showRegisterForm()
    {
        return view('auth.register');
    }
}
