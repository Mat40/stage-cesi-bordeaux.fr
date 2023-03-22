<?php

namespace App\Http\Controllers\Table;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Address;
use App\Models\area_activity;
use App\Models\Located_at;
use App\Models\part_of;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::all();
        return view('welcome', ['company' => $company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $company = new Company;

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'number_of_trainees' => 'required|string|max:255',
            'description' => 'required|string|max:50',
            'trust' => 'required|string|max:50',
            'city' => 'required|string|max:255',
            'area_activity' => 'required|string|max:255',
        ]);

        $company->name = $validatedData['name'];
        $company->number_of_trainees = $validatedData['number_of_trainees'];
        $company->description = $validatedData['description'];
        $company->trust = $validatedData['trust'];
        $company->save();

        



        $address = new Address;
        $address->city = $validatedData['city'];
        $address->save();

        $area_activity = new area_activity;
        $area_activity->name = $validatedData['area_activity'];
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
        Company::find($id)->delete();
        return back();
    }


    public function update(Request $request, $id)
    {
        $company = Commpany::findOrFail($id);
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
