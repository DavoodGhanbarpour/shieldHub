<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Shetabit\Visitor\Models\Visit;

class ReportController extends Controller
{
    public function allUsers()
    {
        return view('admin.pages.reports.users.invoices.index', [
            'users' => User::query()
                ->withSum('invoices', 'debit')
                ->withSum('invoices', 'credit')
                ->withCount('activeSubscriptions')
                ->get(),
        ]);
    }

    public function logs()
    {
        return view('admin.pages.logs.login.index',[
            'visits' => Visit::query()->whereNull('visitor_type')->get()
        ]);
    }
}
