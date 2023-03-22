<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
    public function index()
    {
        $offer = Offer::all();
        return view('welcome', ['offer' => $offer]);
       
    }



    public function create(Request $request)
    {
        $offer = new Offer;
        $company->name = $request->input('name');
        $company->number_of_trainees = $request->input('number_of_trainees');
        $company->description = $request->input('description');
        $company->trust = $request->input('trust');
        $company->save();

        $address = new Address;
        $address->city = $request->input('city');
        $address->save();

        $area_activity = new area_activity;
        $area_activity->name = $request->input('area_activity');
        $area_activity->save();
        

        $located_at = new Located_at;
       
        $Located_at->id_Company = $company->id;
        $Located_at->id = $address->id;
        $Located_at->save();

        $part_of = new part_of;
        
        $part_of->id_Company = $company->id;
        $part_of->id = $area_activity->id;
        $part_of->save();
    }

    public function softDelete($id){
        Offer::find($id)->delete();
        return back();
    }


    public function update(Request $request, $id)
    {
        $offer = Offer::findOrFail($id);
        //mettre a jour les commentaires suivant pour l'update
        /*$validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'campus' => 'required|string|max:50',
            'grade' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ]);

        $user->firstname = $validatedData['firstname'];
        $user->lastname = $validatedData['lastname'];
        $user->campus = $validatedData['campus'];
        $user->grade = $validatedData['grade'];
        $user->email = $validatedData['email'];
        $user->save();

        return redirect()->back()->with('success', 'L\'utilisateur a été mis à jour avec succès !');*/
    }

}
