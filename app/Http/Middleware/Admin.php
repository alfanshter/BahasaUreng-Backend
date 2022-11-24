<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && auth()->user()->role == 0) {
            return $next($request);
        }

        return redirect('/')->with('error', "You don't have admin access.");
    }
}
