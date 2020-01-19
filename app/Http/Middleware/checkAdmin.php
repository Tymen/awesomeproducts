<?php

namespace App\Http\Middleware;

use App\Roles;
use Closure;
use Illuminate\Support\Facades\Auth;

class checkAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check())
        {
            $getAdmin = Auth::user()->Role->where("name", "admin")->all();
            $getSuperUser = Auth::user()->Role->where("name", "superuser")->all();
            if (count($getAdmin) > 0 || count($getSuperUser) > 0) {
                return $next($request);
            }
        }
        return redirect('/');
    }
}
