<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        return view('guest.restaurants.index');
    }
    public function show()
    {
        return view('guest.restaurants.show');
    }

    public function carrello()
    {
        return view('guest.restaurants.carrello');
    }
}
