<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'repassword' => 'same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Không được để trống tên hiển thị',
            'username.required' => 'Không được để trống tên đăng nhập',
            'username.unique' => 'Tên đăng nhập đã được sử dụng',
            'email.required' => 'Không được để trống email',
            'email.unique' => 'email đã được sử dụng',
            'email.email' => 'Chưa đúng định dạng email',
            'password.required' => 'Không được để trống mật khẩu',
            'repassword.same' => 'Mật khẩu nhập lại chưa khớp',
        ];
    }
}
