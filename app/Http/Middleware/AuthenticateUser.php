<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateUser
{
    
    public function handle(Request $request, Closure $next): Response
    {
        if(\Auth::guard('web')->check()){
            return $next($request);
         }
            else{
            return redirect('login');
        }
    }
}
