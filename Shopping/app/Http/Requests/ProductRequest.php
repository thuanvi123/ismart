<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>'required|unique:products|string|max:255',
            'code'=>'required|string:max:255',
            'contens'=>'required',
            'description'=>'required',
            'price'=>'required|regex:/^\d{1,13}(\.\d{1,4})?$/',
            'total'=>'required',
//            'feature_image'=>'required|mimes:jpg,jpeg,gif,png|max:10000',
//            'image'=>'required|mimes:jpg,jpeg,gif,png|max:10000',
            'cat_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'code.required' => 'code không được để trống',
            'name.unique' => 'Tên sản phẩm không được trùng',
            'description.required' => 'Mô tả không được để trống',
            'price.required' => 'giá sản phẩm không được để trống',
            'total.required' => 'Số lượng sản phẩm không được để trống',
            'feature_image.required' => 'ảnh đại diện không được để trống',
            'image.required' => 'ảnh chi tiết không được để trống',
            'contens.required' => 'Mô tả chi tiết sản phẩm không được để trống',
            'cat_id.required' => 'Danh mục không được để trống',
        ];
    }
}
