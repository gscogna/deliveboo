<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Plate;

class HomeController extends Controller
{
    public function index()
    {   
        
        $restaurant = Restaurant::where('user_id', Auth::id())->get();
        $data = ['restaurants' => $restaurant];

        return view('admin.home',$data);
    }

    public function show(){
        // $restaurant =Restaurant::all();
        $plate = Plate::where('user_id', Restaurant::id())->get();

        $data = ['plates' => $plate];
        return view('admin.restaurant.index',$data);
    }
}
