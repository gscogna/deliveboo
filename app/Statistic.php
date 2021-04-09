<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{

    protected $fillable = [
        'user_id', 'transazioni_effettuate'
    ];

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }
}
