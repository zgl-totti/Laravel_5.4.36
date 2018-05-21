<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginPost extends FormRequest
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
            'username'=>'required',
            'password'=>'required',
            'verify'=>'required'
        ];
    }

    public function messages(){
        return [
            'required'=>':attribute不能为空！',
        ];
    }

    public function attributes(){
        return [
            'username'=>'用户名',
            'password'=>'密码',
            'verify'=>'验证码'
        ];
    }

}
