<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|unique:category|max:255',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Trường name không được để trống',
            'name.unique' => 'Trường name không được trùng',
            'description.required' => 'Mô tả danh mục không được để trống',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên danh mục',
            'description' => 'Mô tả danh mục',
        ];
    }
}
