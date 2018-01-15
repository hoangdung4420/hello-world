<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
class ContactAddRequest extends FormRequest
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
            'subject' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' =>'Bạn phải nhập họ tên',
            'email.required' =>'Bạn phải nhập email',
            'subject.required' => 'Bạn phải nhập chủ đề mail',
            'content.required' => 'Bạn phải nhập nội dung mail',
        ];
    }
}
