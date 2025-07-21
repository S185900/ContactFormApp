<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts'; // テーブル名
    protected $fillable = [ // 操作可能なカラム
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail'
    ];

    // ビューでgenderを日本語で表示するためのアクセサ
    protected $appends = ['gender_text'];
    public function getGenderTextAttribute()
    {
        switch ($this->gender) {
            case 1:
                return '男性';
            case 2:
                return '女性';
            case 3:
                return 'その他';
        }
    }

    // ------------ メモ ------------
    // categoriesテーブルとのリレーション
    // リレーションメソッド名 → 単数形（belongsTo：1対1のリレーション）

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
