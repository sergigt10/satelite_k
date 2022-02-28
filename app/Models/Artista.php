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
        'generes_id'
    ];

    // Relació 1:1 artista i gènere
    public function genere()
    {
        return $this->belongsTo(Genere::class, 'generes_id');
    }

    // Relació 1:n artista i disc (S'utilitza en el destroy)
    public function discs()
    { 
        return $this->hasMany(Disc::class, 'artistes_id'); 
    } 

    // Relació 1:n artista i llibre (S'utilitza en el destroy)
    public function llibres()
    { 
        return $this->hasMany(Llibre::class, 'artistes_id'); 
    } 

    // Relació 1:n artista i noticia (S'utilitza en el destroy)
    public function noticies()
    { 
        return $this->hasMany(Noticia::class, 'artistes_id'); 
    } 
}
