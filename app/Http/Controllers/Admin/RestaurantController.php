<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Restaurant;
use App\User;
use App\Plate;
use App\Type;

class RestaurantController extends Controller
{
    // public function ordini()
    // {
    //     return view('admin.restaurants.ordini');
    // }

    public function statistiche()
    {
            $order = Order::where('user_id', Auth::id())->first();
            if($order){
                $data = [
                    'orders' => $order->user_id
                ];
            } else {
                $data = [
                    'orders' => ''
                ];
            }
        return view('admin.modifiche-ristorante.statistiche', $data);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::where('user_id', Auth::id())->get();
        $users = User::where('id', Auth::id())->get();
        $data = ['restaurants' => $restaurants, 'users' => $users];

        return view('admin.home', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::all();
        $types = Type::all();
        $data = ['restaurants' => $restaurants, 'types'=>$types];
        // dd($data);
        return view('admin.crearistorante', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Type $type)
    {
        $newRestaurant = new Restaurant();
        $data = $request->validate([
            'nome' => ['required',Rule::unique('restaurants')->ignore($newRestaurant)],
            'indirizzo' => 'required',
            'immagine' => 'required|min:1|max:2048'
        ]);
        $idUser = Auth::id();
        $newRestaurant -> user_id = $idUser;
        $newRestaurant->slug = Str::Slug($data['nome']);
        
        if(empty($data['immagine'])){
            $data['immagine'] = 'ristorante_storage\fast-food-2029397_960_720.png';
        } else {
            $image = Storage::put('ristorante_storage', $data['immagine']);
            $data['immagine'] = $image;
        }
        
        $variabile = implode($request['types']); 
        $newRestaurant->tipologia = $variabile;
        $newRestaurant -> fill($data);
        
        $newRestaurant-> save();
        if($request->has('types')){
            $newRestaurant->types()->sync($request['types']);
            $newRestaurant->tipologia =  $request['types'];
        }
        // dd($request['types']);
        return redirect()->route('admin.home', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        
        // dd($restaurant);
        $types = Type::all();

        $data = ['restaurant' => $restaurant, 'types'=>$types];
        return view('admin.modifiche-ristorante.edit', $data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant, Type $type)
    {
        $type = Type::all();
        $data = $request->validate([
            'nome' => ['required',Rule::unique('restaurants')->ignore($restaurant)],
            'indirizzo' => 'required',
            'immagine' => 'required|min:1|max:2048'
        ]);
        if($request->has('types')){
            $restaurant->types()->sync($request['types']);
            $restaurant->tipologia =  $request['types'];
        }


        if( $request->has('immagine') ) {
            $image = Storage::put('immagine_storage', $data['immagine']);
            $data['immagine'] = $image;
        };
        
        // if(array_key_exists('types', $data)){
        //     $restaurant -> types() -> sync($data['types']);
        // };
        $restaurant -> update($data);
        return redirect()->route('restaurants.index' , $restaurant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $plates = Plate::where('user_id', $restaurant->user_id);
        $user = User::where('id', $restaurant->user_id);

        $user->delete();
        $plates->delete();
        $restaurant->delete();
        return redirect()->route('admin.home');
    }
}
