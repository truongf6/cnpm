<?php

namespace App\Http\Requests\Admin\Slider;

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
            'subheading' => [
                'required'
            ],
            'heading' => [
                'required'
            ],
            'content' => [
                'required'
            ],
            'background' => [
                'required'
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
            'subheading' => 'Tiêu đề phụ',
            'heading' => 'Tiêu đề',
            'content' => 'Nội dung',
            'background' => 'Ảnh nền',
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
