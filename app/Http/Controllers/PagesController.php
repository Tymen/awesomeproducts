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
            ->with("posts", Post::where("enabled", 1)->orderBy('created_at', 'desc')->paginate(6))
            ->with("popPosts", Post::where("enabled", 1)->orderBy('created_at', 'desc')->paginate(3))
            ->with("featPost", Post::where("enabled", 1)->find(1))
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
    public function tag($tag)
    {
        if($tag){
            if (count(Tag::all()->where("name", $tag)) > 0) {
                return view('category')->with("tags", Tag::all())->with("posts", Tag::all()->where("name", $tag)->first()->post);
            }
        }
        return view('category')->with("tags", Tag::all())->with("posts", Post::all());
    }
    public function blog()
    {
        return view('blog');
    }
}
