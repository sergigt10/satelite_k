<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videoclip extends Model
{
    public $timestamps = false;
    protected $table = 'videoclips';

    protected $fillable = [
        'titol',
        'embed_youtube',
        'artistes_id',
        'portada'
    ];

    // Relació 1:n disc i artista
    public function artista()
    {
        return $this->belongsTo(Artista::class, 'artistes_id');
    }

    // Detectar quins disc estan a portada, es crida en el controlador de videoclips
    public function scopePortada($query) 
    {
        return $query->whereIn('portada',[1, 2, 3, 4])->pluck('portada')->toArray();
    }
}
