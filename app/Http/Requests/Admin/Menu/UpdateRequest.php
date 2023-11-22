<?php

namespace App\Http\Requests\Admin\Menu;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'route' => [
                'required'
            ],
            'order' => [
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
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên danh mục',
            'route' => 'Đường dẫn',
            'order' => 'Thứ tự',
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
