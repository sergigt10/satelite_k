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
        'tipus_id',
        'model'
    ];

    // Relació 1:1 disc i gènere
    public function genere()
    {
        return $this->belongsTo(Genere::class, 'generes_id');
    }

    // Relació 1:1 disc i tipu
    public function tipu()
    {
        return $this->belongsTo(Tipu::class, 'tipus_id');
    }

    // Relació 1:n disc i artista
    public function artista()
    {
        return $this->belongsTo(Artista::class, 'artistes_id');
    }

    // Detectar quins disc estan a portada
    public function scopePortada($query) 
    {
        return $query->whereIn('portada',[1, 2, 3, 4, 5])->pluck('portada')->toArray();
    }
}
