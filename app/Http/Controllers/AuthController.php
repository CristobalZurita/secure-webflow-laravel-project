<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->generateTwoFactorCode();
            // Aquí deberías enviar el código por correo electrónico al usuario
            return redirect()->route('verify.index')->with('message', 'Por favor, verifica tu código 2FA.');
        }

        throw ValidationException::withMessages([
            'email' => ['Las credenciales proporcionadas son incorrectas.'],
        ]);
    }

    public function showVerifyForm()
    {
        return view('auth.verify-2fa');
    }

    public function verifyTwoFactor(Request $request)
    {
        $request->validate([
            'two_factor_code' => 'required|numeric',
        ]);

        $user = Auth::user();

        if ($request->two_factor_code == $user->two_factor_code) {
            $user->resetTwoFactorCode();
            return redirect()->intended(route('home'));
        }

        return redirect()->back()->withErrors(['two_factor_code' => 'El código 2FA es inválido.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Implementa la lógica de registro aquí
    }

    public function showForgotPasswordForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        // Implementa la lógica de restablecimiento de contraseña aquí
    }
}