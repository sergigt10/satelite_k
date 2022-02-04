<?php

namespace Database\Seeders;

use App\Models\Genere;
use Illuminate\Database\Seeder;

class GenereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genere = Genere::create([
            'nom_cat' => 'Rock',
            'nom_esp' => 'Rock',
        ]);
    }
}
