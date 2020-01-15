<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.index");
    }
    public function users()
    {
        return view("admin.users.index")->with("users", User::all());
    }
}
