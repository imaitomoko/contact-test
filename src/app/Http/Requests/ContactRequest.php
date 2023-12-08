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
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => ['required', 'email'],
            'zip11' => ['required', 'regex:/^[0-9]{3}-[0-9]{4}$/'],
            'addr11' => 'required',
            'building' => 'nullable',
            'opinion' => ['required', 'max:120'],
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '名字を入力してください',
            'first_name.required' => '名前を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレス形式で入力してください',
            'zip11.required' => '郵便番号を入力してください',
            'zip11.regex:/^[0-9]{3}-[0-9]{4}$/' => 'ハイフンありの８桁の数値で入力してください',
            'addr11.required' => '住所を入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.max'=> 'ご意見を120文字以内で入力してください',
        ];
    }
}
