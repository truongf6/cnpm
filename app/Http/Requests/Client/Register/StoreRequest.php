<?php

namespace App\Http\Requests\Client\Register;

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
            'username' => [
                'required',
            ],
            'password' => [
                'required'
            ],
            'fullname' => [
                'required'
            ],
            'address' => [
                'required'
            ],
            'phone' => [
                'required'
            ],
            'email' => [
                'required'
            ],
            'admin' => [
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
            'fullname' => 'Tên',
            'username' => 'Tài khoản',
            'password' => 'Mật khẩu',
            'address' => 'Địa chỉ',
            'phone' => 'Số điện thoại',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge(['isActive'=> '1']);
        $this->merge(['admin'=> '0']);
    }
}
