<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rute extends Model
{
    protected $fillable = [
        'stop_1',
        'stop_2',
        'distance',
    ];
}
