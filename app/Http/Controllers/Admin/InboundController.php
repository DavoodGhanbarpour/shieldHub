<?php

namespace App\Http\Controllers\Admin;

use App\Facades\InboundFacade;
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
        InboundFacade::upsert($request->validated());

        return redirect()->route('admin.inbounds.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // We are using view composer instead of this
        return view('admin.pages.inbounds.index', [
//            'inbounds' => InboundResource::collection(Inbound::all()),
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
        InboundFacade::upsert($request->validated(), $id);

        return redirect()->route('admin.inbounds.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        InboundFacade::delete($id);

        return redirect()->route('admin.inbounds.index');
    }
}
