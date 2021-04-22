<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Support\Str;
use App\Plate;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        return view('guest.restaurants.index');
    }
    public function show(Plate $plate)
    {
        $data = [
            'plates' => $plate,
        ];
        return view('guest.restaurants.show', $data);
    }

    public function carrello()
    {
        return view('guest.restaurants.carrello');
    }

    public function get(Cart $cart){
        if($cart){
            $data = ['cart'=> $cart];
        }

        return view('guest.show', $data);
    }

    public function add(Request $request){
        $cart = new Cart();
        $data = $request->all();


        $cart->fill($data);
        $cart->save();
    }
}
