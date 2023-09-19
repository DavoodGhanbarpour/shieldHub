<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(AuthenticateRequest $request, string $locale): RedirectResponse
    {
        $credentials = ['email' => $request->input('email'), 'password' => $request->input('password')];
        $callable = function (User $user) {
            return !$user->isDisabled();
        };
        if (Auth::attemptWhen($credentials, $callable, $request->get('remember') ?? false)) {
            request()->session()->regenerate();
            $user = auth()->user();
            $user->setLocale($locale);
            $user->updateVisitTime();
            $user->visit();

            if ($user->isAdmin()) {
                return redirect()->route('admin.home');
            }

            return redirect()->route('customer.home');
        }
        visitor()->setVisitor(null)->visit();
        // TODO need a way to return a global format
        return back()->withErrors([__('auth.failed')]);
    }

    public function logout(Request $request): RedirectResponse
    {
        $locale = auth()->user()->locale;
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login', [$locale]);
    }
}
