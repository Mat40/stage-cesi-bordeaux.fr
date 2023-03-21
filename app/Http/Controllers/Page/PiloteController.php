<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Offer;

class PiloteController extends Controller
{
    public function Offer(){
        $offer = Offer::all();
        $title='Panel administration';
        $path1="/Pilote_offre";
        $path2="/Pilote_entreprise";
        $path3="/Pilote_etudiant";
        $button="";
        $placeholder="Métier, mots-clés, entreprise, compétences ...";
        return view('/Pilote/Pilote_offre', compact('placeholder','title','button','path1','path2','path3','offer'));
    }

    public function Entreprise(){
        $offer = Offer::all();
        $title='Panel administration';
        $path1="/Pilote_offre";
        $path2="/Pilote_entreprise";
        $path3="/Pilote_etudiant";
        $button="";
        $placeholder="Entreprise, secteur d'activité, lieux...";
        return view('/Pilote/Pilote_entreprise', compact('placeholder','title','button','path1','path2','path3','offer'));
    }

    public function Etudiant(){
        $user = User::all();
        $title='Panel administration';
        $path1="/Pilote_offre";
        $path2="/Pilote_entreprise";
        $path3="/Pilote_etudiant";
        $button="";
        $placeholder="Nom, prénom, centre, promotion...";
        return view('/Pilote/Pilote_etudiant', compact('placeholder','title','button','path1','path2','path3','user'));
    }

 
        

    
}



