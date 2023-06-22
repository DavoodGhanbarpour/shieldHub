<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InboundStoreRequest;
use App\Http\Requests\Admin\InboundUpdateRequest;
use App\Http\Resources\Admin\InboundResource;
use App\Http\Resources\Admin\UserResource;
use App\Models\Inbound;

class InboundController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.inbounds.add');
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
        return view('admin.pages.inbounds.index', [
            'inbounds' => InboundResource::collection(Inbound::all()),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return InboundResource::make(Inbound::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.pages.inbounds.edit', [
            'inbound' => UserResource::make(Inbound::findOrFail($id)),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InboundUpdateRequest $request, string $id)
    {
        return redirect()->route('admin.inbounds.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Inbound::where('id', '=', $id)->delete();

        return redirect()->route('admin.inbounds.index');
    }
}
