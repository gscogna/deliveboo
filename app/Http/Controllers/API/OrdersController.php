<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;


class OrdersController extends Controller
{
    public function index($id){

        $orders = Order::where('user_id', $id)->get();
    
        // return response()->json([
        //     'success' => true,
        //     'response' => $orders
        // ]);
        return response()->json($orders);
    }
}
