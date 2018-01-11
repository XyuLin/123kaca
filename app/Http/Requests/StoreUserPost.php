<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPost extends FormRequest
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
        $id = $this->route('insert'); 
        return [
            'name'  =>  'bail|required|string|max:255',
            'email' =>  'bail|required|string|max:255|unique:users,email,'.$id,
            'password'  =>  'bail|required|string|confirmed',
            'password_confirmation' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'password.min:6'    =>  "密码必须至少为6个字符",
            'password.confirmed'    => "密码不匹配",
            'email.unique'  =>  '邮箱已被注册',
        ];
    }
}
