<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user()->user_role->role->name;
        if ($user == 'admin') {
            return view('pages.admin.index');
        } elseif ($user == 'guru') {
            return view('pages.guru.index');
        } elseif ($user == 'siswa') {
            return view('pages.siswa.index');
        }
    }
}
