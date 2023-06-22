<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\InboundResource;
use App\Models\Inbound;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('customer.pages.home.index',[
             'inbounds' => auth()->user()->inbounds
        ]);
    }
}
