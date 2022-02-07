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
        'artistes_id'
    ];
}
