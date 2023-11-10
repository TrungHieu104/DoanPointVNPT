<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class changePwRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            // 'password' => 'required',
            'newpassword' => 'required|min:6',
            're_newpassword' => 'required|min:6|same:newpassword',
        ];
    }
    public function messages() {
        return [
        //  'password.required' => 'Không được bỏ trống',
        //  'password.min' => 'Nhập ít nhất 6 ký tự',
         'newpassword.required' => 'Bạn chưa nhập mật khẩu',
         'newpassword.min' => 'Mật khẩu từ 6 ký tự trở lên',
         're_newpassword.required' => 'Bạn chưa nhập lại mật khẩu',
         're_newpassword.min' => 'Mật khẩu nhập lại cùng từ 6 ký tự trở lên',
         're_newpassword.same' => 'Mật khẩu nhập lại không khớp',
       ];
    }
}
