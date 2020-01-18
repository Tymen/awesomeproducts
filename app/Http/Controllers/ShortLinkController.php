<?php

namespace App\Http\Controllers;

use App\Shortlinks;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    public function redirect($title, $id)
    {
        if (Shortlinks::where('idlink', '/link/' . $title . "/" . $id)->first()->link){
            return redirect(Shortlinks::where('idlink', '/link/' . $title . "/" . $id)->first()->link);
        }else {
            return redirect("/");
        }
    }
}
