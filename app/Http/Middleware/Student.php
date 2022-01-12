<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Student
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $isLoggedIn = Auth::check();

        if ($isLoggedIn) {
            $isStudent = Auth::user()->roles->name === "Student";
            if ($isStudent) {
                return $next($request);
            }
        }

        return redirect()->back();
    }
}
