<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function showProfile()
    {
        $numberOfPredictions = DB::table('user__predictions')->where('user_id', Auth::user()->id)->count();
        return \view('home.see_profile', compact('numberOfPredictions'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $validated = $request->validate([
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);
                $extension = $request->image->extension();
                $request->image->storeAs('/public/uploads', "profilePic" . Auth::user()->id . "." . $extension);
                $url = $request->image->storeAs('images', "profilePic" . Auth::user()->id . "." . $extension, 'public_uploads');
                $user = Auth::user();
                $user->picture_url = "uploads/$url";
                $user->save();
                Session::flash('success', "Success!");
                return redirect('perfil');
            }
        }
        abort(500, 'Could not upload image :(');
    }
}
