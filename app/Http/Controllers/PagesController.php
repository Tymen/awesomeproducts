<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('welcome')
            ->with("posts", Post::orderBy('created_at', 'desc')->paginate(6))
            ->with("popPosts", Post::orderBy('created_at', 'desc')->paginate(3))
            ->with("featPost", Post::find(1))
            ->with("tags", Tag::all());
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
