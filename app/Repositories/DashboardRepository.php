<?php

namespace App\Repositories;

use App\Models\Inbound;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Shetabit\Visitor\Models\Visit;

class DashboardRepository
{
    public function getLastVisitsCount(int $count): Collection|array
    {
        return Visit::query()
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(id) as count'))
            ->where('visitor_type', '=', User::class)
            ->where('created_at', '>', Carbon::now()->subDays($count))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();
    }


    public function getLastInboundsCreationCount(int $count): Collection|array
    {
        return Inbound::query()
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(id) as count'))
            ->where('created_at', '>', Carbon::now()->subDays($count))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();
    }

    public function getLastUsersCreationCount(int $count): Collection|array
    {
        return Inbound::query()
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(id) as count'))
            ->where('created_at', '>', Carbon::now()->subDays($count))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();
    }

    public function getUserCounts() : array
    {
        return [
            'admins' => User::where('role', '=', User::ADMIN)->count(),
            'customers' => User::where('role', '=', User::CUSTOMER)->count(),
        ];
    }

    public function getInboundCounts(): array
    {
        return [
            'inUse' => Inbound::has('users')->count(),
            'notInUse' => Inbound::doesntHave('users')->count(),
        ];
    }
}
