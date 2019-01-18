<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recept extends Model
{
    protected $fillable = [
        'user_id',
        'recept_name',
        'recept_description',
        'recept_short_description'
    ];
}
