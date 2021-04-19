<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;


class OrdersController extends Controller
{
    public function index(){

        $orders = Order::all();
    
        return response()->json([
            'success' => true,
            'response' => $orders
        ]);
    }
}
