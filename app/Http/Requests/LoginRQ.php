<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRQ extends FormRequest
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
            'admin_email' => 'required|email',
            'admin_password' => 'required|min:6',
        ];
    }
    public function messages()
    {
        return [
            'admin_email.required' => '- Vui lòng nhập email',
            'admin_email.email' => '- Vui lòng nhập đúng định dạng email',
            'admin_password.required' => '- Vui lòng nhập password',
            'admin_password.min' => '- Mật khẩu có độ dài tối thiểu 8 kí tự',
        ];
    }
}
