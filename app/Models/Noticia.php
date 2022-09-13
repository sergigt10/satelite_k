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
        'foto2',
        'alt_foto2',
        'artistes_id'
    ];

    // Relació 1:n noticia i artista
    public function artista()
    {
        return $this->hasMany(Tipu::class, 'artistes_id');
    }
}
