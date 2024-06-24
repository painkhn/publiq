<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;
use App\Models\Story;

class AdminController extends Controller
{

    public function verification_list()
    // Открываем страницу историй, которые надо проверить
    {
        $stories = Story::where('status', 'waiting')->get(); // Получаем все истории которые не проверенные
        return view('admin', ['stories' => $stories]);
    }

    public function verification_story($story_id)
    // Открываем страницу истории, которую надо проверить
    {
        $story = Story::where('id', $story_id)->first(); // Получаем информацию о этой истории
        return view('verification', ['story' => $story]);
    }

    public function solution($story_id, $status)
    // Меняем статус истории
    {
        Story::where('id', $story_id)->update(['status' => $status]); // Обновляем статус истории
        return redirect(route('VerifList', ['stories' => Story::where('status', 'waiting')->get()]));
        // return view('verification', ['story' => Story::where('id', $story_id)->first()]);
    }
}
