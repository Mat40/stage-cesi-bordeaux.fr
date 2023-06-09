<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Cv;
use App\Models\applied_job;
use App\Models\follow;
use App\Models\Address;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobApplicationMail;
use App\Mail\ConfirmationMail;
use App\Http\Controllers\Table\CvController;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::all();
        $applied = null;
        $appliedJobs = auth()->user()->appliedJobs()->pluck('offer_id')->toArray();
        $followed = null;
        $followedOffers = auth()->user()->followedOffer()->pluck('offer_id')->toArray();
        $cvController = new CvController();
        $hasCv = $cvController->hasCv();
        return view('welcome', compact('offers', 'applied', 'appliedJobs', 'followed', 'followedOffers', 'hasCv'));
    }

    public function checkOfferApplied(Request $request)
    {
    $offerId = $request->input('offer_id');
    $isApplied = auth()->user()->appliedJobs()->where('offer_id', $offerId)->exists();
    return response()->json(['isApplied' => $isApplied]);
    }

    public function checkOfferFollowed(Request $request)
    {
    $offerId = $request->input('offer_id');
    $isFollowed = auth()->user()->followedOffer()->where('offer_id', $offerId)->exists();
    return response()->json(['isFollowed' => $isFollowed]);
    }

    public function create(Request $request){

        // dd($request);
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'release_date' => 'required|string|max:50',
            'skills' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'number_of_places' => 'required|string|max:255',
            'descriptions' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
        ]);

        // Trouver la Company correspondante à partir de la clé étrangère "name"
        $company = Company::where('id', $validatedData['name'])->first();

        // Trouver l'Address correspondante à partir de la clé étrangère "city"
        $address = Address::where('id', $validatedData['city'])->first();

        if (!$address || !$company) {
            return back();
        }

        // Créer l'offre et associer les clés étrangères
        $offer = new Offer();
        $offer->title = $validatedData['title'];
        $offer->type = $validatedData['type'];
        $offer->release_date = $validatedData['release_date'];
        $offer->skills = $validatedData['skills'];
        $offer->salary = $validatedData['salary'];
        $offer->number_of_places = $validatedData['number_of_places'];
        $offer->mail = $validatedData['email'];
        $offer->duration = $validatedData['duration'];
        $offer->description = $validatedData['descriptions'];

        // Lier les clés étrangères
        $offer->address()->associate($address);
        $offer->company()->associate($company);

        // Enregistrer l'offre après avoir associé les clés étrangères
        $offer->save();

        return back();
    }

    // public function update(Request $request, $id){

    //     dd($request);

    //     $validatedData = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'name' => 'required|string|max:255',
    //         'city' => 'required|string|max:255',
    //         'type' => 'required|string|max:50',
    //         'release_date' => 'required|string|max:50',
    //         'skills' => 'required|string|max:255',
    //         'salary' => 'required|string|max:255',
    //         'number_of_places' => 'required|string|max:255',
    //         'email' => 'required|string|max:255',
    //         'duration' => 'required|string|max:255',
    //         'descriptions' => 'required|string|max:255',
    //     ]);

    //     $offer = Offer::find($id);
    //     if ($offer) {
    //         $offer->update([
    //             'title' => $validatedData['title'],
    //             'type' => $validatedData['type'],
    //             'release_date' => $validatedData['release_date'],
    //             'skills' => $validatedData['skills'],
    //             'salary' => $validatedData['salary'],
    //             'number_of_places' => $validatedData['number_of_places'],
    //             'mail' => $validatedData['email'],
    //             'duration' => $validatedData['duration'],
    //             'description' => $validatedData['descriptions']
    //         ]);

    //         $address = Address::find($offer->address_id);
    //         if ($address) {
    //             $address->update(['city' => $validatedData['city']]);
    //         }

    //         $company = Company::find($offer->company_id);
    //         if ($company) {
    //             $company->update(['name' => $validatedData['name']]);
    //         }
    //     }

    //     return back();
    // }

    public function update(Request $request, $id){

        // dd($request);

        // Récupérer l'offre à mettre à jour en fonction de son ID
        $offer = Offer::find($id);

        //Validation des données du formulaire
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'release_date' => 'required|string|max:50',
            'skills' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'number_of_places' => 'required|string|max:255',
            'descriptions' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
        ]);

        //Trouver la Company correspondante à partir de la clé étrangère "name"
        $company = Company::where('id', $validatedData['name'])->first();

        //Trouver l'Address correspondante à partir de la clé étrangère "city"
        $address = Address::where('id', $validatedData['city'])->first();

        if (!$address || !$company) {
            return back();
        }

        //Mettre à jour l'offre avec les nouvelles données et les clés étrangères
        $offer->title = $validatedData['title'];
        $offer->type = $validatedData['type'];
        $offer->release_date = $validatedData['release_date'];
        $offer->skills = $validatedData['skills'];
        $offer->salary = $validatedData['salary'];
        $offer->number_of_places = $validatedData['number_of_places'];
        $offer->mail = $validatedData['email'];
        $offer->duration = $validatedData['duration'];
        $offer->description = $validatedData['descriptions'];
        $offer->address()->associate($address);
        $offer->company()->associate($company);

        //Enregistrer les changements dans la base de données
        $offer->save();

        //Rediriger l'utilisateur vers la page précédente
        return back();
    }

    public function delete($id) {
        $offer = Offer::find($id);
        if ($offer) {
            // Supprimer les enregistrements correspondants dans applied_jobs et follows
            $offer->appliedJobs()->delete();
            $offer->followedOffer()->delete();
            // Supprimer l'offre
            $offer->delete();
            return back();
        } else {
            return back();
        }
    }


    public function offerApply($id)
    {
        $user = auth()->user();

        // Vérifiez que l'utilisateur est connecté et a le rôle "user"
        if ($user->permission != "user"){
            return back();
        }

        // Récupérez l'offre correspondant à l'ID passé en paramètre
        $offer = Offer::findOrFail($id);

        // Ajoutez la relation entre l'utilisateur actuel et l'offre
        $appliedJobs = new applied_job(['user_id' => auth()->id()]);
        $offer->appliedJobs()->save($appliedJobs);

        // Envoi de l'e-mail
        $cv = Cv::where('id_user', $user->id)->first();
        $cvUrl = url('/cv/' . $cv->file_name);
        $mailData = [
            'offerTitle' => $offer->title,
            'userFullName' => $user->firstname . ' ' . $user->lastname,
            'userEmail' => $user->email,
            'cvUrl' => $cvUrl,
        ];
        Mail::to($offer->mail)->send(new JobApplicationMail($mailData));
        Mail::to($user->email)->send(new ConfirmationMail($mailData));

        return redirect()->back();
    }

    public function offerFollow($id)
    {
        $user = auth()->user();

        // Vérifiez que l'utilisateur est connecté et a le rôle "user"
        if ($user->permission != "user"){
            return back();
        }

        // Récupérez l'offre correspondant à l'ID passé en paramètre
        $offer = Offer::findOrFail($id);

        // Ajoutez la relation entre l'utilisateur actuel et l'offre
        $followedOffer = new follow(['user_id' => auth()->id()]);
        $offer->followedOffer()->save($followedOffer);

        return redirect()->back();
    }

    public function offerUnfollow($id)
    {
        $user = auth()->user();

        // Vérifiez que l'utilisateur est connecté et a le rôle "user"
        if ($user->permission != "user"){
            return back();
        }

        // Récupérez l'offre correspondant à l'ID passé en paramètre
        $offer = Offer::findOrFail($id);

        // Supprimez la relation entre l'utilisateur actuel et l'offre
        $offer->followedOffer()->where('user_id', auth()->id())->delete();

        return redirect()->back();
    }

    /*public function search(){
        $q=request()->input('q');
        $applied = null;
        $appliedJobs = auth()->user()->appliedJobs()->pluck('offer_id')->toArray();
        $followed = null;
        $followedOffers = auth()->user()->followedOffer()->pluck('offer_id')->toArray();

        $offers=Offer::where('title','like',"%$q%")
            ->orWhere('duration','like',"%$q%")
            ->orWhere('description','like',"%$q%")
            ->orWhereHas('company', function($query) use ($q) {
                $query->where('name','like',"%$q%");
            })
            ->orWhereHas('address', function($query) use ($q) {
                $query->where('city','like',"%$q%");
            })
            ->get();

        return view('welcome', compact('offers','applied', 'appliedJobs', 'followed', 'followedOffers'));
    }*/


    public function search()
{
    // Récupérez la valeur de la barre de recherche
    $q = request()->input('q');
    $applied = null;
    $appliedJobs = auth()->user()->appliedJobs()->pluck('offer_id')->toArray();
    $followed = null;
    $followedOffers = auth()->user()->followedOffer()->pluck('offer_id')->toArray();

    // Divisez la chaîne en mots-clés individuels
    $keywords = explode(' ', $q);

    // Créez une requête pour rechercher les offres correspondantes
    $query = Offer::query();

    // Ajoutez des conditions à la requête pour chaque mot-clé
    foreach ($keywords as $keyword) {
        $query->where(function ($query) use ($keyword) {
            $query->where('title', 'like', "%$keyword%")
                ->orWhere('duration', 'like', "%$keyword%")
                ->orWhere('release_date', 'like', "%$keyword%")
                ->orWhere('type', 'like', "%$keyword%")
                ->orWhere('description', 'like', "%$keyword%")
                ->orWhereHas('company', function ($query) use ($keyword) {
                    $query->where('name', 'like', "%$keyword%");
                })
                ->orWhereHas('address', function ($query) use ($keyword) {
                    $query->where('city', 'like', "%$keyword%");
                });
        });
    }

    // Exécutez la requête et récupérez les résultats
    $offers = $query->get();


    // Affichez les résultats dans votre vue
    return view('welcome', compact('offers','applied', 'appliedJobs', 'followed', 'followedOffers'));
}


    public function search_pannel_offer(){
        $q=request()->input('q');
        $companies = Company::all();
        $placeholder="Métier, mots-clés, entreprise, compétences ...";

        $offers=Offer::where('title','like',"%$q%")
            ->orWhere('duration','like',"%$q%")
            ->orWhere('description','like',"%$q%")
            ->orWhereHas('company', function($query) use ($q) {
                $query->where('name','like',"%$q%");
            })
            ->orWhereHas('address', function($query) use ($q) {
                $query->where('city','like',"%$q%");
            })
            ->get();


            return view('/administrateur/offres', compact('placeholder','offers','companies'));
    }


    public function responsive($id)
    {
        $offer = Offer::find($id);
        $applied = null;
        $appliedJobs = auth()->user()->appliedJobs()->pluck('offer_id')->toArray();
        $followed = null;
        $followedOffers = auth()->user()->followedOffer()->pluck('offer_id')->toArray();
        $cvController = new CvController();
        $hasCv = $cvController->hasCv();
        return view('offre_responsive', compact('offer', 'applied', 'appliedJobs', 'followed', 'followedOffers', 'hasCv'));
    }
}
