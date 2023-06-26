<?php

namespace App\Http\Controllers\Admin;

use App\Facades\DashboardFacade;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\LastInboundsCreationCountResource;
use App\Http\Resources\Admin\LastUsersCreationCountResource;
use App\Http\Resources\Admin\LastVisitsCountResource;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.pages.home.index', [
            'user_counts' => DashboardFacade::getUserCounts(),
            'inbound_counts' => DashboardFacade::getInboundCounts(),
            'user_visits' => LastVisitsCountResource::collection(DashboardFacade::getLastVisitsCount(7)),
            'added_inbounds_count' => LastInboundsCreationCountResource::collection(DashboardFacade::getLastInboundsCreationCount(7)),
            'added_users_count' => LastUsersCreationCountResource::collection(DashboardFacade::getLastUsersCreationCount(7)),
            'online_user' => User::online()->get()
        ]);
    }


}
