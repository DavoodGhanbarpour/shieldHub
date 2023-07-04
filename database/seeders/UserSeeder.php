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

        User::factory()
            ->hasAttached($inbounds, [
                'subscription_price' => fake()->numberBetween('0'),
                'start_date' => fake()->date(),
                'end_date' => Carbon::parse(fake()->date())->addMonth(1),
            ])
            ->count(10)
            ->create();
    }
}
