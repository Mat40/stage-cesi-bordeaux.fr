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
        $companies = Company::all();
        return view('welcome', ['company' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'number_of_trainees' => 'required|string|max:255',
            'description' => 'required|string|max:50',
            'trust' => 'required|string|max:50',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'area_activity' => 'required|string|max:255',
        ]);

        $company = Company::firstOrCreate(['name' => $validatedData['name']], [
            'number_of_trainees' => $validatedData['number_of_trainees'],
            'description' => $validatedData['description'],
            'trust' => $validatedData['trust']
        ]);

        $address = new Address;
        $address->city = $validatedData['city'];
        $address->postal_code = $validatedData['postal_code'];
        $address->save();

        /*$address = Address::firstOrCreate([
            'city' => $validatedData['city'],
            'postal_code' => $validatedData['postal_code']
        ]);*/

        /*$area_activity = new area_activity;
        $area_activity->name = $validatedData['area_activity'];
        $area_activity->save();*/

        $area_activity = area_activity::firstOrCreate(['name' => $validatedData['area_activity']]);
        


       // Association de l'adresse avec l'entreprise
        $company->address()->attach($address->id);

        // Association de l'activité avec l'entreprise
        $company->area_activity()->attach($area_activity->id);
        return back();
    }




    public function delete($id){
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
