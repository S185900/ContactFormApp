<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


// Userを２回定義してはいけない！！！！！！エラーの原因。
// use Illuminate\Foundation\Auth\User as Authenticatable; // エラーになった箇所の解決法？
// User クラスが Illuminate\Foundation\Auth\User を継承しているようにしておく必要がある？


class User extends Authenticatable // 継承しているから、これだけでいい。
{
    use HasFactory;

    protected $table = 'users'; // テーブル名
    protected $fillable = ['name', 'email', 'password'];
}

// 下記は削除しておく。
// class User extends Model
// {
//     use HasFactory;

//     protected $table = 'users'; // テーブル名
//     protected $fillable = [
//         'name',
//         'email',
//         'password'
//     ];


// }


