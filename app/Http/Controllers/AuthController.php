<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserCreateRequest;
use App\Models\ForgotPassword;

class AuthController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function login2()
    {
        return view('login2');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role_id == 1) {
                return redirect()->intended('/dashboard-request');
            } else {
                return redirect()->intended('/registration');
            }
        }

        if (!Auth::attempt($credentials)) {
            Session::flash('status', 'failed');
            Session::flash('message', 'Email atau Password tidak sesuai');
            return redirect()->intended('/login');
        }
    }

    public function authenticating2(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role_id == 1) {
                return redirect()->intended('/dashboard-request');
            } else {
                return redirect()->intended('/landing-page-after');
            }
        }

        if (!Auth::attempt($credentials)) {
            Session::flash('status', 'failed');
            Session::flash('message', 'Email atau Password tidak sesuai');
            return redirect()->intended('/login2');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // 
    public function register()
    {
        return view('/register');
    }

    public function store(UserCreateRequest $request)
    {
        $user = User::create($request->all());
        if ($user) {
            Session::flash('registerStatus', 'success');
            Session::flash('registerMessages', 'Akun Anda Berhasil Dibuat');
        }
        return redirect('/login');
    }

    public function updatePassword(Request $request, $dataId)
    {

        $user = User::findOrFail($dataId);

        $forgot_check = ForgotPassword::where('id_users', $dataId)->first();

        if ($request->password1 == $request->password2) {
            $user->password = $request->password1;
            $user->update();

            $forgot_check->delete();

            $resetSuccess = 1;
            return redirect('/login')->with(['dataResetSuccess' => $resetSuccess]);
        } else {
            $wrongPassword = 1;
            return redirect()->to('/reset-password/' . $forgot_check->id)->with(['dataWrongPassword' => $wrongPassword]);
        }
    }

    public function resetPassword($dataId)
    {

        $forgot_password_where = ForgotPassword::where('id', $dataId)->first();
        $user = User::where('id', $forgot_password_where->id_users)->first();

        return view('/reset-password', ['dataUser' => $user]);
    }

    public function sendOtp()
    {
        return view('/send-otp');
    }

    public function updateOtp(Request $request)
    {

        $rules = [
            'otp' => 'required',
        ];

        $customMessage = [
            'otp.required' => 'Mohon isi kode verifikasi sebelum melanjutkan',
        ];

        $this->validate($request, $rules, $customMessage);

        $forgot_password = ForgotPassword::all();
        $forgot_password_where = ForgotPassword::where('otp', $request->otp)->first();

        foreach ($forgot_password as $data) {
            if ($data->otp == $request->otp) {
                $forgot_password_where->flag = 3;
                $forgot_password_where->update();

                return redirect()->route('reset-password', $forgot_password_where);
            } else {
                $otpFailed = 1;
                return redirect()->route('send-otp')->with(['dataOtpFailed' => $otpFailed]);
            }
        }
    }

    public function forgotPassword()
    {
        return view('/forgot-password');
    }

    public function updateForgotPassword(Request $request)
    {
        $rules = [
            'whatsapp' => 'required',
            'email' => 'required|nullable',
        ];

        $customMessage = [
            'whatsapp.required' => 'Mohon isi no whatsapp anda sebelum melanjutkan',
            'email.required' => 'Mohon isi email anda sebelum melanjutkan',
            'email.nullable' => 'Email tidak terdaftar',
        ];

        $this->validate($request, $rules, $customMessage);

        $users = User::all();

        foreach ($users as $dataUser) {
            if ($dataUser->email == $request->email) {

                $users_where = User::where('email', $request->email)->first();

                $forgot_check = ForgotPassword::where('id_users', $users_where->id)->first();

                if ($forgot_check == null) {
                    $forgot_password = new ForgotPassword;
                    $forgot_password->whatsapp = $request->whatsapp;
                    $forgot_password->flag = 1;
                    foreach ($users as $data) {
                        if ($data->email == $request->email) {
                            $forgot_password->id_users = $data->id;
                        }
                    }
                    $forgot_password->otp = "-";
                    $forgot_password->save();
                    return redirect('/send-otp');
                } else {
                    $forgot_where = ForgotPassword::where('id_users', $users_where->id)->first();
                    $forgot_where->whatsapp = $request->whatsapp;
                    $forgot_where->update();
                    return redirect('/send-otp');
                }
            }
        }

        foreach ($users as $dataUser) {
            if ($dataUser->email != $request->email) {
                $noEmail = 1;
                return redirect()->route('forgot-password')->with(['dataNoEmail' => $noEmail]);
            }
        }
    }
}
