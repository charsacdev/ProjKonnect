<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminSuper
{
    public function handle(Request $request, Closure $next): Response
    {
        if(\Auth::guard('admin')->user()->role==='admin'){
            return $next($request);
         }
        else{
            return redirect('admin-projkonnect/dashboard');
        }
    }
}
