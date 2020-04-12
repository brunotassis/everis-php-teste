<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(){
        // Code...
    }

    public function index()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            Auth::attempt($credentials);
            return redirect('/chamados');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
