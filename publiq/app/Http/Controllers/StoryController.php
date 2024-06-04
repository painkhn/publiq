<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\View;
use Auth;

class StoryController extends Controller
{
    public function open_new_story() 
    {
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
        return redirect(route('Profile'));
    }
    public function show_story($id) 
    {
        $story = Story::with('user')->where('id', $id)->first();
        $views = View::where('user_id', Auth::user()->id)->where('story_id', $id)->first();
        if (!$views) {
            View::create([
                'user_id' => Auth::user()->id,
                'story_id' => $id
            ]);
        }
        return view('story', ['story' => $story]);
    }
    public function editor_story($id)
    {
        $story = Story::with('user')->where('id', $id)->first();
        if ($story->user->id == Auth::user()->id) 
        {
            return view('edit_story', ['story' => $story]);
        } else {
            return redirect()->back();
        }
    }
    public function edit_story($id, Request $request)
    {
        Story::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->back();
    }
}
