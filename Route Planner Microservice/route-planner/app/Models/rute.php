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

    public function rute_awal() {
        return $this->belongsTo(bus_stop::class, 'stop_1', 'id');
    }

    public function rute_akhir() {
        return $this->belongsTo(bus_stop::class, 'stop_2', 'id');
    }
}
