<?php

namespace Database\Seeders;

use App\Models\Artista;
use Illuminate\Database\Seeder;

class ArtistesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artista = Artista::create([
            'nom' => 'Josep',
            'biografia_cat' => 'Loream ipsum',
            'biografia_esp' => 'Loream ipsum',
            'link_web' => '#',
            'foto' => 'backend/artistes/LADnkDx8t4dvKdnQl2n9zeJfdvWPgMf1gVraCSzo.png',
            'generes_id' => '1',
        ]);
        $artista = Artista::create([
            'nom' => 'Miquel',
            'biografia_cat' => 'Loream ipsum',
            'biografia_esp' => 'Loream ipsum',
            'link_web' => '#',
            'foto' => 'backend/artistes/LADnkDx8t4dvKdnQl2n9zeJfdvWPgMf1gVraCSzo.png',
            'generes_id' => '1',
        ]);
        $artista = Artista::create([
            'nom' => 'Martí',
            'biografia_cat' => 'Loream ipsum',
            'biografia_esp' => 'Loream ipsum',
            'link_web' => '#',
            'foto' => 'backend/artistes/LADnkDx8t4dvKdnQl2n9zeJfdvWPgMf1gVraCSzo.png',
            'generes_id' => '1',
        ]);
        $artista = Artista::create([
            'nom' => 'María',
            'biografia_cat' => 'Loream ipsum',
            'biografia_esp' => 'Loream ipsum',
            'link_web' => '#',
            'foto' => 'backend/artistes/LADnkDx8t4dvKdnQl2n9zeJfdvWPgMf1gVraCSzo.png',
            'generes_id' => '1',
        ]);
        $artista = Artista::create([
            'nom' => 'Anna',
            'biografia_cat' => 'Loream ipsum',
            'biografia_esp' => 'Loream ipsum',
            'link_web' => '#',
            'foto' => 'backend/artistes/LADnkDx8t4dvKdnQl2n9zeJfdvWPgMf1gVraCSzo.png',
            'generes_id' => '1',
        ]);
    }
}
