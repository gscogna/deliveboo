<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'user_id','nome', 'indirizzo', 'tipologia', 'immagine', 'slug'
    ];


    public function user(){
        return $this-> belongsTo('App\User');
    }

    public function types()
    {
        return $this->belongsToMany('App\Type');
    }

    public function statistic()
    {
        return $this->hasOne('App\Statistic');
    }

    public function plates()
    {
        return $this->hasMany('App\Plate');
    }

}
