<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\User_Prediction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{
    public function showMatches()
    {
        $userID = Auth::user()->id;
        $allMatches = DB::table('matches AS t1')
            ->select('t1.id', 't1.match_date', 't4.sport_name', 't1.rival_university', 't1.score', 't1.result', 't1.votes_in_favor', 't1.votes_against')
            ->join('followed__sports AS t2', 't2.followed_sport_id', '=', 't1.sport_id')
            ->join('users AS t3', 't2.user_id', '=', 't3.id')
            ->join('sports AS t4', 't4.id', '=', 't1.sport_id')
            ->where('t3.id', $userID)->get();
        return \view('home.matches', compact('allMatches'));
    }

    public function showMatch(Request $request)
    {
        $match = Match::where('id', $request['match'])->first();
        $prediction = User_Prediction::where('user_id', Auth::user()->id)
            ->where('match_id', $match->id)->first();
        return \view('home.see_match', compact('match', 'prediction'));
    }

    public function storePrediction(Request $request)
    {
        if ($request['prediction'] == 'win') {
            $win = Match::where('id', $request['matchID'])->first()->votes_in_favor;
            $win = $win + 1;
            Match::where('id', $request['matchID'])->update(['votes_in_favor' => $win]);
        } elseif ($request['prediction'] == 'lose') {
            $lose = Match::where('id', $request['matchID'])->first()->votes_against;
            $lose = $lose + 1;
            Match::where('id', $request['matchID'])->update(['votes_against' => $lose]);
        }
        User_Prediction::create([
            'user_id' => Auth::user()->id,
            'match_id' => $request['matchID'],
        ]);
        $match = Match::where('id', $request['matchID'])->first();
        $prediction = User_Prediction::where('user_id', Auth::user()->id)
            ->where('match_id', $match->id)->first();
        return \view('home.see_match', compact('match', 'prediction'));
    }
}
