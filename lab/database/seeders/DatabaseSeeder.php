<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // factory
        \App\Models\Post::factory(5)->create();


        
        // seeder
         $this->call([
            PostSeeder::class

    ]);
       
    }
}
