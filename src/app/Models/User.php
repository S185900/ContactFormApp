<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users'; // テーブル名
    protected $fillable = ['name', 'email', 'password']; // 操作可能なカラム
    // protected $hidden = ['password']; // 隠したいカラム？
}
