<?php

namespace App\Http\Controllers;
use App\Plate;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        
        return view('guest.restaurants.index');
    }
    public function show(Plate $plate)
    {
        $data = ['plate' => $plate];
        return view('guest.restaurants.show');
    }

    public function carrello()
    {
        return view('guest.restaurants.carrello');
    }
}
