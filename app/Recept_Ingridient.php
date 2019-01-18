<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recept_Ingridient extends Model
{
    protected $fillable = [
        'recept_id',
        'ingridient_name',
        'ingridient_count'
    ];
}
