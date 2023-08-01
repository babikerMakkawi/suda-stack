<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostTag;
use Database\Factories\PostTagFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostTag::factory(100)->create();
    }
}
