<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class PagamentiController extends Controller
{

    public function index(Request $request){
    $gateway = new \Braintree\Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'rpmzckhdvzdytzcf',
        'publicKey' => 'dzyhztnkm5htmsz9',
        'privateKey' => 'b7f611b63d89b351679889280acaccf6'
    ]);

    $token = $gateway->clientToken()->generate();

    return view('guest.pagamenti', compact('token'));
    }

    public function process(Request $request){
        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'rpmzckhdvzdytzcf',
            'publicKey' => 'dzyhztnkm5htmsz9',
            'privateKey' => 'b7f611b63d89b351679889280acaccf6'
        ]);
    
        $token = $gateway->clientToken()->generate();
    
        return view('guest.pagamenti', compact('token'));
        }

}