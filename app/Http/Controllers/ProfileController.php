<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeUserLocaleRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    public function changeLocale(ChangeUserLocaleRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());
        return back();
    }
}
