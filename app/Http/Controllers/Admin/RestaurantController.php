<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Restaurant;
use App\User;

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        $users = User::all();
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
        // $restaurants = Restaurant::all();
        // $data = ['restaurants' => $restaurants];
        return view('admin.crearistorante');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $idUser = Auth::id();
        $newRestaurant = new Restaurant();
        $newRestaurant -> user_id = $idUser;
        $newRestaurant->slug = Str::Slug($data['nome']);
        
        $image = Storage::put('ristorante_storage', $data['immagine']);
        $data['immagine'] = $image;
        $newRestaurant -> fill($data);
        
        $newRestaurant-> save();

        return redirect()->route('admin.home', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $restaurant = Restaurant::where('user_id', Auth::id());
        $data = ['restaurant' => $restaurant];
        return view('admin.modifiche-ristorante.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $data = $request->all();
        if( $request->has('immagine') ) {
            $image = Storage::put('immagine_storage', $data['immagine']);
            $data['immagine'] = $image;
        };
        
        $restaurant -> update($data);
        return redirect()->route('restaurants.index' , $restaurant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
