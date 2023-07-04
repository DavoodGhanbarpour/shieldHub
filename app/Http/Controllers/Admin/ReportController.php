<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.pages.reports.users.invoices.index', [
            'invoices' => Invoice::all()
        ]);
    }
}
