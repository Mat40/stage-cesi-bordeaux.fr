<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Cv;
use App\Models\applied_job;
use App\Models\follow;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobApplicationMail;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::all();
        $applied = null;
        $appliedOffers = auth()->user()->appliedOffer()->pluck('offer_id')->toArray();
        $followed = null;
        $followedOffers = auth()->user()->followedOffer()->pluck('offer_id')->toArray();
        return view('welcome', ['offers' => $offers, 'applied' => $applied, 'appliedOffers' => $appliedOffers, 'followed' => $followed, 'followedOffers' => $followedOffers]);

    }
    public function create(Request $request){

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
        $appliedOffer = new applied_job(['user_id' => auth()->id()]);
        $offer->appliedOffer()->save($appliedOffer);

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
}
