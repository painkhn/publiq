<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;
use App\Models\Story;

class AdminController extends Controller
{

    public function verification_list()
    {
        $stories = Story::where('status', 'waiting')->get();
        return view('admin', ['stories' => $stories]);
    }

    public function verification_story($story_id)
    {
        $story = Story::where('id', $story_id)->first();
        return view('verification', ['story' => $story]);
    }

    public function solution($story_id, $status)
    {
        Story::where('id', $story_id)->update(['status' => $status]);
        return redirect(route('VerifList', ['stories' => Story::where('status', 'waiting')->get()]));
        // return view('verification', ['story' => Story::where('id', $story_id)->first()]);
    }
}
