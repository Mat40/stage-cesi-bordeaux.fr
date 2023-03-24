<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::all();
        return view('welcome', ['offers' => $offers]);

    }
    public function create(Request $request){

        console.log('coucouc');
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'release_date' => 'required|string|max:50',
            'trust' => 'required|string|max:50',
            'skills' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'number_of_places' => 'required|string|max:255',
        ]);


        $offer = Offer::firstOrCreate(['name' => $validateData['name']],['city' => $validatedData['city'],
        'type' => $validatedData['type'],
        'release_date' => $validatedData['release_date'],
        'trust' => $validatedData['trust'],
        'skills' => $validatedData['skills'],
        'salary' => $validatedData['salary'],
        'number_of_places' => $validatedData['number_of_places']]);

        $area_activity = area_activity::firstOrCreate(['name' => $validatedData['skills']]);

        $offer->area_activity()->attach($area_activity->id);
        return back();
    }
    public function softDelete($id){
        Offer::find($id)->delete();
        return back();
    }
}
