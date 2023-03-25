<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;


class UserController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'nullable|mimes:png,jpg|max:2048',
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

            $user->pp_path = $fileName;

            $user->save();
        }

        return back();
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'campus' => 'required|string|max:50',
            'grade' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ]);

        $user->firstname = $validatedData['firstname'];
        $user->lastname = $validatedData['lastname'];
        $user->campus = $validatedData['campus'];
        $user->grade = $validatedData['grade'];
        $user->email = $validatedData['email'];
        $user->save();

        return redirect()->back()->with('success', 'L\'utilisateur a été mis à jour avec succès !');
    }

    public function delete($id){
        User::find($id)->delete();
        return back();
    }
}