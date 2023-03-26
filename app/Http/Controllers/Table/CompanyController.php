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

        // Création de l'entreprise ou récupération si elle existe déjà
        $company = Company::firstOrCreate(['name' => $validatedData['name']], [
            'number_of_trainees' => $validatedData['number_of_trainees'],
            'description' => $validatedData['description'],
            'trust' => $validatedData['trust']
        ]);

        // Création de l'adresse et association avec l'entreprise
        $address = Address::create([
            'city' => $validatedData['city'],
            'postal_code' => $validatedData['postal_code']
        ]);

        $company->locatedAt()->create(['address_id' => $address->id]);

        // Création de l'activité de zone et association avec l'entreprise
        $area_activity = area_activity::firstOrCreate(['name' => $validatedData['area_activity']]);
        $company->partOf()->create(['area_id' => $area_activity->id]);

        return back();
    }




    public function delete($id)
    {
        // Trouver l'entreprise à supprimer
        $company = Company::findOrFail($id);

        // Supprimer toutes les adresses associées à l'entreprise
        foreach ($company->locatedAt as $address) {
            $address->delete();
        }
        // Supprimer l'activité de zone associée à l'entreprise
        foreach ($company->partOf as $area_activity) {
            $area_activity->delete();
        }
        // Supprimer l'entreprise elle-même
        $company->delete();
        return back();
    }


    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'number_of_trainees' => 'string|max:255',
            'description' => 'string|max:50',
            'trust' => 'string|max:50',
            'city' => 'string|max:255',
            'postal_code' => 'string|max:255',
            'area_activity' => 'string|max:255',
        ]);

        $company = Company::find($id);

        $company->name = $validatedData['name'];

        $company->number_of_trainees = $validatedData['number_of_trainees'];
        $company->description = $validatedData['description'];
        $company->trust = $validatedData['trust'];

        $company->save();

        // Mettre à jour l'adresse de l'entreprise
        $company->locatedAt->each(function ($locatedAt) use ($validatedData) {
            $locatedAt->address->city = $validatedData['city'];
            $locatedAt->address->postal_code = $validatedData['postal_code'];
            $locatedAt->address->save();
        });

        // Mettre à jour les activités de l'entreprise
        $company->partOf->each(function ($partOf) use ($validatedData) {
            $partOf->area_activity->name = $validatedData['area_activity'];
            $partOf->area_activity->save();
        });

        return back();
    }


    public function getCities($id)
    {
        $addresses = Located_at::where('company_id', $id)->with('address')->get()->pluck('address');
        return response()->json($addresses);
    }
}



