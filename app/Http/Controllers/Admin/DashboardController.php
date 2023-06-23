<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inbound;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.pages.home.index',[
            'userCounts' => [
                'admins' => User::where('role', '=', User::ADMIN)->count(),
                'customers' => User::where('role', '=', User::CUSTOMER)->count(),
            ],
            'inboundCounts' => [
                'inUse' => Inbound::has('users')->count(),
                'notInUse' => Inbound::doesntHave('users')->count(),
            ]
        ]);
    }
}
