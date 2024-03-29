<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InboundBulkCreateRequest;
use App\Http\Requests\Admin\InboundStoreRequest;
use App\Http\Requests\Admin\InboundUpdateRequest;
use App\Models\Inbound;
use App\Models\Server;

class InboundController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.inbounds.add', [
            'servers' => Server::all(),
        ]);
    }

    public function bulkCreate()
    {
        return view('admin.pages.inbounds.add-multiple', [
            'servers' => Server::all(),
            'servers_pluck' => Server::all()->pluck('id', 'ip')->toJson(),
        ]);
    }

    public function bulkStore(InboundBulkCreateRequest $request)
    {
        collect($request->get('inbounds'))->map(function ($eachInbound) {
            Inbound::create($eachInbound);
        });
        return redirect()->route('admin.inbounds.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InboundStoreRequest $request)
    {
        Inbound::create($request->validated());

        return redirect()->route('admin.inbounds.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // We are using view composer instead of this
        return view('admin.pages.inbounds.index', [
            'inbounds' => Inbound::withCount('activeSubscriptions')->with('server')->get(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Inbound::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.pages.inbounds.edit', [
            'inbound' => Inbound::findOrFail($id),
            'servers' => Server::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InboundUpdateRequest $request, Inbound $inbound)
    {
        $inbound->update($request->validated());
        return redirect()->route('admin.inbounds.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inbound $inbound)
    {
        $inbound->deleteOrFail();
        return redirect()->route('admin.inbounds.index');
    }

    public function users(Inbound $inbound)
    {
        return view('admin.pages.inbounds.users', [
            'users' => $inbound->activeSubscriptions()->withCount('inbounds')->get()
        ]);
    }
}
