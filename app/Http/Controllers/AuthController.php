<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\changePwRequest;



class AuthController extends Controller
{
    //
    function login()
    {
        return view("login");
    }

    function login_(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember') ? true : false;

        $guard = auth()->guard('web');

        if ($guard->attempt($credentials, $remember)) {
            $user = $guard->user();

            if ($user->role == 1)
                return redirect('/dashboard');
            else
                return redirect('/');
        } else {
            return back()->with('thongbao', 'Email hoặc mật khẩu không đúng');
        }
    }

    function logout()
    {
        auth()->guard('web')->logout();
        return redirect('/login')->with('thongbao', 'Đăng xuất thành công');
    }

    public function changePassword()
    {
        return view('changePassword');
    }
    public function changePassword_(changePwRequest $request)
    {
        $isSuccess = false;

        // Data get from request form
        $old_password = $request['password'];
        $new_password = $request['newpassword'];

        // Check user logged in
        $user_logined = Auth::user();

        $user = User::find($user_logined->id);

        if (Hash::check($old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($new_password),
            ]);
            $isSuccess = true;
        } else {
            $isSuccess = false;
        }

        if ($isSuccess) {
            Session::flash('alert', ['type' => 'success', 'message' => 'Đổi mật khẩu thành công !']);
        } else {
            Session::flash('alert', ['type' => 'error', 'message' => 'Đổi mật khẩu thất bại !']);
        }

        if (Auth::user()->role == 1) {
            return redirect('/dashboard');
        } else {
            return redirect('/');
        }
    }

}