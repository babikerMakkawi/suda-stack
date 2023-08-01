<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->create(['name' => 'database']);
        Category::factory()->create(['name' => 'back-end']);
        Category::factory()->create(['name' => 'front-end']);
        Category::factory()->create(['name' => 'framework']);
        Category::factory()->create(['name' => 'algorithms']);
        Category::factory()->create(['name' => 'structure']);
    }
}
