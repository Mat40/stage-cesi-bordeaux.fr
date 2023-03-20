<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Table\CvController;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cvController = new CvController();
        $hasCv = $cvController->hasCv();
        $cv = $cvController->getCv();
        $user = Auth::user();

        return view('profile', [
            'hasCv' => $hasCv,
            'user' => $user,
            'cv' => $cv,
        ]);
    }
}
