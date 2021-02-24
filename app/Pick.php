<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pick extends Model
{
    protected $fillable = [
        'picker_name',
        'key',
        'team_name',
        'pick_corp',
        'pick_runn',
        'link'
    ];
}
