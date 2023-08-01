<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostStatus::factory()->create(['status' => 'active']);
        PostStatus::factory()->create(['status' => 'not_active']);
        PostStatus::factory()->create(['status' => 'answered']);
        PostStatus::factory()->create(['status' => 'banned']);
    }
}
