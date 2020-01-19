<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Roles;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkAdmin');
    }

    public function index()
    {
        return view("admin.index")->with("users", User::all())->with("posts", Post::all())->with("tags", Tag::all());
    }
}
