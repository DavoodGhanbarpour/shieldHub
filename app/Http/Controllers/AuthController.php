<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(AuthenticateRequest $request)
    {
        $remember = $request->get('remember') ?? false;

        if (Auth::attempt($request->validated(),$remember)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
        // TODO need a way to return a global format
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login');
    }
}
