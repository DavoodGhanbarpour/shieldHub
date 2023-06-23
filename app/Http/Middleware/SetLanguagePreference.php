<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SetLanguagePreference
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            App::setLocale(Auth::user()->locale);
        }

        if (in_array($request->route()->locale, array_column(User::SUPPORTED_LANGUAGES, 'key'))) {
            App::setLocale($request->route()->locale);
        }

        return $next($request);
    }
}
