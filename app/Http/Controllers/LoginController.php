<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            $role = $user->fk_role_id;

            if ($role == 1) {
                return redirect()->intended('/categories');

            } else if ($role == 2) {
                return redirect()->intended('/my-cover');
            }
        }

        return redirect('login');
    }

    public function logout()
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('session.login');
    }
}
