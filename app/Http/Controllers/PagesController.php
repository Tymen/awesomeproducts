<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('welcome')->with("posts", Post::all());
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
    public function elements()
    {
        return view('elements');
    }
    public function category()
    {
        return view('category');
    }
    public function blog()
    {
        return view('blog');
    }
}
