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
}
