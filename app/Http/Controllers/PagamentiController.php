<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;


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

        public function checkout(Request $request) {

            $gateway = new \Braintree\Gateway([
                'environment' => 'sandbox',
                'merchantId' => 'rpmzckhdvzdytzcf',
                'publicKey' => 'dzyhztnkm5htmsz9',
                'privateKey' => 'b7f611b63d89b351679889280acaccf6'
            ]);
    
            $amount = $request->amount;
            
            $nonce = $request->payment_method_nonce;
    
            $result = $gateway->transaction()->sale([
                'amount' => $amount,
                'paymentMethodNonce' => $nonce,
                'options' => [
                    'submitForSettlement' => true
                ]
            ]);
        
            if ($result->success) {
                $transaction = $result->transaction;
    
                $order = new Order();
                $data =  $request->all();
                $order->fill($data);
                $order->save();
        
                return view('guest.checkout')->with('success_message', 'Il pagamento è stato effettuato. L\'id è:'. $transaction->id);
            } else {
                $errorString = "";
        
                foreach ($result->errors->deepAll() as $error) {
                    $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
                }
                return back()->withErrors('Il pagamento non è andato a buon fine: '.$result->message);
            }
        }

}