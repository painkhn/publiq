<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\View;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $newStories = Story::orderBy('created_at', 'DESC')->where('status', 'accepted')->limit(3)->get();
        $popularStories = View::select('story_id', DB::raw('count(*) as count'))
        ->groupBy('story_id')
        ->orderBy('count', 'DESC')
        ->take(3)
        ->get();
    
        $popularStoriesIds = $popularStories->pluck('story_id')->toArray();

        $popularStoriesData = Story::whereIn('id', $popularStoriesIds)->get();

        return view('index', ['stories' => $newStories, 'populars' => $popularStoriesData]);
    }
    public function catalog()
    {
        $story = Story::where('status', 'accepted')->get();
        return view('catalog', ['populars' => $story]);    
    }
}
