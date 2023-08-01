<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::factory()->create(['name' => 'database']);
        Tag::factory()->create(['name' => 'back-end']);
        Tag::factory()->create(['name' => 'front-end']);
        Tag::factory()->create(['name' => 'framework']);
        Tag::factory()->create(['name' => 'algorithms']);
        Tag::factory()->create(['name' => 'structure']);
    }
}
