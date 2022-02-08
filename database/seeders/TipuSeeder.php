<?php

namespace Database\Seeders;

use App\Models\Tipu;
use Illuminate\Database\Seeder;

class TipuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipu = Tipu::create([
            'nom_cat' => 'Single',
            'nom_esp' => 'Single',
        ]);
        $tipu = Tipu::create([
            'nom_cat' => 'EP',
            'nom_esp' => 'EP',
        ]);
        $tipu = Tipu::create([
            'nom_cat' => 'Àlbum',
            'nom_esp' => 'Álbum',
        ]);
        $tipu = Tipu::create([
            'nom_cat' => 'Pack',
            'nom_esp' => 'Pack',
        ]);
    }
}
