<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Followed_Sport;
use App\Sport;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class ManageFollowedSportsController extends Controller
{
    public function checkFollowedSports()
    {
        $followedSports = DB::table('sports AS t1')
            ->join('followed__sports AS t2', 't2.followed_sport_id', '=', 't1.id')
            ->join('users AS t3', 't2.user_id', '=', 't3.id')->get();
        if ($followedSports->count() == Sport::all()->count()) {
            $errMessage = "En tu lista ya agregaste todos los deportes disponibles";
            return \view('home.add_followed_sports', compact('errMessage'));
        }
        if ($followedSports->count() == 0) {
            $unfollowSports = Sport::all();
            return \view('home.add_followed_sports', compact('unfollowSports'));
        }
        $unfollowSports = DB::table('sports AS t1')
            ->select('t1.id','t1.sport_name')
            ->leftJoin('followed__sports AS t2', 't2.followed_sport_id', '=', 't1.id')
            ->whereNull('t2.followed_sport_id')->get();
        return \view('home.add_followed_sports', compact('unfollowSports', 'followedSports'));
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

    public function checkUnfollowedSports()
    {
        $followedSports = DB::table('sports AS t1')
            ->join('followed__sports AS t2', 't2.followed_sport_id', '=', 't1.id')
            ->join('users AS t3', 't2.user_id', '=', 't3.id')->get();
        if ($followedSports->count() == 0) {
            $unfollowSports = Sport::all();
            return \view('home.add_followed_sports', compact('unfollowSports'));
        }
        $unfollowSports = DB::table('sports AS t1')
            ->leftJoin('followed__sports AS t2', 't2.followed_sport_id', '=', 't1.id')
            ->whereNull('t2.followed_sport_id')->get();
        return \view('home.add_followed_sports', compact('unfollowSports', 'followedSports'));
    }

    public function deleteSports(Request $request)
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
}
