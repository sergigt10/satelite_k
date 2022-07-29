<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    public $timestamps = false;
    protected $table = 'artistes';

    protected $fillable = [
        'nom',
        'foto',
        'biografia_cat',
        'biografia_esp',
        'link_web',
        'generes_id',
        'portada'
    ];

    // Relació 1:1 artista i gènere
    public function genere()
    {
        return $this->belongsTo(Genere::class, 'generes_id');
    }

    // Relació 1:n artista i disc (S'utilitza en el destroy), ordenat per data de publicació
    public function discs()
    { 
        return $this->hasMany(Disc::class, 'artistes_id')->latest('data_publicacio'); 
    } 

    // Relació 1:n artista i noticia (S'utilitza en el destroy)
    public function noticies()
    { 
        return $this->hasMany(Noticia::class, 'artistes_id'); 
    } 

    // Saber quins artistes estan a portada
    public function scopePortada($query) 
    {
        return $query->whereIn('portada',[1, 2, 3, 4])->pluck('portada')->toArray();
    }
}
