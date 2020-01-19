<?php

namespace App\Http\Controllers\Admin;

use App\Roles;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($alert = null, $errorMessage = null)
    {
        return view("admin.users.index")
            ->with("users", User::all())
            ->with("alert", $alert)
            ->with("errorMessage", $errorMessage);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.users.create")->with("roles", Roles::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getAdmin = Auth::user()->Role->where("name", "admin")->all();
        $getSuperUser = Auth::user()->Role->where("name", "superuser")->all();
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $rolesArray = [];
        foreach($request->roles as $role)
        {
            if (Roles::find($role)->name == "superuser" && !(count($getSuperUser) > 0)){
                return $this->index(null, "You are not allowed to set user to superuser");
            }else {
                array_push($rolesArray, $role);
            }
        }

        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->save();
        $newUser->Role()->sync($rolesArray);

        return $this->index("Succesfully created user: " . $newUser->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getUser = User::find($id);
        return view("admin.users.edit")->with("users", User::all())->with("user", $getUser)->with("roles", Roles::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $getAdmin = Auth::user()->Role->where("name", "admin")->all();
        $getSuperUser = Auth::user()->Role->where("name", "superuser")->all();

        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        foreach($request->roles as $role)
        {
            if (Roles::find($role)->name == "superuser" && !(count($getSuperUser) > 0)){
                return $this->index(null, "You are not allowed to set user to superuser");
            }else {
                array_push($rolesArray, $role);
            }
        }

        $getUser = User::find($id);
        $getUser->name = $request->name;
        $getUser->email = $request->email;
        $getUser->password = Hash::make($request->password);
        $getUser->save();
        $getUser->Role()->sync($request->roles);

        return $this->index("Succesfully edited user: " . $getUser->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
