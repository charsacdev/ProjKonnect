<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authstudent
{
    public function handle(Request $request, Closure $next): Response
    {
        if(\Auth::guard('web')->user()->user_type==='student'){
            return $next($request);
         }
        else{
            return redirect('login');
        }
    }
}
