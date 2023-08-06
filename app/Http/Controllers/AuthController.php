<?php

namespace App\Http\Controllers;

use App\Facades\AuthFacade;
use App\Facades\UserFacade;
use App\Http\Requests\AuthenticateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(AuthenticateRequest $request, string $locale): RedirectResponse
    {
        $result = AuthFacade::authenticate(
            $request->get('email'),
            $request->get('password'),
            $request->get('remember') ?? false,
        );

        if ($result) {
            $user = auth()->user();
            UserFacade::setLocale($locale, $user->id);
            UserFacade::updateLastVisit($user->id);
            $user->visit();

            if ($user->isAdmin()) {
            return redirect()->route('admin.home');
            }

            return redirect()->route('customer.home');
        }
        visitor()->setVisitor(null)->visit();
        // TODO need a way to return a global format
        return back()->withErrors([
            __('auth.failed'),
        ]);
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
