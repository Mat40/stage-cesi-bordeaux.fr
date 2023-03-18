<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

        return view('profile', [
            'hasCv' => $hasCv,
        ]);
    }
}
