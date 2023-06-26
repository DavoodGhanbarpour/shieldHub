<?php

namespace App\Http\Controllers\Admin;

use App\Facades\ServerFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServerStoreRequest;
use App\Http\Requests\Admin\ServerUpdateRequest;
use App\Http\Resources\Admin\ServerResource;
use App\Models\Server;
use Cknow\Money\Money;
use Illuminate\Http\RedirectResponse;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('', [
            'servers' => ServerResource::collection(Server::all())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServerStoreRequest $request): RedirectResponse
    {
        ServerFacade::upsert($request->validated());
        return redirect()->route('admin.servers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('', [
            'server' => Server::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('', [
            'server' => Server::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServerUpdateRequest $request, string $id): RedirectResponse
    {
        ServerFacade::upsert($request->validated(), $id);
        return redirect()->route('admin.servers.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        ServerFacade::delete($id);
        return redirect()->route('admin.servers.index');
    }
}
