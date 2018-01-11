<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatAddRequest extends FormRequest
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
            'name' =>'required|unique:job_categories,name',
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>'Bạn phải nhập tên danh mục',
            'name.unique' =>'Danh mục đã tồn tại',
        ];
    }
}
