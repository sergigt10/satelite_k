<?php

namespace Database\Seeders;

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
        // $this->call(UsuariSeeder::class);
        $this->call(ArtistesSeeder::class);
        // $this->call(GenereSeeder::class);
        // $this->call(TipuSeeder::class);
    }
}
