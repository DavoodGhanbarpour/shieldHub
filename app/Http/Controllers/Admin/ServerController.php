<?php

namespace App\Http\Controllers\Admin;

use App\Facades\ServerFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServerStoreRequest;
use App\Http\Requests\Admin\ServerUpdateRequest;
use App\Models\Server;
use Illuminate\Http\RedirectResponse;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.servers.index', [
            'servers' => Server::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.servers.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServerStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['subscription_price'] = removeSeparator($data['subscription_price']);
        ServerFacade::upsert($data);
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
        return view('admin.pages.servers.edit', [
            'server' => Server::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServerUpdateRequest $request, string $id): RedirectResponse
    {
        $data = $request->validated();
        $data['subscription_price'] = removeSeparator($data['subscription_price']);
        ServerFacade::upsert($data, $id);
        return redirect()->route('admin.servers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        if (Server::withCount('inbounds')->first()->inbounds_count) {
            return redirect()->back()->withErrors([
                __('app.messages.server_has_children')
            ]);
        }
        ServerFacade::delete($id);
        return redirect()->route('admin.servers.index');
    }
}
