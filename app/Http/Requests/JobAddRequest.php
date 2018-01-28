<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class JobAddRequest extends FormRequest
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
            'title' =>'required',
            'address' =>'required',
            
            'expired' => 'required',
            'agency' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'preview' => 'required',
            'required' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' =>'Bạn cần phải nhập tiêu đề' ,
            'address.required' =>'Bạn cần phải nhập địa chỉ',
            
            'expired.required' =>'Bạn cần phải nhập hạn nộp hồ sơ',
            'agency.required' =>'Bạn cần phải nhập tên người liên hệ',
            'email.required' =>'Bạn cần phải nhập email liên hệ',
            'phone.required' =>'Bạn cần phải nhập số điện thoại',
            'preview.required'=>'Bạn cần phải nhập mô tả công việc',
            'required.required' =>'Bạn cần phải nhập yêu cầu công việc',
        ];
    }
}
