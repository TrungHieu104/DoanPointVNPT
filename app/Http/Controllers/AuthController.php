<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\changePwRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPwMail;
use App\Models\CoQuan;
use App\Models\Email_Verification as EmailVerification;


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
        $old_password = $request['password'] ?? null;
        $new_password = $request['newpassword'];

        $user_logined = session()->has('email') ? session()->get('email') : Auth::user();

        // Check user logged in
        // $user_logined = Auth::user();
        if (Auth::check())
            $user = User::find($user_logined->id);
        else
            $user = User::where('email', $user_logined)->first();

        if ($old_password == null) {
            $user->update([
                'password' => Hash::make($new_password),
            ]);
            $isSuccess = true;
        } else {
            if (Hash::check($old_password, $user->password)) {
                $user->update([
                    'password' => Hash::make($new_password),
                ]);
                $isSuccess = true;
            } else {
                $isSuccess = false;
                return redirect()->back()->with('error_old_pass', ['message' => 'Mật khẩu cũ không đúng']);
            }
        }

        if ($isSuccess) {
            Session::flash('alert', ['type' => 'success', 'message' => 'Đổi mật khẩu thành công !']);
        } else {
            Session::flash('alert', ['type' => 'error', 'message' => 'Đổi mật khẩu thất bại !']);
        }

        session()->forget('email');
        if (!Auth::check())
            return redirect()->route('login');

        if (Auth::check() && Auth::user()->role == 1) {
            return redirect('/dashboard');
        } else {
            return redirect('/');
        }
    }
    public function forgotPassword()
    {
        return view('forgotPassword');
    }
    public function forgotPassword_(Request $request)
    {
        $email_db = User::where('email', $request['email'])->first();
        if (!$email_db) {
            Session::flash('alert', ['type' => 'error', 'message' => 'Không tồn tại email này !']);
            return back();
        }
        $this->sendOTP($email_db);
        Session::flash('alert', [
            'type' => 'success',
            'message' => 'Đã gửi OTP xác nhận',
            'text' => 'Hãy kiểm tra email',
        ]);
        return $this->verifiedOTP($email_db);
    }
    protected function sendOTP($email_db = null)
    {
        $otp = rand(100000, 999999);
        $time = time();
        EmailVerification::updateOrCreate(
            ['email' => $email_db->email],
            [
                'email' => $email_db->email,
                'otp' => $otp,
                'created_at' => Now(),
                'updated_at' => Now(),
            ]
        );
        Mail::to($email_db->email)
            ->send(new ForgotPwMail($otp));
    }
    protected function resendOTP(Request $request)
    {
        $email = $request['email'];
        $otp = rand(100000, 999999);
        EmailVerification::updateOrCreate(
            ['email' => $email],
            [
                'email' => $email,
                'otp' => $otp,
                'created_at' => Now(),
                'updated_at' => Now(),
            ]
        );
        Mail::to($email)
            ->send(new ForgotPwMail($otp));
        Session::flash('alert', ['type' => 'success', 'message' => 'Đã gửi lại mã OTP']);
        return $this->verifiedOTP($email);
    }
    protected function verifiedOTP($email_db = null)
    {
        $email = $email_db->email ?? $email_db;
        $check = EmailVerification::where('email', $email)->first();
        if (!$check)
            return redirect()->route('login');
        // Tách email thành mảng
        $split_email = explode("@", $email);

        // Lấy phần tên người dùng
        $username = array_shift($split_email);

        // Lấy phần miền
        $domain = array_pop($split_email);

        // Mã hóa phần tên người dùng
        $encoded_email = substr($username, 0, 1) . str_repeat("*", strlen($username) - 2) . substr($username, -1) . '@' . $domain;

        return view('confirmOTP', compact('encoded_email', 'email'));
    }
    protected function verifiedOTP_(Request $request)
    {
        $otp = $request['otp1'] . $request['otp2'] . $request['otp3'] . $request['otp4'] . $request['otp5'] . $request['otp6'];
        $email = $request['email'];

        $otpData = EmailVerification::where('otp', $otp)->first();
        if (!$otpData) {
            Session::flash('alert', [
                'type' => 'warning',
                'message' => 'OTP sai',
            ]);
            return $this->verifiedOTP($email);
        } else {
            $otp = EmailVerification::where('email', $email)->first();
            $otp->delete();
            $request->session()->put('email', $email);
            // return $this->changePassword();
            return redirect()->route('changePassword');
        }
    }

    public function register()
    {
        $coquan = CoQuan::all();
        return view("register", compact('coquan'));
    }
    public function register_(RegisterRequest $request)
    {
        $user = new User;
        $user->ten = $request['name'];
        $user->phone = $request['phone'];
        $user->email = $request['email'];
        $user->password = $request['password'];
        $user->id_CQ = $request['id_CQ'];
        $user->save();
        Session::flash('alert', ['type' => 'success', 'message' => 'Đăng ký tài khoản thành công']);
        return redirect()->route('login');
    }

}