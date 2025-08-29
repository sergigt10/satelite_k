<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    public $timestamps = false;
    protected $table = 'blog';

    protected $fillable = [
        'titol_cat',
        'titol_esp',
        'descripcio_cat',
        'descripcio_esp',
        'foto',
        'foto_mini',
        'foto2',
        'alt_foto2',
        'artistes_id',
        'embed_1',
        'embed_2'
    ];

    // Relació 1:n noticia i artista
    public function artista()
    {
        return $this->belongsTo(Artista::class, 'artistes_id');
    }
}
