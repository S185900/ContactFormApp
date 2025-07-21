<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories'; // テーブル名
    protected $fillable = ['content']; // 操作可能なカラム


    // ------------ メモ ------------
    // contactsテーブルとのリレーション
    // リレーションメソッド名 → 複数形（hasMany：1対Nのリレーション）

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'category_id');
    }
}
