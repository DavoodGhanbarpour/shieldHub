<?php

namespace App\Http\Controllers\Admin;

use App\Facades\InvoiceFacade;
use App\Facades\ServerFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InvoiceStoreRequest;
use App\Http\Requests\Admin\InvoiceUpdateRequest;
use App\Models\Invoice;
use App\Models\Server;
use App\Models\User;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.invoices.index', [
            'invoices' => Invoice::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.invoices.add', [
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvoiceStoreRequest $request)
    {
        $data = $request->validated();
        $data['credit'] = removeSeparator($data['credit']);
        InvoiceFacade::upsert($data);
        return redirect()->route('admin.invoices.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('', [
            'server' => Invoice::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.pages.invoices.edit', [
            'invoice' => Invoice::findOrFail($id),
            'users' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvoiceUpdateRequest $request, string $id)
    {
        $data = $request->validated();
        $data['credit'] = removeSeparator($data['credit']);
        InvoiceFacade::upsert($data, $id);
        return redirect()->route('admin.invoices.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        InvoiceFacade::delete($id);
        return redirect()->route('admin.invoices.index');
    }
}
