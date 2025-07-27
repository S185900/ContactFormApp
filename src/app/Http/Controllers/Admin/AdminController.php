<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AdminController extends Controller
{

// Contactsテーブル（データベースから取得・Eloquentのallメソッド）
    public function getContacts()
    {

        // $contacts = Contact::all();
        $contacts = Contact::paginate(7);


        $categoryNames = [
            1 => '商品のお届けについて',
            2 => '商品の交換について',
            3 => '商品トラブル',
            4 => 'ショップへのお問い合わせ',
            5 => 'その他',
        ];

        foreach ($contacts as &$contact) {
            $contact['category_name'] = $categoryNames[$contact['category_id']] ?? '未定義カテゴリ';
        }

        // categories も定義するために追加
        // 'category_name'わかりやすく入れておくと良いらしい
        $categories = [
            ['category_id' => 1, 'category_name' => '商品のお届けについて'],
            ['category_id' => 2, 'category_name' => '商品の交換について'],
            ['category_id' => 3, 'category_name' => '商品トラブル'],
            ['category_id' => 4, 'category_name' => 'ショップへのお問い合わせ'],
            ['category_id' => 5, 'category_name' => 'その他'],
        ];

        // ２つとも渡さないといけない
        return view('admin.admin', [
            'contacts' => $contacts,
            'categories' => $categories
        ]);

        // return view('admin', ['contacts' => $contacts]);
    }

    public function search(ContactRequest $request)
    {

        // dd($request->all());
        // dd('Start'); // 開始時点でデバッグ
        

        $categories = Category::all();

        // dd($categories);

        // Contactモデルのレコードとそれに紐づくcategoryテーブルのレコードを取得
        // なぜか小文字で始めないとエラー
        $contacts = Contact::with('category')
            ->categorySearch($request->category_id)
            ->keywordSearch($request->keyword)
            ->get();

        

        

        // カテゴリー名の定義
        $categories = [
            ['category_id' => 1, 'category_name' => '商品のお届けについて'],
            ['category_id' => 2, 'category_name' => '商品の交換について'],
            ['category_id' => 3, 'category_name' => '商品トラブル'],
            ['category_id' => 4, 'category_name' => 'ショップへのお問い合わせ'],
            ['category_id' => 5, 'category_name' => 'その他'],
        ];

        return view('admin.search', compact('contacts', 'categories'));
    }


}
