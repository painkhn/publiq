<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;

class HomeController extends Controller
{
    public function index()
    {
        $newStories = Story::orderBy('created_at', 'DESC')->where('status', 'accepted')->limit(3)->get();
        return view('index', ['stories' =>  $newStories]);    
    }
}
