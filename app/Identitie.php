<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identitie extends Model
{
    protected $fillable = [
        'nrdb_code',
        'name',
        'faction',
        'tier',
        'picked'
    ];

}
