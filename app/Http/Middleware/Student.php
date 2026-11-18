<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Student
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user_role= Auth::user()->role->slug;
        if($user_role=='teacher'){
            return redirect('/teacher');
        }
        if($user_role=='admin'){
            return redirect('/admin');
        }
        return $next($request);
    }
}
