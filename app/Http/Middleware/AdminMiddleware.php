<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     if (Auth::check() && Auth::user()->isAdmin()) {
    //         // If the user is an admin, redirect them to the admin dashboard
    //         return redirect()->route('courses.index');

    //     }

    //     // If the user is not an admin, allow the request to proceed
    //     return redirect()->route('admin.dashboard');
    // }
}
