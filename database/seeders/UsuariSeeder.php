<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::create([
        //     'name' => 'Sergi',
        //     'email' => 'sergi@sergi.com',
        //     'password' => Hash::make('123456789'), 
        // ]);
        $user = User::create([
            'name' => 'Satelite K',
            'email' => 'info@satelitek.com',
            'password' => Hash::make('58c1qp-P'), 
        ]);
    }
}
