<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(AuthenticateRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
        // TODO need a way to return a global format
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
