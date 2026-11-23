<?php

namespace App\Http\Middleware;

use App\Enum\UserStatus;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Status
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user=Auth::user();
        if($user->status==UserStatus::DEACTIVATED)
            return redirect('/suspend');
        return $next($request);
    }
}
