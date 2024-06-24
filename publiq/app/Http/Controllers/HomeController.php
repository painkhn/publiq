<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\View;
use DB;

class HomeController extends Controller
{
    public function index()
    // Открываем главную страницу
    {
        $newStories = Story::orderBy('created_at', 'DESC')->where('status', 'accepted')->limit(3)->get(); // Получаем три последние добавленные истории
        $popularStories = View::select('story_id', DB::raw('count(*) as count'))
        ->groupBy('story_id')
        ->orderBy('count', 'DESC')
        ->take(3)
        ->get(); // Получаем три самые популярные по просмотрам истории
    
        $popularStoriesIds = $popularStories->pluck('story_id')->toArray(); // Получаем id популярных историй

        $popularStoriesData = Story::whereIn('id', $popularStoriesIds)->get(); // Получаем информацию о популярных историях

        return view('index', ['stories' => $newStories, 'populars' => $popularStoriesData]); // Открываем главную страницу и передаем популярные истории и последние добавленные
    }
    public function catalog()
    // Открываем каталог
    {
        $story = Story::where('status', 'accepted')->get(); //Получаем истории, которые принял администратор
        return view('catalog', ['populars' => $story]); // Открываем страницу каталога и передаем информацию о историях  
    }
}
