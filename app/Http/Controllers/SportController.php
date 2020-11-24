<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sport;
use Illuminate\Support\Facades\DB;

class SportController extends Controller
{
    public function showSport(Request $request)
    {
        $sport = Sport::where('id', $request['sport'])->first();
        $players = DB::table('players AS t1')
        ->select('t1.id', 't1.name', 't1.position', 't1.team_number', 't1.sport_id')
        ->where('t1.sport_id', $sport->id)->get();
        return \view('home.see_sport', compact('sport', 'players'));
    }
}
