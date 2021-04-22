<?php

namespace App\Http\Controllers\API;

use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cart = Cart::all();
    
        return response()->json([
            'success' => true,
            'response' => $cart
        ]);
    }
}
