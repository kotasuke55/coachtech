<?php

namespace App\Http\Requests;
use App\Http\Requests\Japanese_zip;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == '/') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'postcode' => 'required|min:8|max:8|regex:/^([0-9]{3})(-[0-9]{4})?$/i',
            'address' => 'required',
            'opinion' => 'required|max:120'
        ];
    }
    public function messages()
    {
       return [
        'fullname.required' => '名前を入力してください',
        'gender.required' => '性別を選んでください',
        'email.required' => 'メールアドレスを入力してください',
        'email.email' => 'メールアドレスの形式で入力してください',
        'postcode.required' => '郵便番号を入力してください',
        'postcode.min' => '郵便番号はハイフンを含む8文字で入力してください',
        'postcode.max' => '郵便番号はハイフンを含む8文字で入力してください',
        'postcode.regex' => '郵便番号はハイフンを含む8文字で入力してください',
        'address.required' => '住所を入力してください',
        'opinion.required' => 'ご意見を入力してください',
        'opinion.max' => 'ご意見は120文字以内で入力してください'
       ];
        
    }
}
