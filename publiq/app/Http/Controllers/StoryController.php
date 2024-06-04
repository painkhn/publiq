<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use Auth;

class StoryController extends Controller
{
    public function open_new_story() {
        return view('create_story');
    }
    public function new_story(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Story::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect(route('profile'));
    }
}
