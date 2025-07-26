<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    // 入力フォーム表示のみ
    public function create()
    {
        return view('contact.home');
    }


    // バリデーション
    public function confirm(ContactRequest $request)
    {

        // dd($request->all());

        // フォームリクエストの結果をそのまま利用
        $contact = $request->all(); // validated()は使用しない

        // dd($request->validated());

        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'address',
            'building',
            'category_id',
            'detail'
        ]);

        $contact['tel'] = $request->input('tel.part1') . '-' . $request->input('tel.part2') . '-' . $request->input('tel.part3');
        $contact['name'] = $request->input('last_name') . ' ' . $request->input('first_name');

        $genderNames = [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ];

        $contact['gender_name'] = $genderNames[$contact['gender']] ?? '未設定';

        $categoryNames = [
            1 => '商品のお届けについて',
            2 => '商品の交換について',
            3 => '商品トラブル',
            4 => 'ショップへのお問い合わせ',
            5 => 'その他',
        ];

        $contact['category_name'] = $categoryNames[$contact['category_id']] ?? '未分類';

        // dd($request->input('tel'));

        // dd($contact);

        return view('contact.confirm', compact('contact'));
    }


    // 送信ボタンのクリック時に行われる処理
    public function store(Request $request)
    {
        // ダメもとで上とは逆にしてみる・・・・いけた。flipはエラーになったから使うのやめとく
        $genderNames = [
        '男性' => 1,
        '女性' => 2,
        'その他' => 3,
        ];

        $categoryNames = [
        '商品のお届けについて' => 1,
        '商品の交換について' => 2,
        '商品トラブル' => 3,
        'ショップへのお問い合わせ' => 4,
        'その他' => 5,
        ];

        $contact = $request->only([
            'first_name',
            'last_name',
            'email',
            'tel',
            'address',
            'building',
            'detail'
        ]);

        // 入力データから文字列→数値へ変換
        $contact['gender'] = $genderNames[$request->input('gender')] ?? 0;
        $contact['category_id'] = $categoryNames[$request->input('category_id')] ?? 0;


        // 氏名を保存時に別々に分割
        $fullName = $request->input('name');
        $nameParts = explode(' ', $fullName); // スペースで分割
        $contact['last_name'] = $nameParts[0] ?? ''; // 姓
        $contact['first_name'] = $nameParts[1] ?? ''; // 名

        // dd($contact);

        // dd($request->input());

        Contact::create($contact);

        return redirect('thanks');
    }

    public function thanks()
    {
        return view('contact.thanks');
    }

}



