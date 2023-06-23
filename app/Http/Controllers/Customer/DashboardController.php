<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('customer.pages.home.index', [
            'inbounds' => auth()->user()->inbounds,
        ]);
    }
}
