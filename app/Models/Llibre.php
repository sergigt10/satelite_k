<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Llibre extends Model
{
    public $timestamps = false;
    protected $table = 'llibres';

    protected $fillable = [
        'titol_cat',
        'titol_esp',
        'autor',
        'ilustrador',
        'descripcio_cat',
        'descripcio_esp',
        'foto',
        'editorial',
        'data_publicacio',
        'link_compra_fisica',
        'artistes_id'
    ];

    // Relació 1:n llibre i artista
    public function artista()
    {
        return $this->hasMany(Tipu::class, 'artistes_id');
    }
}
