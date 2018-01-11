<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
class UserAddRequest extends FormRequest
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
            'fullname' =>'required',
            'email' =>'required|unique:users,email',
            'password' => 'required',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' =>'Bạn phải nhập họ tên',
            'email.required' =>'Bạn phải nhập email',
            'email.unique' =>'Email đã tồn tại',
            'password.required' => 'Bạn phải nhập mật khẩu',
            'phone.required' => 'Bạn phải nhập số điện thoại',
        ];
    }
}
