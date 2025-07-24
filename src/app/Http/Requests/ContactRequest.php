<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|integer|in:1,2,3', // 1:男性, 2:女性, 3:その他
            'email' => 'required|email|max:255',

            'tel.part1' => 'required|numeric|digits_between:2,5', // 089-333-4444・07-1111-1111・090-4444-3333対応
            'tel.part2' => 'required|numeric|digits_between:2,5', // 089-333-4444・07-1111-1111・090-4444-3333対応
            'tel.part3' => 'required|numeric|digits_between:3,5', // 089-333-4444・07-1111-1111・090-4444-3333対応

            'address' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id', // 外部キー参照
            'detail' => 'required|string|max:120', // 最大120文字
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => '姓を入力してください',
            'last_name.required' => '名を入力してください',

            'gender.required' => '性別を選択してください',
            'gender.in' => '性別の選択が正しくありません',

            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',

            'tel.part1.required' => 'required_tel',
            'tel.part2.required' => 'required_tel',
            'tel.part3.required' => 'required_tel',

            'tel.part1.numeric' => 'invalid_tel',
            'tel.part2.numeric' => 'invalid_tel',
            'tel.part3.numeric' => 'invalid_tel',

            'tel.part1.digits' => 'invalid_tel',
            'tel.part2.digits' => 'invalid_tel',
            'tel.part3.digits' => 'invalid_tel',

            'address.required' => '住所を入力してください',

            'category_id.required' => 'お問い合わせの種類を選択してください',
            'category_id.exists' => '選択したお問い合わせ種類が無効です',

            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ];

    }

}
