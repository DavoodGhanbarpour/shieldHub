<?php

namespace App\Http\Controllers\Admin;

use App\Facades\UserFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AssignInboundsRequest;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Http\Resources\Admin\UserInboundsResource;
use App\Http\Resources\Admin\UserResource;
use App\Models\Inbound;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request): RedirectResponse
    {
        UserFacade::upsert($request->validated());

        return redirect()->route('admin.users.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.users.index', [
            'users' => UserResource::collection(User::withCount('inbounds')->get()),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): UserResource
    {
        return UserResource::make(User::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return view('admin.pages.users.edit', [
            'user' => UserResource::make(User::findOrFail($id)),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        if (UserFacade::isEmailUnique($request->get('email'), [$user->email])) {
            return back()->withErrors([
                __('validation.exists', ['attribute' => $request->get('email')]),
            ]);
        }

        $inputs = $request->validated();
        if (! isset($inputs['password'])) {
            unset($inputs['password']);
        }

        UserFacade::upsert($inputs, $user->id);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        UserFacade::delete($id);

        return redirect()->route('admin.users.index');
    }

    public function inbounds(User $user)
    {
        $result = [];
        $userInboundsID = array_column(collect($user->inbounds)->toArray(), 'id');
        foreach (Inbound::withCount('users')->get() as $key => $each) {
            $result[$key] = $each;
            $result[$key]['isUsing'] = in_array($each->id, $userInboundsID);
        }

        return view('admin.pages.users.inbounds', [
            'user' => $user,
            'inbounds' => UserInboundsResource::collection(
                collect($result)->sortBy('isUsing', SORT_REGULAR, true)
            ),
        ]);
    }

    public function assignInbounds(AssignInboundsRequest $request, User $user): RedirectResponse
    {
        $user->inbounds()->sync($request->get('inbounds'));

        return redirect()->route('admin.users.index');
    }
}
