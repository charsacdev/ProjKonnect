<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    //logout
    public function logoutClient(Request $request){
        Auth::guard('web')->logout();
        return redirect('login');
        session()->flash('success', 'Dont worry you can always login again...');
    
    }

    //logout Admin
    public function logoutAdmin(Request $request){
        Auth::guard('admin')->logout();
        return redirect('admin-projkonnect/login');
        session()->flash('success', 'Dont worry you can always login again...');
    
    }


}
