<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'name' => ['required','min:6', 'max:50'],
            'email' => ['required', 'email', 'unique:users,email'],
            // 'email' => ['required', 'email', 'ends_with:@gmail.com', Rule::unique('users', 'email')->ignore(request()->id, 'user_id')],
            'phone' => 'required|min:9|max:11',
            'password' => 'required|min:6',
            'repassword' => 'required|min:6|same:password',
        ];
    }
    public function messages()
    {
        return [
            //  'password.required' => 'Không được bỏ trống',
            //  'password.min' => 'Nhập ít nhất 6 ký tự',
            'name.required' => 'Bạn chưa nhập họ tên',
            'name.max' => 'Tên từ 6 ký tự trở lên',
            'name.min' => 'Tên từ 6 - 50 ký tự',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.max' => 'Số điện thoại từ 9-11 số',
            'phone.min' => 'Số điện thoại từ 9-11 số',
            'email.required' => 'Bạn chưa nhập email',
            'email.unique' => "Email đã được đăng ký!",
            'email.email' => 'Email nhập không đúng định dạng!',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu từ 6 ký tự trở lên',
            'repassword.required' => 'Bạn chưa nhập lại mật khẩu',
            'repassword.min' => 'Mật khẩu nhập lại từ 6 ký tự trở lên',
            'repassword.same' => 'Mật khẩu nhập lại không khớp',
        ];
    }
}
