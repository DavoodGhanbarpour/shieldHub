<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Http\Resources\Admin\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
    public function store(UserStoreRequest $request)
    {
        $inputs = $request->validated();
        if (isset($inputs['password']))
            $inputs['password'] = Hash::make($inputs['password']);

        User::create($inputs);

        return $this->index();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.users.index', [
            'users' => UserResource::collection(User::all()),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return UserResource::make(User::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.pages.users.edit', [
            'user' => UserResource::make(User::findOrFail($id)),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        $inputs = $request->validated();
        if (!isset($inputs['password']))
            unset($inputs['password']);
        else
            $inputs['password'] = Hash::make($inputs['password']);

        User::where('id', '=', $id)->update($inputs);
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', '=', $id)->delete();
        return $this->index();
    }
}
