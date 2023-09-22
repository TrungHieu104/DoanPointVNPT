<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

// use Illuminate\Support\Facades\Auth;


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

        if (
            auth()->guard('web')->attempt($credentials)
        ) {
            $user = auth()->guard('web')->user();
            if ($user->role == 1)
                return redirect('/dashboard');
            else
                return redirect('/');
        } else
            return back()->with('thongbao', 'Email, Password không đúng');
    }
    function logout()
    {
        auth()->guard('web')->logout();
        return redirect('/login')->with('thongbao', 'Đăng xuất thành công');
    }
}