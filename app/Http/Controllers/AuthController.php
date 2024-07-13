<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('user.login');
    }

    public function loginSubmit(Request $request)
    {
        $validator = validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return back();
        }

        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt([
            'email' => $email,
            'password' => $password,
        ])) {
            $user = User::where('email', $email)->first();
            Auth::login($user);
            return redirect()->route('home');
        }
        return back();
    }

    public function signup()
    {
        return view('user.signup');
    }

    public function signUp_Submit(UserRequest $request)
    {
        $password = $request->input('password');
        $confirmPassword = $request->input('confirmPassword');

        if ($password == $confirmPassword) {
            $user =  User::create($request->validated());
            Auth::login($user);
            return redirect()->route('home');
        }
        return back()->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }
}
