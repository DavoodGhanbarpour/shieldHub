<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('customer.pages.invoices.index', [
            'invoices' => auth()->user()->invoices
        ]);
    }
}
