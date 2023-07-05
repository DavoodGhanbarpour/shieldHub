<?php

namespace App\Http\Controllers\Admin;

use App\Facades\DashboardFacade;
use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {

        $freeDisk   = getFreeStorageAsGB(storage_path());
        $totalDisk  = getFullStorageAsGB();
        $usedDisk   = $totalDisk - $freeDisk;
        return view('admin.pages.home.index', [
            'charts' => [
                'user_visits' => DashboardFacade::getLastVisitsCount(7),
                'added_inbounds_count' => DashboardFacade::getLastInboundsCreationCount(7),
                'added_users_count' => DashboardFacade::getLastUsersCreationCount(7),
            ],
            'system_statics' => [
                'totalDisk'     => $totalDisk,
                'usedDisk'      => $usedDisk,
                'freeDisk'      => $freeDisk,
                'usedPercent'   => round( ( $usedDisk / $totalDisk ) * 100 ),
            ],
            'cards' => [
                'user_counts' => DashboardFacade::getUserCounts(),
                'inbound_counts' => DashboardFacade::getInboundCounts(),
                'online_user' => User::online()->get()->first() ?: 0
            ]
        ]);
    }


}
