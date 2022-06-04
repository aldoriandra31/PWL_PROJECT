<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store(RegisterRequest $request)
    {
        User::create($request->all());
        return redirect()->route('login')->with('status', 'Akun anda berhasil dibuat. Silahkan login.');
    }
}
