<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $timestamps = false;
    protected $table = 'sliders';

    protected $fillable = [
        'nom_artista',
        'color_nom_artista',
        'nom_disc',
        'color_titol_disc',
        'titol_link_cat',
        'titol_link_esp',
        'color_titol_url',
        'url_link',
        'foto',
        'ordre'
    ];
}
