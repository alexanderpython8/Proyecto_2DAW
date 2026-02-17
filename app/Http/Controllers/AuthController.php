<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin() {
        return view('inicio_sesion');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Intento de Login (Sustituye a tu SELECT SQL y password_verify)
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('panel'); // Redirige al panel
        }

        // Si falla el login
        return back()->withErrors([
            'email' => 'El email o la contraseña no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }
}
