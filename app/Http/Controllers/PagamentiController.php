<?php

namespace App\Http\Controllers;

use App\Order;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PagamentiController extends Controller
{
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

        public function checkout(Request $request, Restaurant $restaurant)
        {

            $data = $request->all();
            //gateway
            $gateway = new \Braintree\Gateway([
                'environment' => 'sandbox',
                'merchantId' => 'rpmzckhdvzdytzcf',
                'publicKey' => 'dzyhztnkm5htmsz9',
                'privateKey' => 'b7f611b63d89b351679889280acaccf6'
            ]);
            
    
            //transaction
            $result = $gateway->transaction()->sale([
                'amount' => '10.00',
                'paymentMethodNonce' => $data['payment_method_nonce'],
                // 'deviceData' => $deviceDataFromTheClient,
                'options' => [
                    'submitForSettlement' => True
                ]
            ]);
    
            if ($result->success) {
                //popolo db ordini
                $order = new Order();
                $order->pagamento_avvenuto = true;
                $order->user_id = $data['user_id'];

                $order->fill($data);
                $order->save();
                return view('guest.checkout');
            } else {
                $errorString = "";
        
                foreach ($result->errors->deepAll() as $error) {
                    $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
                }
                return back()->withErrors('Il pagamento non è andato a buon fine: '.$result->message);
            }
        }

}