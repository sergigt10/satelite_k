<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipu extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nom_cat',
        'nom_esp'
    ];
}
