<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Shetabit\Visitor\Models\Visit;

class ReportController extends Controller
{
    public function allUsers()
    {
        $raw = 'SELECT sum( ROUND(`subscriptions`.`subscription_price` * DATEDIFF(end_date, start_date)) ) FROM `inbounds` INNER JOIN `subscriptions` ON `inbounds`.`id` = `subscriptions`.`inbound_id` WHERE `users`.`id` = `subscriptions`.`user_id`';
        return view('admin.pages.reports.users.invoices.index', [
            'users' => User::query()
                ->select()
                ->selectSub($raw, 'inbounds_sum_debit')
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
