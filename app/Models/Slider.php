<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $timestamps = false;
    protected $table = 'sliders';

    protected $fillable = [
        'nom_artista',
        'nom_disc',
        'titol_link_cat',
        'titol_link_esp',
        'url_link',
        'foto',
        'ordre'
    ];
}
