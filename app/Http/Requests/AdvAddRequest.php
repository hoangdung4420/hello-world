<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvAddRequest extends FormRequest
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
            'name' =>'required',
            'link' =>'required',
            'picture' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>'Bạn phải nhập tên quảng cáo',
            'link.required' =>'Bạn phải nhập link',
            'picture.required' => 'Bạn phải nhập hình ảnh'
        ];
    }
}
