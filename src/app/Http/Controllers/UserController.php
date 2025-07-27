<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 登録画面からの管理画面へ遷移
    public function store(UserRequest $request)
    {

        // ユーザー情報取得
        $userData = $request->only(['name', 'email', 'password']);

        // dd($request->all());

        // パスワード暗号化(255文字までってなってたから・・・bcryptで暗号化？)
        $userData['password'] = bcrypt($userData['password']);

        // ユーザーの作成
        $user = User::create($userData);

        // これでもデバッグチェックできる
        // \Log::info('Request Data:', $request->all());

        // ユーザーをログイン状態にする？とりあえず？？このまま管理画面に行くから・・・
        Auth::login($user);

        // ダッシュボードに遷移する
        return redirect()->route('admin.dashboard');

        // 「管理画面にアクセスできる新規ユーザーを作成」とは・・・？管理画面へリダイレクトでOK？
        // 架空のユーザーをダミーで登録してあげたらいいのか？
        // ->with('success', '新規管理者が登録されました。ログインしました。');

    }

    // ログインからの管理画面への遷移
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard')->with('success', 'ログインしました！');
        } else {
            return redirect()->back()
                ->withErrors(['email' => 'ログインに失敗しました。メールアドレスまたはパスワードが間違っています。'])
                ->withInput();
        }
    }

    // public function dashboard()
    // {
    //     $contacts = Contact::paginate(7);
    //     return view('admin.dashboard');
    //     return view('admin.dashboard', compact('contacts'));
    // }





}