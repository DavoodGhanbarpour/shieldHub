<?php

namespace Database\Seeders;

use App\Models\Inbound;
use App\Models\Server;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inbounds = Inbound::factory()
            ->count(10)
            ->for(Server::factory()
                ->create())
            ->create();

        $date = fake()->date();
        User::factory()
            ->hasAttached($inbounds, [
                'subscription_price' => fake()->numberBetween('0'),
                'start_date' => $date,
                'end_date' => Carbon::parse($date)->addMonth(),
                'created_at' => now(),
                'updated_at' => now(),
            ])
            ->count(10)
            ->create();
    }
}
