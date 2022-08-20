<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginAuthRequest;
use App\Http\Requests\Auth\RegisterAuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('register.register');
    }

    public function register(RegisterAuthRequest $request)
    {
        User::create($request->validated()+['organization_id' => 1]);

        return redirect()->route('ecommerce.index');
    }

    public function loginForm()
    {
        return view('register.login');
    }

    public function login(LoginAuthRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            return redirect('/ecommerce');
        }

        return redirect()->back()->with('status', 'Неправильный логин или пароль');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
