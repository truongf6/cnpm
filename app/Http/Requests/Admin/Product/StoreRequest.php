<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => [
                'required'
            ],
            'image' => [
                'required'
            ],
            'price' => [
                'required'
            ],
            'description' => [
                'required'
            ],
            'category_id' => [

            ],
            'isActive' => [

            ],
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được trống.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'image' => 'Ảnh',
            'price' => 'Giá',
            'description' => 'Mô tả',
            'isActive' => 'Trạng thái',
        ];
    }

    public function prepareForValidation()
    {
        if ($this->has('isActive')) {
            $this->merge(['isActive'=> '1']);
        } else {
            $this->merge(['isActive'=> '0']);
        }
    }
}
