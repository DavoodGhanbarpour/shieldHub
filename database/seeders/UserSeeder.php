<?php

namespace Database\Seeders;

use App\Models\Inbound;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->has(Inbound::factory()->count(3))
            ->count(50)
            ->create();
    }
}
