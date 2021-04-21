<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Plate;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plates = Plate::all()->sortBy('nome');
        $data = [
            'plates' => $plates
        ];

        return view('admin.restaurants.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plates = Plate::all();
        $data = ['plates' => $plates];

        return view('admin.restaurants.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPlates = new Plate();
        $data = $request->validate([
            'nome' => 'required',
            'prezzo' => 'required|numeric|between:0,9999.99',
            'immagine' => 'required|min:1|max:2048',
            'ingredienti' => 'required',
            'visibile' => 'required'
        ]);
        $idUser = Auth::id();
        $newPlates -> user_id = $idUser;
        // if( $request->has('immagine') ) {
            $image = Storage::put('immagine_storage', $data['immagine']);
            $data['immagine'] = $image;
            // };
            $newPlates -> fill($data);
        $newPlates-> save();

        return redirect()->route('plates.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        $data = ['plate' => $plate];
        return view('admin.restaurants.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {

        if($plate){
            $data = [
            'plate'=> $plate
            ];
            return view('admin.restaurants.edit',$data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plate $plate)
    {
        $data = $request->validate([
            'nome' => 'required',
            'prezzo' => 'required|numeric|between:0,9999.99',
            'immagine' => 'required|min:1|max:2048',
            'ingredienti' => 'required',
            'visibile' => 'required'
        ]);
        if( $request->has('immagine') ) {
            $image = Storage::put('immagine_storage', $data['immagine']);
            $data['immagine'] = $image;
        };
        
        $plate -> update($data);
        return redirect()->route('plates.index', $plate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        $plate -> delete();
        return redirect()-> route('plates.index');

    }


}
