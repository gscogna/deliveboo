<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    protected $fillable = [
        'user_id', 'nome', 'prezzo', 'immagine', 'ingredienti', 'visibile'
    ];


    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }
}
