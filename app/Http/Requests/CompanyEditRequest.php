<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyEditRequest extends FormRequest
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
            'preview' =>'required',
            'detail' =>'required',
            'size' => 'required',
            'benifit' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'preview.required' =>'Bạn phải nhập mô tả',
            'detail.required' =>'Bạn phải nhập chi tiết',
            'size.required' => 'Bạn phải nhập quy mô công ty',
            'benifit.required' => 'phúc lợi của công ty',
        ];
    }
}
