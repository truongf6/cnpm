<?php

namespace App\Http\Requests\Admin\Category;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'isActive' => [
            ]
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được trống.',
            'unique' => ':attribute đã được sử dụng.',
            'boolean' => ':attribute chỉ nhận giá trị true/false.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên danh mục',
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
