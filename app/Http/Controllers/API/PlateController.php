<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Plate;

class PlateController extends Controller
{
    public function index(){
      $plates = Plate::all();

      return response()->json([
        'success' => true,
        'response' => $plates
      ]);
    }
}
