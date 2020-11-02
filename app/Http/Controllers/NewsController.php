<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Followed_Sport;
use App\News;
use App\Sport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class NewsController extends Controller
{

    public function chooseNewsType()
    {
        return \view('home.choose_news_type');
    }

    public function newsIFollow()
    {
        $allNews = DB::table('news AS t1')
            ->select('t1.id', 't1.title', 't4.sport_name', 't1.writer', 't1.content')
            ->join('followed__sports AS t2', 't2.followed_sport_id', '=', 't1.sport_id_tag')
            ->join('users AS t3', 't2.user_id', '=', 't3.id')
            ->join('sports AS t4', 't4.id', '=', 't1.sport_id_tag')->get();
        return \view('home.browse_news', compact('allNews'));
    }

    public function allNews()
    {
        $allNews = DB::table('news AS t1')
            ->select('t1.id', 't1.title', 't2.sport_name', 't1.writer', 't1.content')
            ->join('sports AS t2', 't2.id', '=', 't1.sport_id_tag')->get();
        return \view('home.browse_news', compact('allNews'));
    }

    public function showNews(Request $request)
    {
        $news = News::where('title', $request['news'])->first();
        return \view('home.read_news', compact('news'));
    }
}
