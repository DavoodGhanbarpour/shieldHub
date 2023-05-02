<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateRequest;

class AuthController extends Controller
{
    public function authenticate(AuthenticateRequest $request)
    {
        dd($request->all());
    }
}
