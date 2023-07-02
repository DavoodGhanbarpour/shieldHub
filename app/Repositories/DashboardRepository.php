<?php

namespace App\Repositories;

use App\Models\Inbound;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Shetabit\Visitor\Models\Visit;

class DashboardRepository
{
    public function getLastVisitsCount(int $count): array
    {
        $resultByQuery = Visit::query()
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(id) as count'))
            ->where('visitor_type', '=', User::class)
            ->where('created_at', '>', Carbon::now()->subDays($count))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get()
            ->pluck('count', 'date')
            ->toArray();

        $days = [];
        foreach (CarbonPeriod::create(Carbon::now()->subDays($count), Carbon::now()) as $key => $each) {
            $days[$key]['date'] = $each;
            $days[$key]['count'] = $resultByQuery[$each->format('Y-m-d')] ?? 0;
        }
        return $days;
    }


    public function getLastInboundsCreationCount(int $count): array
    {
        $resultByQuery = Inbound::query()
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(id) as count'))
            ->where('created_at', '>', Carbon::now()->subDays($count))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get()
            ->pluck('count', 'date')
            ->toArray();

        $days = [];
        foreach (CarbonPeriod::create(Carbon::now()->subDays($count), Carbon::now()) as $key => $each) {
            $days[$key]['date'] = $each;
            $days[$key]['count'] = $resultByQuery[$each->format('Y-m-d')] ?? 0;
        }
        return $days;
    }

    public function getLastUsersCreationCount(int $count): Collection|array
    {
        $resultByQuery = User::query()
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(id) as count'))
            ->where('created_at', '>', Carbon::now()->subDays($count))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get()
            ->pluck('count', 'date')
            ->toArray();

        $days = [];
        foreach (CarbonPeriod::create(Carbon::now()->subDays($count), Carbon::now()) as $key => $each) {
            $days[$key]['date'] = $each;
            $days[$key]['count'] = $resultByQuery[$each->format('Y-m-d')] ?? 0;
        }
        return $days;
    }

    public function getUserCounts(): array
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
