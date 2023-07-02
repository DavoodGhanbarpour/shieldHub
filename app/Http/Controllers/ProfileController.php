<?php

namespace App\Http\Controllers;

use App\Facades\UserFacade;
use App\Http\Requests\ChangeUserLocaleRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    public function changeLocale(ChangeUserLocaleRequest $request, User $user): RedirectResponse
    {
        UserFacade::upsert($request->validated(), $user->id);

        return back();
    }
}
