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

    // fortifyがあるから不要だけど、将来的に何か特別処理したい時のため
    // fortifyと競合してしまうため、ルーティングの方だけ/login, /register関連は削除しておく

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
