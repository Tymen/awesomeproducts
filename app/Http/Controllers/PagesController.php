<?php

namespace App\Http\Controllers;

use App\Contact;
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
    public function contact($alert = null, $errorMessage = null)
    {
        return view('contact')->with("alert", $alert)->with("errorMessage", $errorMessage);
    }
    public function contactCreate(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'message' => 'required|max:5000',
            'subject' => 'required|max:255',
            'email' => 'required|max:255',
        ]);
        $createContact = new Contact();
        $createContact->subject = $request->subject;
        $createContact->email = $request->email;
        $createContact->name = $request->name;
        $createContact->message = $request->message;
        $createContact->read = 0;
        $createContact->save();
        return $this->contact("Bedankt voor het bericht! U zal zo snel mogelijk van ons horen!");
    }
    public function elements()
    {
        return view('elements');
    }
    public function tag($tag = null)
    {
        if($tag){
            if (count(Tag::all()->where("name", $tag)) > 0) {
                return view('category')->with("tags", Tag::all())->with("posts", Tag::all()->where("name", $tag)->first()->post->where("enabled", 1));
            }
        }
        return view('category')->with("tags", Tag::all())->with("posts", Post::where("enabled", 1)->orderBy('created_at', 'desc')->paginate(6));
    }
    public function blog()
    {
        return view('blog');
    }
}
