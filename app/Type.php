<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'user_id', 'nome','immagine'
    ];
    
    public function restaurants()
    {
        return $this->belongsToMany('App\Restaurant');
    }
}
