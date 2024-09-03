<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminFinanceRole
{
    public function handle(Request $request, Closure $next): Response
    {
        if(\Auth::guard('admin')->user()->role==='finance' || \Auth::guard('admin')->user()->role==='admin'){
            return $next($request);
         }
        else{
            return redirect('admin-projkonnect/dashboard');
        }
    }
}
