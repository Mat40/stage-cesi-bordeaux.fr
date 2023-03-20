<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'nullable|mimes:png,jpg|max:20408',
        ]);
        $user = Auth::user();

        if(!$user) {
            return back();
        }

        if ($request->file('file')->isValid()) {
            $fileName = uniqid('', true) . '.' . $request->file->extension();

            $request->file->storeAs('uploads', $fileName);

            if ($user->pp_path) {
                $oldFilePath = $user->pp_path;
                Storage::delete($oldFilePath);
            }

            $user->pp_path = 'uploads/' . $fileName;

            $user->save();
        }

        return back();
    }
}
