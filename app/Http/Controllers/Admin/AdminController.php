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
    public function users()
    {
        return view("admin.users.index")->with("users", User::all());
    }
    public function usersEdit($id)
    {
        $getRoles = Auth::user()->Role->where("name", "admin")->all();
        if (count($getRoles) > 0) {
            $getUser = User::find($id);
            return view("admin.users.create")->with("users", User::all())->with("user", $getUser)->with("roles", Roles::all());
        } else {
            return redirect("/admin")->with("users", User::all());
        }
    }
    public function usersStore(Request $request, $id)
    {
        $getRoles = Auth::user()->Role->where("name", "admin")->all();
        if (count($getRoles) > 0) {
                $getUser = User::find($id);
                $getUser->name = $request->name;
                $getUser->email = $request->email;
                $getUser->save();
                $getUser->Role()->sync($request->roles);
            } else {
                return redirect("/admin");
            }
        return view("admin.users.index")->with("users", User::all());
    }
}
