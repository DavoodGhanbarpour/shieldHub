<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(AuthenticateRequest $request): RedirectResponse
    {
        $remember = $request->get('remember') ?? false;

        if (Auth::attempt($request->validated(), $remember)) {
            $request->session()->regenerate();
            if( \auth()->user()->role == User::ADMIN )
                return redirect()->route('admin.home');

            return redirect()->route('customer.home');
        }
        // TODO need a way to return a global format
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
