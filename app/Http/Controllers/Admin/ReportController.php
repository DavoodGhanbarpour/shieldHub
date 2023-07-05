<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function allUsers()
    {
        return view('admin.pages.reports.users.invoices.index', [
            'users' => User::query()
                ->withSum('invoices','debit')
                ->withSum('invoices','credit')
                ->withCount('activeSubscriptions')
                ->get(),
        ]);
    }

    public function speceficUser(User $user)
    {
        return view('admin.pages.reports.users.invoices.index', [
            'invoices' => Invoice::all()
        ]);
    }
}
