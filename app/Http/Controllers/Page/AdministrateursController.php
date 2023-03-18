<?php

namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdministrateursController extends Controller
{
    public function Offer(){
        $title='Panel administration';
        $path1="/Admin_offre";
        $path2="/Admin_entreprise";
        $path3="/Admin_etudiant";
        $placeholder="Métier, mots-clés, entreprise, compétences ...";
        $button='<button type="submit" formaction="/Admin_pilotes">Pilotes</button>';
        return view('/administrateur/Admin_offre', compact('placeholder','button','title','path1','path2','path3'));
    }

    public function Entreprise(){
        $path1="/Admin_offre";
        $path2="/Admin_entreprise";
        $path3="/Admin_etudiant";
        $placeholder="Entreprise, secteur d'activité, lieux...";
        $button='<button type="submit" formaction="/Admin_pilotes">Pilotes</button>';
        $title='Panel administration';
        return view('/administrateur/Admin_entreprise', compact('placeholder','button','title','path1','path2','path3'));
    }

    public function Etudiant(){
        
        $path1="/Admin_offre";
        $path2="/Admin_entreprise";
        $path3="/Admin_etudiant";
        $placeholder="Nom, prénom, centre, promotion...";
        $button='<button type="submit" formaction="/Admin_pilotes">Pilotes</button>';
        $title='Panel administration';
        return view('/administrateur/Admin_etudiant', compact('placeholder','button','title','path1','path2','path3'));
    }

    public function Pilotes(){
        
        $path1="/Admin_offre";
        $path2="/Admin_entreprise";
        $path3="/Admin_etudiant";
        $placeholder="Nom, prénom, centre, promotion...";
        $button='<button type="submit" formaction="/Admin_pilotes">Pilotes</button>';
        $title='Panel administration';
        return view('/administrateur/Admin_pilotes', compact('placeholder','button','title','path1','path2','path3'));
    }
}
