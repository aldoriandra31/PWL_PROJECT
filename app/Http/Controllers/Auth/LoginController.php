<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $crendentials = $request->only('email', 'password');
        if (auth()->attempt($crendentials)) {
            return redirect()->route('home');
        }

        throw ValidationException::withMessages([
            'email' => ['The email or password you entered is incorrect.'],
        ]);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
