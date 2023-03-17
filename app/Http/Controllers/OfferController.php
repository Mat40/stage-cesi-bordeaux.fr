<?php

namespace App\Http\Controllers;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offer = Offer::all();
        return view('welcome', ['offer' => $offer]);
    }
}
