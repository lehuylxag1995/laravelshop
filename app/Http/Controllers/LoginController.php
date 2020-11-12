<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function viewLogin()
    {
        return view('pages.servers.authentication.login');
    }
    public function authentication(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $rememberMe = $request->input('remember-me') ? true : false;
        if (Auth::attempt($credentials, $rememberMe)) {
            return redirect('admin/dashboard');
        } else {
            return back()->withInput(
                $request->except('password')
            );
        }
    }
}
