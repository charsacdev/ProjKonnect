<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthProguide
{
    public function handle(Request $request, Closure $next): Response
    {
        if(\Auth::guard('web')->user()->user_type==='proguide'){
            return $next($request);
         }
        else{
            return redirect('login');
        }
    }
}
