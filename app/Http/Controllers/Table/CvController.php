<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cv;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hasCv()
    {
        $user = Auth::user();
        return $hasCv = Cv::where('id_user', $user->id)->exists();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        if ($request->file('file')->isValid()) {
            $fileName = uniqid('', true) . '.' . $request->file->extension();

            $request->file->storeAs('uploads', $fileName);

            // Enregistrer le nom de fichier dans la base de données
            $cv = new CV();
            $cv->file_name = $fileName;
            $cv->file_path = 'uploads/' . $fileName;
            $cv->id_User = auth()->user()->id;
            $cv->save();

            return back()
                ->with('success','Vous avez téléchargé le fichier avec succès.')
                ->with('file', $fileName);
        } else {
            return back()
                ->with('error','Le fichier téléchargé est invalide.')
                ->withInput();
        }
    }
}
