<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class teacher
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user_role= Auth::user()->role->slug;
        if($user_role!='teacher'){
            return abort(401,'You are not authorized to visit the page');
        }
        return $next($request);
    }
}
