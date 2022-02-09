<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disc extends Model
{
    public $timestamps = false;
    protected $table = 'discs';

    protected $fillable = [
        'titol',
        'descripcio_cat',
        'descripcio_esp',
        'foto',
        'data_publicacio',
        'embed_spotify',
        'link_spotify',
        'link_apple_music',
        'link_venda_fisica',
        'generes_id',
        'artistes_id',
        'tipus_id'
    ];
}
