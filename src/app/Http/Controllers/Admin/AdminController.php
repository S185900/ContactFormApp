<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
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

        // 「データ取得後に変換」注意！！！
        // 下記を元のidやナンバーに戻して表示したい時(反対に出したい時)は？
        // 物理的に左右をテレコにすればいいだけだと分かった(一般的なやり方かどうかは不明)
        // ┗ 新しいアクション名の時に！(ここに書いてしまわないように。)

        // コントローラが分かれてれば同じキーの名前でも大丈夫っぽい
        // すでにContactControllerで使っていたけどOK
        $categoryNames = [
            1 => '商品のお届けについて',
            2 => '商品の交換について',
            3 => '商品トラブル',
            4 => 'ショップへのお問い合わせ',
            5 => 'その他',
        ];

        // ContactControllerの時は、シンプルな入力フォームだったからforeach必要なかったけど、
        // 今回みたいに複数のデータを含むコレクション形式の場合はforeachしないと全部変換できない注意！
        foreach ($contacts as &$contact) {
            $contact['category_name'] = $categoryNames[$contact['category_id']] ?? '未定義カテゴリ';
        }

        // （注意！！！）変換作業しただけで終わらないこと。
        // ちゃんとbladeファイルでも上記のキー(表示したい方)を設定してるか最終チェック！！！！


        // dd($contacts);
        // ちょっとトグルが面倒だけど、入力フォームなど丁寧にチェックしたい時にはいいかも
        // コントローラで変換作業が山ほどある時はこっちで丁寧にみると分かりやすい


        // dd($contacts->toJson());
        // デバッグ：データ確認用にtoJsonを出力（たくさんのデータをざっと一気に見たい時にいいかも）


        return view('admin.dashboard', ['contacts' => $contacts]);

    }

}