<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function Follow(){
        $user = auth()->user();
        $offers = $user->followedOffer()->with('offer.company', 'offer.address')->get()->pluck('offer');
        // dd($offers);
        $applied = null;
        $appliedJobs = $user->appliedJobs()->pluck('offer_id')->toArray();
        $followed = null;
        $followedOffers = $user->followedOffer()->pluck('offer_id')->toArray();
        $placeholder="Métier, mots-clés, entreprise, compétences ...";
        return view('follow', compact('offers', 'applied', 'appliedJobs', 'followed', 'followedOffers', 'placeholder'));
    }

    public function Apply(){
        $user = auth()->user();
        $offers = $user->appliedJobs()->with('offer.company', 'offer.address')->get()->pluck('offer');
        $applied = null;
        $appliedJobs = $user->appliedJobs()->pluck('offer_id')->toArray();
        $followed = null;
        $followedOffers = $user->followedOffer()->pluck('offer_id')->toArray();
        $placeholder="Métier, mots-clés, entreprise, compétences ...";
        return view('apply', compact('offers', 'applied', 'appliedJobs', 'followed', 'followedOffers', 'placeholder'));
    }
}
