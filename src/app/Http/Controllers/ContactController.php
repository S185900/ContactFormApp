<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function create()
    {
        return view('contact.home');
    }

    public function confirm(Request $request)
    {
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


    public function thanks()
    {
        return view('contact.thanks');
    }

}