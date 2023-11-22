<?php

namespace App\Http\Requests\Client\Checkout;

use Illuminate\Foundation\Http\FormRequest;

class ProcessRequest extends FormRequest
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
            'fullnameReciver' => [
                'required',
            ],
            'address' => [
                'required',
            ],
            'phone' => [
                'required',
            ],
            'message' => [
            ],
            'totalOrder' => [
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
            'fullnameReciver' => 'Tên người nhận',
            'address' => 'Địa chỉ người nhận',
            'phone' => 'Số điện thoại người nhận',
        ];
    }
}
