<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
   
        'prezzo_totale','indirizzo_consegna', 'pagamento_avvenuto','email','nome'
    ];

    public function plates()
    {
        return $this->belongsToMany('App\Plate');
    }
    
}
