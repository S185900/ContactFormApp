<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // ------------ メモ -------------------------------------
    // 操作可能なカラムの指定


    protected $fillable = [
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

   // ------------ メモ -------------------------------------
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

    // ------------ メモ -------------------------------------
    // categoriesテーブルとのリレーション
    // リレーションメソッド名 → 単数形（belongsTo：1対1のリレーション）


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // ------------ メモ -------------------------------------
    // 検索ボタンのところの定義
    // 名前での検索（姓、名、フルネームでの検索が可能）にするには？
    // 名前の空白とかを除去
    // exactMatch：部分一致か完全一致を切り替え？
    // CONCAT(first_name, ' ', last_name)で結合してみる？
    // genderの全てはallで定義
    // contactsテーブルのcreated_atの形式：2025-07-21 12:36:30
    // whereDate：日付部分だけを検索できる


    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }

        if (!empty($created_at)) {
            $query->whereDate('created_at', $created_at);
        }

        if (!empty($gender) && $gender != 'all') {
        $query->where('gender', $gender);
        }
    }


    public function scopeKeywordSearch($query, $email, $first_name, $last_name)
        {
        $name_email_search = trim($name_email_search);

        if (!empty($name_email_search)) {
            $query->where(function ($subQuery) use ($name_email_search, $exactMatch) {
                if ($exactMatch) {
                    // 完全一致の場合
                    $subQuery->whereRaw("CONCAT(first_name, ' ', last_name) = ?", [$name_email_search])
                            ->orWhere('email', $name_email_search);
                            // フルネームの完全一致とメールアドレス
                } else {
                    // 部分一致の場合
                    $subQuery->where('first_name', 'like', '%' . $name_email_search . '%')
                            ->orWhere('last_name', 'like', '%' . $name_email_search . '%')
                            ->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ['%' . $name_email_search . '%'])
                            ->orWhere('email', 'like', '%' . $name_email_search . '%');
                            // 部分一致
                }
            });
        }


    }




    // ------------ ボツ -------------------------------------
    // if (!empty($created_at)) {
    //         $query->whereDate('created_at', $created_at);
    //     }


    // if (!empty($email)) {
    //     // $query->where('email', $email);
    //     $query->where('email', 'like', '%' . $email . '%');
    // }　部分一致のサンプル（Todアプリ中級編の最終ページ）


    // if (!empty($name_email_search) || !empty($email)) {
    //     if (!empty($name)) {
    //         if ($exactMatch) {
    //             $query->where('name', $name);
    //             // 完全一致
    //         } else {
    //             $query->where('name', 'like', '%' . $name . '%');
    //             // 部分一致（教材最終ページ）
    //         }
    //     }

    //     if (!empty($email)) {
    //         if ($exactMatch) {
    //             $query->where('email', $email);
    //             // 完全一致
    //         } else {
    //             $query->where('email', 'like', '%' . $email . '%');
    //             // 部分一致
    //         }
    //     }
    // }


}

