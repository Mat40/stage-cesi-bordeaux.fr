<?php

namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Offer;
use App\Models\Company;
class AdministrateursController extends Controller
{
    public function Offer(){
        $offers = Offer::all();
        $placeholder="Métier, mots-clés, entreprise, compétences ...";
        return view('/administrateur/offres', compact('placeholder','offers'));
    }

    public function Entreprise(){
        $companies = Company::all();
        $placeholder="Entreprise, secteur d'activité, lieux...";
        return view('/administrateur/entreprises', compact('placeholder','companies'));
    }

    public function Etudiant(){
        $users = User::where('permission', '=', 'user')->get();
        $placeholder="Nom, prénom, centre, promotion...";
        return view('/administrateur/etudiants', compact('placeholder','users'));
    }

    public function Pilotes(){
        // $pilotes = User::all();
        $pilotes = User::where('permission', '=', 'pilote')->get();
        $placeholder="Nom, prénom, centre, promotion...";
        return view('/administrateur/pilotes', compact('placeholder','pilotes'));
    }
}
