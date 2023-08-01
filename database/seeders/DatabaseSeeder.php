<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        
        $this->call(UserStatusSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(TagSeeder::class);
        
        $this->call(PostStatusSeeder::class);
        $this->call(PostSeeder::class);

        $this->call(PostTagSeeder::class);
    }
}
