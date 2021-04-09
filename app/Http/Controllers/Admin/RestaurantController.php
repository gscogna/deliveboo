<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function ordini()
    {
        return view('admin.restaurants.ordini');
    }

    public function statistiche()
    {
        return view('admin.restaurants.statistiche');
    }
}
