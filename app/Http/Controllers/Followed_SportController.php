<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Followed_Sport;
use App\Sport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Followed_SportController extends Controller
{
    public function checkUnfollowedSports()
    {
        $unfollowedSports = DB::table('sports AS t1')
            ->select('t1.id', 't1.sport_name')
            ->leftJoin('followed__sports AS t2', 't2.followed_sport_id', '=', 't1.id')
            ->whereNull('t2.followed_sport_id')->get();
        if ($unfollowedSports->count() == 0) {
            $errMessage = "En tu lista ya agregaste todos los deportes disponibles";
            return \view('home.add_unfollowed_sports', compact('errMessage'));
        }
        return \view('home.add_unfollowed_sports', compact('unfollowedSports'));
    }

    public function addSports(Request $request)
    {
        $sports = Sport::all();
        foreach ($sports as $sport) {
            if (isset($request[$sport->id])) {
                Followed_Sport::create([
                    'user_id' => Auth::user()->id,
                    'followed_sport_id' => $sport->id,
                ]);
            }
        }
    }

    public function checkFollowedSports()
    {
        $followedSports = DB::table('sports AS t1')
            ->select('t1.id', 't1.sport_name')
            ->join('followed__sports AS t2', 't2.followed_sport_id', '=', 't1.id')
            ->join('users AS t3', 't2.user_id', '=', 't3.id')->get();
        if ($followedSports->count() == 0) {
            $errMessage = "No tienes agregado ningun deporte en tu lista";
            return \view('home.delete_followed_sports', compact('errMessage'));
        }
        return \view('home.delete_followed_sports', compact('followedSports'));
    }

    public function deleteSports(Request $request)
    {
        $sports = Sport::all();
        foreach ($sports as $sport) {
            if (isset($request[$sport->id])) {
                Followed_Sport::where('user_id', Auth::user()->id)->where('followed_sport_id', $sport->id)->delete();
            }
        }
    }
}
