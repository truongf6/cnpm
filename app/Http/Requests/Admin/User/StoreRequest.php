<?php

namespace App\Http\Requests\Admin\User;

use App\Models\User;
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
            'username' => [
                'required',
                Rule::unique(User::class, 'username')
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
            'unique' => ':attribute đã được sử dụng.',
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'Tên đăng nhập',
            'password' => 'Mật khẩu',
            'fullname' => 'Họ tên',
            'address' => 'Địa chỉ',
            'phone' => 'SĐT',
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

        if ($this->has('admin')) {
            $this->merge(['admin'=> '1']);
        } else {
            $this->merge(['admin'=> '0']);
        }
    }
}
