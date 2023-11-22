<?php

namespace App\Http\Requests\Client\Login;

use Illuminate\Foundation\Http\FormRequest;

class ProcessLoginRequest extends FormRequest
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
                'required'
            ],
            'password' => [
                'required'
            ]
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được trống',
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'Tài khoản',
            'password' => 'Mật khẩu',
        ];
    }
}
