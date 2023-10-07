<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $debits = [];
        $credits = [];
        foreach (auth()->user()->credits() as $key => $each){
            $credits[$key]['description'] = $each->description;
            $credits[$key]['debit'] = 0;
            $credits[$key]['credit'] = $each->credit;
            $credits[$key]['created_at'] = $each->date;
        }

        foreach (auth()->user()->debits() as $key => $each){
            $debits[$key]['description'] = $each->description;
            $debits[$key]['debit'] = $each->debit;
            $debits[$key]['credit'] = 0;
            $debits[$key]['created_at'] = $each->created_at;
        }
        return view('customer.pages.invoices.index', [
            'invoices' => array_merge($debits, $credits)
        ]);
    }
}
