<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserStatus;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserStatus::factory()->create(['status' => 'active']);
        UserStatus::factory()->create(['status' => 'not_Active']);
        UserStatus::factory()->create(['status' => 'suspended']);
        UserStatus::factory()->create(['status' => 'banned']);
    }
}
