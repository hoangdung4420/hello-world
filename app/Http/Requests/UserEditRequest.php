<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
class UserEditRequest extends FormRequest
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
            'email' =>'required',
            'phone' => 'required',
            'birthday' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' =>'Bạn phải nhập họ tên',
            'email.required' =>'Bạn phải nhập email',
            'phone.required' => 'Bạn phải nhập số điện thoại',
            'birthday.required' => 'Bạn phải nhập ngày sinh',
            'address.required' => 'Bạn phải nhập địa chỉ',
        ];
    }
}
