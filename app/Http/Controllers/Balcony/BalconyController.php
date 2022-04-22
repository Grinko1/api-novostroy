<?php

namespace App\Http\Controllers\Balcony;

use App\Http\Controllers\Controller;
use App\Models\Balcony;
use App\Http\Resources\Balcony\BalconyResource;
use Illuminate\Http\Request;

class BalconyController extends Controller
{
   public function index()
   {
       $balconies = Balcony::with('flats')->get();

       return BalconyResource::collection($balconies);

   }
   public function store(Request $request)
   {
    $data = $request->validate([
        'room' =>'string'
    ]);
        Balcony::create([
            'title' => $data['title'],
        ],[$data]);


        return response()->json(['message' => 'added']);
   }
}
