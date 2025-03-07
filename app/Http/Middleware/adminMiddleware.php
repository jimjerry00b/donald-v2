<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if(Auth::check()){
            $user = Auth::user();

            if($user->is_active){
                return $next($request);
            }
            Auth::logout();
       }

       return redirect()->route('login.page')->with('error', 'You do not have permission to access this page.');
    }
}
